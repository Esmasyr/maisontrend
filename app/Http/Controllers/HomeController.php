<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('stock', '>', 0)
            ->latest()
            ->get();

        $categories = Category::withCount('products')->get();

        $orders = auth()->check()
            ? Order::where('user_id', auth()->id())->latest()->get()
            : collect();

        return view('home', compact('products', 'categories', 'orders'));
    }
}