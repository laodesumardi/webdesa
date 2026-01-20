<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Website Resmi Pemerintah Desa">
    <title>@yield('title', 'Website Resmi Pemerintah Desa')</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
@php
    use App\Models\Content;
    $headerNamaDesa = Content::getContent('beranda', 'header_website', 'nama_desa', 'Pemerintah Desa');
    $headerSubtitle = Content::getContent('beranda', 'header_website', 'subtitle', 'Website Resmi Informasi Desa');
    
    // Find header background image with any extension
    $headerBgImage = null;
    $extensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
    foreach ($extensions as $ext) {
        if (file_exists(public_path('images/header-bg.' . $ext))) {
            $headerBgImage = asset('images/header-bg.' . $ext);
            break;
        }
    }
    if (!$headerBgImage) {
        $headerBgImage = 'https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?w=1920&q=80';
    }
@endphp
<body class="bg-gray-50">
    <!-- Header -->
    <header class="relative bg-[#1e3a8a] text-white header-animate overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 header-bg"></div>
        <div class="container mx-auto px-4 py-8 md:py-12 relative z-10">
            <div class="flex items-center gap-4 md:gap-6">
                <!-- Logo -->
                <div class="logo-animate bg-white text-[#1e3a8a] px-4 py-3 md:px-5 md:py-4 rounded-lg flex items-center justify-center shadow-lg">
                    <svg class="w-12 h-12 md:w-16 md:h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <!-- Nama Desa -->
                <div class="header-text-animate flex-1">
                    <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-1 drop-shadow-lg">{{ $headerNamaDesa }}</h1>
                    <p class="text-sm md:text-base text-blue-100 drop-shadow-md">{{ $headerSubtitle }}</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigasi Sticky -->
    <nav id="sticky-nav" class="sticky top-0 z-50 bg-blue-900 text-white shadow-lg nav-animate">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between">
                <!-- Menu Desktop -->
                <div class="hidden md:flex flex-wrap">
                    <a href="{{ route('beranda') }}" class="menu-item-animate px-4 py-3 text-sm font-medium hover:bg-[#1e3a8a] transition-colors {{ request()->routeIs('beranda') ? 'bg-[#1e3a8a] border-b-2 border-white' : '' }}">Beranda</a>
                    <a href="{{ route('profil') }}" class="menu-item-animate px-4 py-3 text-sm font-medium hover:bg-[#1e3a8a] transition-colors {{ request()->routeIs('profil') ? 'bg-[#1e3a8a] border-b-2 border-white' : '' }}">Profil Desa</a>
                    <a href="{{ route('pemerintahan') }}" class="menu-item-animate px-4 py-3 text-sm font-medium hover:bg-[#1e3a8a] transition-colors {{ request()->routeIs('pemerintahan') ? 'bg-[#1e3a8a] border-b-2 border-white' : '' }}">Pemerintahan</a>
                    <a href="{{ route('berita') }}" class="menu-item-animate px-4 py-3 text-sm font-medium hover:bg-[#1e3a8a] transition-colors {{ request()->routeIs('berita') ? 'bg-[#1e3a8a] border-b-2 border-white' : '' }}">Berita</a>
                    <a href="{{ route('layanan') }}" class="menu-item-animate px-4 py-3 text-sm font-medium hover:bg-[#1e3a8a] transition-colors {{ request()->routeIs('layanan') ? 'bg-[#1e3a8a] border-b-2 border-white' : '' }}">Layanan</a>
                    <a href="{{ route('data') }}" class="menu-item-animate px-4 py-3 text-sm font-medium hover:bg-[#1e3a8a] transition-colors {{ request()->routeIs('data') ? 'bg-[#1e3a8a] border-b-2 border-white' : '' }}">Statistik</a>
                    <a href="{{ route('galeri') }}" class="menu-item-animate px-4 py-3 text-sm font-medium hover:bg-[#1e3a8a] transition-colors {{ request()->routeIs('galeri') ? 'bg-[#1e3a8a] border-b-2 border-white' : '' }}">Galeri</a>
                    <a href="{{ route('umkm') }}" class="menu-item-animate px-4 py-3 text-sm font-medium hover:bg-[#1e3a8a] transition-colors {{ request()->routeIs('umkm') ? 'bg-[#1e3a8a] border-b-2 border-white' : '' }}">Ekonomi & UMKM</a>
                    <a href="{{ route('kontak') }}" class="menu-item-animate px-4 py-3 text-sm font-medium hover:bg-[#1e3a8a] transition-colors {{ request()->routeIs('kontak') ? 'bg-[#1e3a8a] border-b-2 border-white' : '' }}">Kontak</a>
                </div>
                <!-- Tombol Mobile Menu -->
                <button id="mobile-menu-btn" class="md:hidden p-3 hover:bg-[#1e3a8a] transition-colors rounded-lg -webkit-tap-highlight-color:transparent" aria-label="Toggle menu" style="-webkit-tap-highlight-color: transparent;">
                    <svg id="menu-icon" class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg id="close-icon" class="w-7 h-7 text-white hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <!-- Menu Mobile -->
                <div id="mobile-menu" class="hidden md:hidden border-t border-blue-600 mobile-menu-container bg-white">
                    <a href="{{ route('beranda') }}" class="mobile-menu-item block px-5 py-3.5 text-base font-medium text-gray-800 hover:bg-[#1e3a8a] hover:text-white transition-colors border-b border-gray-100 {{ request()->routeIs('beranda') ? 'bg-[#1e3a8a] text-white' : '' }}">Beranda</a>
                    <a href="{{ route('profil') }}" class="mobile-menu-item block px-5 py-3.5 text-base font-medium text-gray-800 hover:bg-[#1e3a8a] hover:text-white transition-colors border-b border-gray-100 {{ request()->routeIs('profil') ? 'bg-[#1e3a8a] text-white' : '' }}">Profil Desa</a>
                    <a href="{{ route('pemerintahan') }}" class="mobile-menu-item block px-5 py-3.5 text-base font-medium text-gray-800 hover:bg-[#1e3a8a] hover:text-white transition-colors border-b border-gray-100 {{ request()->routeIs('pemerintahan') ? 'bg-[#1e3a8a] text-white' : '' }}">Pemerintahan Desa</a>
                    <a href="{{ route('berita') }}" class="mobile-menu-item block px-5 py-3.5 text-base font-medium text-gray-800 hover:bg-[#1e3a8a] hover:text-white transition-colors border-b border-gray-100 {{ request()->routeIs('berita') ? 'bg-[#1e3a8a] text-white' : '' }}">Berita & Pengumuman</a>
                    <a href="{{ route('layanan') }}" class="mobile-menu-item block px-5 py-3.5 text-base font-medium text-gray-800 hover:bg-[#1e3a8a] hover:text-white transition-colors border-b border-gray-100 {{ request()->routeIs('layanan') ? 'bg-[#1e3a8a] text-white' : '' }}">Layanan Desa</a>
                    <a href="{{ route('data') }}" class="mobile-menu-item block px-5 py-3.5 text-base font-medium text-gray-800 hover:bg-[#1e3a8a] hover:text-white transition-colors border-b border-gray-100 {{ request()->routeIs('data') ? 'bg-[#1e3a8a] text-white' : '' }}">Statistik</a>
                    <a href="{{ route('galeri') }}" class="mobile-menu-item block px-5 py-3.5 text-base font-medium text-gray-800 hover:bg-[#1e3a8a] hover:text-white transition-colors border-b border-gray-100 {{ request()->routeIs('galeri') ? 'bg-[#1e3a8a] text-white' : '' }}">Galeri</a>
                    <a href="{{ route('umkm') }}" class="mobile-menu-item block px-5 py-3.5 text-base font-medium text-gray-800 hover:bg-[#1e3a8a] hover:text-white transition-colors border-b border-gray-100 {{ request()->routeIs('umkm') ? 'bg-[#1e3a8a] text-white' : '' }}">Ekonomi & UMKM</a>
                    <a href="{{ route('kontak') }}" class="mobile-menu-item block px-5 py-3.5 text-base font-medium text-gray-800 hover:bg-[#1e3a8a] hover:text-white transition-colors border-b border-gray-100 {{ request()->routeIs('kontak') ? 'bg-[#1e3a8a] text-white' : '' }}">Kontak & Aspirasi</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-8 sm:pt-12 md:pt-16">
        @isset($slot)
            {{ $slot }}
        @else
            @yield('content')
        @endisset
    </main>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white mt-16">
        <div class="container mx-auto px-4 py-8 md:py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div>
                    <h3 class="text-lg font-bold text-white mb-4 pb-2 border-b border-gray-700">Tentang Desa</h3>
                    <p class="text-gray-300 text-sm leading-relaxed">
                        Website resmi Pemerintah Desa untuk menyampaikan informasi, kebijakan, dan layanan publik yang transparan dan akuntabel kepada seluruh masyarakat.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-white mb-4 pb-2 border-b border-gray-700">Link Cepat</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('beranda') }}" class="text-gray-300 hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="{{ route('profil') }}" class="text-gray-300 hover:text-white transition-colors">Profil Desa</a></li>
                        <li><a href="{{ route('berita') }}" class="text-gray-300 hover:text-white transition-colors">Berita & Pengumuman</a></li>
                        <li><a href="{{ route('layanan') }}" class="text-gray-300 hover:text-white transition-colors">Layanan Desa</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-white mb-4 pb-2 border-b border-gray-700">Informasi Penting</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('kontak') }}" class="text-gray-300 hover:text-white transition-colors">Formulir Aspirasi</a></li>
                        <li><a href="{{ route('layanan') }}" class="text-gray-300 hover:text-white transition-colors">Pengajuan Layanan</a></li>
                        <li><a href="{{ route('galeri') }}" class="text-gray-300 hover:text-white transition-colors">Galeri Kegiatan</a></li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-700 pt-6 text-center">
                <p class="text-sm text-gray-400">
                    &copy; {{ date('Y') }} Pemerintah Desa. Hak Cipta Dilindungi.
                </p>
            </div>
        </div>
    </footer>

    <style>
        /* Sticky Navigation dengan Shadow */
        #sticky-nav.scrolled {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        /* Header Animation */
        .header-animate {
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeInDown 0.8s ease-out forwards;
        }

        .logo-animate {
            opacity: 0;
            transform: scale(0.8) rotate(-10deg);
            animation: fadeInScale 0.8s ease-out 0.2s forwards;
        }

        .header-text-animate {
            opacity: 0;
            transform: translateX(-20px);
            animation: fadeInLeft 0.8s ease-out 0.3s forwards;
        }

        /* Navigation Animation */
        .nav-animate {
            opacity: 0;
            transform: translateY(-10px);
            animation: fadeInDown 0.6s ease-out 0.5s forwards;
        }

        .menu-item-animate {
            opacity: 0;
            transform: translateY(-10px);
            animation: fadeInUp 0.5s ease-out forwards;
        }

        .menu-item-animate.animated {
            opacity: 1;
            transform: translateY(0);
        }

        /* Header Background Image */
        .header-bg {
            background-image: url('{{ $headerBgImage }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        @media (max-width: 768px) {
            .header-bg {
                background-attachment: scroll;
            }
        }

        /* Mobile Menu Animation */
        .mobile-menu-container {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            -webkit-transition: max-height 0.3s ease-out;
        }

        .mobile-menu-container.show {
            max-height: 1000px;
        }

        .mobile-menu-item {
            opacity: 0;
            transform: translateX(-20px);
            transition: opacity 0.3s ease-out, transform 0.3s ease-out, background-color 0.2s ease-out, color 0.2s ease-out;
            -webkit-transition: opacity 0.3s ease-out, transform 0.3s ease-out, background-color 0.2s ease-out, color 0.2s ease-out;
            min-height: 48px; /* Minimum touch target size for Android */
            display: flex;
            align-items: center;
            -webkit-tap-highlight-color: rgba(30, 58, 138, 0.1);
        }

        .mobile-menu-container.show .mobile-menu-item {
            opacity: 1;
            transform: translateX(0);
            -webkit-transform: translateX(0);
        }
        
        /* Better touch feedback for Android */
        .mobile-menu-item:active {
            background-color: rgba(30, 58, 138, 0.2);
        }
        
        /* Improve mobile menu container */
        .mobile-menu-container {
            background-color: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .mobile-menu-container.show .mobile-menu-item:nth-child(1) { transition-delay: 0.05s; -webkit-transition-delay: 0.05s; }
        .mobile-menu-container.show .mobile-menu-item:nth-child(2) { transition-delay: 0.1s; -webkit-transition-delay: 0.1s; }
        .mobile-menu-container.show .mobile-menu-item:nth-child(3) { transition-delay: 0.15s; -webkit-transition-delay: 0.15s; }
        .mobile-menu-container.show .mobile-menu-item:nth-child(4) { transition-delay: 0.2s; -webkit-transition-delay: 0.2s; }
        .mobile-menu-container.show .mobile-menu-item:nth-child(5) { transition-delay: 0.25s; -webkit-transition-delay: 0.25s; }
        .mobile-menu-container.show .mobile-menu-item:nth-child(6) { transition-delay: 0.3s; -webkit-transition-delay: 0.3s; }
        .mobile-menu-container.show .mobile-menu-item:nth-child(7) { transition-delay: 0.35s; -webkit-transition-delay: 0.35s; }
        .mobile-menu-container.show .mobile-menu-item:nth-child(8) { transition-delay: 0.4s; -webkit-transition-delay: 0.4s; }
        .mobile-menu-container.show .mobile-menu-item:nth-child(9) { transition-delay: 0.45s; -webkit-transition-delay: 0.45s; }
        .mobile-menu-container.show .mobile-menu-item:nth-child(10) { transition-delay: 0.5s; -webkit-transition-delay: 0.5s; }
        .mobile-menu-container.show .mobile-menu-item:nth-child(11) { transition-delay: 0.55s; -webkit-transition-delay: 0.55s; }

        /* Keyframes */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.8) rotate(-10deg);
            }
            to {
                opacity: 1;
                transform: scale(1) rotate(0deg);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Hide Scrollbar */
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
    </style>
    <script>
        // Toggle Mobile Menu dengan Animasi
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            const menuIcon = document.getElementById('menu-icon');
            const closeIcon = document.getElementById('close-icon');
            
            if (menu.classList.contains('hidden')) {
                // Open menu
                menu.classList.remove('hidden');
                // Force reflow untuk memastikan animasi berjalan
                void menu.offsetHeight;
                setTimeout(function() {
                    menu.classList.add('show');
                }, 10);
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            } else {
                // Close menu
                menu.classList.remove('show');
                setTimeout(function() {
                    menu.classList.add('hidden');
                }, 300);
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        });

        // Sticky Navigation dengan Shadow saat Scroll
        window.addEventListener('scroll', function() {
            const stickyNav = document.getElementById('sticky-nav');
            const scrollPosition = window.scrollY;
            
            if (scrollPosition > 50) {
                stickyNav.classList.add('scrolled');
            } else {
                stickyNav.classList.remove('scrolled');
            }
        });

        // Menu Items Animation dengan Stagger
        document.addEventListener('DOMContentLoaded', function() {
            const menuItems = document.querySelectorAll('.menu-item-animate');
            menuItems.forEach((item, index) => {
                item.style.animationDelay = `${0.6 + (index * 0.05)}s`;
                setTimeout(() => {
                    item.classList.add('animated');
                }, 600 + (index * 50));
            });
        });
    </script>
</body>
</html>
