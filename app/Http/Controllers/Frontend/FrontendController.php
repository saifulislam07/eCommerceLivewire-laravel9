<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '0')->get();
        return view('frontend.index', compact('sliders'));
    }

    public function categories()
    {
        $cateogries = Category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('cateogries'));
    }

    public function products($category_slug)
    {
        $cateogory = Category::where('slug', $category_slug)->first();

        if ($cateogory) {
            $products = $cateogory->products()->get();
            return view('frontend.collections.products.index', compact('products', 'cateogory'));
        } else {
            return redirect()->back();
        }
    }
}
