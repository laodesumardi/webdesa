@extends('layouts.app')

@section('title', 'Layanan Desa - Website Resmi Pemerintah Desa')

@section('content')
    <div class="mb-8 scroll-animate" data-animation="fade-up">
        <h1 class="text-2xl md:text-3xl font-bold text-green-800 mb-2">Layanan Desa</h1>
        <p class="text-gray-600 text-base md:text-lg">Pelayanan administrasi yang tersedia untuk masyarakat</p>
    </div>

    <!-- Daftar Layanan -->
    <div class="mb-8 scroll-animate" data-animation="fade-up" data-delay="100">
        <h2 class="text-xl md:text-2xl font-bold text-green-800 mb-6 pb-3 border-b-2 border-green-800">Daftar Layanan Administrasi</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
            <div class="scroll-animate bg-white border border-gray-200 p-5 hover:border-green-600 transition-colors" data-animation="scale-fade" data-delay="200">
                <h3 class="text-lg font-bold text-gray-900 mb-2">Surat Keterangan Domisili</h3>
                <p class="text-gray-700 text-sm mb-3">Surat keterangan tempat tinggal untuk keperluan administrasi.</p>
                <div class="space-y-1 text-sm text-gray-600">
                    <p><strong>Persyaratan:</strong> KTP, Kartu Keluarga</p>
                    <p><strong>Waktu:</strong> 1-2 hari kerja</p>
                    <p><strong>Biaya:</strong> Gratis</p>
                </div>
            </div>

            <div class="scroll-animate bg-white border border-gray-200 p-5 hover:border-green-600 transition-colors" data-animation="scale-fade" data-delay="300">
                <h3 class="text-lg font-bold text-gray-900 mb-2">Surat Keterangan Tidak Mampu</h3>
                <p class="text-gray-700 text-sm mb-3">Surat keterangan untuk keperluan bantuan sosial.</p>
                <div class="space-y-1 text-sm text-gray-600">
                    <p><strong>Persyaratan:</strong> KTP, Kartu Keluarga, Surat RT/RW</p>
                    <p><strong>Waktu:</strong> 2-3 hari kerja</p>
                    <p><strong>Biaya:</strong> Gratis</p>
                </div>
            </div>

            <div class="bg-white border border-gray-200 p-5 hover:border-green-600 transition-colors">
                <h3 class="text-lg font-bold text-gray-900 mb-2">Surat Keterangan Usaha</h3>
                <p class="text-gray-700 text-sm mb-3">Surat keterangan untuk keperluan perizinan usaha.</p>
                <div class="space-y-1 text-sm text-gray-600">
                    <p><strong>Persyaratan:</strong> KTP, Kartu Keluarga, Surat RT/RW</p>
                    <p><strong>Waktu:</strong> 2-3 hari kerja</p>
                    <p><strong>Biaya:</strong> Gratis</p>
                </div>
            </div>

            <div class="bg-white border border-gray-200 p-5 hover:border-green-600 transition-colors">
                <h3 class="text-lg font-bold text-gray-900 mb-2">Surat Pengantar KTP</h3>
                <p class="text-gray-700 text-sm mb-3">Surat pengantar untuk pembuatan atau perpanjangan KTP.</p>
                <div class="space-y-1 text-sm text-gray-600">
                    <p><strong>Persyaratan:</strong> Kartu Keluarga, Surat RT/RW</p>
                    <p><strong>Waktu:</strong> 1 hari kerja</p>
                    <p><strong>Biaya:</strong> Gratis</p>
                </div>
            </div>

            <div class="bg-white border border-gray-200 p-5 hover:border-green-600 transition-colors">
                <h3 class="text-lg font-bold text-gray-900 mb-2">Surat Keterangan Kelakuan Baik</h3>
                <p class="text-gray-700 text-sm mb-3">Surat keterangan untuk keperluan pekerjaan atau pendidikan.</p>
                <div class="space-y-1 text-sm text-gray-600">
                    <p><strong>Persyaratan:</strong> KTP, Kartu Keluarga, Surat RT/RW</p>
                    <p><strong>Waktu:</strong> 2-3 hari kerja</p>
                    <p><strong>Biaya:</strong> Gratis</p>
                </div>
            </div>

            <div class="bg-white border border-gray-200 p-5 hover:border-green-600 transition-colors">
                <h3 class="text-lg font-bold text-gray-900 mb-2">Surat Keterangan Kematian</h3>
                <p class="text-gray-700 text-sm mb-3">Surat keterangan untuk keperluan administrasi kematian.</p>
                <div class="space-y-1 text-sm text-gray-600">
                    <p><strong>Persyaratan:</strong> KTP, Kartu Keluarga, Surat Keterangan Dokter</p>
                    <p><strong>Waktu:</strong> 1 hari kerja</p>
                    <p><strong>Biaya:</strong> Gratis</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Pengajuan Layanan -->
    <div class="scroll-animate bg-white border border-gray-200 p-6 md:p-8 mb-8" data-animation="fade-up">
        <h2 class="text-xl md:text-2xl font-bold text-green-800 mb-4 pb-3 border-b-2 border-green-800">Formulir Pengajuan Layanan</h2>
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
                        class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-green-600">
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
                        class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-green-600"
                        placeholder="Masukkan nama lengkap sesuai KTP">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="nik" class="block text-sm font-medium text-gray-700 mb-2">
                        Nomor Induk Kependudukan (NIK) <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="nik" name="nik" required 
                        class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-green-600"
                        placeholder="Masukkan NIK (16 digit)"
                        maxlength="16" pattern="[0-9]{16}">
                    <p class="text-xs text-gray-500 mt-1">NIK terdiri dari 16 digit angka</p>
                </div>

                <div>
                    <label for="telepon" class="block text-sm font-medium text-gray-700 mb-2">
                        Nomor Telepon <span class="text-red-600">*</span>
                    </label>
                    <input type="tel" id="telepon" name="telepon" required 
                        class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-green-600"
                        placeholder="Masukkan nomor telepon yang dapat dihubungi">
                </div>
            </div>

            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                    Alamat Lengkap <span class="text-red-600">*</span>
                </label>
                <textarea id="alamat" name="alamat" rows="3" required 
                    class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-green-600"
                    placeholder="Masukkan alamat lengkap sesuai Kartu Keluarga"></textarea>
            </div>

            <div>
                <label for="berkas" class="block text-sm font-medium text-gray-700 mb-2">
                    Unggah Berkas <span class="text-red-600">*</span>
                </label>
                <input type="file" id="berkas" name="berkas" required 
                    class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-green-600"
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
                    class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:border-green-600"
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
                <button type="submit" class="bg-green-800 text-white px-6 py-2.5 text-sm font-medium hover:bg-green-900 transition-colors">
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
        <h2 class="text-xl md:text-2xl font-bold text-green-800 mb-4 pb-3 border-b-2 border-green-800">Jam Pelayanan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-gray-50 border border-gray-200 p-4">
                <p class="font-semibold text-gray-900 mb-1">Hari Kerja</p>
                <p class="text-gray-700">Senin - Jumat</p>
            </div>
            <div class="bg-gray-50 border border-gray-200 p-4">
                <p class="font-semibold text-gray-900 mb-1">Waktu Pelayanan</p>
                <p class="text-gray-700">08:00 - 15:00 WIB</p>
            </div>
            <div class="bg-gray-50 border border-gray-200 p-4">
                <p class="font-semibold text-gray-900 mb-1">Waktu Istirahat</p>
                <p class="text-gray-700">12:00 - 13:00 WIB</p>
            </div>
        </div>
        <p class="text-sm text-gray-600 mt-4">
            Untuk informasi lebih lanjut, silakan hubungi kantor desa pada jam pelayanan atau melalui halaman 
            <a href="{{ route('kontak') }}" class="text-green-800 font-medium hover:underline">Kontak & Aspirasi</a>.
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
