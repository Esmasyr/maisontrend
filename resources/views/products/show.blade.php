@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-50 py-8 font-sans">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Breadcrumb --}}
    <nav class="flex items-center gap-2 text-sm text-gray-500 mb-8 flex-wrap">
        <a href="{{ route('home') }}" class="hover:text-pink-600 transition-colors">Ana Sayfa</a>
        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <a href="{{ route('products.index') }}" class="hover:text-pink-600 transition-colors">Ürünler</a>
        @if($product->category)
        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="hover:text-pink-600 transition-colors">{{ $product->category->name }}</a>
        @endif
        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <span class="text-gray-800 font-medium truncate">{{ $product->name }}</span>
    </nav>

    {{-- Flash Mesajları --}}
    @if(session('success'))
    <div class="mb-6 flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl shadow-sm">
        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        <span class="font-medium">{{ session('success') }}</span>
    </div>
    @endif
    @if(session('error'))
    <div class="mb-6 flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl shadow-sm">
        <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        <span class="font-medium">{{ session('error') }}</span>
    </div>
    @endif

    {{-- Ana İçerik --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 xl:gap-16 items-start">

        {{-- SOL: GÖRSEL --}}
        <div class="space-y-4">
            <div class="relative bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm aspect-square flex items-center justify-center group">

                @if($product->stock <= 0)
                    <div class="absolute top-4 left-4 z-10 bg-red-500 text-white text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded-full shadow">Tükendi</div>
                @elseif($product->stock <= 5)
                    <div class="absolute top-4 left-4 z-10 bg-orange-400 text-white text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded-full shadow">Son {{ $product->stock }} adet!</div>
                @endif

                @if($product->old_price && $product->old_price > $product->price)
                    <div class="absolute top-4 right-16 z-10 bg-gradient-to-r from-pink-500 to-purple-600 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow">
                        %{{ round((($product->old_price - $product->price) / $product->old_price) * 100) }} İndirim
                    </div>
                @endif

                @auth
                <form action="{{ route('favorites.toggle', $product) }}" method="POST" class="absolute top-4 right-4 z-10">
                    @csrf
                    <button type="submit" class="w-11 h-11 bg-white rounded-full shadow-md flex items-center justify-center hover:scale-110 transition-transform border border-gray-100">
                        @if(Auth::user()->favorites()->where('product_id', $product->id)->exists())
                            <svg class="w-5 h-5 text-pink-500" fill="currentColor" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        @else
                            <svg class="w-5 h-5 text-gray-400 hover:text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        @endif
                    </button>
                </form>
                @endauth

                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                    <div class="flex flex-col items-center justify-center text-gray-200 gap-4 select-none">
                        <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-sm font-medium text-gray-300">Görsel eklenecek</p>
                    </div>
                @endif
            </div>

            {{-- Güven Rozetleri --}}
            <div class="grid grid-cols-3 gap-3">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-3 text-center">
                    <div class="flex justify-center mb-1.5 text-green-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <p class="text-xs font-semibold text-gray-600">Güvenli Ödeme</p>
                </div>
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-3 text-center">
                    <div class="flex justify-center mb-1.5 text-blue-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    </div>
                    <p class="text-xs font-semibold text-gray-600">Hızlı Kargo</p>
                </div>
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-3 text-center">
                    <div class="flex justify-center mb-1.5 text-purple-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    </div>
                    <p class="text-xs font-semibold text-gray-600">Kolay İade</p>
                </div>
            </div>
        </div>

        {{-- SAĞ: BİLGİ & FORM --}}
        <div class="space-y-6">

            <div>
                @if($product->category)
                <span class="inline-block text-xs font-bold uppercase tracking-widest text-pink-500 bg-pink-50 px-3 py-1 rounded-full mb-3 border border-pink-100">
                    {{ $product->category->name }}
                </span>
                @endif
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 leading-tight mb-3">{{ $product->name }}</h1>

                @if($product->stock > 5)
                    <div class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-green-400 animate-pulse inline-block"></span><span class="text-sm text-green-600 font-medium">Stokta var</span></div>
                @elseif($product->stock > 0)
                    <div class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-orange-400 animate-pulse inline-block"></span><span class="text-sm text-orange-500 font-medium">Son {{ $product->stock }} adet kaldı!</span></div>
                @else
                    <div class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-red-400 inline-block"></span><span class="text-sm text-red-500 font-medium">Stokta yok</span></div>
                @endif
            </div>

            {{-- Fiyat --}}
            <div class="flex items-baseline gap-3 flex-wrap">
                <span class="text-4xl font-black text-gray-900">{{ number_format($product->price, 2) }} <span class="text-2xl font-bold">₺</span></span>
                @if($product->old_price && $product->old_price > $product->price)
                    <span class="text-xl text-gray-400 line-through font-medium">{{ number_format($product->old_price, 2) }} ₺</span>
                    <span class="text-sm font-bold text-white bg-gradient-to-r from-pink-500 to-purple-600 px-2.5 py-1 rounded-lg">
                        %{{ round((($product->old_price - $product->price) / $product->old_price) * 100) }} indirim
                    </span>
                @endif
            </div>

            {{-- Kargo Notu --}}
            <div class="bg-gradient-to-r from-indigo-50 to-purple-50 border border-indigo-100 rounded-2xl p-4 flex items-center gap-3">
                <div class="w-9 h-9 bg-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/></svg>
                </div>
                <p class="text-sm text-indigo-700">
                    <span class="font-bold">250₺ ve üzeri</span> siparişlerde kargo ücretsiz!
                    @if($product->price >= 250)
                        <span class="text-green-600 font-semibold"> ✓ Bu ürün kapsamında</span>
                    @else
                        <span class="text-indigo-500"> ({{ number_format(250 - $product->price, 2) }}₺ daha ekle)</span>
                    @endif
                </p>
            </div>

            {{-- FORM --}}
            @if($product->stock > 0)
            <form action="{{ route('cart.store', $product) }}" method="POST" class="space-y-5">
                @csrf

                {{-- Beden --}}
                @php $sizes = $product->sizes ?? ['XS','S','M','L','XL','XXL']; @endphp
                @if(!empty($sizes))
                <div>
                    <label class="block text-sm font-bold text-gray-800 mb-3">Beden Seçin</label>
                    <div class="flex flex-wrap gap-2">
                        @foreach($sizes as $size)
                        <label class="cursor-pointer">
                            <input type="radio" name="size" value="{{ $size }}" class="sr-only peer" {{ $loop->first ? 'checked' : '' }}>
                            <span class="flex items-center justify-center w-12 h-12 rounded-xl border-2 border-gray-200 text-sm font-bold text-gray-600
                                         peer-checked:border-pink-500 peer-checked:bg-pink-50 peer-checked:text-pink-600
                                         hover:border-gray-300 transition-all select-none">
                                {{ $size }}
                            </span>
                        </label>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Renk --}}
                @php
                    $colorMap = [
                        'Siyah'    => '#111827',
                        'Beyaz'    => '#F9FAFB',
                        'Pembe'    => '#EC4899',
                        'Kırmızı'  => '#EF4444',
                        'Mor'      => '#A855F7',
                        'Lacivert' => '#1E3A5F',
                        'Bej'      => '#D4B896',
                        'Gri'      => '#9CA3AF',
                        'Yeşil'    => '#22C55E',
                        'Sarı'     => '#EAB308',
                    ];
                    $colors = $product->colors ?? array_keys($colorMap);
                @endphp
                @if(!empty($colors))
                <div>
                    <label class="block text-sm font-bold text-gray-800 mb-3">
                        Renk — <span id="colorLabel" class="font-normal text-gray-500">{{ $colors[0] ?? '' }}</span>
                    </label>
                    <div class="flex flex-wrap gap-3">
                        @foreach($colors as $i => $color)
                        @php $hex = $colorMap[$color] ?? '#ccc'; $isBright = in_array($color, ['Beyaz','Sarı','Bej']); @endphp
                        <label class="cursor-pointer" title="{{ $color }}">
                            <input type="radio" name="color" value="{{ $color }}"
                                   class="sr-only peer" {{ $i === 0 ? 'checked' : '' }}
                                   onchange="document.getElementById('colorLabel').textContent='{{ $color }}'">
                            <span class="flex items-center justify-center w-10 h-10 rounded-full ring-2 ring-transparent ring-offset-2
                                         peer-checked:ring-pink-500 hover:scale-110 transition-transform"
                                  style="background-color: {{ $hex }}; {{ $isBright ? 'border: 2px solid #E5E7EB;' : '' }}">
                            </span>
                        </label>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Adet --}}
                <div>
                    <label class="block text-sm font-bold text-gray-800 mb-3">Adet</label>
                    <div class="flex items-center gap-3">
                        <button type="button" onclick="changeQty(-1)"
                            class="w-11 h-11 rounded-xl border-2 border-gray-200 bg-white flex items-center justify-center font-bold text-xl text-gray-600 hover:border-pink-300 hover:text-pink-600 transition-colors select-none">−</button>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock }}"
                               class="w-16 text-center border-2 border-gray-200 rounded-xl py-2 font-bold text-gray-800 text-lg focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-pink-400">
                        <button type="button" onclick="changeQty(1)"
                            class="w-11 h-11 rounded-xl border-2 border-gray-200 bg-white flex items-center justify-center font-bold text-xl text-gray-600 hover:border-pink-300 hover:text-pink-600 transition-colors select-none">+</button>
                        <span class="text-xs text-gray-400">Maks. {{ $product->stock }}</span>
                    </div>
                </div>

                {{-- Butonlar --}}
                @auth
                <div class="flex gap-3 pt-1">
                    <button type="submit"
                        class="flex-1 flex items-center justify-center gap-2.5 py-4 px-6 rounded-2xl text-white font-bold text-base
                               bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700
                               shadow-lg shadow-pink-200 hover:shadow-xl hover:shadow-pink-300 transform hover:-translate-y-0.5 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        Sepete Ekle
                    </button>
                    <button type="button" onclick="document.getElementById('favForm').submit()"
                        class="w-14 h-14 rounded-2xl border-2 flex items-center justify-center transition-all
                               {{ Auth::user()->favorites()->where('product_id', $product->id)->exists()
                                  ? 'border-pink-300 bg-pink-50 text-pink-500'
                                  : 'border-gray-200 bg-white text-gray-400 hover:border-pink-300 hover:text-pink-400 hover:bg-pink-50' }}">
                        <svg class="w-6 h-6"
                             fill="{{ Auth::user()->favorites()->where('product_id', $product->id)->exists() ? 'currentColor' : 'none' }}"
                             stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </button>
                </div>
                @else
                <a href="{{ route('login') }}"
                    class="flex w-full items-center justify-center gap-2.5 py-4 px-6 rounded-2xl text-white font-bold text-base
                           bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700
                           shadow-lg shadow-pink-200 hover:shadow-xl transform hover:-translate-y-0.5 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                    Giriş Yaparak Sepete Ekle
                </a>
                @endauth
            </form>

            @auth
            <form id="favForm" action="{{ route('favorites.toggle', $product) }}" method="POST" class="hidden">@csrf</form>
            @endauth

            @else
            <div class="bg-gray-50 border-2 border-dashed border-gray-200 rounded-2xl p-8 text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                </div>
                <h3 class="text-base font-bold text-gray-700 mb-1">Bu ürün şu an stokta yok</h3>
                <p class="text-sm text-gray-500 mb-5">Diğer ürünlerimize göz atabilirsiniz.</p>
                <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 py-2.5 px-6 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-pink-500 to-purple-600 hover:opacity-90 transition-opacity shadow-md">
                    Ürünlere Dön
                </a>
            </div>
            @endif

            {{-- Ürün Açıklaması --}}
            @if($product->description)
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <button type="button" onclick="toggleDesc()" class="w-full flex items-center justify-between">
                    <h3 class="text-sm font-bold text-gray-800 flex items-center gap-2">
                        <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Ürün Açıklaması
                    </h3>
                    <svg id="descChevron" class="w-4 h-4 text-gray-400 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div id="descContent" class="mt-4 text-sm text-gray-600 leading-relaxed">
                    {!! nl2br(e($product->description)) !!}
                </div>
            </div>
            @endif

        </div>
    </div>

    {{-- Benzer Ürünler --}}
    @if($relatedProducts->count() > 0)
    <div class="mt-16">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                <svg class="w-5 h-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                Benzer Ürünler
            </h2>
            <a href="{{ route('products.index') }}" class="text-sm font-semibold text-pink-600 hover:text-pink-700 transition-colors">Tümünü Gör →</a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-5">
            @foreach($relatedProducts as $related)
            <a href="{{ route('products.show', $related) }}"
               class="group bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all overflow-hidden">
                <div class="aspect-square bg-gray-50 flex items-center justify-center overflow-hidden relative">
                    @if($related->image)
                        <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->name }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                        <div class="text-gray-200"><svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div>
                    @endif
                    @if($related->old_price && $related->old_price > $related->price)
                    <span class="absolute top-2 left-2 bg-gradient-to-r from-pink-500 to-purple-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">
                        %{{ round((($related->old_price - $related->price) / $related->old_price) * 100) }}
                    </span>
                    @endif
                </div>
                <div class="p-4">
                    <p class="text-sm font-semibold text-gray-800 group-hover:text-pink-600 transition-colors line-clamp-2 mb-2 leading-snug">{{ $related->name }}</p>
                    <div class="flex items-baseline gap-2">
                        <span class="text-base font-black text-gray-900">{{ number_format($related->price, 2) }} ₺</span>
                        @if($related->old_price && $related->old_price > $related->price)
                            <span class="text-xs text-gray-400 line-through">{{ number_format($related->old_price, 2) }} ₺</span>
                        @endif
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif

</div>
</div>

<script>
function changeQty(delta) {
    const input = document.getElementById('quantity');
    const max = parseInt(input.getAttribute('max'));
    input.value = Math.max(1, Math.min(max, parseInt(input.value || 1) + delta));
}
function toggleDesc() {
    const c = document.getElementById('descContent');
    const ch = document.getElementById('descChevron');
    c.classList.toggle('hidden');
    ch.style.transform = c.classList.contains('hidden') ? '' : 'rotate(180deg)';
}
</script>

@endsection