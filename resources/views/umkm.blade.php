@extends('layouts.app')

@section('title', 'Ekonomi & UMKM - Website Resmi Pemerintah Desa')

@section('content')
    <!-- Hero Section -->
    <div class="mb-12 scroll-animate" data-animation="fade-up">
        <div class="bg-gradient-to-r from-green-700 to-green-800 rounded-2xl p-8 md:p-12 text-white shadow-xl">
            <div class="flex items-center gap-4 mb-6">
                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl">
                    <svg class="w-10 h-10 md:w-12 md:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl md:text-5xl font-bold mb-2">Ekonomi & UMKM Desa</h1>
                    <p class="text-green-100 text-base md:text-lg">Mendorong pertumbuhan ekonomi lokal melalui pengembangan usaha mikro, kecil, dan menengah</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik UMKM -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 mb-12">
        <div class="scroll-animate bg-white rounded-xl border border-gray-200 p-6 text-center hover:border-green-600 hover:shadow-lg transition-all duration-300" data-animation="fade-up" data-delay="100">
            <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <div class="text-3xl md:text-4xl font-bold text-green-800 mb-2">25</div>
            <div class="text-sm md:text-base text-gray-600 font-medium">UMKM Terdaftar</div>
        </div>
        <div class="scroll-animate bg-white rounded-xl border border-gray-200 p-6 text-center hover:border-green-600 hover:shadow-lg transition-all duration-300" data-animation="fade-up" data-delay="200">
            <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                </svg>
            </div>
            <div class="text-3xl md:text-4xl font-bold text-green-800 mb-2">8</div>
            <div class="text-sm md:text-base text-gray-600 font-medium">Kategori Usaha</div>
        </div>
        <div class="scroll-animate bg-white rounded-xl border border-gray-200 p-6 text-center hover:border-green-600 hover:shadow-lg transition-all duration-300" data-animation="fade-up" data-delay="300">
            <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-purple-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                </svg>
            </div>
            <div class="text-3xl md:text-4xl font-bold text-green-800 mb-2">4</div>
            <div class="text-sm md:text-base text-gray-600 font-medium">Program Aktif</div>
        </div>
        <div class="scroll-animate bg-white rounded-xl border border-gray-200 p-6 text-center hover:border-green-600 hover:shadow-lg transition-all duration-300" data-animation="fade-up" data-delay="400">
            <div class="bg-orange-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-orange-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
            <div class="text-3xl md:text-4xl font-bold text-green-800 mb-2">150+</div>
            <div class="text-sm md:text-base text-gray-600 font-medium">Tenaga Kerja</div>
        </div>
    </div>

    <!-- Daftar UMKM -->
    <div class="mb-12 scroll-animate" data-animation="fade-up" data-delay="100">
        <div class="mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Daftar UMKM Desa</h2>
                    <p class="text-gray-600">Temukan berbagai produk dan jasa unggulan dari UMKM lokal</p>
                </div>
            </div>
            
            <!-- Filter Kategori -->
            <div class="flex flex-wrap gap-2 mb-6">
                <button class="filter-btn active px-5 py-2.5 bg-green-700 text-white text-sm font-medium hover:bg-green-800 transition-all rounded-lg shadow-sm" data-filter="all">
                    Semua
                </button>
                <button class="filter-btn px-5 py-2.5 bg-white text-gray-700 text-sm font-medium hover:bg-gray-50 transition-all rounded-lg border border-gray-200 shadow-sm" data-filter="kerajinan">
                    Kerajinan
                </button>
                <button class="filter-btn px-5 py-2.5 bg-white text-gray-700 text-sm font-medium hover:bg-gray-50 transition-all rounded-lg border border-gray-200 shadow-sm" data-filter="makanan">
                    Makanan
                </button>
                <button class="filter-btn px-5 py-2.5 bg-white text-gray-700 text-sm font-medium hover:bg-gray-50 transition-all rounded-lg border border-gray-200 shadow-sm" data-filter="fashion">
                    Fashion
                </button>
                <button class="filter-btn px-5 py-2.5 bg-white text-gray-700 text-sm font-medium hover:bg-gray-50 transition-all rounded-lg border border-gray-200 shadow-sm" data-filter="jasa">
                    Jasa
                </button>
                <button class="filter-btn px-5 py-2.5 bg-white text-gray-700 text-sm font-medium hover:bg-gray-50 transition-all rounded-lg border border-gray-200 shadow-sm" data-filter="perdagangan">
                    Perdagangan
                </button>
            </div>
        </div>
        
        <!-- Grid UMKM -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="umkm-grid">
            <!-- UMKM 1 -->
            <div class="umkm-card scroll-animate bg-white rounded-xl border border-gray-200 overflow-hidden hover:border-green-500 hover:shadow-xl transition-all duration-300 group cursor-pointer" data-animation="scale-fade" data-delay="200" data-category="kerajinan">
                <div class="relative aspect-[4/3] bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                    @if (file_exists(public_path('images/umkm/kerajinan-tangan-1.jpg')))
                        <img src="{{ asset('images/umkm/kerajinan-tangan-1.jpg') }}" alt="Kerajinan Tangan" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-200">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    @endif
                    <div class="absolute top-3 left-3">
                        <span class="bg-green-600 text-white px-3 py-1.5 text-xs font-semibold rounded-lg shadow-md">Kerajinan</span>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-green-700 transition-colors line-clamp-1">Kerajinan Tangan Anyaman</h3>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed line-clamp-2">Produk kerajinan anyaman dari rotan dan bambu dengan kualitas terbaik dan desain tradisional</p>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Pemilik</p>
                            <p class="text-sm font-semibold text-gray-900">Ibu Siti</p>
                        </div>
                        <a href="tel:081234567890" class="bg-green-600 text-white px-4 py-2 text-sm font-medium hover:bg-green-700 transition-colors inline-flex items-center gap-2 rounded-lg shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            Hubungi
                        </a>
                    </div>
                </div>
            </div>

            <!-- UMKM 2 -->
            <div class="umkm-card scroll-animate bg-white rounded-xl border border-gray-200 overflow-hidden hover:border-green-500 hover:shadow-xl transition-all duration-300 group cursor-pointer" data-animation="scale-fade" data-delay="300" data-category="makanan">
                <div class="relative aspect-[4/3] bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                    @if (file_exists(public_path('images/umkm/makanan-khas-1.jpg')))
                        <img src="{{ asset('images/umkm/makanan-khas-1.jpg') }}" alt="Makanan Khas" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-200">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                    @endif
                    <div class="absolute top-3 left-3">
                        <span class="bg-orange-500 text-white px-3 py-1.5 text-xs font-semibold rounded-lg shadow-md">Makanan</span>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-green-700 transition-colors line-clamp-1">Makanan Khas Desa</h3>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed line-clamp-2">Produk makanan tradisional dan kue khas daerah dengan cita rasa autentik dan bahan lokal</p>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Pemilik</p>
                            <p class="text-sm font-semibold text-gray-900">Ibu Dewi</p>
                        </div>
                        <a href="tel:081234567891" class="bg-green-600 text-white px-4 py-2 text-sm font-medium hover:bg-green-700 transition-colors inline-flex items-center gap-2 rounded-lg shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            Hubungi
                        </a>
                    </div>
                </div>
            </div>

            <!-- UMKM 3 -->
            <div class="umkm-card scroll-animate bg-white rounded-xl border border-gray-200 overflow-hidden hover:border-green-500 hover:shadow-xl transition-all duration-300 group cursor-pointer" data-animation="scale-fade" data-delay="400" data-category="fashion">
                <div class="relative aspect-[4/3] bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                    @if (file_exists(public_path('images/umkm/batik-1.jpg')))
                        <img src="{{ asset('images/umkm/batik-1.jpg') }}" alt="Batik" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-200">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                            </svg>
                        </div>
                    @endif
                    <div class="absolute top-3 left-3">
                        <span class="bg-purple-500 text-white px-3 py-1.5 text-xs font-semibold rounded-lg shadow-md">Fashion</span>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-green-700 transition-colors line-clamp-1">Batik Tulis Eksklusif</h3>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed line-clamp-2">Produk batik tulis dengan motif khas daerah yang eksklusif dan berkualitas tinggi</p>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Pemilik</p>
                            <p class="text-sm font-semibold text-gray-900">Ibu Ratna</p>
                        </div>
                        <a href="tel:081234567892" class="bg-green-600 text-white px-4 py-2 text-sm font-medium hover:bg-green-700 transition-colors inline-flex items-center gap-2 rounded-lg shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            Hubungi
                        </a>
                    </div>
                </div>
            </div>

            <!-- UMKM 4 -->
            <div class="umkm-card scroll-animate bg-white rounded-xl border border-gray-200 overflow-hidden hover:border-green-500 hover:shadow-xl transition-all duration-300 group cursor-pointer" data-animation="scale-fade" data-delay="500" data-category="makanan">
                <div class="relative aspect-[4/3] bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                    @if (file_exists(public_path('images/umkm/olahan-pangan-1.jpg')))
                        <img src="{{ asset('images/umkm/olahan-pangan-1.jpg') }}" alt="Olahan Pangan" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-200">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                    @endif
                    <div class="absolute top-3 left-3">
                        <span class="bg-orange-500 text-white px-3 py-1.5 text-xs font-semibold rounded-lg shadow-md">Makanan</span>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-green-700 transition-colors line-clamp-1">Olahan Pangan Lokal</h3>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed line-clamp-2">Produk olahan pangan dari hasil pertanian lokal yang sehat dan bergizi</p>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Pemilik</p>
                            <p class="text-sm font-semibold text-gray-900">Bapak Ahmad</p>
                        </div>
                        <a href="tel:081234567893" class="bg-green-600 text-white px-4 py-2 text-sm font-medium hover:bg-green-700 transition-colors inline-flex items-center gap-2 rounded-lg shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            Hubungi
                        </a>
                    </div>
                </div>
            </div>

            <!-- UMKM 5 -->
            <div class="umkm-card scroll-animate bg-white rounded-xl border border-gray-200 overflow-hidden hover:border-green-500 hover:shadow-xl transition-all duration-300 group cursor-pointer" data-animation="scale-fade" data-delay="600" data-category="jasa">
                <div class="relative aspect-[4/3] bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                    @if (file_exists(public_path('images/umkm/jasa-cukur-1.jpg')))
                        <img src="{{ asset('images/umkm/jasa-cukur-1.jpg') }}" alt="Jasa Cukur" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-200">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    @endif
                    <div class="absolute top-3 left-3">
                        <span class="bg-blue-500 text-white px-3 py-1.5 text-xs font-semibold rounded-lg shadow-md">Jasa</span>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-green-700 transition-colors line-clamp-1">Jasa Cukur Rambut</h3>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed line-clamp-2">Layanan jasa potong rambut untuk pria dan anak-anak dengan harga terjangkau</p>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Pemilik</p>
                            <p class="text-sm font-semibold text-gray-900">Bapak Budi</p>
                        </div>
                        <a href="tel:081234567894" class="bg-green-600 text-white px-4 py-2 text-sm font-medium hover:bg-green-700 transition-colors inline-flex items-center gap-2 rounded-lg shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            Hubungi
                        </a>
                    </div>
                </div>
            </div>

            <!-- UMKM 6 -->
            <div class="umkm-card scroll-animate bg-white rounded-xl border border-gray-200 overflow-hidden hover:border-green-500 hover:shadow-xl transition-all duration-300 group cursor-pointer" data-animation="scale-fade" data-delay="700" data-category="perdagangan">
                <div class="relative aspect-[4/3] bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                    @if (file_exists(public_path('images/umkm/toko-kelontong-1.jpg')))
                        <img src="{{ asset('images/umkm/toko-kelontong-1.jpg') }}" alt="Toko Kelontong" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-200">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                    @endif
                    <div class="absolute top-3 left-3">
                        <span class="bg-indigo-500 text-white px-3 py-1.5 text-xs font-semibold rounded-lg shadow-md">Perdagangan</span>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-green-700 transition-colors line-clamp-1">Toko Kelontong</h3>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed line-clamp-2">Toko kebutuhan sehari-hari dan sembako dengan harga terjangkau dan lengkap</p>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Pemilik</p>
                            <p class="text-sm font-semibold text-gray-900">Ibu Sari</p>
                        </div>
                        <a href="tel:081234567895" class="bg-green-600 text-white px-4 py-2 text-sm font-medium hover:bg-green-700 transition-colors inline-flex items-center gap-2 rounded-lg shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            Hubungi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Program Pengembangan UMKM -->
    <div class="mb-12 scroll-animate bg-white rounded-2xl border border-gray-200 p-8 md:p-10 shadow-lg" data-animation="fade-up">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-8">Program Pengembangan UMKM</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="scroll-animate bg-gradient-to-br from-green-50 to-white border-2 border-green-200 rounded-xl p-6 hover:border-green-400 hover:shadow-lg transition-all duration-300" data-animation="fade-up" data-delay="100">
                <div class="flex items-start gap-4">
                    <div class="bg-green-600 p-4 rounded-xl flex-shrink-0">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-gray-900 mb-2 text-xl">Pelatihan Kewirausahaan</h3>
                        <p class="text-gray-700 text-sm md:text-base leading-relaxed mb-4">
                            Program pelatihan untuk meningkatkan kemampuan wirausaha, meliputi manajemen keuangan, pemasaran, dan pengembangan produk.
                        </p>
                        <div class="flex items-center gap-2 text-sm text-gray-600 bg-white/50 rounded-lg px-3 py-2">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span><strong>Jadwal:</strong> Setiap bulan, Sabtu 09:00 - 12:00 WIB</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="scroll-animate bg-gradient-to-br from-blue-50 to-white border-2 border-blue-200 rounded-xl p-6 hover:border-blue-400 hover:shadow-lg transition-all duration-300" data-animation="fade-up" data-delay="200">
                <div class="flex items-start gap-4">
                    <div class="bg-blue-600 p-4 rounded-xl flex-shrink-0">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-gray-900 mb-2 text-xl">Bantuan Modal Usaha</h3>
                        <p class="text-gray-700 text-sm md:text-base leading-relaxed mb-4">
                            Program bantuan modal usaha untuk UMKM yang memenuhi kriteria, dengan syarat dan ketentuan yang berlaku.
                        </p>
                        <div class="flex items-center gap-2 text-sm text-gray-600 bg-white/50 rounded-lg px-3 py-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span><strong>Info:</strong> Hubungi kantor desa untuk detail</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="scroll-animate bg-gradient-to-br from-purple-50 to-white border-2 border-purple-200 rounded-xl p-6 hover:border-purple-400 hover:shadow-lg transition-all duration-300" data-animation="fade-up" data-delay="300">
                <div class="flex items-start gap-4">
                    <div class="bg-purple-600 p-4 rounded-xl flex-shrink-0">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-gray-900 mb-2 text-xl">Pendampingan Bisnis</h3>
                        <p class="text-gray-700 text-sm md:text-base leading-relaxed mb-4">
                            Program pendampingan untuk membantu pengembangan usaha, mulai dari perencanaan bisnis hingga strategi pemasaran.
                        </p>
                        <div class="flex items-center gap-2 text-sm text-gray-600 bg-white/50 rounded-lg px-3 py-2">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span><strong>Kontak:</strong> Kaur Pembangunan - (021) 1234-5678</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="scroll-animate bg-gradient-to-br from-orange-50 to-white border-2 border-orange-200 rounded-xl p-6 hover:border-orange-400 hover:shadow-lg transition-all duration-300" data-animation="fade-up" data-delay="400">
                <div class="flex items-start gap-4">
                    <div class="bg-orange-600 p-4 rounded-xl flex-shrink-0">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-gray-900 mb-2 text-xl">Promosi Produk UMKM</h3>
                        <p class="text-gray-700 text-sm md:text-base leading-relaxed mb-4">
                            Program promosi produk UMKM melalui website desa, media sosial, dan event pameran produk lokal.
                        </p>
                        <div class="flex items-center gap-2 text-sm text-gray-600 bg-white/50 rounded-lg px-3 py-2">
                            <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span><strong>Daftar:</strong> Gratis untuk UMKM terdaftar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .scroll-animate {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .scroll-animate.animate-active {
            opacity: 1;
            transform: translateY(0);
        }
        .scroll-animate[data-animation="fade-up"] {
            opacity: 0;
            transform: translateY(20px);
        }
        .scroll-animate[data-animation="fade-up"].animate-active {
            opacity: 1;
            transform: translateY(0);
        }
        .scroll-animate[data-animation="scale-fade"] {
            opacity: 0;
            transform: scale(0.9);
        }
        .scroll-animate[data-animation="scale-fade"].animate-active {
            opacity: 1;
            transform: scale(1);
        }
        .line-clamp-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .filter-btn.active {
            background-color: rgb(21 128 61);
            color: white;
        }
        .umkm-card.hidden {
            display: none;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Scroll Animation
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const element = entry.target;
                        const animationType = element.dataset.animation || 'fade-in';
                        const delay = parseInt(element.dataset.delay) || 0;

                        setTimeout(() => {
                            element.classList.add('animate-active');
                        }, delay);
                        observer.unobserve(element);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.scroll-animate').forEach(element => {
                observer.observe(element);
            });

            // Filter Functionality
            const filterButtons = document.querySelectorAll('.filter-btn');
            const umkmCards = document.querySelectorAll('.umkm-card');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    // Add active class to clicked button
                    button.classList.add('active');
                    
                    const filter = button.dataset.filter;
                    
                    umkmCards.forEach(card => {
                        if (filter === 'all' || card.dataset.category === filter) {
                            card.classList.remove('hidden');
                            card.style.display = '';
                        } else {
                            card.classList.add('hidden');
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
@endsection
