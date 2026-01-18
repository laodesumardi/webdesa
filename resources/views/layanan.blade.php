@extends('layouts.app')

@section('title', 'Layanan Desa - Website Resmi Pemerintah Desa')

@php
    use App\Models\Content;
    function getContent($page, $section, $key, $default = '') {
        return Content::getContent($page, $section, $key, $default);
    }
    
    // Get header
    $headerTitle = getContent('layanan', 'header', 'title', 'Layanan Desa');
    $headerSubtitle = getContent('layanan', 'header', 'subtitle', 'Pelayanan administrasi yang tersedia untuk masyarakat');
    
    // Get jam pelayanan
    $jamHariKerja = getContent('layanan', 'jam', 'hari_kerja', 'Senin - Jumat');
    $jamWaktuPelayanan = getContent('layanan', 'jam', 'waktu_pelayanan', '08:00 - 15:00 WIB');
    $jamWaktuIstirahat = getContent('layanan', 'jam', 'waktu_istirahat', '12:00 - 13:00 WIB');
    
    // Get daftar layanan
    $layananList = [];
    for ($i = 1; $i <= 6; $i++) {
        $layananList[$i] = [
            'judul' => getContent('layanan', 'layanan_' . $i, 'judul', ''),
            'deskripsi' => getContent('layanan', 'layanan_' . $i, 'deskripsi', ''),
            'persyaratan' => getContent('layanan', 'layanan_' . $i, 'persyaratan', ''),
            'waktu' => getContent('layanan', 'layanan_' . $i, 'waktu', ''),
            'biaya' => getContent('layanan', 'layanan_' . $i, 'biaya', ''),
        ];
    }
    
    // Default values jika kosong
    if (empty($layananList[1]['judul'])) {
        $layananList[1] = ['judul' => 'Surat Keterangan Domisili', 'deskripsi' => 'Surat keterangan tempat tinggal untuk keperluan administrasi.', 'persyaratan' => 'KTP, Kartu Keluarga', 'waktu' => '1-2 hari kerja', 'biaya' => 'Gratis'];
        $layananList[2] = ['judul' => 'Surat Keterangan Tidak Mampu', 'deskripsi' => 'Surat keterangan untuk keperluan bantuan sosial.', 'persyaratan' => 'KTP, Kartu Keluarga, Surat RT/RW', 'waktu' => '2-3 hari kerja', 'biaya' => 'Gratis'];
        $layananList[3] = ['judul' => 'Surat Keterangan Usaha', 'deskripsi' => 'Surat keterangan untuk keperluan perizinan usaha.', 'persyaratan' => 'KTP, Kartu Keluarga, Surat RT/RW', 'waktu' => '2-3 hari kerja', 'biaya' => 'Gratis'];
        $layananList[4] = ['judul' => 'Surat Pengantar KTP', 'deskripsi' => 'Surat pengantar untuk pembuatan atau perpanjangan KTP.', 'persyaratan' => 'Kartu Keluarga, Surat RT/RW', 'waktu' => '1 hari kerja', 'biaya' => 'Gratis'];
        $layananList[5] = ['judul' => 'Surat Keterangan Kelakuan Baik', 'deskripsi' => 'Surat keterangan untuk keperluan pekerjaan atau pendidikan.', 'persyaratan' => 'KTP, Kartu Keluarga, Surat RT/RW', 'waktu' => '2-3 hari kerja', 'biaya' => 'Gratis'];
        $layananList[6] = ['judul' => 'Surat Keterangan Kematian', 'deskripsi' => 'Surat keterangan untuk keperluan administrasi kematian.', 'persyaratan' => 'KTP, Kartu Keluarga, Surat Keterangan Dokter', 'waktu' => '1 hari kerja', 'biaya' => 'Gratis'];
    }
@endphp

