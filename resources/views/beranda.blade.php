@extends('layouts.app')

@section('title', 'Beranda - Website Resmi Pemerintah Desa')

@section('content')
    <!-- Hero Section Modern -->
    <div class="relative bg-gradient-to-br from-[#1e3a8a] via-blue-900 to-[#1e3a8a] text-white mb-16 overflow-hidden rounded-2xl shadow-2xl">
        <!-- Floating Shapes -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-400/10 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-blue-300/10 rounded-full blur-3xl animate-float-delayed"></div>
            <div class="absolute top-1/2 left-1/4 w-64 h-64 bg-white/5 rounded-full blur-2xl animate-float-slow"></div>
        </div>
        <div id="hero-slider" class="flex transition-transform duration-700 ease-in-out h-full min-h-[500px] md:min-h-[600px]">
            <!-- Slide 1 -->
            <div class="min-w-full relative px-4 py-16 md:py-24 flex items-center">
                <!-- Background Image -->
                <div class="absolute inset-0 hero-bg-1"></div>
                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-br from-[#1e3a8a]/60 via-[#1e3a8a]/50 to-[#1e3a8a]/60"></div>
                <!-- Animated Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent animate-shimmer"></div>
                <!-- Pattern Overlay -->
                <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
                <div class="container mx-auto text-center relative z-10 max-w-5xl">
                    <div class="inline-block mb-6 px-5 py-2.5 bg-gradient-to-r from-white/20 to-white/10 backdrop-blur-md rounded-full border border-white/30 shadow-lg animate-fade-in-up">
                        <span class="text-sm font-semibold flex items-center gap-2">
                            <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                            Selamat Datang
                        </span>
                    </div>
                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold mb-6 leading-tight hero-title-animate">
                        Website Resmi<br>
                        <span class="bg-gradient-to-r from-blue-200 via-white to-blue-200 bg-clip-text text-transparent animate-gradient">Pemerintah Desa</span>
                    </h1>
                    <p class="text-lg md:text-xl text-blue-100 max-w-3xl mx-auto mb-10 hero-text-animate leading-relaxed font-medium">
                        Media resmi untuk menyampaikan informasi, kebijakan, dan layanan publik yang transparan dan akuntabel
                    </p>
                    <div class="flex flex-wrap justify-center gap-4 hero-buttons-animate">
                        <a href="{{ route('layanan') }}" class="group px-8 py-4 bg-white text-[#1e3a8a] font-bold rounded-xl hover:bg-blue-50 transition-all shadow-2xl hover:shadow-blue-500/50 transform hover:-translate-y-1 hover:scale-105 relative overflow-hidden">
                            <span class="relative z-10 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Layanan Desa
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-white opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </a>
                        <a href="{{ route('berita') }}" class="px-8 py-4 bg-white/10 backdrop-blur-md text-white font-bold rounded-xl border-2 border-white/40 hover:bg-white/20 hover:border-white/60 transition-all shadow-xl hover:shadow-white/20 transform hover:-translate-y-1 hover:scale-105 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                            Berita Terbaru
                        </a>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="min-w-full relative px-4 py-16 md:py-24 flex items-center">
                <!-- Background Image -->
                <div class="absolute inset-0 hero-bg-2"></div>
                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-br from-[#1e3a8a]/60 via-[#1e3a8a]/50 to-[#1e3a8a]/60"></div>
                <!-- Animated Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent animate-shimmer"></div>
                <!-- Pattern Overlay -->
                <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
                <div class="container mx-auto text-center relative z-10 max-w-5xl">
                    <div class="inline-block mb-6 px-5 py-2.5 bg-gradient-to-r from-white/20 to-white/10 backdrop-blur-md rounded-full border border-white/30 shadow-lg animate-fade-in-up">
                        <span class="text-sm font-semibold flex items-center gap-2">
                            <span class="w-2 h-2 bg-blue-400 rounded-full animate-pulse"></span>
                            Pelayanan Publik
                        </span>
                    </div>
                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold mb-6 leading-tight hero-title-animate">
                        Transparansi &<br>
                        <span class="bg-gradient-to-r from-blue-200 via-white to-blue-200 bg-clip-text text-transparent animate-gradient">Akuntabilitas</span>
                    </h1>
                    <p class="text-lg md:text-xl text-blue-100 max-w-3xl mx-auto mb-10 hero-text-animate leading-relaxed font-medium">
                        Informasi layanan administrasi dan program desa tersedia untuk seluruh masyarakat dengan mudah dan cepat
                    </p>
                    <div class="flex flex-wrap justify-center gap-4 hero-buttons-animate">
                        <a href="{{ route('data') }}" class="group px-8 py-4 bg-white text-[#1e3a8a] font-bold rounded-xl hover:bg-blue-50 transition-all shadow-2xl hover:shadow-blue-500/50 transform hover:-translate-y-1 hover:scale-105 relative overflow-hidden">
                            <span class="relative z-10 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                                Data Desa
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-white opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </a>
                        <a href="{{ route('kontak') }}" class="px-8 py-4 bg-white/10 backdrop-blur-md text-white font-bold rounded-xl border-2 border-white/40 hover:bg-white/20 hover:border-white/60 transition-all shadow-xl hover:shadow-white/20 transform hover:-translate-y-1 hover:scale-105 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="min-w-full relative px-4 py-16 md:py-24 flex items-center">
                <!-- Background Image -->
                <div class="absolute inset-0 hero-bg-3"></div>
                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-br from-[#1e3a8a]/60 via-[#1e3a8a]/50 to-[#1e3a8a]/60"></div>
                <!-- Animated Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent animate-shimmer"></div>
                <!-- Pattern Overlay -->
                <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
                <div class="container mx-auto text-center relative z-10 max-w-5xl">
                    <div class="inline-block mb-6 px-5 py-2.5 bg-gradient-to-r from-white/20 to-white/10 backdrop-blur-md rounded-full border border-white/30 shadow-lg animate-fade-in-up">
                        <span class="text-sm font-semibold flex items-center gap-2">
                            <span class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></span>
                            Pembangunan Desa
                        </span>
                    </div>
                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold mb-6 leading-tight hero-title-animate">
                        Partisipasi<br>
                        <span class="bg-gradient-to-r from-blue-200 via-white to-blue-200 bg-clip-text text-transparent animate-gradient">Masyarakat</span>
                    </h1>
                    <p class="text-lg md:text-xl text-blue-100 max-w-3xl mx-auto mb-10 hero-text-animate leading-relaxed font-medium">
                        Bersama membangun desa yang mandiri, sejahtera, dan berbudaya melalui partisipasi aktif seluruh warga
                    </p>
                    <div class="flex flex-wrap justify-center gap-4 hero-buttons-animate">
                        <a href="{{ route('umkm') }}" class="group px-8 py-4 bg-white text-[#1e3a8a] font-bold rounded-xl hover:bg-blue-50 transition-all shadow-2xl hover:shadow-blue-500/50 transform hover:-translate-y-1 hover:scale-105 relative overflow-hidden">
                            <span class="relative z-10 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Ekonomi & UMKM
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-white opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </a>
                        <a href="{{ route('galeri') }}" class="px-8 py-4 bg-white/10 backdrop-blur-md text-white font-bold rounded-xl border-2 border-white/40 hover:bg-white/20 hover:border-white/60 transition-all shadow-xl hover:shadow-white/20 transform hover:-translate-y-1 hover:scale-105 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Galeri Kegiatan
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navigation Dots -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex gap-3 z-10 hero-dots-animate">
            <button class="hero-dot w-3 h-3 bg-white rounded-full opacity-50 hover:opacity-100 hover:scale-125 transition-all duration-300 shadow-lg" data-slide="0"></button>
            <button class="hero-dot w-3 h-3 bg-white rounded-full opacity-50 hover:opacity-100 hover:scale-125 transition-all duration-300 shadow-lg" data-slide="1"></button>
            <button class="hero-dot w-3 h-3 bg-white rounded-full opacity-50 hover:opacity-100 hover:scale-125 transition-all duration-300 shadow-lg" data-slide="2"></button>
        </div>
    </div>

    <!-- Statistik Desa Modern -->
    <div class="mb-16">
        <div class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Data & Statistik Desa</h2>
            <p class="text-gray-600 text-lg">Informasi terkini tentang kondisi desa kami</p>
        </div>
        <div class="container mx-auto px-4 max-w-4xl">
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
            <div class="grid grid-cols-1 gap-4 md:gap-6 skeleton-content" id="statistik-content">
                <div class="scroll-animate bg-gradient-to-br from-white to-blue-50 rounded-2xl border border-gray-200 p-6 md:p-8 text-center hover:border-[#1e3a8a] hover:shadow-xl transition-all duration-300 group">
                    <div class="bg-[#1e3a8a] w-16 h-16 md:w-20 md:h-20 rounded-2xl flex items-center justify-center mx-auto mb-4 md:mb-5 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#1e3a8a] mb-3">2.450</div>
                    <div class="text-base md:text-lg text-gray-600 font-medium">Jumlah Penduduk</div>
                </div>
                <div class="scroll-animate bg-gradient-to-br from-white to-blue-50 rounded-2xl border border-gray-200 p-6 md:p-8 text-center hover:border-[#1e3a8a] hover:shadow-xl transition-all duration-300 group">
                    <div class="bg-[#1e3a8a] w-16 h-16 md:w-20 md:h-20 rounded-2xl flex items-center justify-center mx-auto mb-4 md:mb-5 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#1e3a8a] mb-3">250</div>
                    <div class="text-base md:text-lg text-gray-600 font-medium">Hektar Luas Wilayah</div>
        </div>
                <div class="scroll-animate bg-gradient-to-br from-white to-blue-50 rounded-2xl border border-gray-200 p-6 md:p-8 text-center hover:border-[#1e3a8a] hover:shadow-xl transition-all duration-300 group">
                    <div class="bg-[#1e3a8a] w-16 h-16 md:w-20 md:h-20 rounded-2xl flex items-center justify-center mx-auto mb-4 md:mb-5 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
        </div>
                    <div class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#1e3a8a] mb-3">12</div>
                    <div class="text-base md:text-lg text-gray-600 font-medium">Rukun Tetangga</div>
    </div>
                <div class="scroll-animate bg-gradient-to-br from-white to-blue-50 rounded-2xl border border-gray-200 p-6 md:p-8 text-center hover:border-[#1e3a8a] hover:shadow-xl transition-all duration-300 group">
                    <div class="bg-[#1e3a8a] w-16 h-16 md:w-20 md:h-20 rounded-2xl flex items-center justify-center mx-auto mb-4 md:mb-5 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
        </div>
                    <div class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#1e3a8a] mb-3">4</div>
                    <div class="text-base md:text-lg text-gray-600 font-medium">Rukun Warga</div>
        </div>
        </div>
        </div>
    </div>

    <!-- Sambutan Kepala Desa Modern -->
    <div class="mb-16 scroll-animate bg-gradient-to-br from-white via-blue-50/30 to-white rounded-2xl border border-gray-200 p-8 md:p-12 shadow-lg">
        <div class="max-w-5xl mx-auto">
            <div class="flex items-center gap-3 mb-8">
                <div class="h-1 w-16 bg-[#1e3a8a] rounded-full"></div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Sambutan Kepala Desa</h2>
            </div>
            <div class="flex flex-col md:flex-row gap-8 md:gap-10">
                <!-- Foto Kepala Desa -->
                <div class="flex-shrink-0">
                    <div class="w-56 h-56 md:w-64 md:h-64 mx-auto md:mx-0 rounded-2xl overflow-hidden shadow-xl border-4 border-white ring-4 ring-[#1e3a8a]/10">
                        @if (file_exists(public_path('images/kepala-desa.jpg')))
                            <img src="{{ asset('images/kepala-desa.jpg') }}" alt="Kepala Desa" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-[#1e3a8a] to-blue-900 flex items-center justify-center">
                                <svg class="w-32 h-32 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Teks Sambutan -->
                <div class="flex-1">
                    <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 md:p-8 shadow-md">
                        <div class="text-gray-700 text-base md:text-lg leading-relaxed space-y-4">
                            <p class="text-xl font-semibold text-[#1e3a8a] mb-4">Assalamu'alaikum Warahmatullahi Wabarakatuh</p>
                    <p>
                                Puji syukur kehadirat Allah SWT, atas rahmat dan karunia-Nya, kami dapat menyampaikan sambutan melalui website resmi Pemerintah Desa ini.
                    </p>
                    <p>
                                Website ini merupakan media komunikasi dan informasi antara Pemerintah Desa dengan seluruh masyarakat. Melalui website ini, kami berkomitmen untuk menyampaikan informasi yang <strong class="text-[#1e3a8a]">transparan, akurat, dan dapat diakses</strong> oleh seluruh warga desa.
                    </p>
                    <p>
                                Kami mengajak seluruh masyarakat untuk berpartisipasi aktif dalam pembangunan desa. Semoga website ini dapat menjadi sarana yang bermanfaat bagi kita semua.
                    </p>
                            <div class="pt-4 border-t border-gray-200 mt-6">
                                <p class="text-gray-900 font-semibold text-lg mb-2">
                        Wassalamu'alaikum Warahmatullahi Wabarakatuh
                    </p>
                                <p class="text-[#1e3a8a] font-bold text-lg">
                        Kepala Desa
                    </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Berita Terbaru Modern -->
    <div class="mb-16 scroll-animate">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <div class="h-1 w-16 bg-[#1e3a8a] rounded-full"></div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Berita Terbaru</h2>
                </div>
                <p class="text-gray-600">Informasi dan pengumuman terkini dari Pemerintah Desa</p>
            </div>
            <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#1e3a8a] text-white font-medium rounded-lg hover:bg-blue-800 transition-all shadow-md hover:shadow-lg">
                Lihat Semua
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        <!-- Skeleton Loading Berita -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 skeleton-wrapper" id="berita-skeleton">
            @for($i = 0; $i < 2; $i++)
            <div class="skeleton-card bg-white rounded-xl border border-gray-200 p-6">
                <div class="skeleton skeleton-text" style="height: 1.5rem; width: 30%; margin-bottom: 1rem;"></div>
                <div class="skeleton skeleton-title" style="height: 1.5rem; margin-bottom: 0.75rem;"></div>
                <div class="skeleton skeleton-text" style="height: 1rem; margin-bottom: 0.5rem;"></div>
                <div class="skeleton skeleton-text" style="height: 1rem; margin-bottom: 0.5rem;"></div>
                <div class="skeleton skeleton-text" style="height: 1rem; width: 80%;"></div>
            </div>
            @endfor
        </div>
        <!-- Berita Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 skeleton-content" id="berita-content">
            <article class="scroll-animate-left bg-white rounded-xl border border-gray-200 p-6 md:p-8 hover:border-[#1e3a8a] hover:shadow-xl transition-all duration-300 group">
                <div class="flex items-center gap-3 mb-4">
                    <span class="bg-[#1e3a8a] text-white px-4 py-1.5 text-xs font-semibold rounded-full">Pengumuman</span>
                    <time class="text-xs text-gray-500 font-medium">15 Januari 2024</time>
                </div>
                <h3 class="font-bold text-gray-900 mb-3 text-xl md:text-2xl group-hover:text-[#1e3a8a] transition-colors leading-tight">
                    Pendaftaran Program Bantuan Sosial Tahun 2024
                </h3>
                <p class="text-gray-700 text-base leading-relaxed mb-6">
                    Pemerintah Desa membuka pendaftaran program bantuan sosial untuk warga yang memenuhi kriteria. Pendaftaran dibuka mulai tanggal 20 Januari 2024 hingga 5 Februari 2024.
                </p>
                <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 text-[#1e3a8a] font-semibold hover:gap-3 transition-all group/link">
                    Baca selengkapnya
                    <svg class="w-5 h-5 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </article>
            <article class="scroll-animate-right bg-white rounded-xl border border-gray-200 p-6 md:p-8 hover:border-[#1e3a8a] hover:shadow-xl transition-all duration-300 group">
                <div class="flex items-center gap-3 mb-4">
                    <span class="bg-blue-100 text-[#1e3a8a] px-4 py-1.5 text-xs font-semibold rounded-full">Informasi</span>
                    <time class="text-xs text-gray-500 font-medium">10 Januari 2024</time>
                </div>
                <h3 class="font-bold text-gray-900 mb-3 text-xl md:text-2xl group-hover:text-[#1e3a8a] transition-colors leading-tight">
                    Jadwal Pelayanan Administrasi Kependudukan
                </h3>
                <p class="text-gray-700 text-base leading-relaxed mb-6">
                    Pelayanan administrasi kependudukan dilayani setiap hari kerja Senin hingga Jumat pukul 08:00 - 15:00 WIB. Untuk layanan khusus dapat menghubungi kantor desa terlebih dahulu.
                </p>
                <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 text-[#1e3a8a] font-semibold hover:gap-3 transition-all group/link">
                    Baca selengkapnya
                    <svg class="w-5 h-5 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </article>
        </div>
    </div>

    <!-- Galeri Kegiatan Modern -->
    <div class="mb-16 scroll-animate">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <div class="h-1 w-16 bg-[#1e3a8a] rounded-full"></div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Galeri Kegiatan</h2>
                </div>
                <p class="text-gray-600">Dokumentasi kegiatan dan program desa</p>
            </div>
            <a href="{{ route('galeri') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#1e3a8a] text-white font-medium rounded-lg hover:bg-blue-800 transition-all shadow-md hover:shadow-lg">
                Lihat Semua
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
            @for($i = 1; $i <= 8; $i++)
            <div class="scroll-animate-gallery group relative bg-white rounded-xl border border-gray-200 overflow-hidden hover:border-[#1e3a8a] hover:shadow-xl transition-all duration-300 cursor-pointer">
                <div class="aspect-square bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                    @if (file_exists(public_path('images/galeri/gotong-royong-' . $i . '.jpg')))
                        <img src="{{ asset('images/galeri/gotong-royong-' . $i . '.jpg') }}" alt="Galeri {{ $i }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#1e3a8a]/10 to-blue-100">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
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

    <!-- Quick Links Modern -->
    <div class="mb-16">
        <div class="text-center mb-10">
            <div class="flex items-center justify-center gap-3 mb-3">
                <div class="h-1 w-16 bg-[#1e3a8a] rounded-full"></div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Akses Cepat</h2>
                <div class="h-1 w-16 bg-[#1e3a8a] rounded-full"></div>
            </div>
            <p class="text-gray-600 text-lg">Layanan dan informasi penting</p>
                        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            <a href="{{ route('layanan') }}" class="scroll-animate bg-white rounded-xl border-2 border-gray-200 p-6 text-center hover:border-[#1e3a8a] hover:shadow-lg transition-all duration-300 group">
                <div class="bg-[#1e3a8a]/10 w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:bg-[#1e3a8a] group-hover:scale-110 transition-all duration-300">
                    <svg class="w-8 h-8 text-[#1e3a8a] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-1 group-hover:text-[#1e3a8a] transition-colors">Layanan</h3>
                <p class="text-sm text-gray-600">Administrasi</p>
            </a>
            <a href="{{ route('data') }}" class="scroll-animate bg-white rounded-xl border-2 border-gray-200 p-6 text-center hover:border-[#1e3a8a] hover:shadow-lg transition-all duration-300 group">
                <div class="bg-[#1e3a8a]/10 w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:bg-[#1e3a8a] group-hover:scale-110 transition-all duration-300">
                    <svg class="w-8 h-8 text-[#1e3a8a] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-1 group-hover:text-[#1e3a8a] transition-colors">Data Desa</h3>
                <p class="text-sm text-gray-600">Statistik</p>
            </a>
            <a href="{{ route('umkm') }}" class="scroll-animate bg-white rounded-xl border-2 border-gray-200 p-6 text-center hover:border-[#1e3a8a] hover:shadow-lg transition-all duration-300 group">
                <div class="bg-[#1e3a8a]/10 w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:bg-[#1e3a8a] group-hover:scale-110 transition-all duration-300">
                    <svg class="w-8 h-8 text-[#1e3a8a] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-1 group-hover:text-[#1e3a8a] transition-colors">UMKM</h3>
                <p class="text-sm text-gray-600">Ekonomi</p>
            </a>
            <a href="{{ route('kontak') }}" class="scroll-animate bg-white rounded-xl border-2 border-gray-200 p-6 text-center hover:border-[#1e3a8a] hover:shadow-lg transition-all duration-300 group">
                <div class="bg-[#1e3a8a]/10 w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:bg-[#1e3a8a] group-hover:scale-110 transition-all duration-300">
                    <svg class="w-8 h-8 text-[#1e3a8a] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-1 group-hover:text-[#1e3a8a] transition-colors">Kontak</h3>
                <p class="text-sm text-gray-600">Hubungi Kami</p>
            </a>
        </div>
    </div>

    <!-- Informasi Darurat Modern -->
    <div class="scroll-animate bg-gradient-to-br from-red-50 via-orange-50 to-red-50 rounded-2xl border-2 border-red-200 p-8 md:p-10 shadow-lg">
        <div class="flex flex-col md:flex-row items-start gap-6">
            <div class="bg-red-600 p-4 rounded-xl flex-shrink-0">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
            </div>
            <div class="flex-1">
                <h2 class="text-2xl md:text-3xl font-bold text-red-800 mb-4">Kontak Darurat</h2>
                <p class="text-gray-700 text-base md:text-lg mb-6 leading-relaxed">
                    Apabila terjadi keadaan darurat atau bencana, segera hubungi nomor-nomor berikut:
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="bg-white rounded-lg p-4 border border-red-200 hover:border-red-400 transition-colors">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="bg-red-100 p-2 rounded-lg">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <span class="font-semibold text-gray-900">Polisi</span>
                        </div>
                        <a href="tel:110" class="text-2xl font-bold text-[#1e3a8a] hover:underline">110</a>
                    </div>
                    <div class="bg-white rounded-lg p-4 border border-red-200 hover:border-red-400 transition-colors">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="bg-red-100 p-2 rounded-lg">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.657 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path>
                                </svg>
                            </div>
                            <span class="font-semibold text-gray-900">Pemadam</span>
                        </div>
                        <a href="tel:113" class="text-2xl font-bold text-[#1e3a8a] hover:underline">113</a>
                    </div>
                    <div class="bg-white rounded-lg p-4 border border-red-200 hover:border-red-400 transition-colors">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="bg-red-100 p-2 rounded-lg">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                            <span class="font-semibold text-gray-900">Ambulans</span>
                        </div>
                        <a href="tel:119" class="text-2xl font-bold text-[#1e3a8a] hover:underline">119</a>
                    </div>
                </div>
                <a href="{{ route('darurat') }}" class="inline-flex items-center gap-2 text-[#1e3a8a] font-semibold hover:gap-3 transition-all group/link">
                    Informasi lengkap darurat & keamanan
                    <svg class="w-5 h-5 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
            </div>
        </div>
    </div>

    <style>
        /* Hero Background Images */
        .hero-bg-1 {
            background-image: url('{{ asset('images/hero-1.jpg') }}'), url('https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?w=1920&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .hero-bg-2 {
            background-image: url('{{ asset('images/hero-2.jpg') }}'), url('https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=1920&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .hero-bg-3 {
            background-image: url('{{ asset('images/hero-3.jpg') }}'), url('https://images.unsplash.com/photo-1501594907352-04cda38ebc29?w=1920&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
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
