@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-2">
                Favorilerim
            </h1>
            <p class="text-gray-600">
                {{ $favorites->count() }} favori ürün
            </p>
        </div>

        @if($favorites->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($favorites as $favorite)
            <div class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
                <a href="{{ route('products.show', $favorite->product->slug) }}">
                    <div class="relative h-72 bg-gray-100 overflow-hidden">
                        @if($favorite->product->image)
                            <img src="{{ asset('storage/' . $favorite->product->image) }}" alt="{{ $favorite->product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="flex items-center justify-center h-full bg-gradient-to-br from-pink-100 to-purple-100">
                                <svg class="w-20 h-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                        
                        <form action="{{ route('favorites.remove', $favorite) }}" method="POST" class="absolute top-3 right-3" onclick="event.stopPropagation()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-9 h-9 bg-white rounded-full flex items-center justify-center shadow-lg hover:bg-red-50 transition-all">
                                <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                </svg>
                            </button>
                        </form>
                    </div>

                    <div class="p-4">
                        @if($favorite->product->category)
                            <p class="text-xs font-semibold text-pink-600 uppercase mb-1">
                                {{ $favorite->product->category->name }}
                            </p>
                        @endif
                        
                        <h3 class="text-sm font-semibold text-gray-900 mb-2 line-clamp-2">
                            {{ $favorite->product->name }}
                        </h3>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-pink-600">
                                {{ number_format($favorite->product->price, 2) }}₺
                            </span>
                            
                            @if($favorite->product->stock > 0)
                                <form action="{{ route('cart.add', $favorite->product) }}" method="POST" onclick="event.stopPropagation()">
                                    @csrf
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
        @else
        <div class="bg-white rounded-xl shadow-sm p-12 text-center">
            <svg class="w-20 h-20 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Henüz favori ürününüz yok</h3>
            <p class="text-gray-600 mb-6">
                Beğendiğiniz ürünleri favorilere ekleyerek daha sonra kolayca bulabilirsiniz
            </p>
            <a href="{{ route('products.index') }}" class="inline-flex items-center px-6 py-3 bg-pink-600 text-white rounded-xl font-semibold hover:bg-pink-700 transition-all">
                Ürünleri Keşfet
            </a>
        </div>
        @endif

    </div>
</div>
@endsection