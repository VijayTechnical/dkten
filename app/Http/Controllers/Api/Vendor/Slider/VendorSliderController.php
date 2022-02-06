<?php

namespace App\Http\Controllers\Api\Vendor\Slider;

use Carbon\Carbon;
use App\Models\Vslider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class VendorSliderController extends Controller
{
    public function getSlider()
    {
        try {
            $vslides = Vslider::where('vendor_id', auth()->user()->id)->latest()->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Sliders found sucessfully!',
            'data' => $vslides
        ]);
    }


    public function storeSlider(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'banner_image' => 'required|mimes:png,jpg,svg',
            'text' => 'required|string',
            'link' => 'required|string',
            'button_color' => 'required|string',
            'text_color' => 'required|string',
            'status' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $vslide = new Vslider();
            $banner_imageName = Carbon::now()->timestamp . '.' . $request->banner_image->extension();
            $request->banner_image->storeAS('public/vendor/slider/banner_image', $banner_imageName);
            $vslide->banner_image = $banner_imageName;
            $vslide->button_color = $request->button_color;
            $vslide->text_color = $request->text_color;
            $vslide->text = $request->text;
            $vslide->link = $request->link;
            $vslide->vendor_id = auth()->user()->id;
            $vslide->status = $request->status;
            $vslide->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Slider added sucessfully!',
            'data' => $vslide
        ]);
    }

    public function updateSlider(Request $request, $slider_id)
    {
        if ($request->new_banner_image) {
            $validator = Validator::make($request->all(), [
                'new_banner_image' => 'required|mimes:png,jpg,svg',
                'text' => 'required|string',
                'link' => 'required|string',
                'button_color' => 'required|string',
                'text_color' => 'required|string',
                'status' => 'required|boolean'
            ]);
        }
        $validator = Validator::make($request->all(), [
            'text' => 'required|string',
            'link' => 'required|string',
            'button_color' => 'required|string',
            'text_color' => 'required|string',
            'status' => 'required|boolean'
        ]);


        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $vslide = Vslider::find($slider_id);
            if ($request->new_banner_image) {
                if ($vslide->banner_image) {
                    unlink(storage_path('app/public/vendor/slider/banner_image/' . $vslide->banner_image));
                }
                $banner_imageName = Carbon::now()->timestamp . '.' . $request->new_banner_image->extension();
                $request->new_banner_image->storeAS('public/vendor/slider/banner_image', $banner_imageName);
                $vslide->banner_image = $banner_imageName;
            } else {
                $vslide->banner_image = $vslide->banner_image;
            }
            $vslide->button_color = $request->button_color;
            $vslide->text_color = $request->text_color;
            $vslide->text = $request->text;
            $vslide->link = $request->link;
            $vslide->vendor_id = auth()->user()->id;
            $vslide->status = $request->status;
            $vslide->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Slider updated sucessfully!',
            'data' => $vslide
        ]);
    }

    public function updateSliderStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'slider_id' => 'required|integer|exists:vsliders,id'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $slider = Vslider::where(['id' => $request->slider_id, 'vendor_id' => auth()->user()->id])->first();
            if (!$slider) {
                return response()->json([
                    'message' => 'slider not found!!!',
                    'data' => $slider
                ], 404);
            }
            $slider->status = !$slider->status;
            $slider->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Slider status updated sucessfully!',
            'data' => $slider
        ]);
    }

    public function deleteSlider(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'slider_id' => 'required|integer|exists:vsliders,id'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $slider = Vslider::where(['id' => $request->slider_id, 'vendor_id' => auth()->user()->id])->first();
            if (!$slider) {
                return response()->json([
                    'message' => 'slider not found!!!',
                    'data' => $slider
                ], 404);
            }
            if($slider->banner_image)
            {
                unlink(storage_path('app/public/vendor/slider/banner_image/' . $slider->banner_image));
            }
            $slider->delete();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Slider deleted sucessfully!',
            'data' => $slider
        ]);
    }
}
