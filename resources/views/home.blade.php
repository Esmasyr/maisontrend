@extends('layouts.app')

@section('content')

<!-- Hero Slider -->
<div class="bg-gradient-to-br from-pink-50 via-white to-purple-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-block px-4 py-2 bg-pink-100 text-pink-800 rounded-full text-sm font-semibold mb-6">
                    🎉 Yeni Sezon
                </span>
                <h1 class="text-5xl lg:text-6xl font-extrabold text-gray-900 mb-6 leading-tight">
                    2026 İlkbahar
                    <span class="block text-pink-600">Yaz Koleksiyonu</span>
                </h1>
                <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                    Şıklık ve rahatlığı bir arada sunan yeni sezon ürünleriyle tanışın. %50'ye varan indirimler!
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('products.index') }}" class="px-8 py-4 bg-pink-600 text-white rounded-xl font-semibold hover:bg-pink-700 transform hover:scale-105 transition-all shadow-lg">
                        Alışverişe Başla
                    </a>
                    <a href="{{ route('products.index') }}" class="px-8 py-4 bg-white text-pink-600 border-2 border-pink-600 rounded-xl font-semibold hover:bg-pink-50 transition-all">
                        Koleksiyonu Keşfet
                    </a>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -top-4 -right-4 w-72 h-72 bg-pink-200 rounded-full blur-3xl opacity-30"></div>
                <div class="absolute -bottom-4 -left-4 w-72 h-72 bg-purple-200 rounded-full blur-3xl opacity-30"></div>
                <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?w=800&h=1000&fit=crop" alt="Fashion" class="relative rounded-2xl shadow-2xl">
            </div>
        </div>
    </div>
</div>

<!-- Categories -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-4">Kategoriler</h2>
            <p class="text-lg text-gray-600">Tarzınıza uygun kategoriyi seçin</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach($categories as $category)
            <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="group">
                <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-pink-50 to-purple-50 p-6 h-36 flex flex-col items-center justify-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="text-4xl mb-2 group-hover:scale-110 transition-transform">
                        @if($category->name === 'Elbise') 👗
                        @elseif($category->name === 'Bluz') 👚
                        @elseif($category->name === 'Pantolon') 👖
                        @elseif($category->name === 'Ceket') 🧥
                        @elseif($category->name === 'Etek') 👗
                        @else 👕
                        @endif
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 group-hover:text-pink-600 transition-colors">
                        {{ $category->name }}
                    </h3>
                    <span class="text-xs text-gray-500 mt-1">{{ $category->products_count }} ürün</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>

<!-- Featured Products -->
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-12">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Öne Çıkan Ürünler</h2>
                <p class="text-lg text-gray-600">En çok beğenilen ürünlerimiz</p>
            </div>
            <a href="{{ route('products.index') }}" class="hidden md:flex items-center text-pink-600 hover:text-pink-700 font-semibold">
                Tümünü Gör
                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products->take(8) as $product)
            <div class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <a href="{{ route('products.show', $product->slug) }}">
                    <div class="relative h-72 bg-gray-100 overflow-hidden">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="flex items-center justify-center h-full bg-gradient-to-br from-pink-100 to-purple-100">
                                <svg class="w-20 h-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif

                        @if($product->stock > 0 && $product->stock < 5)
                            <span class="absolute top-3 right-3 bg-orange-500 text-white text-xs font-bold px-2.5 py-1 rounded-full">
                                Son {{ $product->stock }}!
                            </span>
                        @elseif($product->stock == 0)
                            <span class="absolute top-3 right-3 bg-red-500 text-white text-xs font-bold px-2.5 py-1 rounded-full">
                                Tükendi
                            </span>
                        @endif

                        @auth
                        <form action="{{ route('favorites.toggle', $product) }}" method="POST">
                            @csrf
                            <button type="submit" class="absolute top-3 left-3 w-9 h-9 bg-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity shadow-lg hover:bg-pink-50">
                                <svg class="w-5 h-5 text-gray-700 hover:text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </button>
                        </form>
                        @endauth
                    </div>

                    <div class="p-4">
                        @if($product->category)
                            <p class="text-xs font-semibold text-pink-600 uppercase mb-1">{{ $product->category->name }}</p>
                        @endif
                        <h3 class="text-sm font-semibold text-gray-900 mb-2 line-clamp-2 group-hover:text-pink-600 transition-colors">
                            {{ $product->name }}
                        </h3>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-pink-600">{{ number_format($product->price, 2) }}₺</span>
                            @if($product->stock > 0)
                                <form action="{{ route('cart.store') }}" method="POST" onclick="event.stopPropagation()">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="w-9 h-9 bg-pink-600 text-white rounded-lg hover:bg-pink-700 transition-all flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('products.index') }}" class="inline-flex items-center px-8 py-4 bg-pink-600 text-white rounded-xl font-semibold hover:bg-pink-700 transition-all shadow-lg">
                Tüm Ürünleri Görüntüle
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </div>
</div>

<!-- Banner -->
<div class="bg-gradient-to-r from-pink-600 to-purple-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center">
            <h2 class="text-4xl font-extrabold mb-4">Yeni Sezon İndirimleri</h2>
            <p class="text-xl mb-8 opacity-90">Tüm ürünlerde %50'ye varan indirimler!</p>
            <a href="{{ route('products.index') }}" class="inline-block px-8 py-4 bg-white text-pink-600 rounded-xl font-bold hover:bg-gray-100 transition-all shadow-xl">
                Fırsatları Yakala
            </a>
        </div>
    </div>
</div>

<!-- Features -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Ücretsiz Kargo</h3>
                <p class="text-sm text-gray-600">Tüm siparişlerde</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Güvenli Ödeme</h3>
                <p class="text-sm text-gray-600">%100 güvenli</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">14 Gün İade</h3>
                <p class="text-sm text-gray-600">Kolay iade garantisi</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">7/24 Destek</h3>
                <p class="text-sm text-gray-600">Her zaman yanınızda</p>
            </div>
        </div>
    </div>
</div>

@endsection