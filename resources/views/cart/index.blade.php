@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <nav class="flex mb-8 text-sm">
            <a href="{{ route('home') }}" class="text-gray-500 hover:text-pink-600">Ana Sayfa</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-gray-900 dark:text-white font-medium">Sepetim</span>
        </nav>

        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8">
            🛒 Alışveriş Sepetim
        </h1>

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
            {{ session('error') }}
        </div>
        @endif

        @if($cartItems->isEmpty())
        <!-- Empty Cart -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl p-12 text-center">
            <div class="w-32 h-32 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Sepetiniz Boş</h2>
            <p class="text-gray-600 dark:text-gray-400 mb-8">Alışverişe başlamak için ürünleri keşfedin</p>
            <a href="{{ route('products.index') }}" 
               class="inline-flex items-center gap-2 bg-gradient-to-r from-pink-500 to-purple-600 text-white px-8 py-4 rounded-full font-semibold hover:from-pink-600 hover:to-purple-700 transition">
                Alışverişe Başla
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
        @else
        <!-- Cart Items -->
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Cart Items List -->
            <div class="lg:col-span-2 space-y-4">
                @foreach($cartItems as $item)
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 flex gap-6 items-start hover:shadow-xl transition">
                    <!-- Product Image -->
                    <div class="flex-shrink-0">
                        <a href="{{ route('products.show', $item->product->id) }}">
                            @if($item->product->image)
                                <img src="{{ asset('storage/' . $item->product->image) }}" 
                                     alt="{{ $item->product->name }}" 
                                     class="w-32 h-32 object-cover rounded-xl">
                            @else
                                <div class="w-32 h-32 bg-gray-200 dark:bg-gray-700 rounded-xl flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                        </a>
                    </div>

                    <!-- Product Info -->
                    <div class="flex-grow">
                        <a href="{{ route('products.show', $item->product->id) }}" 
                           class="text-lg font-semibold text-gray-900 dark:text-white hover:text-pink-600 transition">
                            {{ $item->product->name }}
                        </a>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                            {{ $item->product->category->name }}
                        </p>

                        <div class="flex gap-4 mt-2">
                            @if($item->size)
                            <span class="text-sm text-gray-600 dark:text-gray-400">
                                Beden: <strong>{{ $item->size }}</strong>
                            </span>
                            @endif
                            @if($item->color)
                            <span class="text-sm text-gray-600 dark:text-gray-400">
                                Renk: <strong>{{ $item->color }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="flex items-center gap-6 mt-4">
                            <!-- Quantity -->
                            <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center gap-2">
                                @csrf
                                @method('PATCH')
                                <div class="flex items-center border-2 border-gray-300 dark:border-gray-600 rounded-lg">
                                    <button type="button" onclick="this.nextElementSibling.stepDown(); this.closest('form').submit();" 
                                            class="px-3 py-1 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                        </svg>
                                    </button>
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" 
                                           min="1" max="{{ $item->product->stock }}"
                                           class="w-12 text-center border-0 focus:ring-0 dark:bg-gray-800 dark:text-white font-semibold"
                                           onchange="this.form.submit()">
                                    <button type="button" onclick="this.previousElementSibling.stepUp(); this.closest('form').submit();" 
                                            class="px-3 py-1 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    </button>
                                </div>
                            </form>

                            <!-- Remove -->
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-700 font-medium text-sm transition">
                                    Kaldır
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="text-right">
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">
                            {{ number_format($item->product->price * $item->quantity, 2, ',', '.') }} ₺
                        </p>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                            {{ number_format($item->product->price, 2, ',', '.') }} ₺ / adet
                        </p>
                    </div>
                </div>
                @endforeach

                <!-- Clear Cart -->
                <form action="{{ route('cart.clear') }}" method="POST" class="text-center pt-4">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-700 font-medium transition"
                            onclick="return confirm('Sepeti tamamen temizlemek istediğinizden emin misiniz?')">
                        🗑️ Sepeti Temizle
                    </button>
                </form>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 sticky top-24">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                        Sipariş Özeti
                    </h3>

                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between text-gray-600 dark:text-gray-400">
                            <span>Ara Toplam ({{ $cartItems->sum('quantity') }} ürün)</span>
                            <span class="font-semibold">{{ number_format($subtotal, 2, ',', '.') }} ₺</span>
                        </div>

                        <div class="flex justify-between text-gray-600 dark:text-gray-400">
                            <span>Kargo</span>
                            <span class="font-semibold {{ $shipping == 0 ? 'text-green-600' : '' }}">
                                @if($shipping == 0)
                                    ÜCRETSİZ
                                @else
                                    {{ number_format($shipping, 2, ',', '.') }} ₺
                                @endif
                            </span>
                        </div>

                        @if($subtotal < 250)
                        <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-3">
                            <p class="text-sm text-yellow-800 dark:text-yellow-200">
                                {{ number_format(250 - $subtotal, 2, ',', '.') }} ₺ daha alışveriş yapın, kargo ücretsiz!
                            </p>
                        </div>
                        @else
                        <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg p-3">
                            <p class="text-sm text-green-800 dark:text-green-200">
                                ✓ Ücretsiz kargo kazandınız!
                            </p>
                        </div>
                        @endif
                    </div>

                    <div class="border-t border-gray-200 dark:border-gray-700 pt-4 mb-6">
                        <div class="flex justify-between text-xl font-bold text-gray-900 dark:text-white">
                            <span>Toplam</span>
                            <span class="text-pink-600">{{ number_format($total, 2, ',', '.') }} ₺</span>
                        </div>
                    </div>

                    @auth
                        <a href="{{ route('orders.checkout') }}" 
                           class="block w-full bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white text-center py-4 rounded-xl font-bold text-lg transition transform hover:scale-105 active:scale-95 shadow-lg">
                            Sipariş Ver
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="block w-full bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white text-center py-4 rounded-xl font-bold text-lg transition transform hover:scale-105 active:scale-95 shadow-lg">
                            Devam Etmek İçin Giriş Yapın
                        </a>
                    @endauth

                    <a href="{{ route('products.index') }}" 
                       class="block w-full bg-white dark:bg-gray-700 text-gray-900 dark:text-white text-center py-3 rounded-xl font-semibold mt-3 border-2 border-gray-300 dark:border-gray-600 hover:border-pink-500 transition">
                        Alışverişe Devam Et
                    </a>

                    <!-- Trust Badges -->
                    <div class="grid grid-cols-2 gap-3 mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="text-center">
                            <div class="text-3xl mb-2">🔒</div>
                            <p class="text-xs text-gray-600 dark:text-gray-400">Güvenli Ödeme</p>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl mb-2">🚚</div>
                            <p class="text-xs text-gray-600 dark:text-gray-400">Hızlı Kargo</p>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl mb-2">↩️</div>
                            <p class="text-xs text-gray-600 dark:text-gray-400">Kolay İade</p>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl mb-2">💬</div>
                            <p class="text-xs text-gray-600 dark:text-gray-400">7/24 Destek</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection