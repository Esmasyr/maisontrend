@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Tüm Ürünler</h1>
            <p class="text-gray-600">{{ $products->total() }} ürün bulundu</p>
        </div>

        <div class="lg:grid lg:grid-cols-4 lg:gap-8">
            
            <!-- Sidebar -->
            <aside class="hidden lg:block">
                <div class="sticky top-24 space-y-6">
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h3 class="font-bold text-gray-900 mb-4">Kategoriler</h3>
                        <div class="space-y-2">
                            <a href="{{ route('products.index') }}" class="flex items-center justify-between px-4 py-2 rounded-lg {{ !request('category') ? 'bg-pink-600 text-white' : 'text-gray-700 hover:bg-gray-50' }} transition-colors">
                                <span class="text-sm font-medium">Tümü</span>
                                <span class="text-xs">{{ $products->total() }}</span>
                            </a>
                            @foreach($categories as $category)
                            <a href="{{ route('products.index', ['category' => $category->slug]) }}" 
                               class="flex items-center justify-between px-4 py-2 rounded-lg {{ request('category') == $category->slug ? 'bg-pink-600 text-white' : 'text-gray-700 hover:bg-gray-50' }} transition-colors">
                                <span class="text-sm font-medium">{{ $category->name }}</span>
                                <span class="text-xs {{ request('category') == $category->slug ? 'text-pink-100' : 'text-gray-500' }}">{{ $category->products_count }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Products -->
            <div class="lg:col-span-3">
                
                <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
                    <form method="GET" action="{{ route('products.index') }}" class="flex items-center justify-between gap-4">
                        <input type="hidden" name="category" value="{{ request('category') }}">
                        <span class="text-sm text-gray-600">Sıralama:</span>
                        <select name="sort" onchange="this.form.submit()" class="px-4 py-2 border-0 bg-gray-50 text-gray-900 rounded-lg text-sm focus:ring-2 focus:ring-pink-600">
                            <option value=""       {{ !request('sort') ? 'selected' : '' }}>Önerilen</option>
                            <option value="newest" {{ request('sort')=='newest' ? 'selected' : '' }}>En Yeni</option>
                            <option value="asc"    {{ request('sort')=='asc'    ? 'selected' : '' }}>Fiyat: Düşük → Yüksek</option>
                            <option value="desc"   {{ request('sort')=='desc'   ? 'selected' : '' }}>Fiyat: Yüksek → Düşük</option>
                        </select>
                    </form>
                </div>

                @if($products->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-8">
                    @foreach($products as $product)
                    <div class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <a href="{{ route('products.show', $product->slug) }}">
                            <div class="relative h-72 bg-gray-100 overflow-hidden">
                                @if($product->image)
                                  <img src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
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
                                <form action="{{ route('favorites.toggle', $product) }}" method="POST" onclick="event.stopPropagation()">
                                    @csrf
                                    <button type="submit" class="absolute top-3 left-3 w-9 h-9 bg-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity shadow-lg hover:bg-pink-50">
                                        <svg class="w-5 h-5 {{ auth()->user()->favorites->contains($product->id) ? 'text-pink-600 fill-pink-600' : 'text-gray-700' }} hover:text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

                <div class="mt-8">
                    {{ $products->links() }}
                </div>

                @else
                <div class="bg-white rounded-xl shadow-sm p-12 text-center">
                    <svg class="w-20 h-20 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Ürün Bulunamadı</h3>
                    <p class="text-gray-600 mb-6">Aradığınız kriterlere uygun ürün bulunmamaktadır.</p>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center px-6 py-3 bg-pink-600 text-white rounded-xl font-semibold hover:bg-pink-700 transition-all">
                        Tüm Ürünlere Dön
                    </a>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection