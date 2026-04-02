<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        // İstatistikler
        $totalOrders   = Order::count();
        $totalRevenue  = Order::whereNotIn('status', ['reddedildi'])->sum('total_price');
        $totalProducts = Product::count();
        $totalUsers    = User::count();

        // Bekleyen sipariş sayısı (sidebar badge için)
        $pendingCount = Order::where('status', 'beklemede')->count();

        // Son siparişler (filtre destekli)
        $query = Order::with('user', 'orderItems.product');
        if ($request->status) {
            $query->where('status', $request->status);
        }
        $recentOrders = $query->latest()->take(10)->get();

        // Sipariş durumu özeti
        $orderStats = [
            'beklemede'   => Order::where('status', 'beklemede')->count(),
            'onaylandi'   => Order::where('status', 'onaylandi')->count(),
            'kargoda'     => Order::where('status', 'kargoda')->count(),
            'teslim'      => Order::where('status', 'teslim edildi')->count(),
            'reddedildi'  => Order::where('status', 'reddedildi')->count(),
        ];
            
        // Düşük stok ürünleri (stok <= 5)
        $lowStockProducts = Product::where('stock', '<=', 5)
            ->orderBy('stock')
            ->take(6)
            ->get();

        $lowStockCount = $lowStockProducts->count();

        return view('admin.dashboard', compact(
            'totalOrders', 'totalRevenue', 'totalProducts', 'totalUsers',
            'pendingCount', 'recentOrders', 'orderStats',
            'lowStockProducts', 'lowStockCount'
        ));
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}