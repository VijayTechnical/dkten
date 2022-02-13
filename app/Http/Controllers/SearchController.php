<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getProduct(Request $request)
    {
        $searchTerm = $request->get('query');
        $products = Product::select('title')
            ->where('title', 'LIKE','%'.$searchTerm.'%')
            ->orWhere('seo_title', 'LIKE','%'.$searchTerm.'%')
            ->orWhere('description', 'LIKE','%'.$searchTerm.'%')
            ->orWhere('slug', 'LIKE','%'.$searchTerm.'%')
            ->latest()
            ->pluck('title');
        return response()->json($products);
    }
}
