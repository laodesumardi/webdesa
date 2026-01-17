<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Website Resmi Pemerintah Desa">
    <title>@yield('title', 'Website Resmi Pemerintah Desa')</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">
    <!-- Header -->
    <header class="bg-[#1e3a8a] text-white header-animate">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center gap-4">
                <!-- Logo -->
                <div class="logo-animate bg-white text-[#1e3a8a] px-3 py-2 rounded flex items-center justify-center">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <!-- Nama Desa -->
                <div class="header-text-animate">
                    <h1 class="text-xl md:text-2xl font-bold">Pemerintah Desa</h1>
                    <p class="text-sm text-blue-100">Website Resmi Informasi Desa</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigasi Sticky -->
    <nav id="sticky-nav" class="sticky top-0 z-50 bg-gradient-to-r from-blue-800 to-blue-900 text-white transition-all duration-300 nav-animate shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between">
                <!-- Menu Desktop -->
                <div class="hidden lg:flex items-center gap-1">
                    <a href="{{ route('beranda') }}" class="menu-item-animate px-4 py-3 text-sm font-semibold hover:bg-[#1e3a8a] transition-all rounded-lg {{ request()->routeIs('beranda') ? 'bg-[#1e3a8a] shadow-md' : '' }}">Beranda</a>
                    <a href="{{ route('profil') }}" class="menu-item-animate px-4 py-3 text-sm font-semibold hover:bg-[#1e3a8a] transition-all rounded-lg {{ request()->routeIs('profil') ? 'bg-[#1e3a8a] shadow-md' : '' }}">Profil</a>
                    <a href="{{ route('pemerintahan') }}" class="menu-item-animate px-4 py-3 text-sm font-semibold hover:bg-[#1e3a8a] transition-all rounded-lg {{ request()->routeIs('pemerintahan') ? 'bg-[#1e3a8a] shadow-md' : '' }}">Pemerintahan</a>
                    <a href="{{ route('berita') }}" class="menu-item-animate px-4 py-3 text-sm font-semibold hover:bg-[#1e3a8a] transition-all rounded-lg {{ request()->routeIs('berita') ? 'bg-[#1e3a8a] shadow-md' : '' }}">Berita</a>
                    <a href="{{ route('layanan') }}" class="menu-item-animate px-4 py-3 text-sm font-semibold hover:bg-[#1e3a8a] transition-all rounded-lg {{ request()->routeIs('layanan') ? 'bg-[#1e3a8a] shadow-md' : '' }}">Layanan</a>
                    <a href="{{ route('data') }}" class="menu-item-animate px-4 py-3 text-sm font-semibold hover:bg-[#1e3a8a] transition-all rounded-lg {{ request()->routeIs('data') ? 'bg-[#1e3a8a] shadow-md' : '' }}">Data</a>
                    <a href="{{ route('galeri') }}" class="menu-item-animate px-4 py-3 text-sm font-semibold hover:bg-[#1e3a8a] transition-all rounded-lg {{ request()->routeIs('galeri') ? 'bg-[#1e3a8a] shadow-md' : '' }}">Galeri</a>
                    <a href="{{ route('umkm') }}" class="menu-item-animate px-4 py-3 text-sm font-semibold hover:bg-[#1e3a8a] transition-all rounded-lg {{ request()->routeIs('umkm') ? 'bg-[#1e3a8a] shadow-md' : '' }}">UMKM</a>
                    <a href="{{ route('kontak') }}" class="menu-item-animate px-4 py-3 text-sm font-semibold hover:bg-[#1e3a8a] transition-all rounded-lg {{ request()->routeIs('kontak') ? 'bg-[#1e3a8a] shadow-md' : '' }}">Kontak</a>
                </div>
                <!-- Menu Tablet/Mobile Compact -->
                <div class="hidden md:flex lg:hidden items-center gap-1 overflow-x-auto scrollbar-hide">
                    <a href="{{ route('beranda') }}" class="menu-item-animate px-3 py-2.5 text-xs font-semibold hover:bg-[#1e3a8a] transition-all rounded-lg flex-shrink-0 {{ request()->routeIs('beranda') ? 'bg-[#1e3a8a] shadow-md' : '' }}">Beranda</a>
                    <a href="{{ route('profil') }}" class="menu-item-animate px-3 py-2.5 text-xs font-semibold hover:bg-[#1e3a8a] transition-all rounded-lg flex-shrink-0 {{ request()->routeIs('profil') ? 'bg-[#1e3a8a] shadow-md' : '' }}">Profil</a>
                    <a href="{{ route('pemerintahan') }}" class="menu-item-animate px-3 py-2.5 text-xs font-semibold hover:bg-[#1e3a8a] transition-all rounded-lg flex-shrink-0 {{ request()->routeIs('pemerintahan') ? 'bg-[#1e3a8a] shadow-md' : '' }}">Pemerintahan</a>
                    <a href="{{ route('berita') }}" class="menu-item-animate px-3 py-2.5 text-xs font-semibold hover:bg-[#1e3a8a] transition-all rounded-lg flex-shrink-0 {{ request()->routeIs('berita') ? 'bg-[#1e3a8a] shadow-md' : '' }}">Berita</a>
                    <a href="{{ route('layanan') }}" class="menu-item-animate px-3 py-2.5 text-xs font-semibold hover:bg-[#1e3a8a] transition-all rounded-lg flex-shrink-0 {{ request()->routeIs('layanan') ? 'bg-[#1e3a8a] shadow-md' : '' }}">Layanan</a>
                    <a href="{{ route('data') }}" class="menu-item-animate px-3 py-2.5 text-xs font-semibold hover:bg-[#1e3a8a] transition-all rounded-lg flex-shrink-0 {{ request()->routeIs('data') ? 'bg-[#1e3a8a] shadow-md' : '' }}">Data</a>
                    <a href="{{ route('galeri') }}" class="menu-item-animate px-3 py-2.5 text-xs font-semibold hover:bg-[#1e3a8a] transition-all rounded-lg flex-shrink-0 {{ request()->routeIs('galeri') ? 'bg-[#1e3a8a] shadow-md' : '' }}">Galeri</a>
                    <a href="{{ route('umkm') }}" class="menu-item-animate px-3 py-2.5 text-xs font-semibold hover:bg-[#1e3a8a] transition-all rounded-lg flex-shrink-0 {{ request()->routeIs('umkm') ? 'bg-[#1e3a8a] shadow-md' : '' }}">UMKM</a>
                    <a href="{{ route('kontak') }}" class="menu-item-animate px-3 py-2.5 text-xs font-semibold hover:bg-[#1e3a8a] transition-all rounded-lg flex-shrink-0 {{ request()->routeIs('kontak') ? 'bg-[#1e3a8a] shadow-md' : '' }}">Kontak</a>
                </div>
                <!-- Tombol Mobile Menu -->
                <button id="mobile-menu-btn" class="md:hidden p-2.5 hover:bg-[#1e3a8a] transition-all rounded-lg">
                    <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <!-- Menu Mobile -->
            <div id="mobile-menu" class="hidden md:hidden border-t border-blue-700/50 bg-blue-900/50 backdrop-blur-sm mobile-menu-dropdown">
                <div class="py-3">
                    <a href="{{ route('beranda') }}" class="block px-5 py-4.5 hover:bg-[#1e3a8a] transition-all min-h-[56px] flex items-center {{ request()->routeIs('beranda') ? 'bg-[#1e3a8a] border-l-4 border-white' : '' }}">
                        <span class="font-semibold text-base">Beranda</span>
                    </a>
                    <a href="{{ route('profil') }}" class="block px-5 py-4.5 hover:bg-[#1e3a8a] transition-all min-h-[56px] flex items-center {{ request()->routeIs('profil') ? 'bg-[#1e3a8a] border-l-4 border-white' : '' }}">
                        <span class="font-semibold text-base">Profil Desa</span>
                    </a>
                    <a href="{{ route('pemerintahan') }}" class="block px-5 py-4.5 hover:bg-[#1e3a8a] transition-all min-h-[56px] flex items-center {{ request()->routeIs('pemerintahan') ? 'bg-[#1e3a8a] border-l-4 border-white' : '' }}">
                        <span class="font-semibold text-base">Pemerintahan</span>
                    </a>
                    <a href="{{ route('berita') }}" class="block px-5 py-4.5 hover:bg-[#1e3a8a] transition-all min-h-[56px] flex items-center {{ request()->routeIs('berita') ? 'bg-[#1e3a8a] border-l-4 border-white' : '' }}">
                        <span class="font-semibold text-base">Berita</span>
                    </a>
                    <a href="{{ route('layanan') }}" class="block px-5 py-4.5 hover:bg-[#1e3a8a] transition-all min-h-[56px] flex items-center {{ request()->routeIs('layanan') ? 'bg-[#1e3a8a] border-l-4 border-white' : '' }}">
                        <span class="font-semibold text-base">Layanan</span>
                    </a>
                    <a href="{{ route('data') }}" class="block px-5 py-4.5 hover:bg-[#1e3a8a] transition-all min-h-[56px] flex items-center {{ request()->routeIs('data') ? 'bg-[#1e3a8a] border-l-4 border-white' : '' }}">
                        <span class="font-semibold text-base">Data Desa</span>
                    </a>
                    <a href="{{ route('galeri') }}" class="block px-5 py-4.5 hover:bg-[#1e3a8a] transition-all min-h-[56px] flex items-center {{ request()->routeIs('galeri') ? 'bg-[#1e3a8a] border-l-4 border-white' : '' }}">
                        <span class="font-semibold text-base">Galeri</span>
                    </a>
                    <a href="{{ route('umkm') }}" class="block px-5 py-4.5 hover:bg-[#1e3a8a] transition-all min-h-[56px] flex items-center {{ request()->routeIs('umkm') ? 'bg-[#1e3a8a] border-l-4 border-white' : '' }}">
                        <span class="font-semibold text-base">Ekonomi & UMKM</span>
                    </a>
                    <a href="{{ route('kontak') }}" class="block px-5 py-4.5 hover:bg-[#1e3a8a] transition-all min-h-[56px] flex items-center {{ request()->routeIs('kontak') ? 'bg-[#1e3a8a] border-l-4 border-white' : '' }}">
                        <span class="font-semibold text-base">Kontak</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="container mx-auto px-4 py-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-12">
        <div class="container mx-auto px-4 py-8 md:py-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8 mb-8">
                <!-- Informasi Desa -->
                <div>
                    <h3 class="text-lg font-bold text-white mb-4 pb-2 border-b border-gray-700">Informasi Desa</h3>
                    <div class="space-y-2 text-sm text-gray-300">
                        <p class="font-semibold text-white">Pemerintah Desa</p>
                        <p>Website Resmi Informasi Desa</p>
                        <p class="mt-3">
                            Jalan Raya Desa No. 123<br>
                            Kecamatan, Kabupaten<br>
                            Provinsi<br>
                            Kode Pos 12345
                        </p>
                    </div>
                </div>

                <!-- Link Cepat -->
                <div>
                    <h3 class="text-lg font-bold text-white mb-4 pb-2 border-b border-gray-700">Link Cepat</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('beranda') }}" class="text-gray-300 hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="{{ route('profil') }}" class="text-gray-300 hover:text-white transition-colors">Profil Desa</a></li>
                        <li><a href="{{ route('pemerintahan') }}" class="text-gray-300 hover:text-white transition-colors">Pemerintahan Desa</a></li>
                        <li><a href="{{ route('berita') }}" class="text-gray-300 hover:text-white transition-colors">Berita & Pengumuman</a></li>
                        <li><a href="{{ route('layanan') }}" class="text-gray-300 hover:text-white transition-colors">Layanan Desa</a></li>
                        <li><a href="{{ route('data') }}" class="text-gray-300 hover:text-white transition-colors">Data Desa</a></li>
                        <li><a href="{{ route('galeri') }}" class="text-gray-300 hover:text-white transition-colors">Galeri</a></li>
                        <li><a href="{{ route('umkm') }}" class="text-gray-300 hover:text-white transition-colors">Ekonomi & UMKM</a></li>
                        <li><a href="{{ route('kontak') }}" class="text-gray-300 hover:text-white transition-colors">Kontak & Aspirasi</a></li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div>
                    <h3 class="text-lg font-bold text-white mb-4 pb-2 border-b border-gray-700">Kontak</h3>
                    <div class="space-y-3 text-sm text-gray-300">
                        <div>
                            <p class="font-semibold text-white mb-1">Telepon</p>
                            <p><a href="tel:02112345678" class="hover:text-white transition-colors">(021) 1234-5678</a></p>
                        </div>
                        <div>
                            <p class="font-semibold text-white mb-1">Email</p>
                            <p><a href="mailto:info@desa.go.id" class="hover:text-white transition-colors">info@desa.go.id</a></p>
                        </div>
                        <div>
                            <p class="font-semibold text-white mb-1">Jam Pelayanan</p>
                            <p>Senin - Jumat<br>08:00 - 15:00 WIB</p>
                        </div>
                    </div>
                </div>

                <!-- Informasi Penting -->
                <div>
                    <h3 class="text-lg font-bold text-white mb-4 pb-2 border-b border-gray-700">Informasi Penting</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('darurat') }}" class="text-gray-300 hover:text-white transition-colors">Darurat & Keamanan</a></li>
                        <li><a href="{{ route('kesehatan') }}" class="text-gray-300 hover:text-white transition-colors">Kesehatan & Sosial</a></li>
                        <li><a href="{{ route('kontak') }}" class="text-gray-300 hover:text-white transition-colors">Formulir Aspirasi</a></li>
                        <li><a href="{{ route('layanan') }}" class="text-gray-300 hover:text-white transition-colors">Pengajuan Layanan</a></li>
                    </ul>
                    <div class="mt-4 pt-4 border-t border-gray-700">
                        <p class="text-xs text-gray-400">
                            <strong>Kontak Darurat:</strong><br>
                            Polisi: <a href="tel:110" class="hover:text-white">110</a> | 
                            Pemadam: <a href="tel:113" class="hover:text-white">113</a> | 
                            Ambulans: <a href="tel:119" class="hover:text-white">119</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-700 pt-6">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-gray-400">
                    <p>&copy; {{ date('Y') }} Pemerintah Desa. Hak Cipta Dilindungi.</p>
                    <p>Website Resmi Pemerintah Desa - Dibangun untuk Masyarakat</p>
                </div>
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

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
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

        /* Skeleton Loading Styles */
        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: skeleton-loading 1.5s ease-in-out infinite;
            border-radius: 4px;
        }

        .skeleton-text {
            height: 1rem;
            margin-bottom: 0.5rem;
        }

        .skeleton-title {
            height: 1.5rem;
            margin-bottom: 1rem;
            width: 60%;
        }

        .skeleton-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 4px;
            padding: 1.5rem;
        }

        .skeleton-image {
            width: 100%;
            height: 200px;
            border-radius: 4px;
        }

        .skeleton-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
        }

        @keyframes skeleton-loading {
            0% {
                background-position: 200% 0;
            }
            100% {
                background-position: -200% 0;
            }
        }

        .skeleton-content {
            display: none;
        }

        .skeleton-content.show {
            display: block;
        }

        .skeleton-wrapper.hide .skeleton {
            display: none;
        }

        /* Hide Scrollbar */
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        /* Mobile Menu Dropdown Animation */
        .mobile-menu-dropdown {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            padding-top: 0;
            padding-bottom: 0;
            transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1), 
                        opacity 0.3s ease-out, 
                        padding-top 0.3s ease-out,
                        padding-bottom 0.3s ease-out;
            -webkit-transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1), 
                              opacity 0.3s ease-out, 
                              padding-top 0.3s ease-out,
                              padding-bottom 0.3s ease-out;
        }

        .mobile-menu-dropdown.show {
            max-height: 1200px;
            opacity: 1;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }

        .mobile-menu-dropdown a {
            transform: translateX(-20px);
            opacity: 0;
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
            -webkit-transition: transform 0.3s ease-out, opacity 0.3s ease-out;
        }

        .mobile-menu-dropdown.show a {
            transform: translateX(0);
            -webkit-transform: translateX(0);
            opacity: 1;
        }

        .mobile-menu-dropdown.show a:nth-child(1) { transition-delay: 0.05s; -webkit-transition-delay: 0.05s; }
        .mobile-menu-dropdown.show a:nth-child(2) { transition-delay: 0.1s; -webkit-transition-delay: 0.1s; }
        .mobile-menu-dropdown.show a:nth-child(3) { transition-delay: 0.15s; -webkit-transition-delay: 0.15s; }
        .mobile-menu-dropdown.show a:nth-child(4) { transition-delay: 0.2s; -webkit-transition-delay: 0.2s; }
        .mobile-menu-dropdown.show a:nth-child(5) { transition-delay: 0.25s; -webkit-transition-delay: 0.25s; }
        .mobile-menu-dropdown.show a:nth-child(6) { transition-delay: 0.3s; -webkit-transition-delay: 0.3s; }
        .mobile-menu-dropdown.show a:nth-child(7) { transition-delay: 0.35s; -webkit-transition-delay: 0.35s; }
        .mobile-menu-dropdown.show a:nth-child(8) { transition-delay: 0.4s; -webkit-transition-delay: 0.4s; }
        .mobile-menu-dropdown.show a:nth-child(9) { transition-delay: 0.45s; -webkit-transition-delay: 0.45s; }
        .mobile-menu-dropdown.show a:nth-child(10) { transition-delay: 0.5s; -webkit-transition-delay: 0.5s; }
        .mobile-menu-dropdown.show a:nth-child(11) { transition-delay: 0.55s; -webkit-transition-delay: 0.55s; }
    </style>
    <script>
        // Toggle Mobile Menu dengan Animasi Smooth (Compatible dengan Android)
        document.addEventListener('DOMContentLoaded', function() {
            const menuBtn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            const menuIcon = document.getElementById('menu-icon');
            const closeIcon = document.getElementById('close-icon');
            
            if (!menuBtn || !menu || !menuIcon || !closeIcon) return;
            
            let isMenuOpen = false;
            
            function openMenu() {
                if (isMenuOpen) return;
                isMenuOpen = true;
                menu.classList.remove('hidden');
                // Force reflow untuk memastikan animasi berjalan
                void menu.offsetHeight;
                setTimeout(function() {
                    menu.classList.add('show');
                }, 10);
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            }
            
            function closeMenu() {
                if (!isMenuOpen) return;
                isMenuOpen = false;
                menu.classList.remove('show');
                setTimeout(function() {
                    menu.classList.add('hidden');
                }, 400);
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
            
            function toggleMenu(e) {
                if (e) {
                    e.preventDefault();
                    e.stopPropagation();
                }
                if (isMenuOpen) {
                    closeMenu();
                } else {
                    openMenu();
                }
            }
            
            // Support untuk click dan touch events (Android)
            menuBtn.addEventListener('click', toggleMenu);
            menuBtn.addEventListener('touchend', toggleMenu);
            
            // Tutup menu saat klik di luar atau saat klik link
            document.addEventListener('click', function(e) {
                if (isMenuOpen && !menuBtn.contains(e.target) && !menu.contains(e.target)) {
                    closeMenu();
                }
            });
            
            // Tutup menu saat klik link di dalam menu
            const menuLinks = menu.querySelectorAll('a');
            menuLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    setTimeout(closeMenu, 100);
                });
            });
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
