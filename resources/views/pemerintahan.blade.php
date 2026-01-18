@extends('layouts.app')

@section('title', 'Pemerintahan Desa - Website Resmi Pemerintah Desa')

@php
    use App\Models\Content;
    use App\Models\PerangkatDesa;
    
    // Helper function untuk mengambil konten
    function getContent($page, $section, $key, $default = '') {
        return Content::getContent($page, $section, $key, $default);
    }
    
    // Get struktur organisasi
    $strukturGambar = getContent('pemerintahan', 'struktur', 'gambar', '');
    if (empty($strukturGambar)) {
        if (file_exists(public_path('images/struktur-organisasi.jpg'))) {
            $strukturGambar = 'images/struktur-organisasi.jpg';
        } elseif (file_exists(public_path('images/struktur-organisasi.png'))) {
            $strukturGambar = 'images/struktur-organisasi.png';
        }
    }
    
    // Get perangkat desa
    $perangkatDesa = PerangkatDesa::orderBy('urutan')->orderBy('id')->get();
@endphp

@section('content')
    <div class="container mx-auto px-4 sm:px-6">
        <div class="mb-6 sm:mb-8 scroll-animate" data-animation="fade-up">
            <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-[#1e3a8a] mb-2">Pemerintahan Desa</h1>
            <p class="text-gray-600 text-sm sm:text-base md:text-lg">Struktur organisasi dan perangkat desa</p>
        </div>

        <!-- Struktur Organisasi -->
        <div class="scroll-animate bg-white border border-gray-200 p-4 sm:p-6 md:p-8 mb-6 sm:mb-8 rounded-lg" data-animation="fade-up">
            <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-[#1e3a8a] mb-4 sm:mb-6 pb-2 sm:pb-3 border-b-2 border-[#1e3a8a]">Struktur Organisasi Pemerintahan Desa</h2>
            
            <div class="mb-4 sm:mb-6 overflow-x-auto">
                <div class="min-w-full flex justify-center bg-gray-50 border border-gray-200 p-3 sm:p-4 md:p-8 rounded-lg">
                @if ($strukturGambar && file_exists(public_path($strukturGambar)))
                    <img src="{{ asset($strukturGambar) }}" alt="Struktur Organisasi Pemerintahan Desa" class="w-full max-w-6xl mx-auto scroll-animate" data-animation="fade-up">
                @else
                    <svg viewBox="0 0 1000 750" class="w-full max-w-6xl" xmlns="http://www.w3.org/2000/svg">
                        <!-- Garis penghubung -->
                        <line x1="500" y1="100" x2="500" y2="180" stroke="#1e3a8a" stroke-width="3"/>
                        <line x1="500" y1="250" x2="250" y2="350" stroke="#1e3a8a" stroke-width="3"/>
                        <line x1="500" y1="250" x2="500" y2="350" stroke="#1e3a8a" stroke-width="3"/>
                        <line x1="500" y1="250" x2="750" y2="350" stroke="#1e3a8a" stroke-width="3"/>
                        <line x1="250" y1="450" x2="125" y2="550" stroke="#1e3a8a" stroke-width="3"/>
                        <line x1="250" y1="450" x2="250" y2="550" stroke="#1e3a8a" stroke-width="3"/>
                        <line x1="250" y1="450" x2="375" y2="550" stroke="#1e3a8a" stroke-width="3"/>
                        <line x1="500" y1="450" x2="437" y2="550" stroke="#1e3a8a" stroke-width="3"/>
                        <line x1="500" y1="450" x2="562" y2="550" stroke="#1e3a8a" stroke-width="3"/>
                        <line x1="750" y1="450" x2="687" y2="550" stroke="#1e3a8a" stroke-width="3"/>
                        <line x1="750" y1="450" x2="812" y2="550" stroke="#1e3a8a" stroke-width="3"/>
                        
                        <!-- Kepala Desa -->
                        <rect x="375" y="25" width="250" height="75" rx="5" fill="#1e3a8a" stroke="#14532d" stroke-width="3"/>
                        <text x="500" y="60" text-anchor="middle" fill="white" font-size="18" font-weight="bold">Kepala Desa</text>
                        <text x="500" y="80" text-anchor="middle" fill="white" font-size="14">Nama Kepala Desa</text>
                        
                        <!-- Sekretaris Desa -->
                        <rect x="375" y="180" width="250" height="70" rx="5" fill="#1e7e34" stroke="#1e3a8a" stroke-width="3"/>
                        <text x="500" y="210" text-anchor="middle" fill="white" font-size="18" font-weight="bold">Sekretaris Desa</text>
                        <text x="500" y="230" text-anchor="middle" fill="white" font-size="14">Nama Sekretaris</text>
                        
                        <!-- Kaur Pemerintahan -->
                        <rect x="125" y="350" width="250" height="100" rx="5" fill="#22c55e" stroke="#1e3a8a" stroke-width="3"/>
                        <text x="250" y="380" text-anchor="middle" fill="white" font-size="16" font-weight="bold">Kepala Urusan</text>
                        <text x="250" y="400" text-anchor="middle" fill="white" font-size="16" font-weight="bold">Pemerintahan</text>
                        <text x="250" y="420" text-anchor="middle" fill="white" font-size="12">Nama Kaur Pemerintahan</text>
                        <text x="250" y="435" text-anchor="middle" fill="white" font-size="12">NIP: 1234567890123457</text>
                        
                        <!-- Kaur Pembangunan -->
                        <rect x="375" y="350" width="250" height="100" rx="5" fill="#22c55e" stroke="#1e3a8a" stroke-width="3"/>
                        <text x="500" y="380" text-anchor="middle" fill="white" font-size="16" font-weight="bold">Kepala Urusan</text>
                        <text x="500" y="400" text-anchor="middle" fill="white" font-size="16" font-weight="bold">Pembangunan</text>
                        <text x="500" y="420" text-anchor="middle" fill="white" font-size="12">Nama Kaur Pembangunan</text>
                        <text x="500" y="435" text-anchor="middle" fill="white" font-size="12">NIP: 1234567890123458</text>
                        
                        <!-- Kaur Kesra -->
                        <rect x="625" y="350" width="250" height="100" rx="5" fill="#22c55e" stroke="#1e3a8a" stroke-width="3"/>
                        <text x="750" y="380" text-anchor="middle" fill="white" font-size="16" font-weight="bold">Kepala Urusan</text>
                        <text x="750" y="400" text-anchor="middle" fill="white" font-size="16" font-weight="bold">Kesejahteraan Rakyat</text>
                        <text x="750" y="420" text-anchor="middle" fill="white" font-size="12">Nama Kaur Kesra</text>
                        <text x="750" y="435" text-anchor="middle" fill="white" font-size="12">NIP: 1234567890123459</text>
                        
                        <!-- Staf -->
                        <rect x="62" y="550" width="125" height="65" rx="4" fill="#86efac" stroke="#1e3a8a" stroke-width="2"/>
                        <text x="125" y="575" text-anchor="middle" fill="#14532d" font-size="13" font-weight="bold">Staf</text>
                        <text x="125" y="595" text-anchor="middle" fill="#14532d" font-size="12">Pemerintahan</text>
                        
                        <rect x="187" y="550" width="125" height="65" rx="4" fill="#86efac" stroke="#1e3a8a" stroke-width="2"/>
                        <text x="250" y="575" text-anchor="middle" fill="#14532d" font-size="13" font-weight="bold">Staf</text>
                        <text x="250" y="595" text-anchor="middle" fill="#14532d" font-size="12">Pemerintahan</text>
                        
                        <rect x="312" y="550" width="125" height="65" rx="4" fill="#86efac" stroke="#1e3a8a" stroke-width="2"/>
                        <text x="375" y="575" text-anchor="middle" fill="#14532d" font-size="13" font-weight="bold">Staf</text>
                        <text x="375" y="595" text-anchor="middle" fill="#14532d" font-size="12">Pemerintahan</text>
                        
                        <rect x="375" y="550" width="125" height="65" rx="4" fill="#86efac" stroke="#1e3a8a" stroke-width="2"/>
                        <text x="437" y="575" text-anchor="middle" fill="#14532d" font-size="13" font-weight="bold">Staf</text>
                        <text x="437" y="595" text-anchor="middle" fill="#14532d" font-size="12">Pembangunan</text>
                        
                        <rect x="500" y="550" width="125" height="65" rx="4" fill="#86efac" stroke="#1e3a8a" stroke-width="2"/>
                        <text x="562" y="575" text-anchor="middle" fill="#14532d" font-size="13" font-weight="bold">Staf</text>
                        <text x="562" y="595" text-anchor="middle" fill="#14532d" font-size="12">Pembangunan</text>
                        
                        <rect x="625" y="550" width="125" height="65" rx="4" fill="#86efac" stroke="#1e3a8a" stroke-width="2"/>
                        <text x="687" y="575" text-anchor="middle" fill="#14532d" font-size="13" font-weight="bold">Staf</text>
                        <text x="687" y="595" text-anchor="middle" fill="#14532d" font-size="12">Kesra</text>
                        
                        <rect x="750" y="550" width="125" height="65" rx="4" fill="#86efac" stroke="#1e3a8a" stroke-width="2"/>
                        <text x="812" y="575" text-anchor="middle" fill="#14532d" font-size="13" font-weight="bold">Staf</text>
                        <text x="812" y="595" text-anchor="middle" fill="#14532d" font-size="12">Kesra</text>
                    </svg>
                @endif
            </div>
        </div>
        
        </div>

        <!-- Daftar Perangkat Desa -->
        <div class="scroll-animate bg-white border border-gray-200 p-4 sm:p-6 md:p-8 mb-6 sm:mb-8 rounded-lg" data-animation="fade-up">
            <div class="flex items-center gap-2 sm:gap-3 mb-6 sm:mb-8">
                <div class="h-1 w-12 sm:w-16 bg-[#1e3a8a] rounded-full"></div>
                <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-[#1e3a8a]">Daftar Perangkat Desa</h2>
            </div>
            
            @if($perangkatDesa->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
                    @foreach($perangkatDesa as $index => $perangkat)
                        <div class="scroll-animate bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300" data-animation="fade-up" data-delay="{{ $index * 100 }}">
                            <!-- Foto Full -->
                            <div class="w-full h-48 sm:h-56 md:h-64 overflow-hidden bg-gray-100">
                                @if($perangkat->foto && file_exists(public_path($perangkat->foto)))
                                    <img src="{{ asset($perangkat->foto) }}" alt="{{ $perangkat->nama }}" class="w-full h-full object-cover scroll-animate" data-animation="scale-fade">
                                @else
                                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-gray-400 scroll-animate" data-animation="scale-fade" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Informasi -->
                            <div class="p-4 sm:p-5 text-center">
                                <div class="mb-3">
                                    <h3 class="font-bold text-[#1e3a8a] text-base sm:text-lg md:text-xl mb-2">{{ $perangkat->jabatan }}</h3>
                                    <div class="h-0.5 w-16 bg-[#1e3a8a] mx-auto mb-3"></div>
                                    <p class="font-semibold text-gray-900 text-sm sm:text-base mb-1">{{ $perangkat->nama }}</p>
                                </div>
                                @if(!empty($perangkat->nip) && trim($perangkat->nip) !== '')
                                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-2 mt-3">
                                        <p class="text-gray-600 text-xs font-medium mb-1">NIP</p>
                                        <p class="text-gray-800 text-xs sm:text-sm font-semibold">{{ trim($perangkat->nip) }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-gray-50 border-2 border-dashed border-gray-300 rounded-lg">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <p class="text-gray-600 font-medium">Belum ada data perangkat desa</p>
                    <p class="text-gray-500 text-sm mt-1">Silakan tambahkan dari halaman admin</p>
                </div>
            @endif
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
        .scroll-animate[data-animation="slide-left"] {
            opacity: 0;
            transform: translateX(-50px);
        }
        .scroll-animate[data-animation="slide-left"].animate-active {
            opacity: 1;
            transform: translateX(0);
        }
        .scroll-animate[data-animation="slide-right"] {
            opacity: 0;
            transform: translateX(50px);
        }
        .scroll-animate[data-animation="slide-right"].animate-active {
            opacity: 1;
            transform: translateX(0);
        }
        .scroll-animate[data-animation="scale-fade"] {
            opacity: 0;
            transform: scale(0.9);
        }
        .scroll-animate[data-animation="scale-fade"].animate-active {
            opacity: 1;
            transform: scale(1);
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const element = entry.target;
                        const delay = parseInt(element.dataset.delay) || 0;
                        setTimeout(() => {
                            element.classList.add('animate-active');
                        }, delay);
                        observer.unobserve(element);
                    }
                });
            }, { root: null, rootMargin: '0px', threshold: 0.1 });
            document.querySelectorAll('.scroll-animate').forEach(el => observer.observe(el));
        });
    </script>
    </div>
@endsection
