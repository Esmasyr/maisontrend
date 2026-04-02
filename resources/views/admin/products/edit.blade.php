@extends('admin.layout')
@section('content')
<div class="flex items-center gap-4 mb-6">
    <a href="{{ route('admin.products.index') }}" class="text-gray-500 hover:text-gray-700">← Geri</a>
    <h1 class="text-3xl font-bold text-gray-800">Ürün Düzenle</h1>
</div>

<div class="bg-white rounded-xl shadow p-8 max-w-2xl">
    @if($product->image)
    <img src="{{ $product->image }}" class="w-full h-48 object-cover rounded-xl mb-6">
    @endif

    <form method="POST" action="{{ route('admin.products.update', $product) }}">
        @csrf @method('PUT')
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ürün Adı</label>
                <input type="text" name="name" required class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500" value="{{ $product->name }}">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select name="category_id" required class="w-full border rounded-lg px-4 py-2">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Fiyat (₺)</label>
                    <input type="number" name="price" step="0.01" required class="w-full border rounded-lg px-4 py-2" value="{{ $product->price }}">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">İndirimli Fiyat (₺)</label>
                    <input type="number" name="discount_price" step="0.01" class="w-full border rounded-lg px-4 py-2" value="{{ $product->discount_price }}">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
                <input type="number" name="stock" required class="w-full border rounded-lg px-4 py-2" value="{{ $product->stock }}">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Görsel URL</label>
                <input type="url" name="image" class="w-full border rounded-lg px-4 py-2" value="{{ $product->image }}" placeholder="https://...">
                <p class="text-xs text-gray-400 mt-1">Unsplash, Pexels veya herhangi bir görsel URL'si girin</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Açıklama</label>
                <textarea name="description" rows="4" class="w-full border rounded-lg px-4 py-2">{{ $product->description }}</textarea>
            </div>
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ $product->is_active ? 'checked' : '' }}>
                <label for="is_active" class="text-sm text-gray-700">Aktif (sitede görünsün)</label>
            </div>
        </div>
        <button type="submit" class="mt-6 w-full bg-pink-600 text-white py-3 rounded-lg font-semibold hover:bg-pink-700">Güncelle</button>
    </form>
</div>
@endsection