@section('content')
    <div class="container mx-auto px-4 sm:px-6">
        <div class="mb-6 sm:mb-8 scroll-animate" data-animation="fade-up">
            <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-[#1e3a8a] mb-2">{{ $headerTitle }}</h1>
            <p class="text-gray-600 text-sm sm:text-base md:text-lg">{{ $headerSubtitle }}</p>
        </div>

        <!-- Daftar Layanan -->
        <div class="mb-6 sm:mb-8 scroll-animate" data-animation="fade-up" data-delay="100">
            <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-[#1e3a8a] mb-4 sm:mb-6 pb-2 sm:pb-3 border-b-2 border-[#1e3a8a]">Daftar Layanan Administrasi</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 md:gap-6">
                @foreach($layananList as $index => $layanan)
                    @if(!empty($layanan['judul']))
                        <div class="scroll-animate bg-white border border-gray-200 p-4 sm:p-5 hover:border-[#1e3a8a] transition-colors rounded-lg" data-animation="scale-fade" data-delay="{{ ($index * 100) + 200 }}">
                            <h3 class="text-base sm:text-lg font-bold text-gray-900 mb-2">{{ $layanan['judul'] }}</h3>
                            <p class="text-gray-700 text-xs sm:text-sm mb-3">{{ $layanan['deskripsi'] }}</p>
                            <div class="space-y-1 text-xs sm:text-sm text-gray-600">
                                <p><strong>Persyaratan:</strong> {{ $layanan['persyaratan'] }}</p>
                                <p><strong>Waktu:</strong> {{ $layanan['waktu'] }}</p>
                                <p><strong>Biaya:</strong> {{ $layanan['biaya'] }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <!-- Form Pengajuan Layanan -->
    <div class="scroll-animate bg-white border border-gray-200 p-6 md:p-8 mb-8" data-animation="fade-up">
        <h2 class="text-xl md:text-2xl font-bold text-[#1e3a8a] mb-4 pb-3 border-b-2 border-[#1e3a8a]">Formulir Pengajuan Layanan</h2>
        <p class="text-gray-700 text-base mb-6">
            Silakan isi formulir di bawah ini untuk mengajukan layanan administrasi. Pastikan semua data yang diisi sudah benar dan lengkap.
        </p>
        
        <form class="space-y-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="layanan" class="block text-sm font-medium text-gray-700 mb-2">
                        Jenis Layanan <span class="text-red-600">*</span>
                    </label>
                    <select id="layanan" name="layanan" required 
                        class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-[#1e3a8a]">
                        <option value="">Pilih jenis layanan</option>
                        <option value="domisili">Surat Keterangan Domisili</option>
                        <option value="sktm">Surat Keterangan Tidak Mampu</option>
                        <option value="usaha">Surat Keterangan Usaha</option>
                        <option value="ktp">Surat Pengantar KTP</option>
                        <option value="kelakuan">Surat Keterangan Kelakuan Baik</option>
                        <option value="kematian">Surat Keterangan Kematian</option>
                    </select>
                </div>

                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Lengkap <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="nama" name="nama" required 
                        class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-[#1e3a8a]"
                        placeholder="Masukkan nama lengkap sesuai KTP">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="nik" class="block text-sm font-medium text-gray-700 mb-2">
                        Nomor Induk Kependudukan (NIK) <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="nik" name="nik" required 
                        class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-[#1e3a8a]"
                        placeholder="Masukkan NIK (16 digit)"
                        maxlength="16" pattern="[0-9]{16}">
                    <p class="text-xs text-gray-500 mt-1">NIK terdiri dari 16 digit angka</p>
                </div>

                <div>
                    <label for="telepon" class="block text-sm font-medium text-gray-700 mb-2">
                        Nomor Telepon <span class="text-red-600">*</span>
                    </label>
                    <input type="tel" id="telepon" name="telepon" required 
                        class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-[#1e3a8a]"
                        placeholder="Masukkan nomor telepon yang dapat dihubungi">
                </div>
            </div>

            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                    Alamat Lengkap <span class="text-red-600">*</span>
                </label>
                <textarea id="alamat" name="alamat" rows="3" required 
                    class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-[#1e3a8a]"
                    placeholder="Masukkan alamat lengkap sesuai Kartu Keluarga"></textarea>
            </div>

            <div>
                <label for="berkas" class="block text-sm font-medium text-gray-700 mb-2">
                    Unggah Berkas <span class="text-red-600">*</span>
                </label>
                <input type="file" id="berkas" name="berkas" required 
                    class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-[#1e3a8a]"
                    accept=".pdf,.jpg,.jpeg,.png">
                <p class="text-xs text-gray-500 mt-1">
                    Format file: PDF, JPG, atau PNG. Maksimal ukuran file: 2 MB.
                </p>
            </div>

            <div>
                <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">
                    Keterangan Tambahan
                </label>
                <textarea id="keterangan" name="keterangan" rows="3" 
                    class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-[#1e3a8a]"
                    placeholder="Masukkan keterangan tambahan jika diperlukan (opsional)"></textarea>
            </div>

            <div class="bg-blue-50 border border-blue-200 p-4 text-sm text-gray-700">
                <p class="font-semibold mb-2">Catatan Penting:</p>
                <ul class="list-disc list-inside space-y-1">
                    <li>Pastikan semua data yang diisi sudah benar dan sesuai dengan dokumen resmi</li>
                    <li>Berkas yang diunggah harus jelas dan dapat dibaca</li>
                    <li>Pengajuan akan diproses sesuai dengan jam pelayanan kantor desa</li>
                </ul>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-[#1e3a8a] text-white px-6 py-2.5 text-sm font-medium hover:bg-blue-900 transition-colors">
                    Kirim Pengajuan
                </button>
                <button type="reset" class="bg-gray-200 text-gray-700 px-6 py-2.5 text-sm font-medium hover:bg-gray-300 transition-colors">
                    Reset Formulir
                </button>
            </div>
        </form>
    </div>

    <!-- Jam Pelayanan -->
    <div class="scroll-animate bg-white border border-gray-200 p-6 md:p-8" data-animation="fade-up" data-delay="100">
        <h2 class="text-xl md:text-2xl font-bold text-[#1e3a8a] mb-4 pb-3 border-b-2 border-[#1e3a8a]">Jam Pelayanan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-gray-50 border border-gray-200 p-4">
                <p class="font-semibold text-gray-900 mb-1">Hari Kerja</p>
                <p class="text-gray-700">{{ $jamHariKerja }}</p>
            </div>
            <div class="bg-gray-50 border border-gray-200 p-4">
                <p class="font-semibold text-gray-900 mb-1">Waktu Pelayanan</p>
                <p class="text-gray-700">{{ $jamWaktuPelayanan }}</p>
            </div>
            <div class="bg-gray-50 border border-gray-200 p-4">
                <p class="font-semibold text-gray-900 mb-1">Waktu Istirahat</p>
                <p class="text-gray-700">{{ $jamWaktuIstirahat }}</p>
            </div>
        </div>
        <p class="text-sm text-gray-600 mt-4">
            Untuk informasi lebih lanjut, silakan hubungi kantor desa pada jam pelayanan atau melalui halaman 
            <a href="{{ route('kontak') }}" class="text-[#1e3a8a] font-medium hover:underline">Kontak & Aspirasi</a>.
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
    </div>
@endsection
