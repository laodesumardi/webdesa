@extends('layouts.app')

@section('title', 'Galeri - Website Resmi Pemerintah Desa')

@section('content')
    <div class="mb-8 scroll-animate" data-animation="fade-up">
        <h1 class="text-2xl md:text-3xl font-bold text-green-800 mb-2">Galeri Desa</h1>
        <p class="text-gray-600 text-base md:text-lg">Dokumentasi kegiatan desa</p>
    </div>

    <!-- Kategori -->
    <div class="mb-6 flex flex-wrap gap-2 scroll-animate" data-animation="fade-up" data-delay="100">
        <button class="px-4 py-2 bg-green-800 text-white text-sm font-medium hover:bg-green-900 transition-colors">Semua</button>
        <button class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium hover:bg-gray-300 transition-colors">Kegiatan</button>
        <button class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium hover:bg-gray-300 transition-colors">Infrastruktur</button>
        <button class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium hover:bg-gray-300 transition-colors">Acara</button>
    </div>

    <!-- Grid Galeri -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
        <!-- Foto 1 -->
        <div class="scroll-animate group relative bg-white border border-gray-200 overflow-hidden hover:border-green-600 transition-all" data-animation="scale-fade" data-delay="200">
            <div class="aspect-square bg-gray-100 overflow-hidden">
                @if (file_exists(public_path('images/galeri/gotong-royong-1.jpg')))
                    <img src="{{ asset('images/galeri/gotong-royong-1.jpg') }}" alt="Gotong Royong" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-gray-200">
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
        <div class="scroll-animate group relative bg-white border border-gray-200 overflow-hidden hover:border-green-600 transition-all" data-animation="scale-fade" data-delay="250">
            <div class="aspect-square bg-gray-100 overflow-hidden">
                @if (file_exists(public_path('images/galeri/posyandu-1.jpg')))
                    <img src="{{ asset('images/galeri/posyandu-1.jpg') }}" alt="Posyandu" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-gray-200">
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
        <div class="scroll-animate group relative bg-white border border-gray-200 overflow-hidden hover:border-green-600 transition-all" data-animation="scale-fade" data-delay="300">
            <div class="aspect-square bg-gray-100 overflow-hidden">
                @if (file_exists(public_path('images/galeri/musyawarah-1.jpg')))
                    <img src="{{ asset('images/galeri/musyawarah-1.jpg') }}" alt="Musyawarah Desa" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-gray-200">
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
        <div class="scroll-animate group relative bg-white border border-gray-200 overflow-hidden hover:border-green-600 transition-all" data-animation="scale-fade" data-delay="350">
            <div class="aspect-square bg-gray-100 overflow-hidden">
                @if (file_exists(public_path('images/galeri/pembangunan-jalan-1.jpg')))
                    <img src="{{ asset('images/galeri/pembangunan-jalan-1.jpg') }}" alt="Pembangunan Jalan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-gray-200">
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
        <div class="scroll-animate group relative bg-white border border-gray-200 overflow-hidden hover:border-green-600 transition-all" data-animation="scale-fade" data-delay="400">
            <div class="aspect-square bg-gray-100 overflow-hidden">
                @if (file_exists(public_path('images/galeri/pembagian-sembako-1.jpg')))
                    <img src="{{ asset('images/galeri/pembagian-sembako-1.jpg') }}" alt="Pembagian Sembako" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-gray-200">
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
        <div class="scroll-animate group relative bg-white border border-gray-200 overflow-hidden hover:border-green-600 transition-all" data-animation="scale-fade" data-delay="450">
            <div class="aspect-square bg-gray-100 overflow-hidden">
                @if (file_exists(public_path('images/galeri/karang-taruna-1.jpg')))
                    <img src="{{ asset('images/galeri/karang-taruna-1.jpg') }}" alt="Karang Taruna" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-gray-200">
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
        <div class="scroll-animate group relative bg-white border border-gray-200 overflow-hidden hover:border-green-600 transition-all" data-animation="scale-fade" data-delay="500">
            <div class="aspect-square bg-gray-100 overflow-hidden">
                @if (file_exists(public_path('images/galeri/peresmian-1.jpg')))
                    <img src="{{ asset('images/galeri/peresmian-1.jpg') }}" alt="Peresmian" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-gray-200">
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
        <div class="scroll-animate group relative bg-white border border-gray-200 overflow-hidden hover:border-green-600 transition-all" data-animation="scale-fade" data-delay="550">
            <div class="aspect-square bg-gray-100 overflow-hidden">
                @if (file_exists(public_path('images/galeri/pkk-1.jpg')))
                    <img src="{{ asset('images/galeri/pkk-1.jpg') }}" alt="PKK" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-gray-200">
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

        <!-- Foto 9 -->
        <div class="scroll-animate group relative bg-white border border-gray-200 overflow-hidden hover:border-green-600 transition-all" data-animation="scale-fade" data-delay="600">
            <div class="aspect-square bg-gray-100 overflow-hidden">
                @if (file_exists(public_path('images/galeri/lpm-1.jpg')))
                    <img src="{{ asset('images/galeri/lpm-1.jpg') }}" alt="LPM" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-gray-200">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                @endif
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <div class="absolute bottom-0 left-0 right-0 p-3 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                <p class="text-white text-sm font-semibold">Kegiatan LPM</p>
                <p class="text-white/80 text-xs">28 September 2023</p>
            </div>
        </div>

        <!-- Foto 10 -->
        <div class="scroll-animate group relative bg-white border border-gray-200 overflow-hidden hover:border-green-600 transition-all" data-animation="scale-fade" data-delay="650">
            <div class="aspect-square bg-gray-100 overflow-hidden">
                @if (file_exists(public_path('images/galeri/kelompok-tani-1.jpg')))
                    <img src="{{ asset('images/galeri/kelompok-tani-1.jpg') }}" alt="Kelompok Tani" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-gray-200">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                @endif
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <div class="absolute bottom-0 left-0 right-0 p-3 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                <p class="text-white text-sm font-semibold">Kegiatan Kelompok Tani</p>
                <p class="text-white/80 text-xs">20 September 2023</p>
            </div>
        </div>

        <!-- Foto 11 -->
        <div class="scroll-animate group relative bg-white border border-gray-200 overflow-hidden hover:border-green-600 transition-all" data-animation="scale-fade" data-delay="700">
            <div class="aspect-square bg-gray-100 overflow-hidden">
                @if (file_exists(public_path('images/galeri/bpd-1.jpg')))
                    <img src="{{ asset('images/galeri/bpd-1.jpg') }}" alt="BPD" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-gray-200">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                @endif
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <div class="absolute bottom-0 left-0 right-0 p-3 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                <p class="text-white text-sm font-semibold">Kegiatan BPD</p>
                <p class="text-white/80 text-xs">15 September 2023</p>
            </div>
        </div>

        <!-- Foto 12 -->
        <div class="scroll-animate group relative bg-white border border-gray-200 overflow-hidden hover:border-green-600 transition-all" data-animation="scale-fade" data-delay="750">
            <div class="aspect-square bg-gray-100 overflow-hidden">
                @if (file_exists(public_path('images/galeri/sosial-1.jpg')))
                    <img src="{{ asset('images/galeri/sosial-1.jpg') }}" alt="Kegiatan Sosial" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-gray-200">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                @endif
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <div class="absolute bottom-0 left-0 right-0 p-3 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                <p class="text-white text-sm font-semibold">Kegiatan Sosial</p>
                <p class="text-white/80 text-xs">10 Agustus 2023</p>
            </div>
        </div>
    </div>

    <!-- Catatan -->
    <div class="scroll-animate bg-white border border-gray-200 p-4 md:p-6 mt-8" data-animation="fade-up">
        <p class="text-sm text-gray-600">
            <strong>Catatan:</strong> Foto-foto di atas dapat diganti dengan foto asli kegiatan desa. 
            Simpan foto dengan nama yang sesuai di folder <code class="bg-gray-100 px-1">public/images/galeri/</code> 
            dan ganti placeholder dengan tag <code class="bg-gray-100 px-1">&lt;img&gt;</code>. 
            Format foto yang disarankan: JPG atau PNG dengan ukuran maksimal 2 MB per foto.
        </p>
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
@endsection
