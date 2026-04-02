@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                        Sipariş Detayları
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400">
                        Sipariş No: <span class="font-mono font-semibold">#{{ $order->order_number }}</span>
                    </p>
                </div>
                <a href="{{ route('orders.index') }}" class="flex items-center text-pink-500 hover:text-pink-600 transition-colors">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Siparişlerime Dön
                </a>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            
            <!-- Left Side - Order Items -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Status Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                            Sipariş Durumu
                        </h2>
                        @if($order->status === 'pending')
                            <span class="px-4 py-2 bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200 rounded-full text-sm font-medium">
                                Onay Bekliyor
                            </span>
                        @elseif($order->status === 'processing')
                            <span class="px-4 py-2 bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 rounded-full text-sm font-medium">
                                Hazırlanıyor
                            </span>
                        @elseif($order->status === 'shipped')
                            <span class="px-4 py-2 bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200 rounded-full text-sm font-medium">
                                Kargoda
                            </span>
                        @elseif($order->status === 'delivered')
                            <span class="px-4 py-2 bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 rounded-full text-sm font-medium">
                                Teslim Edildi
                            </span>
                        @else
                            <span class="px-4 py-2 bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 rounded-full text-sm font-medium">
                                İptal Edildi
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Order Items -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
                        Sipariş Ürünleri
                    </h2>
                    
                    <div class="space-y-4">
                        @foreach($order->items as $item)
                        <div class="flex items-center space-x-4 pb-4 border-b border-gray-200 dark:border-gray-700 last:border-0">
                            <div class="w-20 h-20 bg-gray-200 dark:bg-gray-700 rounded-lg overflow-hidden flex-shrink-0">
                                @if($item->product->image)
                                    <img src="{{ asset('storage/' . $item->product->image) }}" 
                                         alt="{{ $item->product->name }}"
                                         class="w-full h-full object-cover">
                                @endif
                            </div>
                            
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900 dark:text-white">
                                    {{ $item->product->name }}
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ $item->quantity }} x {{ number_format($item->price, 2) }}₺
                                </p>
                            </div>
                            
                            <div class="text-right">
                                <p class="font-bold text-gray-900 dark:text-white">
                                    {{ number_format($item->quantity * $item->price, 2) }}₺
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- Right Side - Summary & Info -->
            <div class="lg:col-span-1 space-y-6">
                
                <!-- Order Summary -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
                        Sipariş Özeti
                    </h2>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between text-gray-600 dark:text-gray-400">
                            <span>Ara Toplam:</span>
                            <span>{{ number_format($order->total_amount, 2) }}₺</span>
                        </div>
                        <div class="flex justify-between text-gray-600 dark:text-gray-400">
                            <span>Kargo:</span>
                            <span class="text-green-500">Ücretsiz</span>
                        </div>
                        <div class="border-t border-gray-200 dark:border-gray-700 pt-3">
                            <div class="flex justify-between text-xl font-bold text-gray-900 dark:text-white">
                                <span>Toplam:</span>
                                <span class="text-pink-500">{{ number_format($order->total_amount, 2) }}₺</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            <span class="font-medium">Sipariş Tarihi:</span><br>
                            {{ $order->created_at->format('d.m.Y H:i') }}
                        </p>
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Teslimat Adresi
                    </h2>
                    
                    <div class="text-gray-600 dark:text-gray-400 space-y-2">
                        <p class="font-medium text-gray-900 dark:text-white">{{ $order->shipping_name }}</p>
                        <p>{{ $order->shipping_address }}</p>
                        <p>{{ $order->shipping_city }} - {{ $order->shipping_zip }}</p>
                        <p class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            {{ $order->shipping_phone }}
                        </p>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                        Ödeme Yöntemi
                    </h2>
                    
                    <p class="text-gray-600 dark:text-gray-400">
                        @if($order->payment_method === 'credit_card')
                            Kredi / Banka Kartı
                        @elseif($order->payment_method === 'bank_transfer')
                            Banka Havalesi / EFT
                        @else
                            Kapıda Ödeme
                        @endif
                    </p>
                </div>

                @if($order->notes)
                <!-- Order Notes -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
                        Sipariş Notu
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400">
                        {{ $order->notes }}
                    </p>
                </div>
                @endif

            </div>

        </div>
    </div>
</div>
@endsection