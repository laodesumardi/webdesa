@extends('layouts.app')

@section('title', 'Pemerintahan Desa - Website Resmi Pemerintah Desa')

@section('content')
    <div class="mb-8 scroll-animate" data-animation="fade-up">
        <h1 class="text-2xl md:text-3xl font-bold text-green-800 mb-2">Pemerintahan Desa</h1>
        <p class="text-gray-600 text-base md:text-lg">Struktur organisasi dan perangkat desa</p>
    </div>

    <!-- Struktur Organisasi -->
    <div class="scroll-animate bg-white border border-gray-200 p-6 md:p-8 mb-8" data-animation="fade-up">
        <h2 class="text-xl md:text-2xl font-bold text-green-800 mb-6 pb-3 border-b-2 border-green-800">Struktur Organisasi Pemerintahan Desa</h2>
        
        <div class="mb-6 overflow-x-auto">
            <div class="min-w-full flex justify-center bg-gray-50 border border-gray-200 p-4 md:p-8">
                @if (file_exists(public_path('images/struktur-organisasi.jpg')))
                    <img src="{{ asset('images/struktur-organisasi.jpg') }}" alt="Struktur Organisasi Pemerintahan Desa" class="w-full max-w-6xl mx-auto">
                @else
                    <svg viewBox="0 0 1000 750" class="w-full max-w-6xl" xmlns="http://www.w3.org/2000/svg">
                        <!-- Garis penghubung -->
                        <line x1="500" y1="100" x2="500" y2="180" stroke="#166534" stroke-width="3"/>
                        <line x1="500" y1="250" x2="250" y2="350" stroke="#166534" stroke-width="3"/>
                        <line x1="500" y1="250" x2="500" y2="350" stroke="#166534" stroke-width="3"/>
                        <line x1="500" y1="250" x2="750" y2="350" stroke="#166534" stroke-width="3"/>
                        <line x1="250" y1="450" x2="125" y2="550" stroke="#166534" stroke-width="3"/>
                        <line x1="250" y1="450" x2="250" y2="550" stroke="#166534" stroke-width="3"/>
                        <line x1="250" y1="450" x2="375" y2="550" stroke="#166534" stroke-width="3"/>
                        <line x1="500" y1="450" x2="437" y2="550" stroke="#166534" stroke-width="3"/>
                        <line x1="500" y1="450" x2="562" y2="550" stroke="#166534" stroke-width="3"/>
                        <line x1="750" y1="450" x2="687" y2="550" stroke="#166534" stroke-width="3"/>
                        <line x1="750" y1="450" x2="812" y2="550" stroke="#166534" stroke-width="3"/>
                        
                        <!-- Kepala Desa -->
                        <rect x="375" y="25" width="250" height="75" rx="5" fill="#166534" stroke="#14532d" stroke-width="3"/>
                        <text x="500" y="60" text-anchor="middle" fill="white" font-size="18" font-weight="bold">Kepala Desa</text>
                        <text x="500" y="80" text-anchor="middle" fill="white" font-size="14">Nama Kepala Desa</text>
                        
                        <!-- Sekretaris Desa -->
                        <rect x="375" y="180" width="250" height="70" rx="5" fill="#1e7e34" stroke="#166534" stroke-width="3"/>
                        <text x="500" y="210" text-anchor="middle" fill="white" font-size="18" font-weight="bold">Sekretaris Desa</text>
                        <text x="500" y="230" text-anchor="middle" fill="white" font-size="14">Nama Sekretaris</text>
                        
                        <!-- Kaur Pemerintahan -->
                        <rect x="125" y="350" width="250" height="100" rx="5" fill="#22c55e" stroke="#166534" stroke-width="3"/>
                        <text x="250" y="380" text-anchor="middle" fill="white" font-size="16" font-weight="bold">Kepala Urusan</text>
                        <text x="250" y="400" text-anchor="middle" fill="white" font-size="16" font-weight="bold">Pemerintahan</text>
                        <text x="250" y="420" text-anchor="middle" fill="white" font-size="12">Nama Kaur Pemerintahan</text>
                        <text x="250" y="435" text-anchor="middle" fill="white" font-size="12">NIP: 1234567890123457</text>
                        
                        <!-- Kaur Pembangunan -->
                        <rect x="375" y="350" width="250" height="100" rx="5" fill="#22c55e" stroke="#166534" stroke-width="3"/>
                        <text x="500" y="380" text-anchor="middle" fill="white" font-size="16" font-weight="bold">Kepala Urusan</text>
                        <text x="500" y="400" text-anchor="middle" fill="white" font-size="16" font-weight="bold">Pembangunan</text>
                        <text x="500" y="420" text-anchor="middle" fill="white" font-size="12">Nama Kaur Pembangunan</text>
                        <text x="500" y="435" text-anchor="middle" fill="white" font-size="12">NIP: 1234567890123458</text>
                        
                        <!-- Kaur Kesra -->
                        <rect x="625" y="350" width="250" height="100" rx="5" fill="#22c55e" stroke="#166534" stroke-width="3"/>
                        <text x="750" y="380" text-anchor="middle" fill="white" font-size="16" font-weight="bold">Kepala Urusan</text>
                        <text x="750" y="400" text-anchor="middle" fill="white" font-size="16" font-weight="bold">Kesejahteraan Rakyat</text>
                        <text x="750" y="420" text-anchor="middle" fill="white" font-size="12">Nama Kaur Kesra</text>
                        <text x="750" y="435" text-anchor="middle" fill="white" font-size="12">NIP: 1234567890123459</text>
                        
                        <!-- Staf -->
                        <rect x="62" y="550" width="125" height="65" rx="4" fill="#86efac" stroke="#166534" stroke-width="2"/>
                        <text x="125" y="575" text-anchor="middle" fill="#14532d" font-size="13" font-weight="bold">Staf</text>
                        <text x="125" y="595" text-anchor="middle" fill="#14532d" font-size="12">Pemerintahan</text>
                        
                        <rect x="187" y="550" width="125" height="65" rx="4" fill="#86efac" stroke="#166534" stroke-width="2"/>
                        <text x="250" y="575" text-anchor="middle" fill="#14532d" font-size="13" font-weight="bold">Staf</text>
                        <text x="250" y="595" text-anchor="middle" fill="#14532d" font-size="12">Pemerintahan</text>
                        
                        <rect x="312" y="550" width="125" height="65" rx="4" fill="#86efac" stroke="#166534" stroke-width="2"/>
                        <text x="375" y="575" text-anchor="middle" fill="#14532d" font-size="13" font-weight="bold">Staf</text>
                        <text x="375" y="595" text-anchor="middle" fill="#14532d" font-size="12">Pemerintahan</text>
                        
                        <rect x="375" y="550" width="125" height="65" rx="4" fill="#86efac" stroke="#166534" stroke-width="2"/>
                        <text x="437" y="575" text-anchor="middle" fill="#14532d" font-size="13" font-weight="bold">Staf</text>
                        <text x="437" y="595" text-anchor="middle" fill="#14532d" font-size="12">Pembangunan</text>
                        
                        <rect x="500" y="550" width="125" height="65" rx="4" fill="#86efac" stroke="#166534" stroke-width="2"/>
                        <text x="562" y="575" text-anchor="middle" fill="#14532d" font-size="13" font-weight="bold">Staf</text>
                        <text x="562" y="595" text-anchor="middle" fill="#14532d" font-size="12">Pembangunan</text>
                        
                        <rect x="625" y="550" width="125" height="65" rx="4" fill="#86efac" stroke="#166534" stroke-width="2"/>
                        <text x="687" y="575" text-anchor="middle" fill="#14532d" font-size="13" font-weight="bold">Staf</text>
                        <text x="687" y="595" text-anchor="middle" fill="#14532d" font-size="12">Kesra</text>
                        
                        <rect x="750" y="550" width="125" height="65" rx="4" fill="#86efac" stroke="#166534" stroke-width="2"/>
                        <text x="812" y="575" text-anchor="middle" fill="#14532d" font-size="13" font-weight="bold">Staf</text>
                        <text x="812" y="595" text-anchor="middle" fill="#14532d" font-size="12">Kesra</text>
                    </svg>
                @endif
            </div>
        </div>
        
        <div class="bg-blue-50 border border-blue-200 p-4 text-sm text-gray-700">
            <p><strong>Catatan:</strong> Struktur organisasi di atas dapat diganti dengan gambar asli. Simpan gambar dengan nama <code class="bg-blue-100 px-1">struktur-organisasi.jpg</code> di folder <code class="bg-blue-100 px-1">public/images/</code></p>
        </div>
    </div>

    <!-- Daftar Perangkat Desa -->
    <div class="scroll-animate bg-white border border-gray-200 p-6 md:p-8 mb-8" data-animation="fade-up">
        <h2 class="text-xl md:text-2xl font-bold text-green-800 mb-6 pb-3 border-b-2 border-green-800">Daftar Perangkat Desa</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-sm md:text-base">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left border border-gray-300 font-semibold text-gray-900">No</th>
                        <th class="px-4 py-3 text-left border border-gray-300 font-semibold text-gray-900">Jabatan</th>
                        <th class="px-4 py-3 text-left border border-gray-300 font-semibold text-gray-900">Nama Lengkap</th>
                        <th class="px-4 py-3 text-left border border-gray-300 font-semibold text-gray-900">NIP</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border border-gray-300">1</td>
                        <td class="px-4 py-3 border border-gray-300 font-medium">Kepala Desa</td>
                        <td class="px-4 py-3 border border-gray-300">Nama Kepala Desa</td>
                        <td class="px-4 py-3 border border-gray-300 text-gray-500">-</td>
                    </tr>
                    <tr class="bg-gray-50 hover:bg-gray-100">
                        <td class="px-4 py-3 border border-gray-300">2</td>
                        <td class="px-4 py-3 border border-gray-300 font-medium">Sekretaris Desa</td>
                        <td class="px-4 py-3 border border-gray-300">Nama Sekretaris Desa</td>
                        <td class="px-4 py-3 border border-gray-300">1234567890123456</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border border-gray-300">3</td>
                        <td class="px-4 py-3 border border-gray-300 font-medium">Kepala Urusan Pemerintahan</td>
                        <td class="px-4 py-3 border border-gray-300">Nama Kepala Urusan Pemerintahan</td>
                        <td class="px-4 py-3 border border-gray-300">1234567890123457</td>
                    </tr>
                    <tr class="bg-gray-50 hover:bg-gray-100">
                        <td class="px-4 py-3 border border-gray-300">4</td>
                        <td class="px-4 py-3 border border-gray-300 font-medium">Kepala Urusan Pembangunan</td>
                        <td class="px-4 py-3 border border-gray-300">Nama Kepala Urusan Pembangunan</td>
                        <td class="px-4 py-3 border border-gray-300">1234567890123458</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border border-gray-300">5</td>
                        <td class="px-4 py-3 border border-gray-300 font-medium">Kepala Urusan Kesejahteraan Rakyat</td>
                        <td class="px-4 py-3 border border-gray-300">Nama Kepala Urusan Kesejahteraan Rakyat</td>
                        <td class="px-4 py-3 border border-gray-300">1234567890123459</td>
                    </tr>
                    <tr class="bg-gray-50 hover:bg-gray-100">
                        <td class="px-4 py-3 border border-gray-300">6</td>
                        <td class="px-4 py-3 border border-gray-300 font-medium">Staf Urusan Pemerintahan</td>
                        <td class="px-4 py-3 border border-gray-300">Nama Staf Urusan Pemerintahan</td>
                        <td class="px-4 py-3 border border-gray-300">1234567890123460</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border border-gray-300">7</td>
                        <td class="px-4 py-3 border border-gray-300 font-medium">Staf Urusan Pembangunan</td>
                        <td class="px-4 py-3 border border-gray-300">Nama Staf Urusan Pembangunan</td>
                        <td class="px-4 py-3 border border-gray-300">1234567890123461</td>
                    </tr>
                    <tr class="bg-gray-50 hover:bg-gray-100">
                        <td class="px-4 py-3 border border-gray-300">8</td>
                        <td class="px-4 py-3 border border-gray-300 font-medium">Staf Urusan Kesejahteraan Rakyat</td>
                        <td class="px-4 py-3 border border-gray-300">Nama Staf Urusan Kesejahteraan Rakyat</td>
                        <td class="px-4 py-3 border border-gray-300">1234567890123462</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Badan Permusyawaratan Desa & Lembaga Kemasyarakatan -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
        <!-- BPD -->
        <div class="scroll-animate bg-white border border-gray-200 p-6 md:p-8" data-animation="slide-left">
            <h2 class="text-xl md:text-2xl font-bold text-green-800 mb-6 pb-3 border-b-2 border-green-800">Badan Permusyawaratan Desa (BPD)</h2>
            <div class="space-y-3">
                <div class="border-l-4 border-green-800 pl-4 py-2">
                    <p class="font-semibold text-gray-900">Ketua BPD</p>
                    <p class="text-gray-700 text-sm">Nama Ketua Badan Permusyawaratan Desa</p>
                </div>
                <div class="border-l-4 border-green-800 pl-4 py-2">
                    <p class="font-semibold text-gray-900">Wakil Ketua BPD</p>
                    <p class="text-gray-700 text-sm">Nama Wakil Ketua Badan Permusyawaratan Desa</p>
                </div>
                <div class="border-l-4 border-green-800 pl-4 py-2">
                    <p class="font-semibold text-gray-900">Sekretaris BPD</p>
                    <p class="text-gray-700 text-sm">Nama Sekretaris Badan Permusyawaratan Desa</p>
                </div>
                <div class="border-l-4 border-green-800 pl-4 py-2">
                    <p class="font-semibold text-gray-900">Anggota BPD</p>
                    <p class="text-gray-700 text-sm">Nama Anggota Badan Permusyawaratan Desa</p>
                </div>
            </div>
        </div>

        <!-- Lembaga Kemasyarakatan -->
        <div class="scroll-animate bg-white border border-gray-200 p-6 md:p-8" data-animation="slide-right">
            <h2 class="text-xl md:text-2xl font-bold text-green-800 mb-6 pb-3 border-b-2 border-green-800">Lembaga Kemasyarakatan</h2>
            <div class="space-y-4">
                <div class="bg-gray-50 border border-gray-200 p-4">
                    <h3 class="font-semibold text-gray-900 mb-2">LPM</h3>
                    <p class="text-gray-700 text-sm"><strong>Ketua:</strong> Nama Ketua LPM</p>
                    <p class="text-gray-700 text-sm"><strong>Sekretaris:</strong> Nama Sekretaris LPM</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 p-4">
                    <h3 class="font-semibold text-gray-900 mb-2">PKK</h3>
                    <p class="text-gray-700 text-sm"><strong>Ketua:</strong> Nama Ketua PKK</p>
                    <p class="text-gray-700 text-sm"><strong>Sekretaris:</strong> Nama Sekretaris PKK</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 p-4">
                    <h3 class="font-semibold text-gray-900 mb-2">Karang Taruna</h3>
                    <p class="text-gray-700 text-sm"><strong>Ketua:</strong> Nama Ketua Karang Taruna</p>
                    <p class="text-gray-700 text-sm"><strong>Sekretaris:</strong> Nama Sekretaris Karang Taruna</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 p-4">
                    <h3 class="font-semibold text-gray-900 mb-2">Kelompok Tani</h3>
                    <p class="text-gray-700 text-sm"><strong>Ketua:</strong> Nama Ketua Kelompok Tani</p>
                    <p class="text-gray-700 text-sm"><strong>Sekretaris:</strong> Nama Sekretaris Kelompok Tani</p>
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
