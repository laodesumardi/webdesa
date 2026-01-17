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
    <header class="bg-green-800 text-white header-animate">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center gap-4">
                <!-- Logo -->
                <div class="logo-animate bg-white text-green-800 px-3 py-2 rounded flex items-center justify-center">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <!-- Nama Desa -->
                <div class="header-text-animate">
                    <h1 class="text-xl md:text-2xl font-bold">Pemerintah Desa</h1>
                    <p class="text-sm text-green-100">Website Resmi Informasi Desa</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigasi Sticky -->
    <nav id="sticky-nav" class="sticky top-0 z-50 bg-green-700 text-white transition-all duration-300 nav-animate">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between">
                <!-- Menu Desktop -->
                <div class="hidden md:flex flex-wrap">
                    <a href="{{ route('beranda') }}" class="menu-item-animate px-4 py-3 text-sm font-medium hover:bg-green-800 transition-colors {{ request()->routeIs('beranda') ? 'bg-green-900 border-b-2 border-white' : '' }}">Beranda</a>
                    <a href="{{ route('profil') }}" class="menu-item-animate px-4 py-3 text-sm font-medium hover:bg-green-800 transition-colors {{ request()->routeIs('profil') ? 'bg-green-900 border-b-2 border-white' : '' }}">Profil Desa</a>
                    <a href="{{ route('pemerintahan') }}" class="menu-item-animate px-4 py-3 text-sm font-medium hover:bg-green-800 transition-colors {{ request()->routeIs('pemerintahan') ? 'bg-green-900 border-b-2 border-white' : '' }}">Pemerintahan</a>
                    <a href="{{ route('berita') }}" class="menu-item-animate px-4 py-3 text-sm font-medium hover:bg-green-800 transition-colors {{ request()->routeIs('berita') ? 'bg-green-900 border-b-2 border-white' : '' }}">Berita</a>
                    <a href="{{ route('layanan') }}" class="menu-item-animate px-4 py-3 text-sm font-medium hover:bg-green-800 transition-colors {{ request()->routeIs('layanan') ? 'bg-green-900 border-b-2 border-white' : '' }}">Layanan</a>
                    <a href="{{ route('data') }}" class="menu-item-animate px-4 py-3 text-sm font-medium hover:bg-green-800 transition-colors {{ request()->routeIs('data') ? 'bg-green-900 border-b-2 border-white' : '' }}">Data Desa</a>
                    <a href="{{ route('darurat') }}" class="menu-item-animate px-4 py-3 text-sm font-medium hover:bg-green-800 transition-colors {{ request()->routeIs('darurat') ? 'bg-green-900 border-b-2 border-white' : '' }}">Darurat</a>
                    <a href="{{ route('kesehatan') }}" class="menu-item-animate px-4 py-3 text-sm font-medium hover:bg-green-800 transition-colors {{ request()->routeIs('kesehatan') ? 'bg-green-900 border-b-2 border-white' : '' }}">Kesehatan</a>
                    <a href="{{ route('galeri') }}" class="menu-item-animate px-4 py-3 text-sm font-medium hover:bg-green-800 transition-colors {{ request()->routeIs('galeri') ? 'bg-green-900 border-b-2 border-white' : '' }}">Galeri</a>
                    <a href="{{ route('kontak') }}" class="menu-item-animate px-4 py-3 text-sm font-medium hover:bg-green-800 transition-colors {{ request()->routeIs('kontak') ? 'bg-green-900 border-b-2 border-white' : '' }}">Kontak</a>
                </div>
                <!-- Tombol Mobile Menu -->
                <button id="mobile-menu-btn" class="md:hidden p-2 hover:bg-green-800 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            <!-- Menu Mobile -->
            <div id="mobile-menu" class="hidden md:hidden border-t border-green-600">
                <a href="{{ route('beranda') }}" class="block px-4 py-2 hover:bg-green-800 transition-colors {{ request()->routeIs('beranda') ? 'bg-green-900' : '' }}">Beranda</a>
                <a href="{{ route('profil') }}" class="block px-4 py-2 hover:bg-green-800 transition-colors {{ request()->routeIs('profil') ? 'bg-green-900' : '' }}">Profil Desa</a>
                <a href="{{ route('pemerintahan') }}" class="block px-4 py-2 hover:bg-green-800 transition-colors {{ request()->routeIs('pemerintahan') ? 'bg-green-900' : '' }}">Pemerintahan Desa</a>
                <a href="{{ route('berita') }}" class="block px-4 py-2 hover:bg-green-800 transition-colors {{ request()->routeIs('berita') ? 'bg-green-900' : '' }}">Berita & Pengumuman</a>
                <a href="{{ route('layanan') }}" class="block px-4 py-2 hover:bg-green-800 transition-colors {{ request()->routeIs('layanan') ? 'bg-green-900' : '' }}">Layanan Desa</a>
                <a href="{{ route('data') }}" class="block px-4 py-2 hover:bg-green-800 transition-colors {{ request()->routeIs('data') ? 'bg-green-900' : '' }}">Data Desa</a>
                <a href="{{ route('darurat') }}" class="block px-4 py-2 hover:bg-green-800 transition-colors {{ request()->routeIs('darurat') ? 'bg-green-900' : '' }}">Darurat & Keamanan</a>
                <a href="{{ route('kesehatan') }}" class="block px-4 py-2 hover:bg-green-800 transition-colors {{ request()->routeIs('kesehatan') ? 'bg-green-900' : '' }}">Kesehatan & Sosial</a>
                <a href="{{ route('galeri') }}" class="block px-4 py-2 hover:bg-green-800 transition-colors {{ request()->routeIs('galeri') ? 'bg-green-900' : '' }}">Galeri</a>
                <a href="{{ route('kontak') }}" class="block px-4 py-2 hover:bg-green-800 transition-colors {{ request()->routeIs('kontak') ? 'bg-green-900' : '' }}">Kontak & Aspirasi</a>
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
    </style>
    <script>
        // Toggle Mobile Menu
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
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
