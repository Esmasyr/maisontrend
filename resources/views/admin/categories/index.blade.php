@extends('admin.layout')
@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-6">Kategoriler</h1>
<div class="grid grid-cols-2 gap-8">
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-xl font-bold mb-4">Yeni Kategori</h2>
        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="space-y-3">
                <input type="text" name="name" placeholder="Kategori adı" required class="w-full border rounded-lg px-4 py-2">
                <textarea name="description" placeholder="Açıklama (opsiyonel)" class="w-full border rounded-lg px-4 py-2" rows="3"></textarea>
                <button type="submit" class="w-full bg-pink-600 text-white py-2 rounded-lg hover:bg-pink-700">Ekle</button>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead><tr class="bg-gray-50 border-b">
                <th class="text-left p-4">Kategori</th>
                <th class="text-left p-4">Ürün</th>
                <th class="text-left p-4">İşlem</th>
            </tr></thead>
            <tbody>
            @foreach($categories as $cat)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-4 font-medium">{{ $cat->name }}</td>
                <td class="p-4 text-gray-500">{{ $cat->products_count }}</td>
                <td class="p-4">
                    <form method="POST" action="{{ route('admin.categories.destroy', $cat) }}" onsubmit="return confirm('Silinsin mi?')">
                        @csrf @method('DELETE')
                        <button class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">Sil</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection