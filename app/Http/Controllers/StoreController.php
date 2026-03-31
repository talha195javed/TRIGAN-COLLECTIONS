<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;

class StoreController extends Controller
{
    public function index()
    {
        $locale = app()->getLocale();

        $banners = Banner::where('status', 1)
            ->with('translation')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        $categories = Category::where('status', 1)
            ->with('translation')
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();

        $products = Product::where('status', 1)
            ->with(['translation', 'thumbnail', 'primaryVariant'])
            ->withCount('reviews')
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();

        return view('themes.xylo.home', compact('banners', 'categories', 'products'));
    }

    public function about()
    {
        return view('themes.xylo.about-us');
    }

    public function services()
    {
        return view('themes.xylo.services');
    }

    public function blog()
    {
        return view('themes.xylo.blog');
    }

    public function contact()
    {
        return view('themes.xylo.contact-us');
    }
}
