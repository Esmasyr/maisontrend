@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-50 py-8 font-sans">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        {{-- Hoşgeldin Banner'ı --}}
        <div class="relative overflow-hidden bg-gradient-to-r from-pink-600 via-purple-600 to-indigo-700 rounded-3xl shadow-lg p-8 sm:p-12 text-white">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-white rounded-full mix-blend-multiply filter blur-2xl opacity-20 animate-pulse"></div>
            <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-40 h-40 bg-pink-300 rounded-full mix-blend-multiply filter blur-2xl opacity-20 animate-pulse" style="animation-delay: 1s;"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <p class="text-pink-100 text-sm font-semibold tracking-wider uppercase mb-1">Hoş Geldiniz</p>
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-2 tracking-tight">{{ Auth::user()->name }}</h1>
                    <p class="text-indigo-100 text-sm sm:text-base font-light max-w-lg">
                        Müşteri panelinize giriş yaptınız. Siparişlerinizi, favorilerinizi ve hesap ayarlarınızı buradan kolayca yönetebilirsiniz.
                    </p>
                </div>
                <div class="hidden md:flex flex-col items-end text-right">
                    <div class="text-5xl font-black text-white/90 drop-shadow-sm">{{ now()->format('d') }}</div>
                    <div class="text-sm font-medium text-pink-100 uppercase tracking-widest">{{ now()->translatedFormat('F Y') }}</div>
                </div>
            </div>
        </div>

        {{-- İstatistik Kartları --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Kart 1 --}}
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-shadow flex items-center gap-5 relative overflow-hidden group">
                <div class="w-14 h-14 rounded-full bg-pink-50 flex items-center justify-center text-pink-600 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider mb-1">Toplam Sipariş</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ Auth::user()->orders()->count() }}</h3>
                </div>
            </div>

            {{-- Kart 2 --}}
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-shadow flex items-center gap-5 relative overflow-hidden group">
                <div class="w-14 h-14 rounded-full bg-purple-50 flex items-center justify-center text-purple-600 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider mb-1">Toplam Harcama</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ number_format(Auth::user()->orders()->sum('total_amount'), 0) }} <span class="text-sm font-medium text-gray-500">₺</span></h3>
                </div>
            </div>

            {{-- Kart 3 --}}
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-shadow flex items-center gap-5 relative overflow-hidden group">
                <div class="w-14 h-14 rounded-full bg-rose-50 flex items-center justify-center text-rose-600 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider mb-1">Favori Ürünler</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ Auth::user()->favorites()->count() }}</h3>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            
            {{-- Sol Sütun: Hızlı Erişim --}}
            <div class="lg:col-span-1 space-y-6">
                <div>
                    <h2 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        Hızlı Erişim
                    </h2>
                    
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                        <a href="{{ route('orders.index') }}" class="flex items-center gap-4 p-4 hover:bg-gray-50 transition-colors border-b border-gray-50 group">
                            <div class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-600 group-hover:bg-pink-50 group-hover:text-pink-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-semibold text-gray-800 group-hover:text-pink-600 transition-colors">Siparişlerim</h4>
                                <p class="text-xs text-gray-500 mt-0.5">Tüm sipariş geçmişiniz</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-300 group-hover:text-pink-500 transition-colors transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                        
                        <a href="{{ route('favorites.index') }}" class="flex items-center gap-4 p-4 hover:bg-gray-50 transition-colors border-b border-gray-50 group">
                            <div class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-600 group-hover:bg-purple-50 group-hover:text-purple-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-semibold text-gray-800 group-hover:text-purple-600 transition-colors">Favorilerim</h4>
                                <p class="text-xs text-gray-500 mt-0.5">Beğendiğiniz ürünler</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-300 group-hover:text-purple-500 transition-colors transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                        
                        <a href="{{ route('cart.index') }}" class="flex items-center gap-4 p-4 hover:bg-gray-50 transition-colors border-b border-gray-50 group">
                            <div class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-600 group-hover:bg-indigo-50 group-hover:text-indigo-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-semibold text-gray-800 group-hover:text-indigo-600 transition-colors">Sepetim</h4>
                                <p class="text-xs text-gray-500 mt-0.5">Mevcut sepetiniz</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-300 group-hover:text-indigo-500 transition-colors transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                        
                        <a href="{{ route('products.index') }}" class="flex items-center gap-4 p-4 hover:bg-gray-50 transition-colors group">
                            <div class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-600 group-hover:bg-rose-50 group-hover:text-rose-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="1.5" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-semibold text-gray-800 group-hover:text-rose-600 transition-colors">Tüm Ürünler</h4>
                                <p class="text-xs text-gray-500 mt-0.5">Yeni koleksiyonlar</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-300 group-hover:text-rose-500 transition-colors transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Mini Profil --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                    <div class="flex items-center gap-4 mb-5">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-pink-500 to-purple-500 flex items-center justify-center text-white font-bold text-lg shadow-md">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div>
                            <div class="font-bold text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <a href="{{ route('profile.index') }}" class="text-center py-2 px-4 rounded-xl text-xs font-semibold text-gray-600 bg-gray-50 hover:bg-gray-100 hover:text-gray-900 transition-colors border border-gray-200">
                            Profilim
                        </a>
                        <a href="{{ route('profile.edit') }}" class="text-center py-2 px-4 rounded-xl text-xs font-semibold text-white bg-gray-800 hover:bg-black transition-colors shadow-sm">
                            Düzenle
                        </a>
                    </div>
                </div>
            </div>

            {{-- Sağ Sütun: Son Siparişler --}}
            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        Son Siparişler
                    </h2>
                    @if(Auth::user()->orders()->count() > 4)
                        <a href="{{ route('orders.index') }}" class="text-sm font-medium text-pink-600 hover:text-pink-700 transition-colors">Tümünü Gör</a>
                    @endif
                </div>
                
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                    @if(Auth::user()->orders()->count() > 0)
                        <div class="divide-y divide-gray-50">
                            @foreach(Auth::user()->orders()->latest()->take(5)->get() as $order)
                            <a href="{{ route('orders.show', $order) }}" class="block p-5 hover:bg-gray-50/80 transition-colors group">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-xl bg-gray-50 flex items-center justify-center text-gray-400 border border-gray-100 group-hover:border-gray-200 transition-colors">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                        </div>
                                        <div>
                                            <div class="text-sm font-bold text-gray-800 mb-0.5 group-hover:text-pink-600 transition-colors">Sipariş #{{ $order->order_number ?? $order->id }}</div>
                                            <div class="text-xs text-gray-500">{{ $order->created_at->format('d M Y - H:i') }}</div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center justify-between sm:flex-col sm:items-end gap-2">
                                        <div class="text-base font-bold text-gray-900 border-b border-white">{{ number_format($order->total_amount, 2) }} ₺</div>
                                        
                                        @php
                                            $statusClasses = [
                                                'pending'    => 'bg-yellow-50 text-yellow-600 border-yellow-200',
                                                'processing' => 'bg-blue-50 text-blue-600 border-blue-200',
                                                'shipped'    => 'bg-purple-50 text-purple-600 border-purple-200',
                                                'delivered'  => 'bg-green-50 text-green-600 border-green-200',
                                                'cancelled'  => 'bg-red-50 text-red-600 border-red-200',
                                            ];
                                            
                                            $statusLabels = [
                                                'pending'    => 'Bekliyor',
                                                'processing' => 'Hazırlanıyor',
                                                'shipped'    => 'Kargoya Verildi',
                                                'delivered'  => 'Teslim Edildi',
                                                'cancelled'  => 'İptal Edildi',
                                            ];
                                            
                                            $orderSt = strtolower($order->status);
                                            $class = $statusClasses[$orderSt] ?? 'bg-gray-50 text-gray-600 border-gray-200';
                                            $label = $statusLabels[$orderSt] ?? ucfirst($orderSt);
                                        @endphp
                                        
                                        <span class="px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider rounded-md border {{ $class }}">
                                            {{ $label }}
                                        </span>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    @else
                        <div class="p-12 text-center">
                            <div class="w-20 h-20 mx-auto bg-gray-50 rounded-full flex items-center justify-center text-gray-300 mb-4 border border-dashed border-gray-200">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Henüz siparişiniz bulunmuyor</h3>
                            <p class="text-sm text-gray-500 mb-6 max-w-sm mx-auto">Yeni trendleri keşfetmek ve ilk siparişinizi vermek için hemen alışverişe başlayın.</p>
                            <a href="{{ route('products.index') }}" class="inline-flex py-2.5 px-6 rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                Koleksiyona Göz At
                            </a>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

@endsection