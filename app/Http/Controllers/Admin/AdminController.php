<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'toplam_urun'      => Product::count(),
            'toplam_siparis'   => Order::count(),
            'toplam_kullanici' => User::count(),
            'toplam_kategori'  => Category::count(),
            'son_siparisler'   => Order::with('user')->latest()->take(10)->get(),
            'toplam_gelir'     => Order::where('status', 'completed')->sum('total_amount'),
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/');
    }
}