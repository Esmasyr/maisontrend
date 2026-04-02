@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Siparişlerim</h1>

    @if(session('success'))
        <div class="mb-6 px-5 py-4 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm font-medium flex items-center gap-3">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    @if($orders->isEmpty())
        <div class="text-center py-16">
            <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
            </svg>
            <p class="text-gray-500 text-lg mb-6">Henüz siparişiniz bulunmuyor.</p>
            <a href="{{ route('products.index') }}" class="px-6 py-3 bg-gradient-to-r from-pink-500 to-purple-600 text-white rounded-lg font-semibold hover:opacity-90 transition">
                Alışverişe Başla
            </a>
        </div>
    @else
        <div class="space-y-4">
            @foreach($orders as $order)
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow p-6 border border-gray-100">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="font-bold text-gray-900">#{{ $order->order_number ?? $order->id }}</p>
                        <p class="text-sm text-gray-500 mt-1">{{ $order->created_at->format('d.m.Y H:i') }}</p>
                    </div>
                    <div class="text-right">
                        <p class="font-bold text-lg text-pink-600">
                            {{ number_format($order->total_price ?? $order->total_amount ?? 0, 2, ',', '.') }} ₺
                        </p>
                        @php
                            $statusMap = [
                                'beklemede'    => ['bg-yellow-100 text-yellow-700', 'Beklemede'],
                                'onaylandi'    => ['bg-blue-100 text-blue-700',     'Onaylandı'],
                                'kargoda'      => ['bg-purple-100 text-purple-700', 'Kargoda'],
                                'teslim edildi'=> ['bg-green-100 text-green-700',   'Teslim Edildi'],
                                'reddedildi'   => ['bg-red-100 text-red-700',       'Reddedildi'],
                                // eski İngilizce değerler için fallback
                                'pending'      => ['bg-yellow-100 text-yellow-700', 'Beklemede'],
                                'processing'   => ['bg-blue-100 text-blue-700',     'Hazırlanıyor'],
                                'shipped'      => ['bg-purple-100 text-purple-700', 'Kargoda'],
                                'delivered'    => ['bg-green-100 text-green-700',   'Teslim Edildi'],
                                'cancelled'    => ['bg-red-100 text-red-700',       'İptal'],
                            ];
                            $status = strtolower($order->status ?? 'beklemede');
                            [$statusClass, $statusLabel] = $statusMap[$status] ?? ['bg-gray-100 text-gray-600', ucfirst($order->status)];
                        @endphp
                        <span class="inline-block mt-2 text-xs px-3 py-1 rounded-full font-semibold {{ $statusClass }}">
                            {{ $statusLabel }}
                        </span>
                    </div>
                </div>

                <div class="flex gap-2 flex-wrap">
                    @foreach(($order->orderItems ?? $order->items ?? collect())->take(3) as $item)
                        <div class="flex items-center gap-2 bg-gray-50 rounded-lg px-3 py-2 border border-gray-100">
                            <span class="text-sm text-gray-700">{{ $item->product->name ?? 'Ürün' }}</span>
                            <span class="text-xs text-gray-400 font-medium">x{{ $item->quantity }}</span>
                        </div>
                    @endforeach
                    @php $itemCount = ($order->orderItems ?? $order->items ?? collect())->count(); @endphp
                    @if($itemCount > 3)
                        <span class="text-sm text-gray-400 self-center">+{{ $itemCount - 3 }} ürün daha</span>
                    @endif
                </div>

                <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
                    <a href="{{ route('orders.show', $order) }}" class="text-sm text-pink-600 hover:text-pink-700 font-semibold flex items-center gap-1">
                        Detayları Gör
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                    @if($status === 'beklemede' || $status === 'pending')
                        <span class="text-xs text-yellow-600 bg-yellow-50 px-3 py-1 rounded-full">
                            ⏳ Onay bekleniyor
                        </span>
                    @elseif($status === 'kargoda' || $status === 'shipped')
                        <span class="text-xs text-purple-600 bg-purple-50 px-3 py-1 rounded-full">
                            🚚 Yolda
                        </span>
                    @elseif($status === 'teslim edildi' || $status === 'delivered')
                        <span class="text-xs text-green-600 bg-green-50 px-3 py-1 rounded-full">
                            ✓ Teslim edildi
                        </span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $orders->links() }}
        </div>
    @endif
</div>
@endsection