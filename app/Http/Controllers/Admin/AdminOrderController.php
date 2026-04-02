<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('user', 'orderItems.product');

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('order_number', 'like', '%' . $request->search . '%')
                  ->orWhereHas('user', fn($u) => $u->where('name', 'like', '%' . $request->search . '%'));
            });
        }

        $orders = $query->latest()->paginate(20);

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('user', 'orderItems.product');
        return view('admin.orders.show', compact('order'));
    }

    public function approve(Order $order)
    {
        $order->update(['status' => 'onaylandi']);
        return back()->with('success', '✓ Sipariş onaylandı.');
    }

    public function reject(Order $order)
    {
        $order->update(['status' => 'reddedildi']);
        return back()->with('error', 'Sipariş reddedildi.');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:beklemede,onaylandi,kargoda,teslim edildi,reddedildi',
        ]);

        $order->update(['status' => $request->status]);
        return back()->with('success', 'Sipariş durumu güncellendi.');
    }
}