@extends('layouts.app')

@section('title', 'Data Desa - Website Resmi Pemerintah Desa')

@section('content')
    <div class="mb-8 scroll-animate" data-animation="fade-up">
        <h1 class="text-2xl md:text-3xl font-bold text-[#1e3a8a] mb-2">Data Desa</h1>
        <p class="text-gray-600 text-base md:text-lg">Data kependudukan dan statistik desa</p>
    </div>

    <!-- Statistik Kependudukan -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 mb-8">
        <div class="scroll-animate bg-white border border-gray-200 p-6 text-center hover:border-[#1e3a8a] transition-colors" data-animation="fade-up" data-delay="100">
            <div class="text-3xl md:text-4xl font-bold text-[#1e3a8a] mb-2">2.450</div>
            <div class="text-sm md:text-base text-gray-600 font-medium">Jumlah Penduduk</div>
        </div>
        <div class="scroll-animate bg-white border border-gray-200 p-6 text-center hover:border-[#1e3a8a] transition-colors" data-animation="fade-up" data-delay="200">
            <div class="text-3xl md:text-4xl font-bold text-[#1e3a8a] mb-2">1.250</div>
            <div class="text-sm md:text-base text-gray-600 font-medium">Laki-laki</div>
        </div>
        <div class="scroll-animate bg-white border border-gray-200 p-6 text-center hover:border-[#1e3a8a] transition-colors" data-animation="fade-up" data-delay="300">
            <div class="text-3xl md:text-4xl font-bold text-[#1e3a8a] mb-2">1.200</div>
            <div class="text-sm md:text-base text-gray-600 font-medium">Perempuan</div>
        </div>
        <div class="scroll-animate bg-white border border-gray-200 p-6 text-center hover:border-[#1e3a8a] transition-colors" data-animation="fade-up" data-delay="400">
            <div class="text-3xl md:text-4xl font-bold text-[#1e3a8a] mb-2">650</div>
            <div class="text-sm md:text-base text-gray-600 font-medium">Kepala Keluarga</div>
        </div>
    </div>

    <!-- Data Penduduk -->
    <div class="bg-white border border-gray-200 p-6 md:p-8 mb-8 print-section">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl md:text-2xl font-bold text-[#1e3a8a] pb-3 border-b-2 border-[#1e3a8a]">Data Penduduk</h2>
            <button onclick="window.print()" class="hidden print:hidden bg-[#1e3a8a] text-white px-4 py-2 text-sm font-medium hover:bg-blue-900 transition-colors no-print">
                Cetak Data
            </button>
        </div>
        <!-- Skeleton Loading Table -->
        <div class="overflow-x-auto skeleton-wrapper" id="table-skeleton">
            <table class="w-full text-sm md:text-base">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left border border-gray-300"><div class="skeleton skeleton-text"></div></th>
                        <th class="px-4 py-3 text-left border border-gray-300"><div class="skeleton skeleton-text"></div></th>
                        <th class="px-4 py-3 text-left border border-gray-300"><div class="skeleton skeleton-text"></div></th>
                        <th class="px-4 py-3 text-left border border-gray-300"><div class="skeleton skeleton-text"></div></th>
                        <th class="px-4 py-3 text-left border border-gray-300"><div class="skeleton skeleton-text"></div></th>
                        <th class="px-4 py-3 text-left border border-gray-300"><div class="skeleton skeleton-text"></div></th>
                        <th class="px-4 py-3 text-left border border-gray-300"><div class="skeleton skeleton-text"></div></th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 0; $i < 5; $i++)
                    <tr>
                        <td class="px-4 py-3 border border-gray-300"><div class="skeleton skeleton-text"></div></td>
                        <td class="px-4 py-3 border border-gray-300"><div class="skeleton skeleton-text"></div></td>
                        <td class="px-4 py-3 border border-gray-300"><div class="skeleton skeleton-text"></div></td>
                        <td class="px-4 py-3 border border-gray-300"><div class="skeleton skeleton-text"></div></td>
                        <td class="px-4 py-3 border border-gray-300"><div class="skeleton skeleton-text"></div></td>
                        <td class="px-4 py-3 border border-gray-300"><div class="skeleton skeleton-text"></div></td>
                        <td class="px-4 py-3 border border-gray-300"><div class="skeleton skeleton-text"></div></td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>
        <!-- Table Content -->
        <div class="overflow-x-auto skeleton-content scroll-animate" id="table-content" data-animation="fade-up">
            <table class="w-full text-sm md:text-base print-table">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left border border-gray-300 font-semibold text-gray-900">No</th>
                        <th class="px-4 py-3 text-left border border-gray-300 font-semibold text-gray-900">NIK</th>
                        <th class="px-4 py-3 text-left border border-gray-300 font-semibold text-gray-900">Nama Lengkap</th>
                        <th class="px-4 py-3 text-left border border-gray-300 font-semibold text-gray-900">Tempat, Tgl Lahir</th>
                        <th class="px-4 py-3 text-left border border-gray-300 font-semibold text-gray-900">Jenis Kelamin</th>
                        <th class="px-4 py-3 text-left border border-gray-300 font-semibold text-gray-900">Alamat</th>
                        <th class="px-4 py-3 text-left border border-gray-300 font-semibold text-gray-900">RT/RW</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border border-gray-300">1</td>
                        <td class="px-4 py-3 border border-gray-300">3201010101010001</td>
                        <td class="px-4 py-3 border border-gray-300 font-medium">Ahmad Hidayat</td>
                        <td class="px-4 py-3 border border-gray-300">Jakarta, 15 Jan 1980</td>
                        <td class="px-4 py-3 border border-gray-300">Laki-laki</td>
                        <td class="px-4 py-3 border border-gray-300">Jalan Raya Desa No. 10</td>
                        <td class="px-4 py-3 border border-gray-300">001/001</td>
                    </tr>
                    <tr class="bg-gray-50 hover:bg-gray-100">
                        <td class="px-4 py-3 border border-gray-300">2</td>
                        <td class="px-4 py-3 border border-gray-300">3201010101010002</td>
                        <td class="px-4 py-3 border border-gray-300 font-medium">Siti Nurhaliza</td>
                        <td class="px-4 py-3 border border-gray-300">Bandung, 20 Feb 1985</td>
                        <td class="px-4 py-3 border border-gray-300">Perempuan</td>
                        <td class="px-4 py-3 border border-gray-300">Jalan Raya Desa No. 15</td>
                        <td class="px-4 py-3 border border-gray-300">001/001</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border border-gray-300">3</td>
                        <td class="px-4 py-3 border border-gray-300">3201010101010003</td>
                        <td class="px-4 py-3 border border-gray-300 font-medium">Budi Santoso</td>
                        <td class="px-4 py-3 border border-gray-300">Surabaya, 10 Mar 1990</td>
                        <td class="px-4 py-3 border border-gray-300">Laki-laki</td>
                        <td class="px-4 py-3 border border-gray-300">Jalan Raya Desa No. 20</td>
                        <td class="px-4 py-3 border border-gray-300">002/001</td>
                    </tr>
                    <tr class="bg-gray-50 hover:bg-gray-100">
                        <td class="px-4 py-3 border border-gray-300">4</td>
                        <td class="px-4 py-3 border border-gray-300">3201010101010004</td>
                        <td class="px-4 py-3 border border-gray-300 font-medium">Dewi Sartika</td>
                        <td class="px-4 py-3 border border-gray-300">Yogyakarta, 25 Apr 1992</td>
                        <td class="px-4 py-3 border border-gray-300">Perempuan</td>
                        <td class="px-4 py-3 border border-gray-300">Jalan Raya Desa No. 25</td>
                        <td class="px-4 py-3 border border-gray-300">002/001</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border border-gray-300">5</td>
                        <td class="px-4 py-3 border border-gray-300">3201010101010005</td>
                        <td class="px-4 py-3 border border-gray-300 font-medium">Eko Prasetyo</td>
                        <td class="px-4 py-3 border border-gray-300">Semarang, 5 Mei 1988</td>
                        <td class="px-4 py-3 border border-gray-300">Laki-laki</td>
                        <td class="px-4 py-3 border border-gray-300">Jalan Raya Desa No. 30</td>
                        <td class="px-4 py-3 border border-gray-300">003/002</td>
                    </tr>
                    <tr class="bg-gray-50 hover:bg-gray-100">
                        <td class="px-4 py-3 border border-gray-300">6</td>
                        <td class="px-4 py-3 border border-gray-300">3201010101010006</td>
                        <td class="px-4 py-3 border border-gray-300 font-medium">Fitri Handayani</td>
                        <td class="px-4 py-3 border border-gray-300">Malang, 12 Jun 1995</td>
                        <td class="px-4 py-3 border border-gray-300">Perempuan</td>
                        <td class="px-4 py-3 border border-gray-300">Jalan Raya Desa No. 35</td>
                        <td class="px-4 py-3 border border-gray-300">003/002</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border border-gray-300">7</td>
                        <td class="px-4 py-3 border border-gray-300">3201010101010007</td>
                        <td class="px-4 py-3 border border-gray-300 font-medium">Gunawan Wijaya</td>
                        <td class="px-4 py-3 border border-gray-300">Medan, 18 Jul 1987</td>
                        <td class="px-4 py-3 border border-gray-300">Laki-laki</td>
                        <td class="px-4 py-3 border border-gray-300">Jalan Raya Desa No. 40</td>
                        <td class="px-4 py-3 border border-gray-300">004/002</td>
                    </tr>
                    <tr class="bg-gray-50 hover:bg-gray-100">
                        <td class="px-4 py-3 border border-gray-300">8</td>
                        <td class="px-4 py-3 border border-gray-300">3201010101010008</td>
                        <td class="px-4 py-3 border border-gray-300 font-medium">Hesti Wulandari</td>
                        <td class="px-4 py-3 border border-gray-300">Palembang, 22 Agu 1993</td>
                        <td class="px-4 py-3 border border-gray-300">Perempuan</td>
                        <td class="px-4 py-3 border border-gray-300">Jalan Raya Desa No. 45</td>
                        <td class="px-4 py-3 border border-gray-300">004/002</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border border-gray-300">9</td>
                        <td class="px-4 py-3 border border-gray-300">3201010101010009</td>
                        <td class="px-4 py-3 border border-gray-300 font-medium">Indra Kurniawan</td>
                        <td class="px-4 py-3 border border-gray-300">Makassar, 30 Sep 1991</td>
                        <td class="px-4 py-3 border border-gray-300">Laki-laki</td>
                        <td class="px-4 py-3 border border-gray-300">Jalan Raya Desa No. 50</td>
                        <td class="px-4 py-3 border border-gray-300">005/003</td>
                    </tr>
                    <tr class="bg-gray-50 hover:bg-gray-100">
                        <td class="px-4 py-3 border border-gray-300">10</td>
                        <td class="px-4 py-3 border border-gray-300">3201010101010010</td>
                        <td class="px-4 py-3 border border-gray-300 font-medium">Jihan Safitri</td>
                        <td class="px-4 py-3 border border-gray-300">Denpasar, 8 Okt 1994</td>
                        <td class="px-4 py-3 border border-gray-300">Perempuan</td>
                        <td class="px-4 py-3 border border-gray-300">Jalan Raya Desa No. 55</td>
                        <td class="px-4 py-3 border border-gray-300">005/003</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p class="text-sm text-gray-600 mt-4 italic">Catatan: Data yang ditampilkan merupakan contoh. Data lengkap dapat dilihat di kantor desa.</p>
    </div>

    <!-- Data Wilayah & Pendidikan -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 mb-8">
        <!-- Data Wilayah -->
        <div class="scroll-animate bg-white border border-gray-200 p-6 md:p-8 print-section" data-animation="slide-left">
            <h2 class="text-xl md:text-2xl font-bold text-[#1e3a8a] mb-6 pb-3 border-b-2 border-[#1e3a8a]">Data Wilayah</h2>
            <div class="space-y-4">
                <div class="bg-gray-50 border border-gray-200 p-4">
                    <p class="font-semibold text-gray-900 mb-2">Pembagian Wilayah</p>
                    <div class="space-y-2 text-sm text-gray-700">
                        <p><strong>RT:</strong> 12 Rukun Tetangga</p>
                        <p><strong>RW:</strong> 4 Rukun Warga</p>
                        <p><strong>Dusun:</strong> 2 Dusun</p>
                        <p><strong>Luas:</strong> 250 Hektar</p>
                    </div>
                </div>
                <div class="bg-gray-50 border border-gray-200 p-4">
                    <p class="font-semibold text-gray-900 mb-2">Batas Wilayah</p>
                    <div class="space-y-2 text-sm text-gray-700">
                        <p><strong>Utara:</strong> Desa Sebelah Utara</p>
                        <p><strong>Selatan:</strong> Desa Sebelah Selatan</p>
                        <p><strong>Timur:</strong> Desa Sebelah Timur</p>
                        <p><strong>Barat:</strong> Desa Sebelah Barat</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Pendidikan -->
        <div class="scroll-animate bg-white border border-gray-200 p-6 md:p-8 print-section" data-animation="slide-right">
            <h2 class="text-xl md:text-2xl font-bold text-[#1e3a8a] mb-6 pb-3 border-b-2 border-[#1e3a8a]">Data Pendidikan</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm print-table">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left border border-gray-300 font-semibold text-gray-900">Tingkat Pendidikan</th>
                            <th class="px-4 py-3 text-left border border-gray-300 font-semibold text-gray-900">Jumlah</th>
                            <th class="px-4 py-3 text-left border border-gray-300 font-semibold text-gray-900">%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 border border-gray-300">Tidak Sekolah</td>
                            <td class="px-4 py-3 border border-gray-300">150</td>
                            <td class="px-4 py-3 border border-gray-300">6,12%</td>
                        </tr>
                        <tr class="bg-gray-50 hover:bg-gray-100">
                            <td class="px-4 py-3 border border-gray-300">SD/Sederajat</td>
                            <td class="px-4 py-3 border border-gray-300">800</td>
                            <td class="px-4 py-3 border border-gray-300">32,65%</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 border border-gray-300">SMP/Sederajat</td>
                            <td class="px-4 py-3 border border-gray-300">600</td>
                            <td class="px-4 py-3 border border-gray-300">24,49%</td>
                        </tr>
                        <tr class="bg-gray-50 hover:bg-gray-100">
                            <td class="px-4 py-3 border border-gray-300">SMA/Sederajat</td>
                            <td class="px-4 py-3 border border-gray-300">500</td>
                            <td class="px-4 py-3 border border-gray-300">20,41%</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 border border-gray-300">Diploma</td>
                            <td class="px-4 py-3 border border-gray-300">200</td>
                            <td class="px-4 py-3 border border-gray-300">8,16%</td>
                        </tr>
                        <tr class="bg-gray-50 hover:bg-gray-100">
                            <td class="px-4 py-3 border border-gray-300">S1/Sederajat</td>
                            <td class="px-4 py-3 border border-gray-300">150</td>
                            <td class="px-4 py-3 border border-gray-300">6,12%</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 border border-gray-300">S2/Sederajat</td>
                            <td class="px-4 py-3 border border-gray-300">50</td>
                            <td class="px-4 py-3 border border-gray-300">2,04%</td>
                        </tr>
                        <tr class="bg-gray-100 font-semibold">
                            <td class="px-4 py-3 border border-gray-300">Jumlah</td>
                            <td class="px-4 py-3 border border-gray-300">2.450</td>
                            <td class="px-4 py-3 border border-gray-300">100%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        @media print {
            .no-print {
                display: none !important;
            }
            
            .print-section {
                page-break-inside: avoid;
                margin-bottom: 20px;
            }
            
            .print-table {
                border-collapse: collapse;
            }
            
            .print-table th,
            .print-table td {
                border: 1px solid #000 !important;
                padding: 8px;
            }
            
            .print-table thead {
                background-color: #f3f4f6 !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            
            body {
                background: white !important;
            }
            
            .bg-white {
                background: white !important;
            }
            
            .bg-gray-50 {
                background-color: #f9fafb !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            
            .bg-gray-100 {
                background-color: #f3f4f6 !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
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

        // Skeleton Loading Management
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const tableSkeleton = document.getElementById('table-skeleton');
                const tableContent = document.getElementById('table-content');
                if (tableSkeleton && tableContent) {
                    tableSkeleton.classList.add('hide');
                    tableContent.classList.add('show');
                }
            }, 800);
        });
    </script>
    <style>
        .skeleton-content {
            display: none;
        }
        .skeleton-content.show {
            display: block;
        }
        .skeleton-wrapper.hide {
            display: none;
        }
    </style>
@endsection
