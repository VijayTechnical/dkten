<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Models\Logo;
use App\Models\Vtype;
use App\Models\Vendor;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use App\Models\Gsetting;
use App\Models\Legality;
use App\Models\Ssetting;
use App\Models\Vcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Payment;
use App\Models\Slider;
use App\Traits\ProductSearchForApi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    use ProductSearchForApi;

    public function getGeneralSetting()
    {
        try {
            $generalSetting = Gsetting::findOrFail(1);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'General setting found successfully!',
            'data' => $generalSetting
        ]);
    }

    public function getSocialSetting()
    {
        try {
            $socialSetting = Ssetting::findOrFail(1);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Social setting found successfully!',
            'data' => $socialSetting
        ]);
    }

    public function getLogos()
    {
        try {
            $logo = Logo::findOrFail(1);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Logo found successfully!',
            'data' => $logo
        ]);
    }

    public function getHotDealProduct()
    {
        try {
            $hot_deal_products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->TDeal()->Status()->latest()->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Hot deal products found successfully!',
            'data' => $hot_deal_products
        ]);
    }

    public function getFeaturedProduct()
    {
        try {
            $featured_products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->Featured()->Status()->latest()->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Featured products found successfully!',
            'data' => $featured_products
        ]);
    }

    public function getLatestProduct()
    {
        try {
            $latest_products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->Status()->latest()->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Latest products found successfully!',
            'data' => $latest_products
        ]);
    }

    public function getPopularProduct()
    {
        try {
            $popular_products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->MostViewed()->latest()->Status()->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Popular products found successfully!',
            'data' => $popular_products
        ]);
    }

    public function getMensCollectionProduct()
    {
        try {
            $mens_collection_products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereHas('Category', function ($query) {
                $query->where('slug', 'LIKE', "%mens-collection%");
            })->latest()->Status()->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Mens collection products found successfully!',
            'data' => $mens_collection_products
        ]);
    }

    public function getWomensCollectionProduct()
    {
        try {
            $womens_collection_products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereHas('Category', function ($query) {
                $query->where('slug', 'LIKE', "%womens-collection%");
            })->latest()->Status()->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Womens collection products found successfully!',
            'data' => $womens_collection_products
        ]);
    }

    public function getBagsAndLaugagesProduct()
    {
        try {
            $bags_and_laugages_products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->whereHas('Category', function ($query) {
                $query->where('slug', 'LIKE', "%bags-and-laugages%");
            })->latest()->Status()->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Bags and laugages products found successfully!',
            'data' => $bags_and_laugages_products
        ]);
    }

    public function getRecentlyViewedProduct()
    {
        try {
            $recently_viewed_products = collect(recently_viewed());
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Recently Viewed Products found successfully!',
            'data' => $recently_viewed_products
        ]);
    }

    public function getProduct(Request $request, $category_id)
    {
        $validator = Validator::make($request->all(), [
            'sorting' => 'nullable',
            'min_price' => 'required|numeric',
            'max_price' => 'required|numeric',
            'searchTerm' => 'nullable',

        ]);
        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $products = $this->searchProductByCategory($request->sorting, $category_id, $request->min_price, $request->max_price, $request->searchTerm, $request->brand_id, $request->vendor_id);
            if ($request->sub_category_id) {
                $products = $this->searchProductBySubCategory($request->sorting, $category_id, $request->min_price, $request->max_price, $request->searchTerm, $request->sub_category_id, $request->brand_id, $request->vendor_id);
                if ($request->type_id) {
                    $products = $this->searchProductByType($request->sorting, $category_id, $request->min_price, $request->max_price, $request->searchTerm, $request->sub_category_id, $request->type_id, $request->brand_id, $request->vendor_id);
                    if ($request->sub_type_id) {
                        $products = $this->searchProductBySubType($request->sorting, $category_id, $request->min_price, $request->max_price, $request->searchTerm, $request->sub_category_id, $request->type_id, $request->sub_type_id, $request->brand_id, $request->vendor_id);
                    }
                }
            }
            return response()->json([
                'message' => 'Products found sucessfully!',
                'data' => $products
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getProductDetail($product_slug)
    {
        try {
            $product = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->where('slug', $product_slug)->Status()->first();
            $productKey = 'product_' . $product->id;
            if (!Session::has($productKey)) {
                Product::where('id', $product->id)->increment('views');
                Session::put($productKey, $product->id);
            }
            session()->push('products.recently_viewed', $product->getKey());
            return response()->json([
                'message' => 'Product found sucessfully!',
                'data' => $product
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getProductReview($product_slug)
    {
        $reviews = collect();
        try {
            $product = Product::where('slug', $product_slug)->first();
            $orderItems = $product->OrderItem()->where('rstatus', 1)->get();
            foreach ($orderItems as $orderItem) {
                $reviews->push(['user' => $orderItem->Order->User, 'rating' => $orderItem->Review->rating]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Reviews found sucessfully!',
            'data' => $reviews
        ]);
    }

    public function getProductStatus($product_slug)
    {
        $stock = collect();
        try {
            $product = Product::where('slug', $product_slug)->first();
            $stock->push(product_status($product->id));
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Stock status found sucessfully!',
            'data' => $stock
        ]);
    }

    public function getCategory()
    {
        try {
            $categories = Category::with('SubCategory', 'Type', 'Product')->Status()->latest()->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Categories found sucessfully',
            'data' => $categories
        ]);
    }

    public function getWomenCategory()
    {
        try {
            $women_categories = Category::with('SubCategory', 'Type', 'Product')->where('slug', 'LIKE', '%womens-collection%')->Status()->latest()->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Categories found sucessfully!',
            'data' => $women_categories
        ]);
    }


    public function getVendorCategory()
    {
        try {
            $vcategories = Vcategory::with('Type', 'Vendor')->latest()->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Vendor categories found sucessfully!',
            'data' => $vcategories
        ]);
    }

    public function getVendorType($category_id)
    {
        try {
            $vtypes = Vtype::with('Category', 'Vendor')->where('vcategory_id', $category_id)->latest()->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Vendor types found sucessfully!',
            'data' => $vtypes
        ]);
    }

    public function getVendorWithType($category_id, $type_id)
    {
        try {
            $vendors = Vendor::with('Product', 'Type', 'Category')->where(['vcategory_id' => $category_id, 'vtype_id' => $type_id])->where('status', true)->latest()->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Vendors found Sucessfully',
            'data' => $vendors
        ]);
    }


    public function getVendor()
    {
        try {
            $vendors = Vendor::with('Product', 'Type', 'Category')->where('status', true)->latest()->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Vendors found sucessfully!',
            'data' => $vendors
        ]);
    }

    public function getVendorDetail($display_name)
    {
        try {
            $vendor = Vendor::where('status', true)->where('display_name', $display_name)->with('Product', 'Type', 'Category')->first();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Vendor detail found sucessfully!',
            'data' => $vendor
        ]);
    }


    public function getLegality()
    {
        try {
            $legality = Legality::findOrFail(1);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Legalities found sucessfully',
            'data' => $legality
        ]);
    }

    public function saveContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Message is sent sucessfully!',
            'data' => $contact
        ]);
    }

    public function getFaq()
    {
        try{
            $faqs = Faq::latest()->get();
            
        }catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'message' => 'Faqs found sucessfully!',
            'data' => $faqs
        ]);
    }

    public function getPaymentMethod()
    {
        try{
            $methods = Payment::latest()->get();
            
        }catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'message' => 'Payment methods found sucessfully!',
            'data' => $methods
        ]);
    }

    public function getSlider()
    {
        try{
            $sliders = Slider::latest()->get();
            
        }catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'message' => 'Sliders found sucessfully!',
            'data' => $sliders
        ]);
    }
}
