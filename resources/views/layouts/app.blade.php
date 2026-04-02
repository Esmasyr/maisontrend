<!DOCTYPE html>
<html lang="tr" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Kadın Giyim') }} - Modern Moda Alışveriş</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-sans antialiased bg-white">
    
    @include('layouts.navigation')
    
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div>
                    <h3 class="text-xl font-bold mb-6 bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent">
                        Kadın Giyim
                    </h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Türkiye'nin en trend kadın giyim markası. Kalite ve şıklık bir arada.
                    </p>
                    <div class="flex space-x-4 mt-6">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="font-semibold text-lg mb-6">Kurumsal</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-pink-500 text-sm transition-colors">Hakkımızda</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-pink-500 text-sm transition-colors">Kariyer</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-pink-500 text-sm transition-colors">İletişim</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-pink-500 text-sm transition-colors">Mağazalarımız</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold text-lg mb-6">Müşteri Hizmetleri</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-pink-500 text-sm transition-colors">Sipariş Takibi</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-pink-500 text-sm transition-colors">İade ve Değişim</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-pink-500 text-sm transition-colors">Sık Sorulan Sorular</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-pink-500 text-sm transition-colors">Teslimat Bilgileri</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold text-lg mb-6">Bülten</h4>
                    <p class="text-gray-400 text-sm mb-4">Kampanya ve yeni ürünlerden ilk siz haberdar olun</p>
                    <form class="flex flex-col gap-3">
                        <input type="email" placeholder="E-posta adresiniz" class="px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white text-sm focus:outline-none focus:border-pink-500">
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-pink-600 to-purple-600 text-white rounded-lg font-semibold hover:from-pink-700 hover:to-purple-700 transition-all">
                            Kayıt Ol
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm">&copy; 2026 Kadın Giyim. Tüm hakları saklıdır.</p>
                    <div class="flex gap-6 mt-4 md:mt-0">
                        <a href="#" class="text-gray-400 hover:text-pink-500 text-sm transition-colors">Gizlilik Politikası</a>
                        <a href="#" class="text-gray-400 hover:text-pink-500 text-sm transition-colors">Kullanım Koşulları</a>
                        <a href="#" class="text-gray-400 hover:text-pink-500 text-sm transition-colors">Çerez Politikası</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" x-cloak class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-4 rounded-lg shadow-xl z-50 animate-slide-in-right">
            <div class="flex items-center">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                {{ session('success') }}
            </div>
        </div>
    @endif
<!-- AI Stil Asistanı -->
<div id="ai-chat" class="fixed bottom-6 right-6 z-50">
    <!-- Açık/Kapalı Butonu -->
    <button onclick="toggleChat()" class="w-14 h-14 bg-gradient-to-r from-pink-500 to-purple-500 rounded-full shadow-lg flex items-center justify-center text-white hover:scale-110 transition-transform">
        <svg id="chat-icon-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
        </svg>
        <svg id="chat-icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>

    <!-- Chat Kutusu -->
    <div id="chat-box" class="hidden absolute bottom-16 right-0 w-80 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden">
        <!-- Başlık -->
        <div class="bg-gradient-to-r from-pink-500 to-purple-500 px-4 py-3 text-white">
            <h3 class="font-semibold text-sm">✨ Stil Asistanı</h3>
            <p class="text-xs opacity-80">Kombin önerileri için buradayım</p>
        </div>

        <!-- Mesajlar -->
        <div id="chat-messages" class="h-64 overflow-y-auto p-4 space-y-3 bg-gray-50">
            <div class="flex justify-start">
                <div class="bg-white text-gray-700 text-sm px-3 py-2 rounded-2xl rounded-tl-none shadow-sm max-w-xs">
                    Merhaba! 👗 Kombin önerileri, beden seçimi veya moda hakkında yardımcı olabilirim.
                </div>
            </div>
        </div>

        <!-- Input -->
        <div class="p-3 bg-white border-t border-gray-100">
            <div class="flex gap-2">
                <input id="chat-input" type="text" placeholder="Bir şey sor..."
                    class="flex-1 text-sm px-3 py-2 border border-gray-200 rounded-full focus:outline-none focus:border-pink-400"
                    onkeypress="if(event.key==='Enter') sendMessage()">
                <button onclick="sendMessage()" class="w-9 h-9 bg-gradient-to-r from-pink-500 to-purple-500 rounded-full flex items-center justify-center text-white hover:opacity-90 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function toggleChat() {
    const box = document.getElementById('chat-box');
    const open = document.getElementById('chat-icon-open');
    const close = document.getElementById('chat-icon-close');
    box.classList.toggle('hidden');
    open.classList.toggle('hidden');
    close.classList.toggle('hidden');
}

function sendMessage() {
    const input = document.getElementById('chat-input');
    const messages = document.getElementById('chat-messages');
    const text = input.value.trim();
    if (!text) return;

    // Kullanıcı mesajı
    messages.innerHTML += `
        <div class="flex justify-end">
            <div class="bg-gradient-to-r from-pink-500 to-purple-500 text-white text-sm px-3 py-2 rounded-2xl rounded-tr-none max-w-xs">
                ${text}
            </div>
        </div>`;
    input.value = '';
    messages.scrollTop = messages.scrollHeight;

    // Yükleniyor
    messages.innerHTML += `
        <div id="typing" class="flex justify-start">
            <div class="bg-white text-gray-400 text-sm px-3 py-2 rounded-2xl rounded-tl-none shadow-sm">
                Yazıyor...
            </div>
        </div>`;
    messages.scrollTop = messages.scrollHeight;

    fetch('/ai/chat', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ message: text })
    })
    .then(r => r.json())
    .then(data => {
        document.getElementById('typing').remove();
        messages.innerHTML += `
            <div class="flex justify-start">
                <div class="bg-white text-gray-700 text-sm px-3 py-2 rounded-2xl rounded-tl-none shadow-sm max-w-xs">
                    ${data.reply || data.error}
                </div>
            </div>`;
        messages.scrollTop = messages.scrollHeight;
    })
    .catch(() => {
        document.getElementById('typing').remove();
        messages.innerHTML += `
            <div class="flex justify-start">
                <div class="bg-white text-red-500 text-sm px-3 py-2 rounded-2xl rounded-tl-none shadow-sm">
                    Bir hata oluştu, tekrar dene.
                </div>
            </div>`;
    });
}
</script>
    
</body>
</html>