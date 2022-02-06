<?php

namespace App\Traits;

use App\Models\Product;

trait ProductSearchForApi
{

    public function searchProductByCategory($sorting, $category_id, $min_price, $max_price, $searchTerm, $brand_id, $vendor_id)
    {
        if ($brand_id) {
            if ($sorting == 'date') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('brand_id', $brand_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->latest()->get();
            } else if ($sorting == 'price') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('brand_id', $brand_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'ASC')->get();
            } else if ($sorting == 'price-desc') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('brand_id', $brand_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'DESC')->get();
            } else {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('brand_id', $brand_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->get();
            }
        } elseif ($vendor_id) {
            if ($sorting == 'date') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->latest()->get();
            } else if ($sorting == 'price') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'ASC')->get();
            } else if ($sorting == 'price-desc') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'DESC')->get();
            } else {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->get();
            }
        } elseif ($brand_id && $vendor_id) {
            if ($sorting == 'date') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('brand_id', $brand_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->latest()->get();
            } else if ($sorting == 'price') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('brand_id', $brand_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'ASC')->get();
            } else if ($sorting == 'price-desc') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('brand_id', $brand_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'DESC')->get();
            } else {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('brand_id', $brand_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->get();
            }
        } else {
            if ($sorting == 'date') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->latest()->get();
            } else if ($sorting == 'price') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'ASC')->get();
            } else if ($sorting == 'price-desc') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'DESC')->get();
            } else {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->get();
            }
        }
        return $products;
    }

    public function searchProductBySubCategory($sorting, $category_id, $min_price, $max_price, $searchTerm, $sub_category_id, $brand_id, $vendor_id)
    {
        if ($brand_id) {
            if ($sorting == 'date') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('brand_id', $brand_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->latest()->get();
            } else if ($sorting == 'price') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('brand_id', $brand_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'ASC')->get();
            } else if ($sorting == 'price-desc') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('brand_id', $brand_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'DESC')->get();
            } else {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('brand_id', $brand_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->get();
            }
        } elseif ($vendor_id) {
            if ($sorting == 'date') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->latest()->get();
            } else if ($sorting == 'price') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'ASC')->get();
            } else if ($sorting == 'price-desc') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'DESC')->get();
            } else {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->get();
            }
        } elseif ($brand_id && $vendor_id) {
            if ($sorting == 'date') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('brand_id', $brand_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->latest()->get();
            } else if ($sorting == 'price') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('brand_id', $brand_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'ASC')->get();
            } else if ($sorting == 'price-desc') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('brand_id', $brand_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'DESC')->get();
            } else {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('brand_id', $brand_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->get();
            }
        } else {
            if ($sorting == 'date') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->latest()->get();
            } else if ($sorting == 'price') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'ASC')->get();
            } else if ($sorting == 'price-desc') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'DESC')->get();
            } else {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->get();
            }
        }
        return $products;
    }

    public function searchProductByType($sorting, $category_id, $min_price, $max_price, $searchTerm, $sub_category_id, $type_id, $brand_id, $vendor_id)
    {
        if ($brand_id) {
            if ($sorting == 'date') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('brand_id', $brand_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->latest()->get();
            } else if ($sorting == 'price') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('brand_id', $brand_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'ASC')->get();
            } else if ($sorting == 'price-desc') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('brand_id', $brand_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'DESC')->get();
            } else {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('brand_id', $brand_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->get();
            }
        } elseif ($vendor_id) {
            if ($sorting == 'date') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->latest()->get();
            } else if ($sorting == 'price') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'ASC')->get();
            } else if ($sorting == 'price-desc') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'DESC')->get();
            } else {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->get();
            }
        } elseif ($brand_id && $vendor_id) {
            if ($sorting == 'date') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('brand_id', $brand_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->latest()->get();
            } else if ($sorting == 'price') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('brand_id', $brand_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'ASC')->get();
            } else if ($sorting == 'price-desc') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('brand_id', $brand_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'DESC')->get();
            } else {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('brand_id', $brand_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->get();
            }
        } else {
            if ($sorting == 'date') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->latest()->get();
            } else if ($sorting == 'price') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'ASC')->get();
            } else if ($sorting == 'price-desc') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'DESC')->get();
            } else {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->get();
            }
        }
        return $products;
    }


    public function searchProductBySubType($sorting, $category_id, $min_price, $max_price, $searchTerm, $sub_category_id, $type_id, $sub_type_id, $brand_id, $vendor_id)
    {
        if ($brand_id) {
            if ($sorting == 'date') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('sub_type_id', $sub_type_id)->where('brand_id', $brand_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->latest()->get();
            } else if ($sorting == 'price') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('sub_type_id', $sub_type_id)->where('brand_id', $brand_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'ASC')->get();
            } else if ($sorting == 'price-desc') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('sub_type_id', $sub_type_id)->where('brand_id', $brand_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'DESC')->get();
            } else {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('sub_type_id', $sub_type_id)->where('brand_id', $brand_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->get();
            }
        } elseif ($vendor_id) {
            if ($sorting == 'date') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('sub_type_id', $sub_type_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->latest()->get();
            } else if ($sorting == 'price') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('sub_type_id', $sub_type_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'ASC')->get();
            } else if ($sorting == 'price-desc') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('sub_type_id', $sub_type_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'DESC')->get();
            } else {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('sub_type_id', $sub_type_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->get();
            }
        } elseif ($brand_id && $vendor_id) {
            if ($sorting == 'date') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('sub_type_id', $sub_type_id)->where('brand_id', $brand_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->latest()->get();
            } else if ($sorting == 'price') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('sub_type_id', $sub_type_id)->where('brand_id', $brand_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'ASC')->get();
            } else if ($sorting == 'price-desc') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('sub_type_id', $sub_type_id)->where('brand_id', $brand_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'DESC')->get();
            } else {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('sub_type_id', $sub_type_id)->where('brand_id', $brand_id)->where('vendor_id', $vendor_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->get();
            }
        } else {
            if ($sorting == 'date') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('sub_type_id', $sub_type_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->latest()->get();
            } else if ($sorting == 'price') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('sub_type_id', $sub_type_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'ASC')->get();
            } else if ($sorting == 'price-desc') {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('sub_type_id', $sub_type_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->orderBy('sale_price', 'DESC')->get();
            } else {
                $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereBetween('sale_price', [$min_price, $max_price])->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('type_id', $type_id)->where('sub_type_id', $sub_type_id)->where('title', 'LIKE', '%' . $searchTerm . '%')->Status()->get();
            }
        }
        return $products;
    }
}
