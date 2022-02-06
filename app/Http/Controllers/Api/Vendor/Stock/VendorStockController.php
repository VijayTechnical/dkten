<?php

namespace App\Http\Controllers\Api\Vendor\Stock;

use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class VendorStockController extends Controller
{
    public function getStock()
    {
        try {
            $stocks = Stock::with('Product')->whereHas('Product', function ($q) {
                $q->where('vendor_id', auth()->user()->id);
            })->latest()->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Stocks found sucessfully!',
            'data' => $stocks
        ]);
    }

    public function createStock(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|integer|exists:categories,id',
            'product_id' => 'required|integer|exists:products,id',
            'sub_category_id' => 'required|integer|exists:sub_categories,id',
            'quantity' => 'required|integer',
            'rate' => 'required|integer',
            'total' => 'required|integer',
            'entry_note' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $product = Product::where(['id' => $request->product_id, 'category_id' => $request->category_id, 'sub_category_id' => $request->sub_category_id, 'vendor_id' => auth()->user()->id])->first();
            if (!$product) {
                return response()->json([
                    'message' => 'Product not found!!!',
                ], 404);
            }
            $stock = new Stock();
            $stock->category_id = $request->category_id;
            $stock->product_id = $request->product_id;
            $stock->sub_category_id = $request->sub_category_id;
            $stock->quantity = $request->quantity;
            $stock->rate = $request->rate;
            $stock->total = $request->total;
            $stock->reason_note = $request->entry_note;
            $stock->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Stock created sucessfully!',
            'data' => $stock
        ]);
    }

    public function destroyStock(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|integer|exists:categories,id',
            'product_id' => 'required|integer|exists:products,id',
            'sub_category_id' => 'required|integer|exists:sub_categories,id',
            'quantity' => 'required|integer',
            'monetary_loss' => 'required|integer',
            'reason_note' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $product = Product::where(['id' => $request->product_id, 'category_id' => $request->category_id, 'sub_category_id' => $request->sub_category_id, 'vendor_id' => auth()->user()->id])->first();
            if (!$product) {
                return response()->json([
                    'message' => 'Product not found!!!',
                ], 404);
            }
            $stock = new Stock();
            $stock->category_id = $request->category_id;
            $stock->product_id = $request->product_id;
            $stock->sub_category_id = $request->sub_category_id;
            $stock->quantity = $request->quantity;
            $stock->monetary_loss = $request->monetary_loss;
            $stock->entry_type = 'destroy';
            $stock->reason_note = $request->reason_note;
            $stock->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Stock destroyed sucessfully!',
            'data' => $stock
        ]);
    }

    public function deleteStock(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'stock_id' => 'required|integer|exists:stocks,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $stock = Stock::where('id', $request->stock_id)->first();
            $vendor_id = $stock->Product->vendor_id;
            if ($vendor_id != auth()->user()->id) {
                return response()->json([
                    'message' => 'Unauthorized!!!',
                ], 403);
            }
            $stock->delete();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Stock deleted sucessfully!',
            'data' => $stock
        ]);
    }
}
