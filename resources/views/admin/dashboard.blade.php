@extends('admin.layout')
@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-8">Dashboard</h1>
<div class="grid grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl p-6 shadow">
        <p class="text-gray-500 text-sm">Toplam Ürün</p>
        <p class="text-3xl font-bold text-pink-600">{{ $toplam_urun }}</p>
    </div>
    <div class="bg-white rounded-xl p-6 shadow">
        <p class="text-gray-500 text-sm">Toplam Sipariş</p>
        <p class="text-3xl font-bold text-blue-600">{{ $toplam_siparis }}</p>
    </div>
    <div class="bg-white rounded-xl p-6 shadow">
        <p class="text-gray-500 text-sm">Kullanıcılar</p>
        <p class="text-3xl font-bold text-green-600">{{ $toplam_kullanici }}</p>
    </div>
    <div class="bg-white rounded-xl p-6 shadow">
        <p class="text-gray-500 text-sm">Toplam Gelir</p>
        <p class="text-3xl font-bold text-purple-600">{{ number_format($toplam_gelir, 2) }}₺</p>
    </div>
</div>

<div class="bg-white rounded-xl shadow p-6">
    <h2 class="text-xl font-bold mb-4">Son Siparişler</h2>
    <table class="w-full text-sm">
        <thead><tr class="border-b text-gray-500">
            <th class="text-left py-2">ID</th>
            <th class="text-left py-2">Müşteri</th>
            <th class="text-left py-2">Tutar</th>
            <th class="text-left py-2">Durum</th>
            <th class="text-left py-2">Tarih</th>
        </tr></thead>
        <tbody>
        @foreach($son_siparisler as $siparis)
        <tr class="border-b hover:bg-gray-50">
            <td class="py-2">#{{ $siparis->id }}</td>
            <td class="py-2">{{ $siparis->user->name ?? '-' }}</td>
            <td class="py-2">{{ number_format($siparis->total_amount, 2) }}₺</td>
            <td class="py-2"><span class="px-2 py-1 rounded-full text-xs bg-blue-100 text-blue-800">{{ $siparis->status }}</span></td>
            <td class="py-2">{{ $siparis->created_at->format('d.m.Y') }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection