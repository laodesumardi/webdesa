@extends('layouts.app')

@section('title', 'Beranda - Website Resmi Pemerintah Desa')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-green-800 text-white mb-12 overflow-hidden h-72 md:h-[500px] hero-section-animate">
        <div id="hero-slider" class="flex transition-transform duration-700 ease-in-out h-full">
            <!-- Slide 1 -->
            <div class="min-w-full relative px-4 py-12 md:py-20 flex items-center bg-green-800">
                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat hero-bg-1"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-green-900/70 to-green-900/80"></div>
                <div class="container mx-auto text-center relative z-10">
                    <h2 class="hero-title-animate text-3xl md:text-5xl font-bold mb-4 leading-tight">Selamat Datang di Website Resmi Pemerintah Desa</h2>
                    <p class="hero-text-animate text-base md:text-xl text-green-50 max-w-3xl mx-auto">
                        Media resmi untuk menyampaikan informasi, kebijakan, dan layanan publik
                    </p>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="min-w-full relative px-4 py-12 md:py-20 flex items-center bg-green-800">
                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat hero-bg-2"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-green-900/70 to-green-900/80"></div>
                <div class="container mx-auto text-center relative z-10">
                    <h2 class="hero-title-animate text-3xl md:text-5xl font-bold mb-4 leading-tight">Pelayanan Publik yang Transparan</h2>
                    <p class="hero-text-animate text-base md:text-xl text-green-50 max-w-3xl mx-auto">
                        Informasi layanan administrasi dan program desa tersedia untuk seluruh masyarakat
                    </p>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="min-w-full relative px-4 py-12 md:py-20 flex items-center bg-green-800">
                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat hero-bg-3"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-green-900/70 to-green-900/80"></div>
                <div class="container mx-auto text-center relative z-10">
                    <h2 class="hero-title-animate text-3xl md:text-5xl font-bold mb-4 leading-tight">Partisipasi Masyarakat dalam Pembangunan</h2>
                    <p class="hero-text-animate text-base md:text-xl text-green-50 max-w-3xl mx-auto">
                        Bersama membangun desa yang mandiri, sejahtera, dan berbudaya
                    </p>
                </div>
            </div>
        </div>
        <!-- Navigation Dots -->
        <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex gap-2 z-10 hero-dots-animate">
            <button class="hero-dot w-2.5 h-2.5 bg-white rounded-full opacity-50 hover:opacity-100 transition-all duration-300" data-slide="0"></button>
            <button class="hero-dot w-2.5 h-2.5 bg-white rounded-full opacity-50 hover:opacity-100 transition-all duration-300" data-slide="1"></button>
            <button class="hero-dot w-2.5 h-2.5 bg-white rounded-full opacity-50 hover:opacity-100 transition-all duration-300" data-slide="2"></button>
        </div>
    </div>

    <!-- Statistik Desa -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 mb-12 skeleton-wrapper" id="statistik-skeleton">
        <!-- Skeleton Loading -->
        <div class="skeleton-card">
            <div class="skeleton skeleton-text" style="height: 3rem; width: 60%; margin: 0 auto 0.5rem;"></div>
            <div class="skeleton skeleton-text" style="height: 1rem; width: 80%; margin: 0 auto;"></div>
        </div>
        <div class="skeleton-card">
            <div class="skeleton skeleton-text" style="height: 3rem; width: 60%; margin: 0 auto 0.5rem;"></div>
            <div class="skeleton skeleton-text" style="height: 1rem; width: 80%; margin: 0 auto;"></div>
        </div>
        <div class="skeleton-card">
            <div class="skeleton skeleton-text" style="height: 3rem; width: 60%; margin: 0 auto 0.5rem;"></div>
            <div class="skeleton skeleton-text" style="height: 1rem; width: 80%; margin: 0 auto;"></div>
        </div>
        <div class="skeleton-card">
            <div class="skeleton skeleton-text" style="height: 3rem; width: 60%; margin: 0 auto 0.5rem;"></div>
            <div class="skeleton skeleton-text" style="height: 1rem; width: 80%; margin: 0 auto;"></div>
        </div>
    </div>
    <!-- Statistik Desa Content -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 mb-12 skeleton-content" id="statistik-content">
        <div class="scroll-animate bg-white border border-gray-200 p-6 text-center hover:border-green-600 transition-colors">
            <div class="text-4xl md:text-5xl font-bold text-green-800 mb-2">2.450</div>
            <div class="text-sm md:text-base text-gray-600 font-medium">Jumlah Penduduk</div>
        </div>
        <div class="scroll-animate bg-white border border-gray-200 p-6 text-center hover:border-green-600 transition-colors">
            <div class="text-4xl md:text-5xl font-bold text-green-800 mb-2">250</div>
            <div class="text-sm md:text-base text-gray-600 font-medium">Hektar Luas Wilayah</div>
        </div>
        <div class="scroll-animate bg-white border border-gray-200 p-6 text-center hover:border-green-600 transition-colors">
            <div class="text-4xl md:text-5xl font-bold text-green-800 mb-2">12</div>
            <div class="text-sm md:text-base text-gray-600 font-medium">Rukun Tetangga</div>
        </div>
        <div class="scroll-animate bg-white border border-gray-200 p-6 text-center hover:border-green-600 transition-colors">
            <div class="text-4xl md:text-5xl font-bold text-green-800 mb-2">4</div>
            <div class="text-sm md:text-base text-gray-600 font-medium">Rukun Warga</div>
        </div>
    </div>

    <!-- Sambutan Kepala Desa -->
    <div class="scroll-animate bg-white border border-gray-200 p-8 md:p-10 mb-12">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-2xl md:text-3xl font-bold text-green-800 mb-6 pb-3 border-b-2 border-green-800">Sambutan Kepala Desa</h2>
            <div class="flex flex-col md:flex-row gap-6 md:gap-8">
                <!-- Foto Kepala Desa -->
                <div class="flex-shrink-0">
                    <div class="w-48 h-48 md:w-56 md:h-56 mx-auto md:mx-0 border-2 border-gray-200 overflow-hidden">
                        @if (file_exists(public_path('images/kepala-desa.jpg')))
                            <img src="{{ asset('images/kepala-desa.jpg') }}" alt="Kepala Desa" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                                <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Teks Sambutan -->
                <div class="flex-1 text-gray-700 text-base md:text-lg leading-relaxed space-y-4">
                    <p>
                        Assalamu'alaikum Warahmatullahi Wabarakatuh. Puji syukur kehadirat Allah SWT, atas rahmat dan karunia-Nya, 
                        kami dapat menyampaikan sambutan melalui website resmi Pemerintah Desa ini.
                    </p>
                    <p>
                        Website ini merupakan media komunikasi dan informasi antara Pemerintah Desa dengan seluruh masyarakat. 
                        Melalui website ini, kami berkomitmen untuk menyampaikan informasi yang transparan, akurat, dan dapat 
                        diakses oleh seluruh warga desa.
                    </p>
                    <p>
                        Kami mengajak seluruh masyarakat untuk berpartisipasi aktif dalam pembangunan desa. 
                        Semoga website ini dapat menjadi sarana yang bermanfaat bagi kita semua.
                    </p>
                    <p class="text-gray-900 font-semibold mt-6 text-lg">
                        Wassalamu'alaikum Warahmatullahi Wabarakatuh
                    </p>
                    <p class="text-gray-600 text-base mt-3">
                        Kepala Desa
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Berita Terbaru -->
    <div class="mb-12 scroll-animate">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl md:text-3xl font-bold text-green-800 pb-3 border-b-2 border-green-800">Berita Terbaru</h2>
            <a href="{{ route('berita') }}" class="text-green-800 text-sm md:text-base font-medium hover:underline flex items-center gap-1">
                Lihat Semua
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        <!-- Skeleton Loading Berita -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 skeleton-wrapper" id="berita-skeleton">
            <div class="skeleton-card">
                <div class="skeleton skeleton-text" style="height: 1.5rem; width: 30%; margin-bottom: 1rem;"></div>
                <div class="skeleton skeleton-title"></div>
                <div class="skeleton skeleton-text"></div>
                <div class="skeleton skeleton-text"></div>
                <div class="skeleton skeleton-text" style="width: 80%;"></div>
            </div>
            <div class="skeleton-card">
                <div class="skeleton skeleton-text" style="height: 1.5rem; width: 30%; margin-bottom: 1rem;"></div>
                <div class="skeleton skeleton-title"></div>
                <div class="skeleton skeleton-text"></div>
                <div class="skeleton skeleton-text"></div>
                <div class="skeleton skeleton-text" style="width: 80%;"></div>
            </div>
        </div>
        <!-- Berita Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 skeleton-content" id="berita-content">
            <article class="scroll-animate-left bg-white border border-gray-200 p-6 hover:border-green-600 transition-colors group">
                <div class="flex items-center gap-3 mb-4">
                    <span class="bg-green-100 text-green-800 px-3 py-1.5 text-xs font-semibold">Pengumuman</span>
                    <time class="text-xs text-gray-500">15 Jan 2024</time>
                </div>
                <h3 class="font-bold text-gray-900 mb-3 text-lg md:text-xl group-hover:text-green-800 transition-colors">
                    Pendaftaran Program Bantuan Sosial Tahun 2024
                </h3>
                <p class="text-gray-700 text-sm md:text-base leading-relaxed mb-4">
                    Pemerintah Desa membuka pendaftaran program bantuan sosial untuk warga yang memenuhi kriteria. 
                    Pendaftaran dibuka mulai tanggal 20 Januari 2024 hingga 5 Februari 2024.
                </p>
                <a href="{{ route('berita') }}" class="text-green-800 text-sm font-medium hover:underline inline-flex items-center gap-1">
                    Baca selengkapnya
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </article>
            <article class="scroll-animate-right bg-white border border-gray-200 p-6 hover:border-green-600 transition-colors group">
                <div class="flex items-center gap-3 mb-4">
                    <span class="bg-blue-100 text-blue-800 px-3 py-1.5 text-xs font-semibold">Informasi</span>
                    <time class="text-xs text-gray-500">10 Jan 2024</time>
                </div>
                <h3 class="font-bold text-gray-900 mb-3 text-lg md:text-xl group-hover:text-green-800 transition-colors">
                    Jadwal Pelayanan Administrasi Kependudukan
                </h3>
                <p class="text-gray-700 text-sm md:text-base leading-relaxed mb-4">
                    Pelayanan administrasi kependudukan dilayani setiap hari kerja Senin hingga Jumat 
                    pukul 08:00 - 15:00 WIB. Untuk layanan khusus dapat menghubungi kantor desa terlebih dahulu.
                </p>
                <a href="{{ route('berita') }}" class="text-green-800 text-sm font-medium hover:underline inline-flex items-center gap-1">
                    Baca selengkapnya
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </article>
        </div>
    </div>

    <!-- Galeri Kegiatan -->
    <div class="mb-12 scroll-animate">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl md:text-3xl font-bold text-green-800 pb-3 border-b-2 border-green-800">Galeri Kegiatan</h2>
            <a href="{{ route('galeri') }}" class="text-green-800 text-sm md:text-base font-medium hover:underline flex items-center gap-1">
                Lihat Semua
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
            <!-- Foto 1 -->
            <div class="scroll-animate-gallery group relative bg-white border border-gray-200 overflow-hidden hover:border-green-600 transition-all">
                <div class="aspect-square bg-gray-100 overflow-hidden">
                    @if (file_exists(public_path('images/galeri/gotong-royong-1.jpg')))
                        <img src="{{ asset('images/galeri/gotong-royong-1.jpg') }}" alt="Gotong Royong" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-100">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute bottom-0 left-0 right-0 p-3 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                    <p class="text-white text-sm font-semibold">Gotong Royong Pembersihan</p>
                    <p class="text-white/80 text-xs">14 Januari 2024</p>
                </div>
            </div>
            <!-- Foto 2 -->
            <div class="scroll-animate-gallery group relative bg-white border border-gray-200 overflow-hidden hover:border-green-600 transition-all">
                <div class="aspect-square bg-gray-100 overflow-hidden">
                    @if (file_exists(public_path('images/galeri/posyandu-1.jpg')))
                        <img src="{{ asset('images/galeri/posyandu-1.jpg') }}" alt="Posyandu" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-100">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute bottom-0 left-0 right-0 p-3 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                    <p class="text-white text-sm font-semibold">Kegiatan Posyandu RW 01</p>
                    <p class="text-white/80 text-xs">9 Januari 2024</p>
                </div>
            </div>
            <!-- Foto 3 -->
            <div class="scroll-animate-gallery group relative bg-white border border-gray-200 overflow-hidden hover:border-green-600 transition-all">
                <div class="aspect-square bg-gray-100 overflow-hidden">
                    @if (file_exists(public_path('images/galeri/musyawarah-1.jpg')))
                        <img src="{{ asset('images/galeri/musyawarah-1.jpg') }}" alt="Musyawarah Desa" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-100">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute bottom-0 left-0 right-0 p-3 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                    <p class="text-white text-sm font-semibold">Musyawarah Desa</p>
                    <p class="text-white/80 text-xs">6 Januari 2024</p>
                </div>
            </div>
            <!-- Foto 4 -->
            <div class="scroll-animate-gallery group relative bg-white border border-gray-200 overflow-hidden hover:border-green-600 transition-all">
                <div class="aspect-square bg-gray-100 overflow-hidden">
                    @if (file_exists(public_path('images/galeri/pembangunan-jalan-1.jpg')))
                        <img src="{{ asset('images/galeri/pembangunan-jalan-1.jpg') }}" alt="Pembangunan Jalan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-100">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute bottom-0 left-0 right-0 p-3 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                    <p class="text-white text-sm font-semibold">Pembangunan Jalan Lingkungan</p>
                    <p class="text-white/80 text-xs">20 Desember 2023</p>
                </div>
            </div>
            <!-- Foto 5 -->
            <div class="scroll-animate-gallery group relative bg-white border border-gray-200 overflow-hidden hover:border-green-600 transition-all">
                <div class="aspect-square bg-gray-100 overflow-hidden">
                    @if (file_exists(public_path('images/galeri/pembagian-sembako-1.jpg')))
                        <img src="{{ asset('images/galeri/pembagian-sembako-1.jpg') }}" alt="Pembagian Sembako" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-100">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute bottom-0 left-0 right-0 p-3 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                    <p class="text-white text-sm font-semibold">Pembagian Sembako</p>
                    <p class="text-white/80 text-xs">20 Desember 2023</p>
                </div>
            </div>
            <!-- Foto 6 -->
            <div class="scroll-animate-gallery group relative bg-white border border-gray-200 overflow-hidden hover:border-green-600 transition-all">
                <div class="aspect-square bg-gray-100 overflow-hidden">
                    @if (file_exists(public_path('images/galeri/karang-taruna-1.jpg')))
                        <img src="{{ asset('images/galeri/karang-taruna-1.jpg') }}" alt="Karang Taruna" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-100">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute bottom-0 left-0 right-0 p-3 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                    <p class="text-white text-sm font-semibold">Kegiatan Karang Taruna</p>
                    <p class="text-white/80 text-xs">15 November 2023</p>
                </div>
            </div>
            <!-- Foto 7 -->
            <div class="scroll-animate-gallery group relative bg-white border border-gray-200 overflow-hidden hover:border-green-600 transition-all">
                <div class="aspect-square bg-gray-100 overflow-hidden">
                    @if (file_exists(public_path('images/galeri/peresmian-1.jpg')))
                        <img src="{{ asset('images/galeri/peresmian-1.jpg') }}" alt="Peresmian" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-100">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute bottom-0 left-0 right-0 p-3 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                    <p class="text-white text-sm font-semibold">Peresmian Infrastruktur</p>
                    <p class="text-white/80 text-xs">10 November 2023</p>
                </div>
            </div>
            <!-- Foto 8 -->
            <div class="scroll-animate-gallery group relative bg-white border border-gray-200 overflow-hidden hover:border-green-600 transition-all">
                <div class="aspect-square bg-gray-100 overflow-hidden">
                    @if (file_exists(public_path('images/galeri/pkk-1.jpg')))
                        <img src="{{ asset('images/galeri/pkk-1.jpg') }}" alt="PKK" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-100">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute bottom-0 left-0 right-0 p-3 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                    <p class="text-white text-sm font-semibold">Kegiatan PKK</p>
                    <p class="text-white/80 text-xs">5 Oktober 2023</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Informasi Darurat -->
    <div class="scroll-animate bg-red-50 border border-red-200 p-6 md:p-8">
        <div class="flex items-start gap-4">
            <svg class="w-7 h-7 text-red-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
            <div class="flex-1">
                <h2 class="text-xl md:text-2xl font-bold text-red-800 mb-3">Kontak Darurat</h2>
                <p class="text-gray-700 text-base mb-4">
                    Apabila terjadi keadaan darurat atau bencana, segera hubungi:
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-base">
                    <div>
                        <span class="font-semibold text-gray-900">Polisi:</span>
                        <a href="tel:110" class="text-green-800 hover:underline ml-2 font-medium">110</a>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-900">Pemadam:</span>
                        <a href="tel:113" class="text-green-800 hover:underline ml-2 font-medium">113</a>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-900">Ambulans:</span>
                        <a href="tel:119" class="text-green-800 hover:underline ml-2 font-medium">119</a>
                    </div>
                </div>
                <p class="text-gray-600 text-sm mt-4">
                    <a href="{{ route('darurat') }}" class="text-green-800 font-medium hover:underline inline-flex items-center gap-1">
                        Informasi lengkap
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </p>
            </div>
        </div>
    </div>

    <style>
        .hero-bg-1 {
            background-image: url('{{ asset('images/hero-1.jpg') }}'), url('https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?w=1200&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .hero-bg-2 {
            background-image: url('{{ asset('images/hero-2.jpg') }}'), url('https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=1200&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .hero-bg-3 {
            background-image: url('{{ asset('images/hero-3.jpg') }}'), url('https://images.unsplash.com/photo-1501594907352-04cda38ebc29?w=1200&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Scroll Animation Styles */
        .scroll-animate {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .scroll-animate.animated {
            opacity: 1;
            transform: translateY(0);
        }

        .scroll-animate-left {
            opacity: 0;
            transform: translateX(-30px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .scroll-animate-left.animated {
            opacity: 1;
            transform: translateX(0);
        }

        .scroll-animate-right {
            opacity: 0;
            transform: translateX(30px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .scroll-animate-right.animated {
            opacity: 1;
            transform: translateX(0);
        }

        .scroll-animate-gallery {
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }

        .scroll-animate-gallery.animated {
            opacity: 1;
            transform: scale(1);
        }

        /* Hero Section Animations */
        .hero-section-animate {
            opacity: 0;
            transform: scale(1.05);
            animation: heroFadeInScale 1s ease-out forwards;
        }

        .hero-title-animate {
            opacity: 0;
            transform: translateY(30px);
            animation: heroFadeInUp 0.8s ease-out 0.3s forwards;
        }

        .hero-text-animate {
            opacity: 0;
            transform: translateY(20px);
            animation: heroFadeInUp 0.8s ease-out 0.5s forwards;
        }

        .hero-dots-animate {
            opacity: 0;
            transform: translateY(10px);
            animation: heroFadeInUp 0.6s ease-out 0.7s forwards;
        }

        @keyframes heroFadeInScale {
            from {
                opacity: 0;
                transform: scale(1.05);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes heroFadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Update animation saat slide berubah */
        .hero-slide-active .hero-title-animate,
        .hero-slide-active .hero-text-animate {
            animation: heroFadeInUp 0.8s ease-out forwards;
        }
    </style>
    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('#hero-slider > div');
        const dots = document.querySelectorAll('.hero-dot');
        const totalSlides = slides.length;

        function showSlide(index) {
            const slider = document.getElementById('hero-slider');
            const slides = document.querySelectorAll('#hero-slider > div');
            
            // Remove active class from all slides
            slides.forEach(slide => {
                slide.classList.remove('hero-slide-active');
            });
            
            // Add active class to current slide
            slides[index].classList.add('hero-slide-active');
            
            slider.style.transform = `translateX(-${index * 100}%)`;
            
            // Animate title and text for current slide
            const currentSlide = slides[index];
            const title = currentSlide.querySelector('.hero-title-animate');
            const text = currentSlide.querySelector('.hero-text-animate');
            
            if (title && text) {
                title.style.animation = 'none';
                text.style.animation = 'none';
                setTimeout(() => {
                    title.style.animation = 'heroFadeInUp 0.8s ease-out forwards';
                    text.style.animation = 'heroFadeInUp 0.8s ease-out 0.2s forwards';
                }, 10);
            }
            
            dots.forEach((dot, i) => {
                if (i === index) {
                    dot.classList.remove('opacity-50');
                    dot.classList.add('opacity-100');
                } else {
                    dot.classList.add('opacity-50');
                    dot.classList.remove('opacity-100');
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            showSlide(currentSlide);
        }

        setInterval(nextSlide, 5000);

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentSlide = index;
                showSlide(currentSlide);
            });
        });

        // Initialize first slide with animation
        document.addEventListener('DOMContentLoaded', () => {
            const firstSlide = document.querySelector('#hero-slider > div:first-child');
            if (firstSlide) {
                firstSlide.classList.add('hero-slide-active');
            }
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

        // Observe all scroll-animate elements
        document.querySelectorAll('.scroll-animate, .scroll-animate-left, .scroll-animate-right').forEach(el => {
            observer.observe(el);
        });

        // Observe gallery items with stagger delay
        document.querySelectorAll('.scroll-animate-gallery').forEach((el, index) => {
            observer.observe(el);
            el.style.transitionDelay = `${index * 0.1}s`;
        });

        // Skeleton Loading Management
        document.addEventListener('DOMContentLoaded', function() {
            // Simulasi loading untuk statistik
            setTimeout(function() {
                const statistikSkeleton = document.getElementById('statistik-skeleton');
                const statistikContent = document.getElementById('statistik-content');
                if (statistikSkeleton && statistikContent) {
                    statistikSkeleton.classList.add('hide');
                    statistikContent.classList.add('show');
                }
            }, 800);

            // Simulasi loading untuk berita
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
    <style>
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
@endsection
