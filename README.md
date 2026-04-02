@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Ödeme ve Teslimat Bilgileri</h1>

        @if(isset($cartItems) && $cartItems->count() > 0)
        <form action="{{ route('orders.process') }}" method="POST">
            @csrf
            <div class="grid lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-6">

                    <!-- Teslimat Adresi -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">📍 Teslimat Adresi</h2>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Ad Soyad *</label>
                                <input type="text" name="shipping_name" required value="{{ old('shipping_name', Auth::user()->name) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500">
                                @error('shipping_name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Telefon *</label>
                                <input type="tel" name="shipping_phone" required value="{{ old('shipping_phone') }}" placeholder="5XX XXX XX XX" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500">
                                @error('shipping_phone')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Adres *</label>
                                <textarea name="shipping_address" rows="3" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500">{{ old('shipping_address') }}</textarea>
                                @error('shipping_address')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Şehir *</label>
                                <input type="text" name="shipping_city" required value="{{ old('shipping_city') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500">
                                @error('shipping_city')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">İlçe *</label>
                                <input type="text" name="shipping_state" required value="{{ old('shipping_state') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500">
                                @error('shipping_state')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Posta Kodu *</label>
                                <input type="text" name="shipping_zipcode" required value="{{ old('shipping_zipcode') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500">
                                @error('shipping_zipcode')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>

                    <!-- Ödeme Yöntemi -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">💳 Ödeme Yöntemi</h2>
                        <div class="space-y-3">
                            <label class="flex items-center p-4 border-2 border-pink-500 rounded-lg cursor-pointer">
                                <input type="radio" name="payment_method" value="credit_card" checked class="w-5 h-5 text-pink-500">
                                <span class="ml-3 font-medium text-gray-900">Kredi / Banka Kartı</span>
                            </label>

                            <!-- Kart Formu -->
                            <div id="card-form" class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                <p class="text-xs text-yellow-600 bg-yellow-50 border border-yellow-200 rounded px-3 py-2 mb-4">
                                    🧪 Test modu — gerçek ödeme alınmaz
                                </p>
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Kart Numarası</label>
                                        <input type="text" placeholder="4242 4242 4242 4242" maxlength="19"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500"
                                               oninput="this.value=this.value.replace(/\D/g,'').replace(/(.{4})/g,'$1 ').trim()">
                                    </div>
                                    <div class="grid grid-cols-2 gap-3">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Son Kullanma</label>
                                            <input type="text" placeholder="MM/YY" maxlength="5"
                                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500"
                                                   oninput="this.value=this.value.replace(/\D/g,'').replace(/^(\d{2})(\d)/,'$1/$2')">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">CVV</label>
                                            <input type="text" placeholder="123" maxlength="3"
                                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500"
                                                   oninput="this.value=this.value.replace(/\D/g,'')">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Kart Üzerindeki İsim</label>
                                        <input type="text" placeholder="AD SOYAD"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500">
                                    </div>
                                </div>
                            </div>

                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-pink-500 transition-colors">
                                <input type="radio" name="payment_method" value="cash_on_delivery" class="w-5 h-5 text-pink-500">
                                <span class="ml-3 font-medium text-gray-900">Kapıda Ödeme</span>
                            </label>
                        </div>
                    </div>

                    <!-- Sipariş Notu -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">Sipariş Notu (Opsiyonel)</h2>
                        <textarea name="notes" rows="3" placeholder="Özel notunuz varsa buraya yazabilirsiniz..."
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500">{{ old('notes') }}</textarea>
                    </div>
                </div>

                <!-- Sipariş Özeti -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 sticky top-4">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">Sipariş Özeti</h2>
                        <div class="space-y-4 mb-6">
                            @foreach($cartItems as $item)
                            <div class="flex items-center space-x-3 pb-3 border-b border-gray-200">
                                <div class="w-16 h-16 bg-gray-200 rounded-lg overflow-hidden">
                                    @if($item->product->image)
                                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-sm font-medium text-gray-900">{{ $item->product->name }}</h3>
                                    <p class="text-sm text-gray-500">{{ $item->quantity }} x {{ number_format($item->product->price, 2) }}₺</p>
                                </div>
                                <span class="font-semibold text-gray-900">{{ number_format($item->quantity * $item->product->price, 2) }}₺</span>
                            </div>
                            @endforeach
                        </div>
                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between text-gray-600">
                                <span>Ara Toplam:</span>
                                <span>{{ number_format($subtotal, 2) }}₺</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Kargo:</span>
                                @if($shipping == 0)
                                    <span class="text-green-500 font-medium">Ücretsiz</span>
                                @else
                                    <span>{{ number_format($shipping, 2) }}₺</span>
                                @endif
                            </div>
                            <div class="border-t border-gray-200 pt-3">
                                <div class="flex justify-between text-xl font-bold text-gray-900">
                                    <span>Toplam:</span>
                                    <span class="text-pink-500">{{ number_format($total, 2) }}₺</span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-rose-500 text-white px-6 py-4 rounded-xl font-semibold hover:shadow-lg transition-all flex items-center justify-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Siparişi Tamamla
                        </button>
                    </div>
                </div>
            </div>
        </form>

        @else
        <div class="bg-white rounded-xl shadow-lg p-12 text-center">
            <h3 class="text-2xl font-bold text-gray-900 mb-2">Sepetiniz Boş</h3>
            <p class="text-gray-600 mb-6">Sipariş vermek için önce sepetinize ürün eklemelisiniz.</p>
            <a href="{{ route('products.index') }}" class="inline-flex items-center px-6 py-3 bg-pink-500 text-white rounded-lg hover:bg-pink-600 transition-colors">
                Alışverişe Başla
            </a>
        </div>
        @endif
    </div>

</div>

<script>
document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
    radio.addEventListener('change', function() {
        document.getElementById('card-form').style.display =
            this.value === 'credit_card' ? 'block' : 'none';
    });
});
</script>

@endsection
