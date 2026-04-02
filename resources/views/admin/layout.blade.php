<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel — Kadın Giyim</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white flex flex-col">
        <div class="p-6 border-b border-gray-700">
            <h1 class="text-xl font-bold text-pink-400">👗 Admin Panel</h1>
        </div>
        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-pink-600' : '' }}">
                📊 Dashboard
            </a>
            <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.products.*') ? 'bg-pink-600' : '' }}">
                👕 Ürünler
            </a>
            <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.categories.*') ? 'bg-pink-600' : '' }}">
                📂 Kategoriler
            </a>
            <a href="{{ route('admin.orders.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.orders.*') ? 'bg-pink-600' : '' }}">
                📦 Siparişler
            </a>
        </nav>
        <div class="p-4 border-t border-gray-700">
            <a href="{{ route('home') }}" class="block px-4 py-2 text-sm text-gray-400 hover:text-white">← Siteye Dön</a>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="w-full text-left px-4 py-2 text-sm text-red-400 hover:text-red-300">Çıkış Yap</button>
            </form>
        </div>
    </aside>

    <!-- İçerik -->
    <main class="flex-1 p-8">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>
</div>
</body>
</html>