@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-pink-50 via-white to-purple-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        
        <div class="text-center mb-8">
            <svg class="w-16 h-16 text-pink-600 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M16 6a4 4 0 00-8 0v4H5l1 12h12l1-12h-3V6zm-6 0a2 2 0 114 0v4h-4V6z"/>
            </svg>
            <h2 class="text-3xl font-extrabold text-gray-900 mb-2">
                Hoş Geldiniz
            </h2>
            <p class="text-gray-600">
                Hesabınıza giriş yapın
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8">
            
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        E-posta Adresi
                    </label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-600 focus:border-transparent transition-all">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        Şifre
                    </label>
                    <input id="password" type="password" name="password" required autocomplete="current-password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-600 focus:border-transparent transition-all">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="w-4 h-4 text-pink-600 border-gray-300 rounded focus:ring-pink-500">
                        <span class="ml-2 text-sm text-gray-600">Beni Hatırla</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-pink-600 hover:text-pink-700">
                            Şifremi Unuttum?
                        </a>
                    @endif
                </div>

                <button type="submit" class="w-full px-6 py-4 bg-gradient-to-r from-pink-600 to-purple-600 text-white rounded-xl font-semibold hover:from-pink-700 hover:to-purple-700 transition-all shadow-lg">
                    Giriş Yap
                </button>

                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        Hesabınız yok mu?
                        <a href="{{ route('register') }}" class="font-medium text-pink-600 hover:text-pink-700">
                            Kayıt Olun
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection