<nav x-data="{ open: false, searchOpen: false, megaMenuOpen: false }" class="bg-white border-b border-gray-100 sticky top-0 z-50 shadow-sm">

    {{-- ── TOP BAR ── --}}
    <div style="background:#1a1410; color:#c9a96e;" class="text-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-9">
                <div class="flex items-center space-x-6">
                    <span class="flex items-center" style="color:rgba(201,169,110,0.7); letter-spacing:1.5px; font-size:0.65rem; text-transform:uppercase;">
                        <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                        </svg>
                        Ücretsiz Kargo
                    </span>
                    <span class="hidden md:flex items-center" style="color:rgba(201,169,110,0.7); letter-spacing:1.5px; font-size:0.65rem; text-transform:uppercase;">
                        <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        14 Gün İade
                    </span>
                </div>
                <div style="letter-spacing:3px; font-size:0.6rem; text-transform:uppercase; color:var(--gold,#c9a96e);">
                    Yeni Sezon — %50 İndirim
                </div>
            </div>
        </div>
    </div>

    {{-- ── MAIN NAV ── --}}
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">

                {{-- LOGO --}}
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 220 60" fill="none" style="height:46px; width:auto;">
                            <defs>
                                <linearGradient id="bagGold" x1="0" y1="0" x2="1" y2="1">
                                    <stop offset="0%"   stop-color="#e8c98a"/>
                                    <stop offset="50%"  stop-color="#c9a96e"/>
                                    <stop offset="100%" stop-color="#a07840"/>
                                </linearGradient>
                                <linearGradient id="gemRuby" x1="0" y1="0" x2="1" y2="1">
                                    <stop offset="0%"   stop-color="#e8728a"/>
                                    <stop offset="100%" stop-color="#9b2040"/>
                                </linearGradient>
                                <linearGradient id="gemSapphire" x1="0" y1="0" x2="1" y2="1">
                                    <stop offset="0%"   stop-color="#8ab4e8"/>
                                    <stop offset="100%" stop-color="#2060c0"/>
                                </linearGradient>
                                <linearGradient id="gemEmerald" x1="0" y1="0" x2="1" y2="1">
                                    <stop offset="0%"   stop-color="#7adba0"/>
                                    <stop offset="100%" stop-color="#1a7a40"/>
                                </linearGradient>
                                <filter id="glow">
                                    <feGaussianBlur stdDeviation="0.8" result="blur"/>
                                    <feMerge><feMergeNode in="blur"/><feMergeNode in="SourceGraphic"/></feMerge>
                                </filter>
                            </defs>
                            <!-- BAG BODY -->
                            <rect x="6" y="22" width="42" height="30" rx="4" fill="url(#bagGold)"/>
                            <rect x="6" y="22" width="42" height="8"  rx="4" fill="rgba(255,255,255,0.18)"/>
                            <!-- BAG FLAP -->
                            <path d="M8 22 Q27 14 46 22" stroke="url(#bagGold)" stroke-width="2" fill="rgba(200,169,110,0.3)"/>
                            <!-- CLASP -->
                            <circle cx="27" cy="32" r="4.5" fill="#1a1410" stroke="url(#bagGold)" stroke-width="1.2"/>
                            <circle cx="27" cy="32" r="2"   fill="url(#bagGold)"/>
                            <!-- HANDLE -->
                            <path d="M15 22 Q15 10 27 10 Q39 10 39 22" stroke="url(#bagGold)" stroke-width="2" fill="none" stroke-linecap="round"/>
                            <!-- GEMS -->
                            <polygon points="10,25 13,22 16,25 13,28" fill="url(#gemRuby)"     filter="url(#glow)"/>
                            <line x1="11" y1="24" x2="13" y2="22" stroke="rgba(255,255,255,0.5)" stroke-width="0.5"/>
                            <polygon points="20,24 23,21 26,24 23,27" fill="url(#gemSapphire)" filter="url(#glow)"/>
                            <line x1="21" y1="23" x2="23" y2="21" stroke="rgba(255,255,255,0.5)" stroke-width="0.5"/>
                            <polygon points="30,24 33,21 36,24 33,27" fill="url(#gemEmerald)"  filter="url(#glow)"/>
                            <line x1="31" y1="23" x2="33" y2="21" stroke="rgba(255,255,255,0.5)" stroke-width="0.5"/>
                            <polygon points="38,25 41,22 44,25 41,28" fill="url(#gemRuby)"     filter="url(#glow)"/>
                            <line x1="39" y1="24" x2="41" y2="22" stroke="rgba(255,255,255,0.5)" stroke-width="0.5"/>
                            <circle cx="14" cy="40" r="1.5" fill="url(#gemSapphire)" opacity="0.7"/>
                            <circle cx="40" cy="40" r="1.5" fill="url(#gemRuby)"     opacity="0.7"/>
                            <circle cx="27" cy="46" r="1.5" fill="url(#gemEmerald)"  opacity="0.7"/>
                            <!-- WORDMARK -->
                            <text x="58" y="34"
                                  font-family="'Playfair Display', Georgia, serif"
                                  font-size="18" font-style="italic" font-weight="400"
                                  fill="#1a1410" letter-spacing="1">Maison</text>
                            <text x="59" y="50"
                                  font-family="'Didact Gothic', Helvetica, sans-serif"
                                  font-size="8" font-weight="400"
                                  fill="#c9a96e" letter-spacing="5">ÉLÉGANCE</text>
                        </svg>
                    </a>
                </div>

                {{-- DESKTOP MENU --}}
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="{{ route('home') }}"
                       style="font-family:'Didact Gothic',sans-serif; font-size:0.75rem; letter-spacing:2px; text-transform:uppercase;"
                       class="text-gray-700 hover:text-yellow-700 transition-colors {{ request()->routeIs('home') ? 'text-yellow-700' : '' }}">
                        Ana Sayfa
                    </a>

                    <div @mouseenter="megaMenuOpen = true" @mouseleave="megaMenuOpen = false" class="relative">
                        <button style="font-family:'Didact Gothic',sans-serif; font-size:0.75rem; letter-spacing:2px; text-transform:uppercase;"
                                class="text-gray-700 hover:text-yellow-700 transition-colors flex items-center gap-1">
                            Kategoriler
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="megaMenuOpen" x-cloak x-transition class="absolute left-0 mt-2 w-screen max-w-md">
                            <div class="rounded shadow-2xl bg-white border border-gray-100">
                                <div class="p-6 grid grid-cols-2 gap-3">
                                    @php $navCategories = \App\Models\Category::all(); @endphp
                                    @foreach($navCategories as $category)
                                    <a href="{{ route('products.index', ['category' => $category->slug]) }}"
                                       class="flex items-center p-3 hover:bg-amber-50 transition-colors group">
                                        <div>
                                            <p style="font-size:0.78rem; letter-spacing:1px; text-transform:uppercase;"
                                               class="font-medium text-gray-800 group-hover:text-yellow-700 transition-colors">
                                                {{ $category->name }}
                                            </p>
                                            <p class="text-xs text-gray-400 mt-0.5">{{ $category->products_count ?? 0 }} ürün</p>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('products.index') }}"
                       style="font-family:'Didact Gothic',sans-serif; font-size:0.75rem; letter-spacing:2px; text-transform:uppercase;"
                       class="text-gray-700 hover:text-yellow-700 transition-colors">
                        Tüm Ürünler
                    </a>

                    <a href="{{ route('products.index', ['indirim' => 1]) }}"
                       style="font-family:'Didact Gothic',sans-serif; font-size:0.75rem; letter-spacing:2px; text-transform:uppercase; color:#9b4a5a;"
                       class="hover:opacity-70 transition-opacity font-medium">
                        İndirimler
                    </a>

                    @auth
                        <a href="{{ route('favorites.index') }}"
                           style="font-family:'Didact Gothic',sans-serif; font-size:0.75rem; letter-spacing:2px; text-transform:uppercase;"
                           class="text-gray-700 hover:text-yellow-700 transition-colors">Favorilerim</a>
                        <a href="{{ route('orders.index') }}"
                           style="font-family:'Didact Gothic',sans-serif; font-size:0.75rem; letter-spacing:2px; text-transform:uppercase;"
                           class="text-gray-700 hover:text-yellow-700 transition-colors">Siparişlerim</a>
                    @endauth
                </div>

                {{-- ICONS --}}
                <div class="flex items-center space-x-3">

                    <button @click="searchOpen = !searchOpen" class="p-2 text-gray-600 hover:text-yellow-700 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>

                    @auth
                        <a href="{{ route('favorites.index') }}" class="hidden md:block p-2 text-gray-600 hover:text-yellow-700 transition-colors relative">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                            @if(Auth::user()->favorites->count() > 0)
                                <span class="absolute -top-1 -right-1 w-4 h-4 flex items-center justify-center rounded-full text-white text-xs" style="background:#9b4a5a; font-size:0.55rem;">
                                    {{ Auth::user()->favorites->count() }}
                                </span>
                            @endif
                        </a>
                    @endauth

                    <a href="{{ route('cart.index') }}" class="relative p-2 text-gray-600 hover:text-yellow-700 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        @auth
                            @if(Auth::user()->getCartItemsCount() > 0)
                                <span class="absolute -top-1 -right-1 w-4 h-4 flex items-center justify-center rounded-full text-white text-xs" style="background:#9b4a5a; font-size:0.55rem;">
                                    {{ Auth::user()->getCartItemsCount() }}
                                </span>
                            @endif
                        @endauth
                    </a>

                    @auth
                        <div class="hidden md:block relative group">
                            <button class="flex items-center">
                                <div class="w-8 h-8 flex items-center justify-center text-sm font-medium border"
                                     style="border-color:#c9a96e; color:#c9a96e; font-family:'Playfair Display',serif; font-style:italic;">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 shadow-xl bg-white border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                                <div class="py-2">
                                    <div class="px-4 py-3 border-b border-gray-50">
                                        <p class="text-sm font-medium text-gray-900" style="font-family:'Playfair Display',serif; font-style:italic;">{{ Auth::user()->name }}</p>
                                        <p class="text-xs text-gray-400 truncate mt-0.5">{{ Auth::user()->email }}</p>
                                    </div>
                                    <a href="{{ route('profile.index') }}" class="block px-4 py-2 text-xs text-gray-600 hover:bg-amber-50 tracking-widest uppercase">Hesabım</a>
                                    <a href="{{ route('orders.index') }}"  class="block px-4 py-2 text-xs text-gray-600 hover:bg-amber-50 tracking-widest uppercase">Siparişlerim</a>
                                    <a href="{{ route('favorites.index') }}" class="block px-4 py-2 text-xs text-gray-600 hover:bg-amber-50 tracking-widest uppercase">Favorilerim</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="w-full text-left px-4 py-2 text-xs tracking-widest uppercase hover:bg-amber-50" style="color:#9b4a5a;">Çıkış</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="hidden md:flex items-center space-x-3">
                            <a href="{{ route('login') }}"
                               style="font-size:0.7rem; letter-spacing:2px; text-transform:uppercase; color:#6b6560;"
                               class="hover:text-yellow-700 transition-colors">Giriş</a>
                            <a href="{{ route('register') }}"
                               style="font-size:0.7rem; letter-spacing:2px; text-transform:uppercase; background:#1a1410; color:#f0ebe3; padding:0.5rem 1.2rem;"
                               class="hover:opacity-80 transition-opacity">Üye Ol</a>
                        </div>
                    @endauth

                    <button @click="open = !open" class="lg:hidden p-2 text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path :class="{'hidden': open}"  stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/>
                            <path :class="{'hidden': !open}" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- ── SEARCH BAR ── --}}
    <div x-show="searchOpen" x-cloak x-transition class="border-t bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <form action="{{ route('products.index') }}" method="GET" class="relative">
                <svg class="absolute left-4 top-3.5 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" name="q" placeholder="Ürün ara..."
                       class="w-full pl-11 pr-5 py-3 border border-gray-200 text-sm focus:outline-none focus:border-yellow-600"
                       style="border-radius:0;">
            </form>
        </div>
    </div>

    {{-- ── MOBILE MENU ── --}}
    <div x-show="open" x-cloak x-transition class="lg:hidden border-t" style="background:#faf8f5;">
        <div class="px-4 py-4 space-y-1">
            <a href="{{ route('home') }}"            class="block px-3 py-2 text-xs tracking-widest uppercase text-gray-700 hover:text-yellow-700">Ana Sayfa</a>
            <a href="{{ route('products.index') }}"  class="block px-3 py-2 text-xs tracking-widest uppercase text-gray-700 hover:text-yellow-700">Tüm Ürünler</a>
            <a href="{{ route('products.index', ['indirim' => 1]) }}" class="block px-3 py-2 text-xs tracking-widest uppercase font-medium" style="color:#9b4a5a;">İndirimler</a>
            @auth
                <a href="{{ route('favorites.index') }}" class="block px-3 py-2 text-xs tracking-widest uppercase text-gray-700 hover:text-yellow-700">Favorilerim</a>
                <a href="{{ route('orders.index') }}"    class="block px-3 py-2 text-xs tracking-widest uppercase text-gray-700 hover:text-yellow-700">Siparişlerim</a>
                <a href="{{ route('cart.index') }}"      class="block px-3 py-2 text-xs tracking-widest uppercase text-gray-700 hover:text-yellow-700">Sepetim</a>
            @else
                <a href="{{ route('login') }}"    class="block px-3 py-2 text-xs tracking-widest uppercase text-gray-700">Giriş</a>
                <a href="{{ route('register') }}" class="block px-3 py-2 text-xs tracking-widest uppercase text-white" style="background:#1a1410;">Üye Ol</a>
            @endauth
        </div>
    </div>

</nav>