<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Stock;
use SimpleXMLElement;
use App\Models\Product;
use Livewire\Component;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Gloudemans\Shoppingcart\Facades\Cart;

class EsewaComponent extends Component
{

    public $thankyou;

    public function verify()
    {
        $amount = 100;
        $pid = request('oid');
        $response = Http::asForm()->post('https://uat.esewa.com.np/epay/transrec', [
            'amt' => $amount,
            'scd' => 'EPAYTEST',
            'rid' => request('refId'),
            'pid' => $pid,
        ]);

        $responseCode = strtolower(trim((new SimpleXMLElement($response->body()))->response_code));

        if ($responseCode == 'success') {
            $transaction = Transaction::where('order_id', $pid)->first();
            $transaction->status = 'approved';
            $status = $this->setOrders($pid);
            if($status == false)
            {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => 'Product is out of stock!']
                );
                return redirect()->route('checkout');
            }
            $transaction->save();
            $this->thankyou = 1;
            Cart::instance('cart')->destroy(Auth::user()->email);
            session()->forget('checkout');
            if (!Auth::check()) {
                return redirect()->route('user.login');
            } else if ($this->thankyou) {
                return redirect()->route('thankyou');
            } else if (!session()->get('checkout')) {
                return redirect()->route('home');
            }
        }
        else{
            return redirect()->route('checkout')->with('product_payment_error','Invalid transaction!!!');
        }
    }

    public function setOrders($order_id)
    {
        $order = Order::where('id', $order_id)->first();
        if ($order) {
            foreach (Cart::instance('cart')->content() as $item) {
                $destroyed_quantity = 0;
                $added_quantity = 0;
                $quantity = 0;
                $product = Product::where('id', $item->id)->first();
                $destroyed_quantity = $destroyed_quantity + DB::table('stocks')->where('product_id', $item->id)->where('entry_type', 'destroy')->sum('quantity');
                $added_quantity = $added_quantity + DB::table('stocks')->where('product_id', $item->id)->where('entry_type', 'add')->sum('quantity');
                $quantity = $added_quantity - $destroyed_quantity;
                if ($quantity > 0) {
                    if ($item->qty <= $quantity) {
                        $orderItem = new OrderItem();
                        $orderItem->product_id = $item->id;
                        $orderItem->order_id = $order_id;
                        $orderItem->price = $item->price;
                        $orderItem->quantity = $item->qty;
                        $orderItem->save();
                        $stock = new Stock();
                        $stock->category_id = $product->category_id;
                        $stock->product_id = $product->id;
                        $stock->sub_category_id = $product->sub_category_id;
                        $stock->quantity = $item->qty;
                        $stock->entry_type = 'destroy';
                        $stock->reason_note = 'sale';
                        $stock->save();
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.esewa-component');
    }
}
