<?php

namespace App\Http\Controllers\Api\User\Cart;

use Carbon\Carbon;
use App\Models\Coupon;
use App\Classes\StockStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{

    public function __construct()
    {
        if (auth()->user()) {
            Cart::instance('cart')->restore(auth()->user()->email);
            Cart::instance('wishlist')->restore(auth()->user()->email);
            Cart::instance('compare')->restore(auth()->user()->email);
        }
    }

    public function storeCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer|exists:products,id',
            'product_title' => 'required|string|exists:products,title',
            'quantity' => 'required|string|min:1,max:100',
            'product_price' => 'required|numeric|exists:products,sale_price',
            'product_attributes' => 'required|array'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $status = StockStatus::getStockStatus($request->product_id, $request->quantity);
            if ($status == true) {
                $cart_items = Cart::instance('cart')->content()->pluck('id');
                if ($cart_items->contains($request->product_id)) {
                    return response()->json([
                        'message' => 'Product is already in your cart list!!!'
                    ], 403);
                } else {
                    Cart::instance('cart')->add($request->product_id, $request->product_title, $request->quantity, $request->product_price, $request->product_attributes)->associate('App\Models\Product');
                    return response()->json([
                        'message' => 'Product is added in your cart list!'
                    ]);
                }
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Quantity of then product is higher then quantity in the stock!!!'
        ], 403);
    }

    public function getCartlist()
    {
        try {
            $items = Cart::instance('cart')->content();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Cart content found sucessfully!',
            'data' => $items
        ]);
    }

    public function storeWishlist(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer|exists:products,id',
            'product_title' => 'required|string|exists:products,title',
            'product_price' => 'required|numeric|exists:products,sale_price',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $wishlist_items = Cart::instance('wishlist')->content()->pluck('id');
            if ($wishlist_items->contains($request->product_id)) {
                return response()->json([
                    'message' => 'Product is already in your wishlist list!!!'
                ], 403);
            }
            Cart::instance('wishlist')->add($request->product_id, $request->product_title, 1, $request->product_price)->associate('App\Models\Product');
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Product is added to your wishlist list!'
        ]);
    }

    public function getWishlist()
    {
        try {
            $items = Cart::instance('wishlist')->content();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Wishlist content found sucessfully!',
            'data' => $items
        ]);
    }


    public function storeCompare(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer|exists:products,id',
            'product_title' => 'required|string|exists:products,title',
            'product_price' => 'required|numeric|exists:products,sale_price',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $compare_items = Cart::instance('compare')->content()->pluck('id');
            if ($compare_items->contains($request->product_id)) {
                return response()->json([
                    'message' => 'Product is already in your compare list!!!'
                ], 403);
            }
            Cart::instance('compare')->add($request->product_id, $request->product_title, 1, $request->product_price)->associate('App\Models\Product');
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Product is added to your compare list!'
        ]);
    }

    public function getComparelist()
    {
        try {
            $items = Cart::instance('compare')->content();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Compare content found sucessfully!',
            'data' => $items
        ]);
    }

    public function increaseCartlist(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $product = Cart::instance('cart')->get($request->item_id);
            $status = StockStatus::getStockStatus($product->id, $product->qty);
            if ($status != true) {
                return response()->json([
                    'message' => 'Product is out of stock!!!'
                ], 403);
            }
            $qty = $product->qty + 1;
            Cart::instance('cart')->update($request->item_id, $qty);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Quantity is increased!',
            'data' => $qty
        ]);
    }

    public function decreaseCartlist(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $product = Cart::instance('cart')->get($request->item_id);
            if ($product->qty > 1) {
                $qty = $product->qty - 1;
                Cart::instance('cart')->update($request->item_id, $qty);
            } else {
                return response()->json([
                    'message' => 'Invalid request!!!',
                    'data' => $product->qty
                ], 403);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Quantity is decreased!',
            'data' => $qty
        ]);
    }

    public function removeCartItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $item = Cart::instance('cart')->remove($request->item_id);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Item is removed from the cart list!',
        ]);
    }

    public function removeWishlistItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $item = Cart::instance('wishlist')->remove($request->item_id);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Item is removed from the wishlist!',
        ]);
    }

    public function removeCompareItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $item = Cart::instance('compare')->remove($request->item_id);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Item is removed from the compare list!',
        ]);
    }
}
