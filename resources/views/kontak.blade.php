@extends('layouts.app')

@section('title', 'Kontak & Aspirasi - Website Resmi Pemerintah Desa')

@section('content')
    <div class="mb-8 scroll-animate" data-animation="fade-up">
        <h1 class="text-2xl md:text-3xl font-bold text-green-800 mb-2">Kontak & Aspirasi</h1>
        <p class="text-gray-600 text-base md:text-lg">Hubungi kami atau sampaikan aspirasi Anda</p>
    </div>

    <!-- Informasi Kontak Resmi -->
    <div class="scroll-animate bg-white border border-gray-200 p-6 md:p-8 mb-8" data-animation="fade-up" data-delay="100">
        <h2 class="text-xl md:text-2xl font-bold text-green-800 mb-6 pb-3 border-b-2 border-green-800">Kontak Resmi Pemerintah Desa</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
            <div class="bg-gray-50 border border-gray-200 p-5">
                <h3 class="font-semibold text-gray-900 mb-3">Alamat Kantor</h3>
                <p class="text-gray-700 text-sm leading-relaxed">
                    Kantor Pemerintah Desa<br>
                    Jalan Raya Desa No. 123<br>
                    Kecamatan, Kabupaten<br>
                    Provinsi<br>
                    Kode Pos 12345
                </p>
            </div>
            <div class="bg-gray-50 border border-gray-200 p-5">
                <h3 class="font-semibold text-gray-900 mb-3">Kontak Telepon</h3>
                <p class="text-gray-700 text-sm space-y-1">
                    <strong>Telepon:</strong><br>
                    <a href="tel:02112345678" class="text-green-800 hover:underline font-medium">(021) 1234-5678</a><br><br>
                    <strong>Faksimili:</strong><br>
                    (021) 1234-5679<br><br>
                    <strong>Email:</strong><br>
                    <a href="mailto:info@desa.go.id" class="text-green-800 hover:underline font-medium">info@desa.go.id</a>
                </p>
            </div>
            <div class="bg-gray-50 border border-gray-200 p-5">
                <h3 class="font-semibold text-gray-900 mb-3">Jam Pelayanan</h3>
                <p class="text-gray-700 text-sm">
                    <strong>Hari Kerja:</strong> Senin - Jumat<br>
                    <strong>Waktu:</strong> 08:00 - 15:00 WIB<br>
                    <strong>Istirahat:</strong> 12:00 - 13:00 WIB<br>
                    <strong>Hari Libur:</strong> Sabtu, Minggu, dan Hari Libur Nasional
                </p>
            </div>
            <div class="bg-gray-50 border border-gray-200 p-5">
                <h3 class="font-semibold text-gray-900 mb-3">Kontak Perangkat</h3>
                <p class="text-gray-700 text-sm space-y-1">
                    <strong>Kepala Desa:</strong><br>
                    <a href="tel:02112345680" class="text-green-800 hover:underline font-medium">(021) 1234-5680</a><br><br>
                    <strong>Sekretaris:</strong><br>
                    <a href="tel:02112345681" class="text-green-800 hover:underline font-medium">(021) 1234-5681</a><br><br>
                    <strong>Kaur Kesra:</strong><br>
                    <a href="tel:02112345682" class="text-green-800 hover:underline font-medium">(021) 1234-5682</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Form Aspirasi Warga -->
    <div class="scroll-animate bg-white border border-gray-200 p-6 md:p-8 mb-8" data-animation="fade-up">
        <h2 class="text-xl md:text-2xl font-bold text-green-800 mb-4 pb-3 border-b-2 border-green-800">Formulir Aspirasi Warga</h2>
        <p class="text-gray-700 text-base mb-6">
            Formulir ini digunakan untuk menyampaikan aspirasi, saran, atau masukan kepada Pemerintah Desa. 
            Kami menghargai setiap aspirasi yang disampaikan dan akan menindaklanjuti sesuai dengan mekanisme 
            yang berlaku. Identitas pengirim akan dijaga kerahasiaannya.
        </p>
        
        <form class="space-y-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="nama_aspirasi" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Lengkap <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="nama_aspirasi" name="nama_aspirasi" required 
                        class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-green-600"
                        placeholder="Masukkan nama lengkap sesuai KTP">
                </div>

                <div>
                    <label for="nik_aspirasi" class="block text-sm font-medium text-gray-700 mb-2">
                        Nomor Induk Kependudukan (NIK) <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="nik_aspirasi" name="nik_aspirasi" required 
                        class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-green-600"
                        placeholder="Masukkan NIK (16 digit)"
                        maxlength="16" pattern="[0-9]{16}">
                    <p class="text-xs text-gray-500 mt-1">NIK terdiri dari 16 digit angka</p>
                </div>
            </div>

            <div>
                <label for="alamat_aspirasi" class="block text-sm font-medium text-gray-700 mb-2">
                    Alamat Lengkap <span class="text-red-600">*</span>
                </label>
                <textarea id="alamat_aspirasi" name="alamat_aspirasi" rows="2" required 
                    class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-green-600"
                    placeholder="Masukkan alamat lengkap sesuai Kartu Keluarga"></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="rt_rw_aspirasi" class="block text-sm font-medium text-gray-700 mb-2">
                        RT/RW <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="rt_rw_aspirasi" name="rt_rw_aspirasi" required 
                        class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-green-600"
                        placeholder="Contoh: 001/001">
                </div>

                <div>
                    <label for="telepon_aspirasi" class="block text-sm font-medium text-gray-700 mb-2">
                        Nomor Telepon <span class="text-red-600">*</span>
                    </label>
                    <input type="tel" id="telepon_aspirasi" name="telepon_aspirasi" required 
                        class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-green-600"
                        placeholder="Masukkan nomor telepon yang dapat dihubungi">
                </div>
            </div>

            <div>
                <label for="email_aspirasi" class="block text-sm font-medium text-gray-700 mb-2">
                    Alamat Email
                </label>
                <input type="email" id="email_aspirasi" name="email_aspirasi" 
                    class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-green-600"
                    placeholder="Masukkan alamat email (opsional)">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="kategori_aspirasi" class="block text-sm font-medium text-gray-700 mb-2">
                        Kategori Aspirasi <span class="text-red-600">*</span>
                    </label>
                    <select id="kategori_aspirasi" name="kategori_aspirasi" required 
                        class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-green-600">
                        <option value="">Pilih kategori aspirasi</option>
                        <option value="pembangunan">Pembangunan Infrastruktur</option>
                        <option value="pelayanan">Pelayanan Publik</option>
                        <option value="sosial">Program Sosial</option>
                        <option value="ekonomi">Pengembangan Ekonomi</option>
                        <option value="lingkungan">Lingkungan Hidup</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>

                <div>
                    <label for="subjek_aspirasi" class="block text-sm font-medium text-gray-700 mb-2">
                        Subjek Aspirasi <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="subjek_aspirasi" name="subjek_aspirasi" required 
                        class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-green-600"
                        placeholder="Masukkan subjek atau judul aspirasi">
                </div>
            </div>

            <div>
                <label for="isi_aspirasi" class="block text-sm font-medium text-gray-700 mb-2">
                    Isi Aspirasi <span class="text-red-600">*</span>
                </label>
                <textarea id="isi_aspirasi" name="isi_aspirasi" rows="6" required 
                    class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-green-600"
                    placeholder="Tuliskan aspirasi, saran, atau masukan Anda secara lengkap dan jelas"></textarea>
                <p class="text-xs text-gray-500 mt-1">
                    Silakan sampaikan aspirasi Anda dengan bahasa yang sopan dan jelas. 
                    Aspirasi yang disampaikan akan ditindaklanjuti sesuai dengan mekanisme yang berlaku.
                </p>
            </div>

            <div class="bg-blue-50 border border-blue-200 p-4 text-sm text-gray-700">
                <p class="font-semibold mb-2">Ketentuan Pengisian Formulir:</p>
                <ul class="list-disc list-inside space-y-1">
                    <li>Pastikan semua data yang diisi sudah benar dan sesuai dengan dokumen resmi</li>
                    <li>Identitas pengirim akan dijaga kerahasiaannya</li>
                    <li>Aspirasi yang disampaikan harus sesuai dengan norma dan peraturan yang berlaku</li>
                    <li>Pengisian formulir dengan data yang tidak benar dapat mengakibatkan aspirasi tidak dapat ditindaklanjuti</li>
                </ul>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-green-800 text-white px-6 py-2.5 text-sm font-medium hover:bg-green-900 transition-colors">
                    Kirim Aspirasi
                </button>
                <button type="reset" class="bg-gray-200 text-gray-700 px-6 py-2.5 text-sm font-medium hover:bg-gray-300 transition-colors">
                    Reset Formulir
                </button>
            </div>
        </form>
    </div>

    <!-- Peta Lokasi -->
    <div class="scroll-animate bg-white border border-gray-200 p-6 md:p-8" data-animation="fade-up" data-delay="100">
        <h2 class="text-xl md:text-2xl font-bold text-green-800 mb-4 pb-3 border-b-2 border-green-800">Peta Lokasi Kantor Desa</h2>
        <div class="bg-gray-100 border border-gray-200 h-64 md:h-80 flex items-center justify-center">
            <div class="text-center">
                <svg class="w-20 h-20 mx-auto mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <p class="text-gray-500 text-sm md:text-base">Peta lokasi kantor desa akan ditampilkan di sini</p>
            </div>
        </div>
        <p class="text-sm text-gray-600 mt-4">
            Untuk informasi lebih lanjut mengenai lokasi kantor desa, silakan hubungi nomor telepon yang tertera di atas.
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
