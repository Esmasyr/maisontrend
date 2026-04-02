<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profilim') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500&display=swap');

        .profile-wrapper {
            font-family: 'Jost', sans-serif;
            min-height: 100vh;
            background: #faf8f5;
            padding: 3rem 1rem;
        }

        .profile-container {
            max-width: 900px;
            margin: 0 auto;
        }

        /* Hero Card */
        .profile-hero {
            background: linear-gradient(135deg, #2c2c2c 0%, #1a1a1a 60%, #3d2b1f 100%);
            border-radius: 2px;
            padding: 3rem;
            display: flex;
            align-items: center;
            gap: 2.5rem;
            margin-bottom: 1.5rem;
            position: relative;
            overflow: hidden;
            animation: fadeSlideUp 0.6s ease forwards;
        }

        .profile-hero::before {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(212, 175, 120, 0.08);
        }

        .profile-hero::after {
            content: '';
            position: absolute;
            bottom: -40px;
            left: 30%;
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: rgba(212, 175, 120, 0.05);
        }

        .avatar-ring {
            flex-shrink: 0;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            border: 1.5px solid rgba(212, 175, 120, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .avatar-inner {
            width: 74px;
            height: 74px;
            border-radius: 50%;
            background: linear-gradient(135deg, #d4af78, #c49a5a);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            font-weight: 300;
            color: #1a1a1a;
            letter-spacing: 1px;
        }

        .profile-hero-info {
            flex: 1;
        }

        .profile-hero-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.2rem;
            font-weight: 300;
            color: #f5f0e8;
            letter-spacing: 2px;
            margin: 0 0 0.3rem;
            font-style: italic;
        }

        .profile-hero-email {
            color: rgba(212, 175, 120, 0.8);
            font-size: 0.85rem;
            font-weight: 300;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin: 0 0 1rem;
        }

        .verified-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: rgba(212, 175, 120, 0.12);
            border: 1px solid rgba(212, 175, 120, 0.3);
            color: #d4af78;
            font-size: 0.7rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 0.3rem 0.8rem;
            border-radius: 50px;
        }

        .unverified-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: rgba(200, 100, 80, 0.12);
            border: 1px solid rgba(200, 100, 80, 0.3);
            color: #c86450;
            font-size: 0.7rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 0.3rem 0.8rem;
            border-radius: 50px;
        }

        .badge-dot {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: currentColor;
        }

        /* Info Cards Grid */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            animation: fadeSlideUp 0.6s ease 0.1s both;
        }

        .info-card {
            background: #fff;
            border: 1px solid #ede9e3;
            border-radius: 2px;
            padding: 1.8rem 2rem;
        }

        .info-card-label {
            font-size: 0.65rem;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: #b0a898;
            margin-bottom: 0.6rem;
            font-weight: 500;
        }

        .info-card-value {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.3rem;
            color: #2c2c2c;
            font-weight: 400;
        }

        .info-card-sub {
            font-size: 0.75rem;
            color: #c0b8ae;
            margin-top: 0.3rem;
            letter-spacing: 0.5px;
        }

        /* Action Row */
        .action-row {
            display: flex;
            gap: 1rem;
            animation: fadeSlideUp 0.6s ease 0.2s both;
        }

        .btn-primary {
            flex: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            background: #2c2c2c;
            color: #f5f0e8;
            border: none;
            padding: 1rem 1.5rem;
            font-family: 'Jost', sans-serif;
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-decoration: none;
            border-radius: 2px;
            cursor: pointer;
            transition: background 0.25s ease, transform 0.15s ease;
        }

        .btn-primary:hover {
            background: #1a1a1a;
            transform: translateY(-1px);
            color: #d4af78;
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            background: transparent;
            color: #8a7e72;
            border: 1px solid #ddd8d0;
            padding: 1rem 1.5rem;
            font-family: 'Jost', sans-serif;
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-decoration: none;
            border-radius: 2px;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .btn-secondary:hover {
            border-color: #c86450;
            color: #c86450;
        }

        /* Status message */
        .status-msg {
            background: #f0ede8;
            border-left: 3px solid #d4af78;
            color: #5a5040;
            padding: 0.9rem 1.2rem;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            margin-bottom: 1.5rem;
            border-radius: 0 2px 2px 0;
            animation: fadeSlideUp 0.4s ease forwards;
        }

        /* Divider */
        .section-divider {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
            color: #c0b8ae;
            font-size: 0.65rem;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .section-divider::before,
        .section-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #ede9e3;
        }

        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 640px) {
            .profile-hero { flex-direction: column; text-align: center; padding: 2rem 1.5rem; }
            .info-grid    { grid-template-columns: 1fr; }
            .action-row   { flex-direction: column; }
        }
    </style>

    <div class="profile-wrapper">
        <div class="profile-container">

            {{-- Durum mesajı --}}
            @if (session('status') === 'profile-updated')
                <div class="status-msg">
                    ✓ &nbsp; Profil bilgileriniz başarıyla güncellendi.
                </div>
            @endif

            {{-- Hero Kart --}}
            <div class="profile-hero">
                <div class="avatar-ring">
                    <div class="avatar-inner">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                </div>
                <div class="profile-hero-info">
                    <h1 class="profile-hero-name">{{ $user->name }}</h1>
                    <p class="profile-hero-email">{{ $user->email }}</p>
                    @if ($user->email_verified_at)
                        <span class="verified-badge">
                            <span class="badge-dot"></span> Doğrulanmış Hesap
                        </span>
                    @else
                        <span class="unverified-badge">
                            <span class="badge-dot"></span> E-posta Doğrulanmadı
                        </span>
                    @endif
                </div>
            </div>

            {{-- Bilgi Kartları --}}
            <div class="info-grid">
                <div class="info-card">
                    <div class="info-card-label">Ad Soyad</div>
                    <div class="info-card-value">{{ $user->name }}</div>
                </div>
                <div class="info-card">
                    <div class="info-card-label">E-posta Adresi</div>
                    <div class="info-card-value" style="font-size:1rem; font-family:'Jost',sans-serif; color:#555;">
                        {{ $user->email }}
                    </div>
                    @if ($user->email_verified_at)
                        <div class="info-card-sub">
                            {{ $user->email_verified_at->format('d.m.Y') }} tarihinde doğrulandı
                        </div>
                    @else
                        <div class="info-card-sub" style="color:#c86450;">Henüz doğrulanmadı</div>
                    @endif
                </div>
                <div class="info-card">
                    <div class="info-card-label">Üyelik Tarihi</div>
                    <div class="info-card-value">{{ $user->created_at->format('d.m.Y') }}</div>
                    <div class="info-card-sub">{{ $user->created_at->diffForHumans() }} üye oldunuz</div>
                </div>
                <div class="info-card">
                    <div class="info-card-label">Son Güncelleme</div>
                    <div class="info-card-value">{{ $user->updated_at->format('d.m.Y') }}</div>
                    <div class="info-card-sub">{{ $user->updated_at->diffForHumans() }}</div>
                </div>
            </div>

            <div class="section-divider">işlemler</div>

            {{-- Aksiyon Butonları --}}
            <div class="action-row">
                <a href="{{ route('profile.edit') }}" class="btn-primary">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                    </svg>
                    Profili Düzenle
                </a>
                <a href="{{ route('dashboard') }}" class="btn-secondary">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                    Ana Sayfa
                </a>
            </div>

        </div>
    </div>
</x-app-layout>