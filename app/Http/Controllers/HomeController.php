<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $featuredProducts = Product::where('is_featured', true)
            ->where('status', 'active')
            ->with(['images', 'variants'])
            ->limit(8)
            ->get();

        $categories = Category::where('is_active', true)
            ->withCount('products')
            ->limit(6)
            ->get();

        return Inertia::render('Welcome', [
            'featuredProducts' => $featuredProducts,
            'categories' => $categories,
        ]);
    }
}
