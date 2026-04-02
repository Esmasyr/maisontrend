<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Auth::user()->favorites()->with('product.category')->latest()->get();
        return view('favorites.index', compact('favorites'));
    }

    public function toggle(Product $product)
    {
        $user = Auth::user();
        
        if ($user->hasFavorite($product->id)) {
            $user->favorites()->where('product_id', $product->id)->delete();
            return back()->with('success', 'Ürün favorilerden çıkarıldı');
        } else {
            $user->favorites()->create(['product_id' => $product->id]);
            return back()->with('success', 'Ürün favorilere eklendi');
        }
    }

    public function remove(Favorite $favorite)
    {
        if ($favorite->user_id !== Auth::id()) {
            abort(403);
        }
        
        $favorite->delete();
        return back()->with('success', 'Ürün favorilerden çıkarıldı');
    }
}