@extends('admin.layout')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Ürünler</h1>
    <a href="{{ route('admin.products.create') }}" class="bg-pink-600 text-white px-6 py-2 rounded-lg hover:bg-pink-700">+ Yeni Ürün</a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead><tr class="bg-gray-50 border-b text-gray-600">
            <th class="text-left p-4">Görsel</th>
            <th class="text-left p-4">Ürün Adı</th>
            <th class="text-left p-4">Kategori</th>
            <th class="text-left p-4">Fiyat</th>
            <th class="text-left p-4">Stok</th>
            <th class="text-left p-4">Durum</th>
            <th class="text-left p-4">İşlem</th>
        </tr></thead>
        <tbody>
        @foreach($products as $product)
        <tr class="border-b hover:bg-gray-50">
            <td class="p-4">
                <img src="{{ $product->image }}" class="w-12 h-12 object-cover rounded-lg" onerror="this.src='https://via.placeholder.com/48'">
            </td>
            <td class="p-4 font-medium">{{ $product->name }}</td>
            <td class="p-4 text-gray-500">{{ $product->category->name ?? '-' }}</td>
            <td class="p-4 text-pink-600 font-bold">{{ number_format($product->price, 2) }}₺</td>
            <td class="p-4">{{ $product->stock }}</td>
            <td class="p-4">
                <span class="px-2 py-1 rounded-full text-xs {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $product->is_active ? 'Aktif' : 'Pasif' }}
                </span>
            </td>
            <td class="p-4 flex gap-2">
                <a href="{{ route('admin.products.edit', $product) }}" class="bg-blue-500 text-white px-3 py-1 rounded text-xs hover:bg-blue-600">Düzenle</a>
                <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Silinsin mi?')">
                    @csrf @method('DELETE')
                    <button class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">Sil</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="p-4">{{ $products->links() }}</div>
</div>
@endsection