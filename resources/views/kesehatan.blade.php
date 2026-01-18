@extends('layouts.app')

@section('title', 'Kesehatan & Sosial - Website Resmi Pemerintah Desa')

@section('content')
    <div class="container mx-auto px-4 sm:px-6">
        <div class="mb-6 scroll-animate" data-animation="fade-up">
            <h1 class="text-xl sm:text-2xl md:text-2xl font-bold text-[#1e3a8a] mb-2">Kesehatan & Sosial</h1>
            <p class="text-gray-600 text-sm md:text-base">Program kesehatan dan bantuan sosial untuk masyarakat</p>
        </div>

        <!-- Jadwal Posyandu -->
        <div class="scroll-animate bg-white border border-gray-300 p-4 sm:p-5 md:p-6 mb-6 rounded-lg" data-animation="fade-up" data-delay="100">
            <h2 class="text-lg md:text-xl font-bold text-[#1e3a8a] mb-4 pb-2 border-b-2 border-[#1e3a8a]">Jadwal Posyandu</h2>
        <p class="text-gray-700 text-sm md:text-base mb-4">
            Pelayanan kesehatan ibu dan anak dilaksanakan setiap bulan di setiap Rukun Warga (RW). 
            Berikut adalah jadwal pelaksanaan Posyandu:
        </p>
        <div class="overflow-x-auto">
            <table class="w-full text-xs md:text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-3 md:px-4 py-2 text-left border border-gray-300 font-semibold">Rukun Warga (RW)</th>
                        <th class="px-3 md:px-4 py-2 text-left border border-gray-300 font-semibold">Hari</th>
                        <th class="px-3 md:px-4 py-2 text-left border border-gray-300 font-semibold">Tanggal</th>
                        <th class="px-3 md:px-4 py-2 text-left border border-gray-300 font-semibold">Waktu</th>
                        <th class="px-3 md:px-4 py-2 text-left border border-gray-300 font-semibold">Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-3 md:px-4 py-2 border border-gray-300">RW 01</td>
                        <td class="px-3 md:px-4 py-2 border border-gray-300">Selasa</td>
                        <td class="px-3 md:px-4 py-2 border border-gray-300">Minggu Pertama</td>
                        <td class="px-3 md:px-4 py-2 border border-gray-300">08:00 - 11:00 WIB</td>
                        <td class="px-3 md:px-4 py-2 border border-gray-300">Balai RW 01</td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-3 md:px-4 py-2 border border-gray-300">RW 02</td>
                        <td class="px-3 md:px-4 py-2 border border-gray-300">Rabu</td>
                        <td class="px-3 md:px-4 py-2 border border-gray-300">Minggu Pertama</td>
                        <td class="px-3 md:px-4 py-2 border border-gray-300">08:00 - 11:00 WIB</td>
                        <td class="px-3 md:px-4 py-2 border border-gray-300">Balai RW 02</td>
                    </tr>
                    <tr>
                        <td class="px-3 md:px-4 py-2 border border-gray-300">RW 03</td>
                        <td class="px-3 md:px-4 py-2 border border-gray-300">Kamis</td>
                        <td class="px-3 md:px-4 py-2 border border-gray-300">Minggu Pertama</td>
                        <td class="px-3 md:px-4 py-2 border border-gray-300">08:00 - 11:00 WIB</td>
                        <td class="px-3 md:px-4 py-2 border border-gray-300">Balai RW 03</td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-3 md:px-4 py-2 border border-gray-300">RW 04</td>
                        <td class="px-3 md:px-4 py-2 border border-gray-300">Jumat</td>
                        <td class="px-3 md:px-4 py-2 border border-gray-300">Minggu Pertama</td>
                        <td class="px-3 md:px-4 py-2 border border-gray-300">08:00 - 11:00 WIB</td>
                        <td class="px-3 md:px-4 py-2 border border-gray-300">Balai RW 04</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-4 p-3 bg-blue-50 border border-blue-200 text-xs md:text-sm text-gray-700">
            <p class="mb-1"><strong>Layanan Posyandu:</strong></p>
            <ul class="list-disc list-inside space-y-1">
                <li>Pemeriksaan kesehatan balita (penimbangan, pengukuran tinggi badan)</li>
                <li>Imunisasi untuk bayi dan balita</li>
                <li>Pemberian vitamin A dan tablet tambah darah</li>
                <li>Penyuluhan kesehatan ibu dan anak</li>
                <li>Konsultasi gizi dan kesehatan</li>
            </ul>
        </div>
    </div>

    <!-- Informasi Puskesmas -->
    <div class="scroll-animate bg-white border border-gray-300 p-4 md:p-6 mb-6" data-animation="fade-up">
        <h2 class="text-lg md:text-xl font-bold text-[#1e3a8a] mb-4 pb-2 border-b-2 border-[#1e3a8a]">Informasi Puskesmas</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
            <div>
                <h3 class="font-semibold text-gray-900 mb-2 text-sm md:text-base">Alamat Puskesmas</h3>
                <p class="text-gray-700 text-sm md:text-base leading-relaxed">
                    Puskesmas Kecamatan<br>
                    Jalan Kesehatan No. 45<br>
                    Kecamatan, Kabupaten<br>
                    Kode Pos 12345
                </p>
            </div>
            <div>
                <h3 class="font-semibold text-gray-900 mb-2 text-sm md:text-base">Kontak dan Jam Pelayanan</h3>
                <p class="text-gray-700 text-sm md:text-base space-y-1">
                    <strong>Telepon:</strong> <a href="tel:02112345690" class="text-[#1e3a8a] hover:underline">(021) 1234-5690</a><br>
                    <strong>Hari Pelayanan:</strong> Senin - Jumat<br>
                    <strong>Waktu:</strong> 08:00 - 15:00 WIB<br>
                    <strong>Istirahat:</strong> 12:00 - 13:00 WIB
                </p>
            </div>
        </div>
        <div class="mt-4">
            <h3 class="font-semibold text-gray-900 mb-2 text-sm md:text-base">Layanan Puskesmas</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <ul class="text-gray-700 text-sm md:text-base space-y-1 list-disc list-inside">
                    <li>Pelayanan kesehatan umum</li>
                    <li>Pelayanan kesehatan ibu dan anak</li>
                    <li>Imunisasi</li>
                    <li>Pemeriksaan laboratorium sederhana</li>
                </ul>
                <ul class="text-gray-700 text-sm md:text-base space-y-1 list-disc list-inside">
                    <li>Konsultasi gizi</li>
                    <li>Penyuluhan kesehatan</li>
                    <li>Pemeriksaan kesehatan sekolah</li>
                    <li>Program pencegahan penyakit</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Bantuan Sosial -->
    <div class="scroll-animate bg-white border border-gray-300 p-4 md:p-6 mb-6" data-animation="fade-up" data-delay="100">
        <h2 class="text-lg md:text-xl font-bold text-[#1e3a8a] mb-4 pb-2 border-b-2 border-[#1e3a8a]">Program Bantuan Sosial</h2>
        <div class="space-y-4">
            <div class="border border-gray-200 p-4">
                <h3 class="font-semibold text-gray-900 mb-2 text-sm md:text-base">Bantuan Langsung Tunai (BLT)</h3>
                <p class="text-gray-700 text-sm md:text-base leading-relaxed mb-2">
                    Program bantuan sosial untuk keluarga miskin yang memenuhi kriteria. Bantuan diberikan secara 
                    langsung dalam bentuk uang tunai untuk membantu memenuhi kebutuhan pokok keluarga.
                </p>
                <p class="text-gray-600 text-xs md:text-sm">
                    <strong>Persyaratan:</strong> Surat Keterangan Tidak Mampu (SKTM), Kartu Keluarga, KTP, dan dokumen pendukung lainnya.
                </p>
            </div>

            <div class="border border-gray-200 p-4">
                <h3 class="font-semibold text-gray-900 mb-2 text-sm md:text-base">Bantuan Pangan Non Tunai (BPNT)</h3>
                <p class="text-gray-700 text-sm md:text-base leading-relaxed mb-2">
                    Bantuan pangan untuk keluarga penerima manfaat melalui kartu elektronik yang dapat digunakan 
                    di toko-toko mitra untuk membeli bahan pangan pokok.
                </p>
                <p class="text-gray-600 text-xs md:text-sm">
                    <strong>Persyaratan:</strong> Terdaftar sebagai penerima manfaat, memiliki kartu BPNT yang masih aktif.
                </p>
            </div>

            <div class="border border-gray-200 p-4">
                <h3 class="font-semibold text-gray-900 mb-2 text-sm md:text-base">Program Keluarga Harapan (PKH)</h3>
                <p class="text-gray-700 text-sm md:text-base leading-relaxed mb-2">
                    Program bantuan sosial bersyarat untuk keluarga miskin dengan komitmen memenuhi persyaratan 
                    kesehatan dan pendidikan. Bantuan diberikan secara bertahap dengan syarat tertentu.
                </p>
                <p class="text-gray-600 text-xs md:text-sm">
                    <strong>Persyaratan:</strong> Memiliki anak usia sekolah, ibu hamil, atau lansia, terdaftar sebagai keluarga miskin.
                </p>
            </div>

            <div class="border border-gray-200 p-4">
                <h3 class="font-semibold text-gray-900 mb-2 text-sm md:text-base">Bantuan Kesehatan</h3>
                <p class="text-gray-700 text-sm md:text-base leading-relaxed mb-2">
                    Program bantuan kesehatan untuk warga yang membutuhkan, termasuk bantuan biaya pengobatan, 
                    rujukan ke rumah sakit, dan bantuan biaya operasi.
                </p>
                <p class="text-gray-600 text-xs md:text-sm">
                    <strong>Persyaratan:</strong> Surat Keterangan Tidak Mampu (SKTM), surat rujukan dari puskesmas, Kartu Keluarga, KTP.
                </p>
            </div>
        </div>
    </div>

    <!-- Form Pengaduan Sosial -->
    <div class="scroll-animate bg-white border border-gray-300 p-4 md:p-6 mb-6" data-animation="fade-up">
        <h2 class="text-lg md:text-xl font-bold text-[#1e3a8a] mb-4 pb-2 border-b-2 border-[#1e3a8a]">Formulir Pengaduan Sosial</h2>
        <p class="text-gray-700 text-sm md:text-base mb-4">
            Formulir ini digunakan untuk melaporkan masalah sosial yang terjadi di lingkungan desa. 
            Pengaduan akan ditindaklanjuti oleh pihak yang berwenang dengan menjaga kerahasiaan identitas pelapor.
        </p>
        
        <form class="space-y-4">
            <div>
                <label for="nama_pelapor" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Lengkap Pelapor <span class="text-red-600">*</span>
                </label>
                <input type="text" id="nama_pelapor" name="nama_pelapor" required 
                    class="w-full px-3 py-2 border border-gray-300 text-sm focus:outline-none focus:border-[#1e3a8a]"
                    placeholder="Masukkan nama lengkap">
            </div>

            <div>
                <label for="nik_pelapor" class="block text-sm font-medium text-gray-700 mb-1">
                    Nomor Induk Kependudukan (NIK) <span class="text-red-600">*</span>
                </label>
                <input type="text" id="nik_pelapor" name="nik_pelapor" required 
                    class="w-full px-3 py-2 border border-gray-300 text-sm focus:outline-none focus:border-[#1e3a8a]"
                    placeholder="Masukkan NIK (16 digit)"
                    maxlength="16" pattern="[0-9]{16}">
            </div>

            <div>
                <label for="alamat_pelapor" class="block text-sm font-medium text-gray-700 mb-1">
                    Alamat Lengkap <span class="text-red-600">*</span>
                </label>
                <textarea id="alamat_pelapor" name="alamat_pelapor" rows="2" required 
                    class="w-full px-3 py-2 border border-gray-300 text-sm focus:outline-none focus:border-[#1e3a8a]"
                    placeholder="Masukkan alamat lengkap"></textarea>
            </div>

            <div>
                <label for="telepon_pelapor" class="block text-sm font-medium text-gray-700 mb-1">
                    Nomor Telepon <span class="text-red-600">*</span>
                </label>
                <input type="tel" id="telepon_pelapor" name="telepon_pelapor" required 
                    class="w-full px-3 py-2 border border-gray-300 text-sm focus:outline-none focus:border-[#1e3a8a]"
                    placeholder="Masukkan nomor telepon yang dapat dihubungi">
            </div>

            <div>
                <label for="jenis_pengaduan" class="block text-sm font-medium text-gray-700 mb-1">
                    Jenis Pengaduan <span class="text-red-600">*</span>
                </label>
                <select id="jenis_pengaduan" name="jenis_pengaduan" required 
                    class="w-full px-3 py-2 border border-gray-300 text-sm focus:outline-none focus:border-[#1e3a8a]">
                    <option value="">Pilih jenis pengaduan</option>
                    <option value="kekerasan">Kekerasan dalam rumah tangga</option>
                    <option value="anak">Perlindungan anak</option>
                    <option value="lansia">Perlindungan lansia</option>
                    <option value="disabilitas">Perlindungan penyandang disabilitas</option>
                    <option value="kemiskinan">Masalah kemiskinan</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>

            <div>
                <label for="lokasi_kejadian" class="block text-sm font-medium text-gray-700 mb-1">
                    Lokasi Kejadian <span class="text-red-600">*</span>
                </label>
                <input type="text" id="lokasi_kejadian" name="lokasi_kejadian" required 
                    class="w-full px-3 py-2 border border-gray-300 text-sm focus:outline-none focus:border-[#1e3a8a]"
                    placeholder="Masukkan alamat atau lokasi kejadian">
            </div>

            <div>
                <label for="uraian_pengaduan" class="block text-sm font-medium text-gray-700 mb-1">
                    Uraian Pengaduan <span class="text-red-600">*</span>
                </label>
                <textarea id="uraian_pengaduan" name="uraian_pengaduan" rows="5" required 
                    class="w-full px-3 py-2 border border-gray-300 text-sm focus:outline-none focus:border-[#1e3a8a]"
                    placeholder="Jelaskan secara detail kejadian yang dilaporkan"></textarea>
            </div>

            <div>
                <label for="dokumen_pendukung" class="block text-sm font-medium text-gray-700 mb-1">
                    Dokumen Pendukung (Opsional)
                </label>
                <input type="file" id="dokumen_pendukung" name="dokumen_pendukung" 
                    class="w-full px-3 py-2 border border-gray-300 text-sm focus:outline-none focus:border-[#1e3a8a]"
                    accept=".pdf,.jpg,.jpeg,.png">
                <p class="text-xs text-gray-500 mt-1">
                    Format file: PDF, JPG, atau PNG. Maksimal ukuran file: 5 MB.
                </p>
            </div>

            <div class="bg-yellow-50 border border-yellow-200 p-3 text-xs md:text-sm text-gray-700">
                <p class="mb-1"><strong>Catatan Penting:</strong></p>
                <ul class="list-disc list-inside space-y-1">
                    <li>Identitas pelapor akan dijaga kerahasiaannya</li>
                    <li>Pengaduan akan ditindaklanjuti oleh pihak yang berwenang</li>
                    <li>Pastikan informasi yang diberikan sudah benar dan lengkap</li>
                    <li>Untuk kasus darurat, segera hubungi nomor kontak darurat</li>
                </ul>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-[#1e3a8a] text-white px-6 py-2 text-sm md:text-base hover:bg-blue-900">
                    Kirim Pengaduan
                </button>
                <button type="reset" class="bg-gray-200 text-gray-700 px-6 py-2 text-sm md:text-base hover:bg-gray-300">
                    Reset Formulir
                </button>
            </div>
        </form>
    </div>

    <!-- Informasi Kontak -->
    <div class="scroll-animate bg-white border border-gray-300 p-4 md:p-6" data-animation="fade-up" data-delay="100">
        <h2 class="text-lg md:text-xl font-bold text-[#1e3a8a] mb-4 pb-2 border-b-2 border-[#1e3a8a]">Informasi Kontak</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <h3 class="font-semibold text-gray-900 mb-2 text-sm md:text-base">Kantor Desa</h3>
                <p class="text-gray-700 text-sm md:text-base">
                    <strong>Telepon:</strong> <a href="tel:02112345678" class="text-[#1e3a8a] hover:underline">(021) 1234-5678</a><br>
                    <strong>Email:</strong> info@desa.go.id
                </p>
            </div>
            <div>
                <h3 class="font-semibold text-gray-900 mb-2 text-sm md:text-base">Kepala Urusan Kesejahteraan Rakyat</h3>
                <p class="text-gray-700 text-sm md:text-base">
                    <strong>Telepon:</strong> <a href="tel:02112345679" class="text-[#1e3a8a] hover:underline">(021) 1234-5679</a><br>
                    <strong>Jam Pelayanan:</strong> Senin - Jumat, 08:00 - 15:00 WIB
                </p>
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
