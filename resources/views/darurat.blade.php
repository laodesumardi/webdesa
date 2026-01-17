@extends('layouts.app')

@section('title', 'Darurat & Keamanan - Website Resmi Pemerintah Desa')

@section('content')
    <div class="mb-8 scroll-animate" data-animation="fade-up">
        <h1 class="text-2xl md:text-3xl font-bold text-[#1e3a8a] mb-2">Darurat & Keamanan</h1>
        <p class="text-gray-600 text-base md:text-lg">Informasi darurat, keamanan, dan penanggulangan bencana</p>
    </div>

    <!-- Kontak Darurat -->
    <div class="scroll-animate bg-red-50 border-2 border-red-300 p-6 md:p-8 mb-8" data-animation="fade-up" data-delay="100">
        <h2 class="text-xl md:text-2xl font-bold text-red-800 mb-6">Kontak Darurat</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
            <div class="bg-white border border-red-200 p-5 hover:border-red-400 transition-colors">
                <h3 class="font-bold text-gray-900 mb-2">Polisi</h3>
                <p class="text-sm text-gray-600 mb-3">Polsek Kecamatan</p>
                <p class="text-2xl font-bold text-red-600 mb-1">
                    <a href="tel:110" class="hover:underline">110</a>
                </p>
                <p class="text-sm text-gray-600">
                    Atau <a href="tel:02112345678" class="text-[#1e3a8a] font-medium hover:underline">(021) 1234-5678</a>
                </p>
            </div>

            <div class="bg-white border border-red-200 p-5 hover:border-red-400 transition-colors">
                <h3 class="font-bold text-gray-900 mb-2">Pemadam Kebakaran</h3>
                <p class="text-sm text-gray-600 mb-3">Damkar Kecamatan</p>
                <p class="text-2xl font-bold text-red-600 mb-1">
                    <a href="tel:113" class="hover:underline">113</a>
                </p>
                <p class="text-sm text-gray-600">
                    Atau <a href="tel:02112345679" class="text-[#1e3a8a] font-medium hover:underline">(021) 1234-5679</a>
                </p>
            </div>

            <div class="bg-white border border-red-200 p-5 hover:border-red-400 transition-colors">
                <h3 class="font-bold text-gray-900 mb-2">Ambulans</h3>
                <p class="text-sm text-gray-600 mb-3">Rumah Sakit Terdekat</p>
                <p class="text-2xl font-bold text-red-600 mb-1">
                    <a href="tel:119" class="hover:underline">119</a>
                </p>
                <p class="text-sm text-gray-600">
                    Atau <a href="tel:02112345680" class="text-[#1e3a8a] font-medium hover:underline">(021) 1234-5680</a>
                </p>
            </div>

            <div class="bg-white border border-red-200 p-5 hover:border-red-400 transition-colors">
                <h3 class="font-bold text-gray-900 mb-2">Pos Keamanan Desa</h3>
                <p class="text-sm text-gray-600 mb-3">Poskamling</p>
                <p class="text-xl font-bold text-red-600 mb-1">
                    <a href="tel:02112345681" class="hover:underline">(021) 1234-5681</a>
                </p>
                <p class="text-sm text-gray-600">Tersedia 24 jam</p>
            </div>

            <div class="bg-white border border-red-200 p-5 hover:border-red-400 transition-colors">
                <h3 class="font-bold text-gray-900 mb-2">Kantor Desa</h3>
                <p class="text-sm text-gray-600 mb-3">Pemerintah Desa</p>
                <p class="text-xl font-bold text-red-600 mb-1">
                    <a href="tel:02112345682" class="hover:underline">(021) 1234-5682</a>
                </p>
                <p class="text-sm text-gray-600">Senin - Jumat, 08:00 - 15:00 WIB</p>
            </div>

            <div class="bg-white border border-red-200 p-5 hover:border-red-400 transition-colors">
                <h3 class="font-bold text-gray-900 mb-2">Ketua RT/RW</h3>
                <p class="text-sm text-gray-600 mb-3">Koordinasi Lokal</p>
                <p class="text-xl font-bold text-red-600 mb-1">
                    <a href="tel:02112345683" class="hover:underline">(021) 1234-5683</a>
                </p>
                <p class="text-sm text-gray-600">Hubungi ketua RT/RW setempat</p>
            </div>
        </div>
    </div>

    <!-- Informasi Potensi Bencana -->
    <div class="scroll-animate bg-white border border-gray-200 p-6 md:p-8 mb-8" data-animation="fade-up">
        <h2 class="text-xl md:text-2xl font-bold text-[#1e3a8a] mb-6 pb-3 border-b-2 border-[#1e3a8a]">Informasi Potensi Bencana</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
            <div class="border-l-4 border-yellow-500 bg-yellow-50 p-5">
                <h3 class="font-bold text-gray-900 mb-2">Banjir</h3>
                <p class="text-gray-700 text-sm leading-relaxed">
                    Potensi banjir pada musim hujan, terutama di daerah dekat aliran sungai. 
                    Warga diimbau memantau informasi cuaca dan ketinggian air sungai. 
                    Apabila terjadi banjir, segera evakuasi ke titik kumpul.
                </p>
            </div>

            <div class="border-l-4 border-red-500 bg-red-50 p-5">
                <h3 class="font-bold text-gray-900 mb-2">Kebakaran</h3>
                <p class="text-gray-700 text-sm leading-relaxed">
                    Potensi kebakaran terutama pada musim kemarau. Warga diimbau berhati-hati 
                    dalam penggunaan api dan listrik. Pastikan instalasi listrik dalam kondisi baik.
                </p>
            </div>

            <div class="border-l-4 border-orange-500 bg-orange-50 p-5">
                <h3 class="font-bold text-gray-900 mb-2">Angin Kencang</h3>
                <p class="text-gray-700 text-sm leading-relaxed">
                    Potensi angin kencang dan puting beliung pada musim hujan. 
                    Warga diimbau mengamankan benda-benda di luar rumah dan hindari berteduh 
                    di bawah pohon besar saat angin kencang.
                </p>
            </div>

            <div class="border-l-4 border-gray-500 bg-gray-50 p-5">
                <h3 class="font-bold text-gray-900 mb-2">Gempa Bumi</h3>
                <p class="text-gray-700 text-sm leading-relaxed">
                    Meskipun jarang terjadi, desa ini berada di wilayah berpotensi gempa bumi. 
                    Warga diimbau mengetahui prosedur evakuasi dan titik kumpul yang aman. 
                    Pastikan perabotan rumah diikat dengan baik.
                </p>
            </div>
        </div>
    </div>

    <!-- Jalur Evakuasi & Titik Kumpul -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 mb-8">
        <!-- Jalur Evakuasi -->
        <div class="scroll-animate bg-white border border-gray-200 p-6 md:p-8" data-animation="slide-left">
            <h2 class="text-xl md:text-2xl font-bold text-[#1e3a8a] mb-6 pb-3 border-b-2 border-[#1e3a8a]">Jalur Evakuasi</h2>
            <div class="space-y-4">
                <div class="bg-gray-50 border border-gray-200 p-4">
                    <h3 class="font-semibold text-gray-900 mb-2">Banjir</h3>
                    <ul class="text-sm text-gray-700 space-y-1 list-disc list-inside">
                        <li>RT 01-03: Menuju Balai Desa</li>
                        <li>RT 04-06: Menuju Sekolah Dasar</li>
                        <li>RT 07-09: Menuju Masjid</li>
                        <li>RT 10-12: Menuju Puskesmas</li>
                    </ul>
                </div>
                <div class="bg-gray-50 border border-gray-200 p-4">
                    <h3 class="font-semibold text-gray-900 mb-2">Kebakaran</h3>
                    <ul class="text-sm text-gray-700 space-y-1 list-disc list-inside">
                        <li>Segera keluar melalui pintu/jendela terdekat</li>
                        <li>Jangan gunakan lift, gunakan tangga</li>
                        <li>Berlari menjauhi sumber api</li>
                        <li>Ikuti arahan petugas pemadam</li>
                    </ul>
                </div>
                <div class="bg-gray-50 border border-gray-200 p-4">
                    <h3 class="font-semibold text-gray-900 mb-2">Gempa Bumi</h3>
                    <ul class="text-sm text-gray-700 space-y-1 list-disc list-inside">
                        <li>Berlindung di bawah meja kokoh</li>
                        <li>Jauhi jendela dan kaca</li>
                        <li>Setelah gempa, segera keluar</li>
                        <li>Berlari menuju titik kumpul</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Titik Kumpul -->
        <div class="scroll-animate bg-white border border-gray-200 p-6 md:p-8" data-animation="slide-right">
            <h2 class="text-xl md:text-2xl font-bold text-[#1e3a8a] mb-6 pb-3 border-b-2 border-[#1e3a8a]">Titik Kumpul Evakuasi</h2>
            <div class="space-y-4">
                <div class="bg-gray-50 border border-gray-200 p-4">
                    <h3 class="font-semibold text-gray-900 mb-2">Balai Desa</h3>
                    <p class="text-sm text-gray-700 mb-1"><strong>Alamat:</strong> Jalan Raya Desa No. 123</p>
                    <p class="text-sm text-gray-700"><strong>Kapasitas:</strong> 500 orang</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 p-4">
                    <h3 class="font-semibold text-gray-900 mb-2">Sekolah Dasar</h3>
                    <p class="text-sm text-gray-700 mb-1"><strong>Alamat:</strong> Jalan Pendidikan No. 45</p>
                    <p class="text-sm text-gray-700"><strong>Kapasitas:</strong> 300 orang</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 p-4">
                    <h3 class="font-semibold text-gray-900 mb-2">Masjid</h3>
                    <p class="text-sm text-gray-700 mb-1"><strong>Alamat:</strong> Jalan Keagamaan No. 78</p>
                    <p class="text-sm text-gray-700"><strong>Kapasitas:</strong> 400 orang</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 p-4">
                    <h3 class="font-semibold text-gray-900 mb-2">Puskesmas</h3>
                    <p class="text-sm text-gray-700 mb-1"><strong>Alamat:</strong> Jalan Kesehatan No. 12</p>
                    <p class="text-sm text-gray-700"><strong>Kapasitas:</strong> 200 orang</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Prosedur Darurat -->
    <div class="scroll-animate bg-white border border-gray-200 p-6 md:p-8 mb-8" data-animation="fade-up">
        <h2 class="text-xl md:text-2xl font-bold text-[#1e3a8a] mb-6 pb-3 border-b-2 border-[#1e3a8a]">Prosedur Darurat</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="font-semibold text-gray-900 mb-3">Langkah Saat Terjadi Bencana</h3>
                <ol class="text-sm text-gray-700 space-y-2 list-decimal list-inside">
                    <li>Tetap tenang dan jangan panik</li>
                    <li>Segera hubungi nomor darurat</li>
                    <li>Ikuti jalur evakuasi menuju titik kumpul</li>
                    <li>Bawa dokumen penting jika memungkinkan</li>
                    <li>Jangan kembali sebelum dinyatakan aman</li>
                    <li>Ikuti arahan petugas berwenang</li>
                </ol>
            </div>
            <div>
                <h3 class="font-semibold text-gray-900 mb-3">Persiapan Sebelum Bencana</h3>
                <ul class="text-sm text-gray-700 space-y-2 list-disc list-inside">
                    <li>Simpan nomor kontak darurat di tempat mudah dijangkau</li>
                    <li>Siapkan tas darurat berisi dokumen penting</li>
                    <li>Ketahui jalur evakuasi dan titik kumpul terdekat</li>
                    <li>Pastikan semua anggota keluarga tahu prosedur evakuasi</li>
                    <li>Periksa kondisi rumah secara berkala</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Informasi Keamanan -->
    <div class="scroll-animate bg-white border border-gray-200 p-6 md:p-8" data-animation="fade-up" data-delay="100">
        <h2 class="text-xl md:text-2xl font-bold text-[#1e3a8a] mb-4 pb-3 border-b-2 border-[#1e3a8a]">Informasi Keamanan</h2>
        <div class="text-gray-700 text-base leading-relaxed space-y-3">
            <p>
                Untuk menjaga keamanan dan ketertiban di lingkungan desa, Pemerintah Desa bekerja sama dengan 
                masyarakat dalam program sistem keamanan lingkungan (siskamling). Setiap Rukun Tetangga (RT) memiliki 
                jadwal ronda malam yang diatur secara bergiliran.
            </p>
            <p>
                Apabila terjadi kejadian darurat atau kejahatan, segera hubungi nomor kontak darurat di atas 
                atau laporkan ke kantor desa terdekat. Jangan ragu untuk melaporkan aktivitas mencurigakan kepada 
                ketua RT/RW atau petugas keamanan setempat.
            </p>
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
