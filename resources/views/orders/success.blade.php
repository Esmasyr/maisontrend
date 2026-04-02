@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-pink-50 via-purple-50 to-blue-50 dark:from-gray-900 dark:to-gray-800 py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Success Animation -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-24 h-24 bg-green-100 dark:bg-green-900/20 rounded-full mb-6 animate-bounce">
                <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                🎉 Siparişiniz Alındı!
            </h1>
            <p class="text-xl text-gray-600 dark:text-gray-400">
                Teşekkür ederiz! Siparişiniz başarıyla oluşturuldu.
            </p>
        </div>

        <!-- Order Details -->
        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl p-8 mb-6">
            <div class="flex items-center justify-between pb-6 mb-6 border-b border-gray-200 dark:border-gray-700">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Sipariş Numarası</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $order->order_number }}</p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Tarih</p>
                    <p class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $order->created_at->format('d.m.Y H:i') }}
                    </p>
                </div>
            </div>

            <!-- Order Items -->
            <div class="mb-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Sipariş Detayları</h3>
                <div class="space-y-3">
                    @foreach($order->items as $item)
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-gray-100 dark:bg-gray-700 rounded-lg overflow-hidden">
                                @if($item->product->image)
                                    <img src="{{ asset('storage/' . $item->product->image) }}" 
                                         alt="{{ $item->product->name }}" 
                                         class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div>
                                <p class="font-medium text-gray-900 dark:text-white">{{ $item->product->name }}</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $item->quantity }} adet</p>
                            </div>
                        </div>
                        <p class="font-semibold text-gray-900 dark:text-white">
                            {{ number_format($item->price * $item->quantity, 2, ',', '.') }} ₺
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Total -->
            <div class="pt-6 border-t border-gray-200 dark:border-gray-700">
                <div class="flex justify-between text-2xl font-bold text-gray-900 dark:text-white">
                    <span>Toplam</span>
                    <span class="text-pink-600">{{ number_format($order->total_amount, 2, ',', '.') }} ₺</span>
                </div>
            </div>

            <!-- Shipping Address -->
            <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-3">Teslimat Adresi</h3>
                <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                    <p class="font-semibold text-gray-900 dark:text-white">{{ $order->shipping_name }}</p>
                    <p class="text-gray-600 dark:text-gray-400 mt-1">{{ $order->shipping_phone }}</p>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">
                        {{ $order->shipping_address }}<br>
                        {{ $order->shipping_city }} / {{ $order->shipping_state }}<br>
                        {{ $order->shipping_zipcode }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="grid grid-cols-2 gap-4">
            <a href="{{ route('orders.show', $order->id) }}" 
               class="flex items-center justify-center gap-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-6 py-4 rounded-xl font-semibold border-2 border-gray-300 dark:border-gray-600 hover:border-pink-500 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
                Siparişi Görüntüle
            </a>
            <a href="{{ route('home') }}" 
               class="flex items-center justify-center gap-2 bg-gradient-to-r from-pink-500 to-purple-600 text-white px-6 py-4 rounded-xl font-semibold hover:from-pink-600 hover:to-purple-700 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Ana Sayfaya Dön
            </a>
        </div>

        <!-- Info Box -->
        <div class="mt-6 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-6">
            <h4 class="font-bold text-blue-900 dark:text-blue-200 mb-2">📧 Ne Zaman Ulaşır?</h4>
            <p class="text-blue-800 dark:text-blue-300 text-sm">
                Siparişiniz 2-3 iş günü içinde kargoya teslim edilecektir. 
                Kargo takip numaranız e-posta adresinize gönderilecektir.
            </p>
        </div>
    </div>
</div>
@endsection