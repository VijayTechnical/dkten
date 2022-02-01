<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Stock;
use App\Models\Coupon;
use App\Models\Payment;
use App\Models\Product;
use Livewire\Component;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Classes\StockStatus;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutComponent extends Component
{

    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;
    public $shipping;


    public $payment_mode_id;
    public $paymentmode;
    public $thankyou;
    public $order_id;

    public $first_name;
    public $last_name;
    public $phone;
    public $email;
    public $line1;
    public $line2;
    public $zip;
    public $delivery_place;
    public $delivery_date;
    public $sale_code;

    public function mount()
    {
        if (Auth::guard('web')->check()) {
            $user = User::where('id', Auth::guard('web')->user()->id)->first();
            if ($user) {
                $this->first_name = $user->first_name;
                $this->last_name = $user->last_name;
                $this->phone = $user->phone;
                $this->email = $user->email;
                $this->line1 = $user->line1;
                $this->line2 = $user->line2;
                $this->zip = $user->zip;
            }
        }
        $this->shipping = 50;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'line1' => 'required',
            'line2' => 'required',
            'zip' => 'required',
            'delivery_place' => 'required',
            'delivery_date' => 'required',
            'payment_mode_id' => 'required'
        ]);
    }

    public function proceedToCheckout()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'line1' => 'required',
            'line2' => 'required',
            'zip' => 'required',
            'delivery_place' => 'required',
            'delivery_date' => 'required',
            'payment_mode_id' => 'required'
        ]);

        $order = new Order();
        $sale_code = rand(100000, 999999);
        Log::info("sale_code = " . $sale_code);
        $order->sale_code = $sale_code;
        $order->user_id = Auth::guard('web')->user()->id;
        $order->subtotal = str_replace(",", "", session()->get('checkout')['subtotal']);
        $order->discount = str_replace(",", "", session()->get('checkout')['discount']);
        $order->tax = str_replace(",", "", session()->get('checkout')['tax']);
        $order->total = str_replace(",", "", session()->get('checkout')['total']);
        $order->shipping_cost = $this->shipping;
        $order->firstname =  $this->first_name;
        $order->lastname =  $this->last_name;
        $order->mobile =  $this->phone;
        $order->email =  $this->email;
        $order->line1 =  $this->line1;
        $order->line2 =  $this->line2;
        $order->zip =  $this->zip;
        $order->delivery_place =  $this->delivery_place;
        $order->delivery_date =  $this->delivery_date;
        $order->status = 'ordered';
        $order->save();

        $payment = Payment::where('id', $this->payment_mode_id)->first();
        $this->paymentmode = $payment->name;
        if ($this->paymentmode == 'cash_on_delivery') {
            $this->makeTransaction($order->id, 'pending');
            $status = $this->setOrders($order->id);
            if ($status == false) {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => 'Product is out of stock!']
                );
                return redirect()->back();
            }
            else{
                $this->resetCart();
            }
        } elseif ($this->paymentmode == 'wallet') {
            if($this->checkWallet() == true){
                Auth::guard('web')->user()->forceWithdraw(session()->get('checkout')['total'],['description' => 'payment of product']);
                $this->makeTransaction($order->id, 'pending');
                $status = $this->setOrders($order->id);
                if ($status == false) {
                    $this->dispatchBrowserEvent(
                        'alert',
                        ['type' => 'error',  'message' => 'Product is out of stock!!!']
                    );
                    return redirect()->back();
                }
                $this->resetCart();
            }
            else{
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => 'You do not have enough balance on your wallet!!!']
                );
            }
        } elseif ($this->paymentmode == 'esewa') {
            $this->dispatchBrowserEvent('submitEsewa');
            $this->order_id = $order->id;
            $this->makeTransaction($order->id, 'pending');
        } elseif ($this->paymentmode == 'khalti') {
            $this->dispatchBrowserEvent('showKhalti');
            $this->order_id = $order->id;
            $this->makeTransaction($order->id, 'pending');
        } elseif ($this->paymentmode == 'ime_pay') {
            $this->order_id = $order->id;
            $this->makeTransaction($order->id, 'pending');
        }
    }

    public function checkWallet()
    {
        $totalWalletBalance = Auth::guard('web')->user()->balance;
        $total = str_replace(',', '', session()->get('checkout')['total']);
        if($totalWalletBalance >= $total)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function setOrders($order_id)
    {
        foreach (Cart::instance('cart')->content() as $item) {
            $product = Product::where('id', $item->id)->first();
            $status = StockStatus::getStockStatus($item->id, $item->qty);
            if ($status == true) {
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

    public function resetCart()
    {
        $this->thankyou = 1;
        Cart::instance('cart')->destroy(Auth::user()->email);
        session()->forget('checkout');
        $message = [
            'name' => Auth::user()->name,
            'method' => $this->paymentmode,
        ];
    }

    public function makeTransaction($order_id, $status)
    {
        $transaction = new Transaction();
        $transaction->user_id = Auth::guard('web')->user()->id;
        $transaction->order_id = $order_id;
        $transaction->payment_mode_id = $this->payment_mode_id;
        $transaction->status = $status;
        $transaction->save();
    }

    public function verifyKhalti($payload)
    {
        $token = $payload['token'];
        $args = http_build_query(array(
            'token' => $token,
            'amount'  => 1000
        ));

        $url = "https://khalti.com/api/v2/payment/verify/";

        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $secret_key = config('app.khalti_secret_key');

        $headers = ['Authorization: Key ' . $secret_key . ''];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $token = json_decode($response, TRUE);

        if (isset($token['idx']) && $status_code == 200) {
            $transaction = Transaction::where('order_id', $this->order_id)->first();
            $transaction->status = 'approved';
            $transaction->save();
            $status = $this->setOrders($this->order_id);
            if ($status == false) {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => 'Product is out of stock!']
                );
                return redirect()->back();
            }
            $this->resetCart();
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Invalid token!!!']
            );
            return;
        }
    }


    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('components.midbar-component', 'refreshComponent');
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Product is removed from your cart!']
        );
        return;
    }

    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $this->emitTo('components.midbar-component', 'refreshComponent');
        $status = StockStatus::getStockStatus($product->id, $product->qty);
        if ($status == true) {
            $qty = $product->qty + 1;
            Cart::instance('cart')->update($rowId, $qty);
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Product is out of stock!']
            );
        }
        return;
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $this->emitTo('components.midbar-component', 'refreshComponent');
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
    }

    public function applyCouponCode()
    {
        $coupon = Coupon::where('code', $this->couponCode)->where('expiry_date', '>=', Carbon::today())->where('cart_value', '<=', Cart::instance('cart')->subtotal())->first();
        if (!$coupon) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Invalid Coupon code!!!']
            );
            $this->clear();
            return;
        }
        session()->put('coupon', [
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value
        ]);
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Coupon is applied Successfully!']
        );
        $this->clear();
        return;
    }



    public function clear()
    {
        $this->couponCode = '';
    }

    public function calculateDiscounts()
    {
        if (session()->has('coupon')) {
            if (session()->get('coupon')['type'] == 'fixed') {
                $this->discount = session()->get('coupon')['value'];
            } else {
                $this->discount = (str_replace(',', '', Cart::instance('cart')->subtotal()) * session()->get('coupon')['value']) / 100;
            }
            $this->subtotalAfterDiscount = str_replace(',', '', Cart::instance('cart')->subtotal()) - $this->discount;
            $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax')) / 100;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount + $this->shipping;
        }
    }

    public function removeCoupon()
    {
        session()->forget('coupon');
    }

    public function checkout()
    {
        if (Auth::check()) {
            return redirect()->route('checkout');
        } else {
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout()
    {
        if (!Cart::instance('cart')->count() > 0) {
            session()->forget('checkout');
            return;
        }
        if (session()->has('coupon')) {

            session()->put('checkout', [
                'discount' => $this->discount,
                'subtotal' => $this->subtotalAfterDiscount,
                'tax' => $this->taxAfterDiscount,
                'total' => $this->totalAfterDiscount
            ]);
        } else {
            session()->put('checkout', [
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total()
            ]);
        }
    }

    public function verifyForCheckout()
    {
        if (!Auth::guard('web')->check()) {
            return redirect()->route('user.login');
        } else if ($this->thankyou) {
            return redirect()->route('thankyou');
        } else if (!session()->get('checkout')) {
            return redirect()->back();
        }
    }

    public function verifyForCart()
    {
        if (Cart::instance('cart')->count() == null) {
            return redirect()->route('home');
        }
    }


    public function render()
    {
        $this->verifyForCart();
        if (session()->has('coupon')) {
            if (Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']) {
                session()->forget('coupon');
            } else {
                $this->calculateDiscounts();
            }
        }

        $this->setAmountForCheckout();

        if (Auth::guard('web')->check()) {
            Cart::instance('cart')->store(Auth::guard('web')->user()->email);
        }

        $this->verifyForCheckout();
        $payment_methods = Payment::orderBy('created_at', 'DESC')->get();
        if ($this->delivery_place == 'inside') {
            $this->delivery_date = '2-3';
        } else {
            $this->delivery_date = '3-5';
        }
        return view('livewire.checkout-component', ['payment_methods' => $payment_methods])->layout('layouts.base');
    }
}
