@extends('layouts.app')

@section('title', 'Beranda - Website Resmi Pemerintah Desa')

@php
    use App\Models\Content;
    
    // Helper function untuk mengambil konten
    function getContent($page, $section, $key, $default = '') {
        return Content::getContent($page, $section, $key, $default);
    }
    
    // Helper function untuk mencari gambar dengan berbagai ekstensi
    function findImage($baseName, $fallback = null) {
        $extensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
        $imagesPath = public_path('images');
        
        foreach ($extensions as $ext) {
            $filePath = $imagesPath . '/' . $baseName . '.' . $ext;
            if (file_exists($filePath)) {
                return asset('images/' . $baseName . '.' . $ext);
            }
        }
        
        return $fallback;
    }
    
    // Get hero images
    $heroImage1 = findImage('hero-1', 'https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?w=1920&q=80');
    $heroImage2 = findImage('hero-2', 'https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=1920&q=80');
    $heroImage3 = findImage('hero-3', 'https://images.unsplash.com/photo-1501594907352-04cda38ebc29?w=1920&q=80');
@endphp

@section('content')
    <!-- Hero Section Modern -->
    <div class="w-full px-4 sm:px-6 lg:px-8 mb-16 sm:mb-20 md:mb-24">
        <div class="relative bg-gradient-to-br from-[#1e3a8a] via-blue-900 to-[#1e3a8a] text-white overflow-hidden rounded-xl md:rounded-2xl shadow-2xl">
        <!-- Floating Shapes -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-400/10 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-blue-300/10 rounded-full blur-3xl animate-float-delayed"></div>
            <div class="absolute top-1/2 left-1/4 w-64 h-64 bg-white/5 rounded-full blur-2xl animate-float-slow"></div>
        </div>
        <div id="hero-slider" class="flex transition-transform duration-700 ease-in-out h-full min-h-[280px] sm:min-h-[350px] md:min-h-[500px] lg:min-h-[600px]">
            <!-- Slide 1 -->
            <div class="min-w-full relative px-4 sm:px-6 md:px-8 py-6 sm:py-8 md:py-16 lg:py-24 flex items-center">
                <!-- Background Image -->
                <div class="absolute inset-0 hero-bg-1"></div>
                <!-- Text Shadow Overlay untuk readability -->
                <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/40"></div>
                <div class="container mx-auto px-4 sm:px-6 text-center relative z-10 max-w-5xl">
                    <div class="inline-block mb-4 md:mb-6 px-4 md:px-5 py-2 md:py-2.5 bg-gradient-to-r from-white/20 to-white/10 backdrop-blur-md rounded-full border border-white/30 shadow-lg animate-fade-in-up">
                        <span class="text-xs md:text-sm font-semibold flex items-center gap-2">
                            <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                            {{ getContent('beranda', 'hero', 'slide1_badge', 'Selamat Datang') }}
                        </span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl md:text-5xl lg:text-6xl xl:text-7xl font-extrabold mb-3 sm:mb-4 md:mb-6 leading-tight hero-title-animate drop-shadow-lg">
                        {!! nl2br(e(getContent('beranda', 'hero', 'slide1_title', "Website Resmi\nPemerintah Desa"))) !!}
                    </h1>
                    <p class="text-sm sm:text-base md:text-lg lg:text-xl text-white max-w-3xl mx-auto mb-4 sm:mb-6 md:mb-8 lg:mb-10 hero-text-animate leading-relaxed font-medium drop-shadow-md px-2">
                        {{ getContent('beranda', 'hero', 'slide1_subtitle', 'Media resmi untuk menyampaikan informasi, kebijakan, dan layanan publik yang transparan dan akuntabel') }}
                    </p>
                    <div class="flex flex-wrap justify-center gap-2 sm:gap-3 md:gap-4 hero-buttons-animate px-2">
                        <a href="{{ route('layanan') }}" class="group px-4 sm:px-6 md:px-8 py-2.5 sm:py-3 md:py-4 bg-white text-[#1e3a8a] font-bold rounded-lg md:rounded-xl hover:bg-blue-50 transition-all shadow-2xl hover:shadow-blue-500/50 transform hover:-translate-y-1 hover:scale-105 relative overflow-hidden text-xs sm:text-sm md:text-base">
                            <span class="relative z-10 flex items-center gap-2">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Layanan Desa
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-white opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </a>
                        <a href="{{ route('berita') }}" class="px-4 sm:px-6 md:px-8 py-2.5 sm:py-3 md:py-4 bg-white/10 backdrop-blur-md text-white font-bold rounded-lg md:rounded-xl border-2 border-white/40 hover:bg-white/20 hover:border-white/60 transition-all shadow-xl hover:shadow-white/20 transform hover:-translate-y-1 hover:scale-105 flex items-center gap-2 text-xs sm:text-sm md:text-base">
                            <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                            Berita Terbaru
                        </a>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="min-w-full relative px-4 sm:px-6 md:px-8 py-6 sm:py-8 md:py-16 lg:py-24 flex items-center">
                <!-- Background Image -->
                <div class="absolute inset-0 hero-bg-2"></div>
                <!-- Text Shadow Overlay untuk readability -->
                <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/40"></div>
                <div class="container mx-auto px-4 sm:px-6 text-center relative z-10 max-w-5xl">
                    <div class="inline-block mb-4 md:mb-6 px-4 md:px-5 py-2 md:py-2.5 bg-gradient-to-r from-white/20 to-white/10 backdrop-blur-md rounded-full border border-white/30 shadow-lg animate-fade-in-up">
                        <span class="text-xs md:text-sm font-semibold flex items-center gap-2">
                            <span class="w-2 h-2 bg-blue-400 rounded-full animate-pulse"></span>
                            {{ getContent('beranda', 'hero', 'slide2_badge', 'Pelayanan Publik') }}
                        </span>
                    </div>
                    <h1 class="text-3xl md:text-6xl lg:text-7xl font-extrabold mb-4 md:mb-6 leading-tight hero-title-animate drop-shadow-lg">
                        {!! nl2br(e(getContent('beranda', 'hero', 'slide2_title', "Transparansi &\nAkuntabilitas"))) !!}
                    </h1>
                    <p class="text-base md:text-xl text-white max-w-3xl mx-auto mb-6 md:mb-10 hero-text-animate leading-relaxed font-medium drop-shadow-md">
                        {{ getContent('beranda', 'hero', 'slide2_subtitle', 'Informasi layanan administrasi dan program desa tersedia untuk seluruh masyarakat dengan mudah dan cepat') }}
                    </p>
                    <div class="flex flex-wrap justify-center gap-3 md:gap-4 hero-buttons-animate">
                        <a href="{{ route('data') }}" class="group px-6 md:px-8 py-3 md:py-4 bg-white text-[#1e3a8a] font-bold rounded-xl hover:bg-blue-50 transition-all shadow-2xl hover:shadow-blue-500/50 transform hover:-translate-y-1 hover:scale-105 relative overflow-hidden text-sm md:text-base">
                            <span class="relative z-10 flex items-center gap-2">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                                Data Desa
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-white opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </a>
                        <a href="{{ route('kontak') }}" class="px-6 md:px-8 py-3 md:py-4 bg-white/10 backdrop-blur-md text-white font-bold rounded-xl border-2 border-white/40 hover:bg-white/20 hover:border-white/60 transition-all shadow-xl hover:shadow-white/20 transform hover:-translate-y-1 hover:scale-105 flex items-center gap-2 text-sm md:text-base">
                            <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="min-w-full relative px-4 sm:px-6 md:px-8 py-6 sm:py-8 md:py-16 lg:py-24 flex items-center">
                <!-- Background Image -->
                <div class="absolute inset-0 hero-bg-3"></div>
                <!-- Text Shadow Overlay untuk readability -->
                <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/40"></div>
                <div class="container mx-auto px-4 sm:px-6 text-center relative z-10 max-w-5xl">
                    <div class="inline-block mb-4 md:mb-6 px-4 md:px-5 py-2 md:py-2.5 bg-gradient-to-r from-white/20 to-white/10 backdrop-blur-md rounded-full border border-white/30 shadow-lg animate-fade-in-up">
                        <span class="text-xs md:text-sm font-semibold flex items-center gap-2">
                            <span class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></span>
                            {{ getContent('beranda', 'hero', 'slide3_badge', 'Pembangunan Desa') }}
                        </span>
                    </div>
                    <h1 class="text-3xl md:text-6xl lg:text-7xl font-extrabold mb-4 md:mb-6 leading-tight hero-title-animate drop-shadow-lg">
                        {!! nl2br(e(getContent('beranda', 'hero', 'slide3_title', "Partisipasi\nMasyarakat"))) !!}
                    </h1>
                    <p class="text-base md:text-xl text-white max-w-3xl mx-auto mb-6 md:mb-10 hero-text-animate leading-relaxed font-medium drop-shadow-md">
                        {{ getContent('beranda', 'hero', 'slide3_subtitle', 'Bersama membangun desa yang mandiri, sejahtera, dan berbudaya melalui partisipasi aktif seluruh warga') }}
                    </p>
                    <div class="flex flex-wrap justify-center gap-3 md:gap-4 hero-buttons-animate">
                        <a href="{{ route('umkm') }}" class="group px-6 md:px-8 py-3 md:py-4 bg-white text-[#1e3a8a] font-bold rounded-xl hover:bg-blue-50 transition-all shadow-2xl hover:shadow-blue-500/50 transform hover:-translate-y-1 hover:scale-105 relative overflow-hidden text-sm md:text-base">
                            <span class="relative z-10 flex items-center gap-2">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Ekonomi & UMKM
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-white opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </a>
                        <a href="{{ route('galeri') }}" class="px-6 md:px-8 py-3 md:py-4 bg-white/10 backdrop-blur-md text-white font-bold rounded-xl border-2 border-white/40 hover:bg-white/20 hover:border-white/60 transition-all shadow-xl hover:shadow-white/20 transform hover:-translate-y-1 hover:scale-105 flex items-center gap-2 text-sm md:text-base">
                            <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Galeri Kegiatan
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navigation Dots -->
        <div class="absolute bottom-3 sm:bottom-4 md:bottom-8 left-1/2 transform -translate-x-1/2 flex gap-2 sm:gap-3 z-10 hero-dots-animate">
            <button class="hero-dot w-2.5 h-2.5 sm:w-3 sm:h-3 bg-white rounded-full opacity-50 hover:opacity-100 hover:scale-125 transition-all duration-300 shadow-lg" data-slide="0"></button>
            <button class="hero-dot w-2.5 h-2.5 sm:w-3 sm:h-3 bg-white rounded-full opacity-50 hover:opacity-100 hover:scale-125 transition-all duration-300 shadow-lg" data-slide="1"></button>
            <button class="hero-dot w-2.5 h-2.5 sm:w-3 sm:h-3 bg-white rounded-full opacity-50 hover:opacity-100 hover:scale-125 transition-all duration-300 shadow-lg" data-slide="2"></button>
        </div>
        </div>
    </div>

    <!-- Statistik Desa Modern -->
    <div class="mb-16 sm:mb-20 md:mb-24 w-full px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-6 sm:mb-8 md:mb-10">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-2 sm:mb-3">{{ getContent('beranda', 'statistik', 'title', 'Data & Statistik Desa') }}</h2>
            <p class="text-gray-600 text-sm sm:text-base md:text-lg">{{ getContent('beranda', 'statistik', 'subtitle', 'Informasi terkini tentang kondisi desa kami') }}</p>
        </div>
        <div class="w-full">
            <!-- Skeleton Loading -->
            <div class="grid grid-cols-1 gap-4 md:gap-6 skeleton-wrapper" id="statistik-skeleton">
                @for($i = 0; $i < 4; $i++)
                <div class="skeleton-card bg-white rounded-xl border border-gray-200 p-6">
                    <div class="skeleton skeleton-text" style="height: 2.5rem; width: 60%; margin: 0 auto 1rem;"></div>
            <div class="skeleton skeleton-text" style="height: 1rem; width: 80%; margin: 0 auto;"></div>
        </div>
                @endfor
            </div>
            <!-- Statistik Content -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 skeleton-content" id="statistik-content">
                <div class="scroll-animate bg-gradient-to-br from-white to-blue-50 rounded-2xl border border-gray-200 p-6 md:p-8 text-center hover:border-[#1e3a8a] hover:shadow-xl transition-all duration-300 group">
                    <div class="bg-[#1e3a8a] w-16 h-16 md:w-20 md:h-20 rounded-2xl flex items-center justify-center mx-auto mb-4 md:mb-5 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#1e3a8a] mb-3">{{ number_format($statistik['jumlah_penduduk'] ?? 0) }}</div>
                    <div class="text-base md:text-lg text-gray-600 font-medium">Jumlah Penduduk</div>
                </div>
                <div class="scroll-animate bg-gradient-to-br from-white to-blue-50 rounded-2xl border border-gray-200 p-6 md:p-8 text-center hover:border-[#1e3a8a] hover:shadow-xl transition-all duration-300 group">
                    <div class="bg-[#1e3a8a] w-16 h-16 md:w-20 md:h-20 rounded-2xl flex items-center justify-center mx-auto mb-4 md:mb-5 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#1e3a8a] mb-3">{{ number_format($statistik['laki_laki'] ?? 0) }}</div>
                    <div class="text-base md:text-lg text-gray-600 font-medium">Laki-laki</div>
                </div>
                <div class="scroll-animate bg-gradient-to-br from-white to-blue-50 rounded-2xl border border-gray-200 p-6 md:p-8 text-center hover:border-[#1e3a8a] hover:shadow-xl transition-all duration-300 group">
                    <div class="bg-[#1e3a8a] w-16 h-16 md:w-20 md:h-20 rounded-2xl flex items-center justify-center mx-auto mb-4 md:mb-5 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#1e3a8a] mb-3">{{ number_format($statistik['perempuan'] ?? 0) }}</div>
                    <div class="text-base md:text-lg text-gray-600 font-medium">Perempuan</div>
                </div>
                <div class="scroll-animate bg-gradient-to-br from-white to-blue-50 rounded-2xl border border-gray-200 p-6 md:p-8 text-center hover:border-[#1e3a8a] hover:shadow-xl transition-all duration-300 group">
                    <div class="bg-[#1e3a8a] w-16 h-16 md:w-20 md:h-20 rounded-2xl flex items-center justify-center mx-auto mb-4 md:mb-5 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <div class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#1e3a8a] mb-3">{{ number_format($statistik['kepala_keluarga'] ?? 0) }}</div>
                    <div class="text-base md:text-lg text-gray-600 font-medium">Kepala Keluarga</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sambutan Kepala Desa Modern -->
    <div class="mb-16 sm:mb-20 md:mb-24 w-full px-4 sm:px-6 lg:px-8">
        <div class="scroll-animate bg-gradient-to-br from-white via-blue-50/30 to-white rounded-xl md:rounded-2xl border border-gray-200 p-4 sm:p-6 md:p-8 lg:p-12 shadow-lg">
            <div class="w-full">
            <div class="flex items-center gap-2 sm:gap-3 mb-6 sm:mb-8">
                <div class="h-1 w-12 sm:w-16 bg-[#1e3a8a] rounded-full"></div>
                <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900">{{ getContent('beranda', 'sambutan', 'title', 'Sambutan Kepala Desa') }}</h2>
            </div>
            <div class="flex flex-col md:flex-row gap-6 sm:gap-8 md:gap-10">
                <!-- Foto Kepala Desa -->
                <div class="flex-shrink-0">
                    <div class="w-48 h-48 sm:w-56 sm:h-56 md:w-64 md:h-64 mx-auto md:mx-0 rounded-xl md:rounded-2xl overflow-hidden shadow-xl border-4 border-white ring-4 ring-[#1e3a8a]/10 mb-4">
                        @php
                            $fotoKepala = getContent('beranda', 'sambutan', 'foto', 'images/kepala-desa.jpg');
                            if (!str_starts_with($fotoKepala, 'http') && !str_starts_with($fotoKepala, '/')) {
                                $fotoKepala = asset($fotoKepala);
                            }
                        @endphp
                        <img src="{{ $fotoKepala }}" alt="Kepala Desa" class="w-full h-full object-cover" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full bg-gradient-to-br from-[#1e3a8a] to-blue-900 flex items-center justify-center\'><svg class=\'w-32 h-32 text-white/80\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z\'></path></svg></div>';">
                    </div>
                    <div class="text-center">
                        <p class="text-[#1e3a8a] font-bold text-base sm:text-lg md:text-xl">{{ getContent('beranda', 'sambutan', 'nama_kepala', 'Kepala Desa') }}</p>
                    </div>
                </div>
                <!-- Teks Sambutan -->
                <div class="flex-1">
                    <div class="bg-white rounded-lg md:rounded-xl p-4 sm:p-6 md:p-8 shadow-md border border-gray-200">
                        <div class="text-gray-800 text-sm sm:text-base md:text-lg leading-relaxed">
                            @php
                                $sambutanText = getContent('beranda', 'sambutan', 'content', "Assalamu'alaikum Warahmatullahi Wabarakatuh\n\nPuji syukur kehadirat Allah SWT, atas rahmat dan karunia-Nya, kami dapat menyampaikan sambutan melalui website resmi Pemerintah Desa ini.\n\nWebsite ini merupakan media komunikasi dan informasi antara Pemerintah Desa dengan seluruh masyarakat. Melalui website ini, kami berkomitmen untuk menyampaikan informasi yang transparan, akurat, dan dapat diakses oleh seluruh warga desa.\n\nKami mengajak seluruh masyarakat untuk berpartisipasi aktif dalam pembangunan desa. Semoga website ini dapat menjadi sarana yang bermanfaat bagi kita semua.\n\nWassalamu'alaikum Warahmatullahi Wabarakatuh");
                                // Split by double newlines to create paragraphs
                                $paragraphs = preg_split('/\n\s*\n/', $sambutanText);
                            @endphp
                            @foreach($paragraphs as $index => $paragraph)
                                @if(trim($paragraph))
                                    @if($index === 0)
                                        <p class="text-lg sm:text-xl font-semibold text-[#1e3a8a] mb-4 sm:mb-5">{{ trim($paragraph) }}</p>
                                    @elseif($index === count($paragraphs) - 1)
                                        <div class="pt-3 sm:pt-4 border-t border-gray-300 mt-4 sm:mt-6">
                                            <p class="text-gray-900 font-semibold text-base sm:text-lg mb-2">{{ trim($paragraph) }}</p>
                                        </div>
                                    @else
                                        <p class="mb-3 sm:mb-4 text-gray-800">{{ trim($paragraph) }}</p>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Berita Terbaru Modern -->
    <div class="mt-8 sm:mt-12 md:mt-16 mb-16 sm:mb-20 md:mb-24 w-full px-4 sm:px-6 lg:px-8">
        <div class="scroll-animate">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 sm:gap-4 mb-6 sm:mb-8">
            <div>
                <div class="flex items-center gap-2 sm:gap-3 mb-2">
                    <div class="h-1 w-12 sm:w-16 bg-[#1e3a8a] rounded-full"></div>
                    <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900">{{ getContent('beranda', 'berita', 'title', 'Berita Terbaru') }}</h2>
                </div>
                <p class="text-gray-600 text-sm sm:text-base px-4 md:px-0">{{ getContent('beranda', 'berita', 'subtitle', 'Informasi dan pengumuman terkini dari Pemerintah Desa') }}</p>
            </div>
            <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 px-4 sm:px-5 py-2 sm:py-2.5 bg-[#1e3a8a] text-white text-sm sm:text-base font-medium rounded-lg hover:bg-blue-800 transition-all shadow-md hover:shadow-lg mx-4 md:mx-0">
                Lihat Semua
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        <!-- Skeleton Loading Berita -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 skeleton-wrapper px-4 sm:px-0" id="berita-skeleton">
            @for($i = 0; $i < 2; $i++)
            <div class="skeleton-card bg-white rounded-xl border border-gray-200 overflow-hidden">
                <div class="skeleton" style="height: 12rem; width: 100%;"></div>
                <div class="p-6 md:p-8">
                    <div class="skeleton skeleton-text" style="height: 1.5rem; width: 30%; margin-bottom: 1rem;"></div>
                    <div class="skeleton skeleton-title" style="height: 1.5rem; margin-bottom: 0.75rem;"></div>
                    <div class="skeleton skeleton-text" style="height: 1rem; margin-bottom: 0.5rem;"></div>
                    <div class="skeleton skeleton-text" style="height: 1rem; margin-bottom: 0.5rem;"></div>
                    <div class="skeleton skeleton-text" style="height: 1rem; width: 80%;"></div>
                </div>
            </div>
            @endfor
        </div>
        <!-- Berita Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 skeleton-content px-4 sm:px-0" id="berita-content">
            <article class="scroll-animate-left bg-white rounded-lg md:rounded-xl border border-gray-200 overflow-hidden hover:border-[#1e3a8a] hover:shadow-xl transition-all duration-300 group">
                <!-- Gambar Berita -->
                <div class="relative h-40 sm:h-48 md:h-56 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                    <img src="{{ asset('images/berita/berita-1.jpg') }}" alt="Pendaftaran Program Bantuan Sosial" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="w-full h-full hidden absolute inset-0 items-center justify-center bg-gradient-to-br from-[#1e3a8a]/10 to-blue-100">
                        <svg class="w-12 h-12 sm:w-16 sm:h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                </div>
                <div class="p-4 sm:p-6 md:p-8">
                    <div class="flex items-center gap-2 sm:gap-3 mb-3 sm:mb-4">
                        <span class="bg-[#1e3a8a] text-white px-3 sm:px-4 py-1 sm:py-1.5 text-xs font-semibold rounded-full">Pengumuman</span>
                        <time class="text-xs text-gray-500 font-medium">15 Januari 2024</time>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2 sm:mb-3 text-lg sm:text-xl md:text-2xl group-hover:text-[#1e3a8a] transition-colors leading-tight">
                        Pendaftaran Program Bantuan Sosial Tahun 2024
                    </h3>
                    <p class="text-gray-700 text-sm sm:text-base leading-relaxed mb-4 sm:mb-6">
                        Pemerintah Desa membuka pendaftaran program bantuan sosial untuk warga yang memenuhi kriteria. Pendaftaran dibuka mulai tanggal 20 Januari 2024 hingga 5 Februari 2024.
                    </p>
                    <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 text-[#1e3a8a] text-sm sm:text-base font-semibold hover:gap-3 transition-all group/link">
                        Baca selengkapnya
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </article>
            <article class="scroll-animate-right bg-white rounded-lg md:rounded-xl border border-gray-200 overflow-hidden hover:border-[#1e3a8a] hover:shadow-xl transition-all duration-300 group">
                <!-- Gambar Berita -->
                <div class="relative h-40 sm:h-48 md:h-56 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                    <img src="{{ asset('images/berita/berita-2.jpg') }}" alt="Jadwal Pelayanan Administrasi Kependudukan" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="w-full h-full hidden absolute inset-0 items-center justify-center bg-gradient-to-br from-[#1e3a8a]/10 to-blue-100">
                        <svg class="w-12 h-12 sm:w-16 sm:h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                </div>
                <div class="p-4 sm:p-6 md:p-8">
                    <div class="flex items-center gap-2 sm:gap-3 mb-3 sm:mb-4">
                        <span class="bg-blue-100 text-[#1e3a8a] px-3 sm:px-4 py-1 sm:py-1.5 text-xs font-semibold rounded-full">Informasi</span>
                        <time class="text-xs text-gray-500 font-medium">10 Januari 2024</time>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2 sm:mb-3 text-lg sm:text-xl md:text-2xl group-hover:text-[#1e3a8a] transition-colors leading-tight">
                        Jadwal Pelayanan Administrasi Kependudukan
                    </h3>
                    <p class="text-gray-700 text-sm sm:text-base leading-relaxed mb-4 sm:mb-6">
                        Pelayanan administrasi kependudukan dilayani setiap hari kerja Senin hingga Jumat pukul 08:00 - 15:00 WIB. Untuk layanan khusus dapat menghubungi kantor desa terlebih dahulu.
                    </p>
                    <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 text-[#1e3a8a] text-sm sm:text-base font-semibold hover:gap-3 transition-all group/link">
                        Baca selengkapnya
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </article>
        </div>
        </div>
    </div>

    <!-- Galeri Kegiatan Modern -->
    <div class="mb-16 sm:mb-20 md:mb-24 w-full px-4 sm:px-6 lg:px-8">
        <div class="scroll-animate">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 sm:gap-4 mb-6 sm:mb-8">
            <div>
                <div class="flex items-center gap-2 sm:gap-3 mb-2">
                    <div class="h-1 w-12 sm:w-16 bg-[#1e3a8a] rounded-full"></div>
                    <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900">{{ getContent('beranda', 'galeri', 'title', 'Galeri Kegiatan') }}</h2>
                </div>
                <p class="text-gray-600 text-sm sm:text-base px-4 md:px-0">{{ getContent('beranda', 'galeri', 'subtitle', 'Dokumentasi kegiatan dan program desa') }}</p>
            </div>
            <a href="{{ route('galeri') }}" class="inline-flex items-center gap-2 px-4 sm:px-5 py-2 sm:py-2.5 bg-[#1e3a8a] text-white text-sm sm:text-base font-medium rounded-lg hover:bg-blue-800 transition-all shadow-md hover:shadow-lg mx-4 md:mx-0">
                Lihat Semua
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-4 gap-2 sm:gap-4 md:gap-6 px-4 sm:px-0">
            @for($i = 1; $i <= 8; $i++)
            <div class="scroll-animate-gallery group relative bg-white rounded-xl border border-gray-200 overflow-hidden hover:border-[#1e3a8a] hover:shadow-xl transition-all duration-300 cursor-pointer">
                <div class="aspect-square bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden relative">
                    <img src="{{ asset('images/galeri/gotong-royong-' . $i . '.jpg') }}" alt="Galeri {{ $i }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="w-full h-full hidden absolute inset-0 items-center justify-center bg-gradient-to-br from-[#1e3a8a]/10 to-blue-100">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute bottom-0 left-0 right-0 p-4 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                    <p class="text-white text-sm font-bold mb-1">Kegiatan Desa</p>
                    <p class="text-white/90 text-xs">{{ date('d F Y', strtotime('-' . $i . ' days')) }}</p>
                </div>
            </div>
            @endfor
        </div>
        </div>
    </div>

    <!-- Quick Links Modern -->
    <div class="mb-16 sm:mb-20 md:mb-24 w-full px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-6 sm:mb-8 md:mb-10">
            <div class="flex items-center justify-center gap-2 sm:gap-3 mb-2 sm:mb-3">
                <div class="h-1 w-12 sm:w-16 bg-[#1e3a8a] rounded-full"></div>
                <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900">{{ getContent('beranda', 'akses_cepat', 'title', 'Akses Cepat') }}</h2>
                <div class="h-1 w-12 sm:w-16 bg-[#1e3a8a] rounded-full"></div>
            </div>
            <p class="text-gray-600 text-sm sm:text-base md:text-lg px-4">{{ getContent('beranda', 'akses_cepat', 'subtitle', 'Layanan dan informasi penting') }}</p>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4 md:gap-6 px-4 sm:px-0">
            <a href="{{ route('layanan') }}" class="scroll-animate bg-white rounded-lg md:rounded-xl border-2 border-gray-200 p-4 sm:p-5 md:p-6 text-center hover:border-[#1e3a8a] hover:shadow-lg transition-all duration-300 group">
                <div class="bg-[#1e3a8a]/10 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 rounded-lg md:rounded-xl flex items-center justify-center mx-auto mb-3 sm:mb-4 group-hover:bg-[#1e3a8a] group-hover:scale-110 transition-all duration-300">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 text-[#1e3a8a] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-sm sm:text-base text-gray-900 mb-1 group-hover:text-[#1e3a8a] transition-colors">Layanan</h3>
                <p class="text-xs sm:text-sm text-gray-600">Administrasi</p>
            </a>
            <a href="{{ route('data') }}" class="scroll-animate bg-white rounded-lg md:rounded-xl border-2 border-gray-200 p-4 sm:p-5 md:p-6 text-center hover:border-[#1e3a8a] hover:shadow-lg transition-all duration-300 group">
                <div class="bg-[#1e3a8a]/10 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 rounded-lg md:rounded-xl flex items-center justify-center mx-auto mb-3 sm:mb-4 group-hover:bg-[#1e3a8a] group-hover:scale-110 transition-all duration-300">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 text-[#1e3a8a] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-sm sm:text-base text-gray-900 mb-1 group-hover:text-[#1e3a8a] transition-colors">Data Desa</h3>
                <p class="text-xs sm:text-sm text-gray-600">Statistik</p>
            </a>
            <a href="{{ route('umkm') }}" class="scroll-animate bg-white rounded-lg md:rounded-xl border-2 border-gray-200 p-4 sm:p-5 md:p-6 text-center hover:border-[#1e3a8a] hover:shadow-lg transition-all duration-300 group">
                <div class="bg-[#1e3a8a]/10 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 rounded-lg md:rounded-xl flex items-center justify-center mx-auto mb-3 sm:mb-4 group-hover:bg-[#1e3a8a] group-hover:scale-110 transition-all duration-300">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 text-[#1e3a8a] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-sm sm:text-base text-gray-900 mb-1 group-hover:text-[#1e3a8a] transition-colors">UMKM</h3>
                <p class="text-xs sm:text-sm text-gray-600">Ekonomi</p>
            </a>
            <a href="{{ route('kontak') }}" class="scroll-animate bg-white rounded-lg md:rounded-xl border-2 border-gray-200 p-4 sm:p-5 md:p-6 text-center hover:border-[#1e3a8a] hover:shadow-lg transition-all duration-300 group">
                <div class="bg-[#1e3a8a]/10 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 rounded-lg md:rounded-xl flex items-center justify-center mx-auto mb-3 sm:mb-4 group-hover:bg-[#1e3a8a] group-hover:scale-110 transition-all duration-300">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 text-[#1e3a8a] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-sm sm:text-base text-gray-900 mb-1 group-hover:text-[#1e3a8a] transition-colors">Kontak</h3>
                <p class="text-xs sm:text-sm text-gray-600">Hubungi Kami</p>
            </a>
        </div>
    </div>

    <style>
        /* Hero Background Images */
        .hero-bg-1 {
            background-image: url('{{ $heroImage1 }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .hero-bg-2 {
            background-image: url('{{ $heroImage2 }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .hero-bg-3 {
            background-image: url('{{ $heroImage3 }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        @media (min-width: 769px) {
            .hero-bg-1,
            .hero-bg-2,
            .hero-bg-3 {
                background-attachment: fixed;
            }
        }
        @media (max-width: 768px) {
            .hero-bg-1,
            .hero-bg-2,
            .hero-bg-3 {
                background-attachment: scroll;
            }
        }
        /* Floating Animation */
        @keyframes float {
            0%, 100% {
                transform: translateY(0px) translateX(0px);
            }
            33% {
                transform: translateY(-30px) translateX(20px);
            }
            66% {
                transform: translateY(20px) translateX(-20px);
            }
        }
        @keyframes float-delayed {
            0%, 100% {
                transform: translateY(0px) translateX(0px);
            }
            33% {
                transform: translateY(40px) translateX(-30px);
            }
            66% {
                transform: translateY(-20px) translateX(30px);
            }
        }
        @keyframes float-slow {
            0%, 100% {
                transform: translateY(0px) translateX(0px);
            }
            50% {
                transform: translateY(-20px) translateX(15px);
            }
        }
        .animate-float {
            animation: float 20s ease-in-out infinite;
        }
        .animate-float-delayed {
            animation: float-delayed 25s ease-in-out infinite;
        }
        .animate-float-slow {
            animation: float-slow 30s ease-in-out infinite;
        }
        /* Shimmer Animation */
        @keyframes shimmer {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }
        .animate-shimmer {
            animation: shimmer 3s ease-in-out infinite;
        }
        /* Fade In Up Animation */
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out;
        }
        /* Gradient Text Animation */
        @keyframes gradient {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }
        .animate-gradient {
            background-size: 200% auto;
            animation: gradient 3s linear infinite;
        }
        /* Hide Scrollbar */
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        /* Scroll Animation Styles */
        .scroll-animate {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .scroll-animate.animated {
            opacity: 1;
            transform: translateY(0);
        }
        .scroll-animate-left {
            opacity: 0;
            transform: translateX(-40px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .scroll-animate-left.animated {
            opacity: 1;
            transform: translateX(0);
        }
        .scroll-animate-right {
            opacity: 0;
            transform: translateX(40px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .scroll-animate-right.animated {
            opacity: 1;
            transform: translateX(0);
        }
        .scroll-animate-gallery {
            opacity: 0;
            transform: scale(0.95) translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .scroll-animate-gallery.animated {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
        /* Hero Section Animations */
        .hero-title-animate {
            opacity: 0;
            transform: translateY(40px);
            animation: heroFadeInUp 1s ease-out 0.3s forwards;
        }
        .hero-text-animate {
            opacity: 0;
            transform: translateY(30px);
            animation: heroFadeInUp 1s ease-out 0.5s forwards;
        }
        .hero-buttons-animate {
            opacity: 0;
            transform: translateY(20px);
            animation: heroFadeInUp 1s ease-out 0.7s forwards;
        }
        .hero-dots-animate {
            opacity: 0;
            transform: translateY(10px);
            animation: heroFadeInUp 0.8s ease-out 0.9s forwards;
        }
        @keyframes heroFadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .skeleton-content {
            display: none;
        }
        .skeleton-content.show {
            display: grid;
        }
        .skeleton-wrapper.hide {
            display: none;
        }
    </style>
    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('#hero-slider > div');
        const dots = document.querySelectorAll('.hero-dot');
        const totalSlides = slides.length;

        function showSlide(index) {
            const slider = document.getElementById('hero-slider');
            slider.style.transform = `translateX(-${index * 100}%)`;
            
            dots.forEach((dot, i) => {
                if (i === index) {
                    dot.classList.remove('opacity-50');
                    dot.classList.add('opacity-100', 'w-8');
                } else {
                    dot.classList.add('opacity-50');
                    dot.classList.remove('opacity-100', 'w-8');
                    dot.classList.add('w-3');
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            showSlide(currentSlide);
        }

        setInterval(nextSlide, 6000);
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentSlide = index;
                showSlide(currentSlide);
            });
        });
        showSlide(0);

        // Scroll Animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.scroll-animate, .scroll-animate-left, .scroll-animate-right, .scroll-animate-gallery').forEach((el, index) => {
            observer.observe(el);
            if (el.classList.contains('scroll-animate-gallery')) {
                el.style.transitionDelay = `${index * 0.05}s`;
            }
        });

        // Skeleton Loading Management
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const statistikSkeleton = document.getElementById('statistik-skeleton');
                const statistikContent = document.getElementById('statistik-content');
                if (statistikSkeleton && statistikContent) {
                    statistikSkeleton.classList.add('hide');
                    statistikContent.classList.add('show');
                }
            }, 800);
            setTimeout(function() {
                const beritaSkeleton = document.getElementById('berita-skeleton');
                const beritaContent = document.getElementById('berita-content');
                if (beritaSkeleton && beritaContent) {
                    beritaSkeleton.classList.add('hide');
                    beritaContent.classList.add('show');
                }
            }, 1000);
        });
    </script>
@endsection
