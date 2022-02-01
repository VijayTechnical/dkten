<?php

namespace App\Traits;

use App\Models\Product;

trait ProductSearchTrait
{
    public function searchProduct($sorting, $category_id, $min_price, $max_price, $paginate,  $brand_id = null, $vendor_id = null, $searchTerm = null, $sub_category_id = null, $type_id = null, $sub_type_id = null)
    {
        if ($sorting == 'date') {
            $products = Product::where('status', true)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->orderBy('created_at', 'DESC')->paginate($paginate);
        } else if ($sorting == 'price') {
            $products = Product::where('status', true)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->orderBy('sale_price', 'ASC')->paginate($paginate);
        } else if ($sorting == 'price-desc') {
            $products = Product::where('status', true)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->orderBy('sale_price', 'DESC')->paginate($paginate);
        } else {
            $products = Product::where('status', true)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->paginate($paginate);
        }
        if ($sub_category_id) {
            if ($sorting == 'date') {
                $products = Product::where('status', true)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('vendor_id', $vendor_id)->orderBy('created_at', 'DESC')->paginate($paginate);
            } else if ($sorting == 'price') {
                $products = Product::where('status', true)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('vendor_id', $vendor_id)->orderBy('sale_price', 'ASC')->paginate($paginate);
            } else if ($sorting == 'price-desc') {
                $products = Product::where('status', true)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('vendor_id', $vendor_id)->orderBy('sale_price', 'DESC')->paginate($paginate);
            } else {
                $products = Product::where('status', true)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('vendor_id', $vendor_id)->paginate($paginate);
            }
            if ($type_id) {
                if ($sorting == 'date') {
                    $products = Product::where('status', true)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->orderBy('created_at', 'DESC')->paginate($paginate);
                } else if ($sorting == 'price') {
                    $products = Product::where('status', true)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->orderBy('sale_price', 'ASC')->paginate($paginate);
                } else if ($sorting == 'price-desc') {
                    $products = Product::where('status', true)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->orderBy('sale_price', 'DESC')->paginate($paginate);
                } else {
                    $products = Product::where('status', true)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->paginate($paginate);
                }
                if ($sub_type_id) {
                    if ($sorting == 'date') {
                        $products = Product::where('status', true)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('sub_type_id', $sub_type_id)->orderBy('created_at', 'DESC')->paginate($paginate);
                    } else if ($sorting == 'price') {
                        $products = Product::where('status', true)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('sub_type_id', $sub_type_id)->orderBy('sale_price', 'ASC')->paginate($paginate);
                    } else if ($sorting == 'price-desc') {
                        $products = Product::where('status', true)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('sub_type_id', $sub_type_id)->orderBy('sale_price', 'DESC')->paginate($paginate);
                    } else {
                        $products = Product::where('status', true)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('sub_type_id', $sub_type_id)->paginate($paginate);
                    }
                }
            }
        }

        if ($brand_id) {
            if ($sorting == 'date') {
                $products = Product::where('status', true)->where('brand_id', $brand_id)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->orderBy('created_at', 'DESC')->paginate($paginate);
            } else if ($sorting == 'price') {
                $products = Product::where('status', true)->where('brand_id', $brand_id)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->orderBy('sale_price', 'ASC')->paginate($paginate);
            } else if ($sorting == 'price-desc') {
                $products = Product::where('status', true)->where('brand_id', $brand_id)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->orderBy('sale_price', 'DESC')->paginate($paginate);
            } else {
                $products = Product::where('status', true)->where('brand_id', $brand_id)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->paginate($paginate);
            }
        }

        if ($vendor_id) {
            if ($sorting == 'date') {
                $products = Product::where('status', true)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('vendor_id', $vendor_id)->orderBy('created_at', 'DESC')->paginate($paginate);
            } else if ($sorting == 'price') {
                $products = Product::where('status', true)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('vendor_id', $vendor_id)->orderBy('sale_price', 'ASC')->paginate($paginate);
            } else if ($sorting == 'price-desc') {
                $products = Product::where('status', true)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('vendor_id', $vendor_id)->orderBy('sale_price', 'DESC')->paginate($paginate);
            } else {
                $products = Product::where('status', true)->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('vendor_id', $vendor_id)->paginate($paginate);
            }
        }

        if ($searchTerm) {
            if ($sorting == 'date') {
                $products = Product::where('status', true)
                    ->whereBetween('sale_price', [$min_price, $max_price])
                    ->where('category_id', $category_id)
                    ->orderBy('created_at', 'DESC')
                    ->where('title', 'LIKE', '%' . $this->searchTerm . '%')
                    ->paginate($paginate);
            } else if ($sorting == 'price') {
                $products = Product::where('status', true)
                    ->whereBetween('sale_price', [$min_price, $max_price])
                    ->where('category_id', $category_id)
                    ->orderBy('sale_price', 'ASC')
                    ->where('title', 'LIKE', '%' . $this->searchTerm . '%')
                    ->paginate($paginate);
            } else if ($sorting == 'price-desc') {
                $products = Product::where('status', true)
                    ->whereBetween('sale_price', [$min_price, $max_price])
                    ->where('category_id', $category_id)
                    ->orderBy('sale_price', 'DESC')
                    ->where('title', 'LIKE', '%' . $this->searchTerm . '%')
                    ->paginate($paginate);
            } else {
                $products = Product::where('status', true)
                    ->whereBetween('sale_price', [$min_price, $max_price])
                    ->where('category_id', $category_id)
                    ->where('title', 'LIKE', '%' . $this->searchTerm . '%')
                    ->paginate($paginate);
            }
        }

        return $products;
    }
}
