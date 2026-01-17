@extends('layouts.app')

@section('title', 'Berita & Pengumuman - Website Resmi Pemerintah Desa')

@section('content')
    <div class="mb-8 scroll-animate" data-animation="fade-up">
        <h1 class="text-2xl md:text-3xl font-bold text-green-800 mb-2">Berita & Pengumuman</h1>
        <p class="text-gray-600 text-base md:text-lg">Informasi terbaru dari pemerintah desa</p>
    </div>

    <!-- Filter Kategori -->
    <div class="mb-6 flex flex-wrap gap-2 scroll-animate" data-animation="fade-up" data-delay="100">
        <button class="px-4 py-2 bg-green-800 text-white text-sm font-medium hover:bg-green-900 transition-colors">Semua</button>
        <button class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium hover:bg-gray-300 transition-colors">Pengumuman</button>
        <button class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium hover:bg-gray-300 transition-colors">Informasi</button>
        <button class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium hover:bg-gray-300 transition-colors">Berita</button>
    </div>

    <!-- Daftar Berita -->
    <div class="space-y-6 skeleton-wrapper" id="berita-list-skeleton">
        <!-- Skeleton Loading -->
        <article class="skeleton-card">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="flex-shrink-0 w-full md:w-64">
                    <div class="skeleton skeleton-image"></div>
                </div>
                <div class="flex-1">
                    <div class="skeleton skeleton-text" style="height: 1.5rem; width: 30%; margin-bottom: 1rem;"></div>
                    <div class="skeleton skeleton-title"></div>
                    <div class="skeleton skeleton-text"></div>
                    <div class="skeleton skeleton-text"></div>
                    <div class="skeleton skeleton-text" style="width: 80%;"></div>
                </div>
            </div>
        </article>
        <article class="skeleton-card">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="flex-shrink-0 w-full md:w-64">
                    <div class="skeleton skeleton-image"></div>
                </div>
                <div class="flex-1">
                    <div class="skeleton skeleton-text" style="height: 1.5rem; width: 30%; margin-bottom: 1rem;"></div>
                    <div class="skeleton skeleton-title"></div>
                    <div class="skeleton skeleton-text"></div>
                    <div class="skeleton skeleton-text"></div>
                    <div class="skeleton skeleton-text" style="width: 80%;"></div>
                </div>
            </div>
        </article>
        <article class="skeleton-card">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="flex-shrink-0 w-full md:w-64">
                    <div class="skeleton skeleton-image"></div>
                </div>
                <div class="flex-1">
                    <div class="skeleton skeleton-text" style="height: 1.5rem; width: 30%; margin-bottom: 1rem;"></div>
                    <div class="skeleton skeleton-title"></div>
                    <div class="skeleton skeleton-text"></div>
                    <div class="skeleton skeleton-text"></div>
                    <div class="skeleton skeleton-text" style="width: 80%;"></div>
                </div>
            </div>
        </article>
    </div>
    <!-- Daftar Berita Content -->
    <div class="space-y-6 skeleton-content" id="berita-list-content">
        <!-- Berita 1 -->
        <article class="scroll-animate bg-white border border-gray-200 p-6 md:p-8 hover:border-green-600 transition-colors group" data-animation="fade-up" data-delay="200">
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Gambar -->
                <div class="flex-shrink-0 w-full md:w-64">
                    <div class="aspect-video md:aspect-square bg-gray-100 overflow-hidden">
                        @if (file_exists(public_path('images/berita/bantuan-sosial.jpg')))
                            <img src="{{ asset('images/berita/bantuan-sosial.jpg') }}" alt="Bantuan Sosial" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Konten -->
                <div class="flex-1">
                    <div class="flex items-start gap-4 mb-4">
                        <span class="bg-green-100 text-green-800 px-4 py-1.5 text-xs font-semibold">Pengumuman</span>
                        <time class="text-sm text-gray-500">15 Januari 2024</time>
                    </div>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-3 group-hover:text-green-800 transition-colors">
                        Pendaftaran Program Bantuan Sosial Tahun 2024
                    </h2>
                    <p class="text-gray-700 text-base md:text-lg leading-relaxed mb-4">
                        Pemerintah Desa membuka pendaftaran program bantuan sosial untuk warga yang memenuhi kriteria. 
                        Pendaftaran dibuka mulai tanggal 20 Januari 2024 hingga 5 Februari 2024. Persyaratan meliputi 
                        Kartu Keluarga, KTP, Surat Keterangan Tidak Mampu dari RT/RW, dan dokumen pendukung lainnya. 
                        Formulir pendaftaran dapat diambil di kantor desa pada jam pelayanan atau diunduh melalui website ini.
                    </p>
                    <a href="#" class="text-green-800 text-sm font-medium hover:underline inline-flex items-center gap-1">
                        Baca selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </article>

        <!-- Berita 2 -->
        <article class="scroll-animate bg-white border border-gray-200 p-6 md:p-8 hover:border-green-600 transition-colors group" data-animation="fade-up" data-delay="300">
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Gambar -->
                <div class="flex-shrink-0 w-full md:w-64">
                    <div class="aspect-video md:aspect-square bg-gray-100 overflow-hidden">
                        @if (file_exists(public_path('images/berita/pelayanan-administrasi.jpg')))
                            <img src="{{ asset('images/berita/pelayanan-administrasi.jpg') }}" alt="Pelayanan Administrasi" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Konten -->
                <div class="flex-1">
                    <div class="flex items-start gap-4 mb-4">
                        <span class="bg-blue-100 text-blue-800 px-4 py-1.5 text-xs font-semibold">Informasi</span>
                        <time class="text-sm text-gray-500">10 Januari 2024</time>
                    </div>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-3 group-hover:text-green-800 transition-colors">
                        Jadwal Pelayanan Administrasi Kependudukan
                    </h2>
                    <p class="text-gray-700 text-base md:text-lg leading-relaxed mb-4">
                        Pelayanan administrasi kependudukan dilayani setiap hari kerja Senin hingga Jumat pukul 08:00 - 15:00 WIB. 
                        Pelayanan meliputi pembuatan surat keterangan domisili, surat pengantar KTP, surat keterangan tidak mampu, 
                        dan berbagai surat administrasi lainnya. Untuk layanan khusus atau di luar jam kerja, warga dapat 
                        menghubungi kantor desa terlebih dahulu untuk koordinasi.
                    </p>
                    <a href="#" class="text-green-800 text-sm font-medium hover:underline inline-flex items-center gap-1">
                        Baca selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </article>

        <!-- Berita 3 -->
        <article class="bg-white border border-gray-200 p-6 md:p-8 hover:border-green-600 transition-colors group">
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Gambar -->
                <div class="flex-shrink-0 w-full md:w-64">
                    <div class="aspect-video md:aspect-square bg-gray-100 overflow-hidden">
                        @if (file_exists(public_path('images/berita/gotong-royong.jpg')))
                            <img src="{{ asset('images/berita/gotong-royong.jpg') }}" alt="Gotong Royong" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Konten -->
                <div class="flex-1">
                    <div class="flex items-start gap-4 mb-4">
                        <span class="bg-yellow-100 text-yellow-800 px-4 py-1.5 text-xs font-semibold">Berita</span>
                        <time class="text-sm text-gray-500">5 Januari 2024</time>
                    </div>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-3 group-hover:text-green-800 transition-colors">
                        Kegiatan Gotong Royong Pembersihan Lingkungan
                    </h2>
                    <p class="text-gray-700 text-base md:text-lg leading-relaxed mb-4">
                        Pemerintah Desa mengundang seluruh warga untuk berpartisipasi dalam kegiatan gotong royong pembersihan 
                        lingkungan yang akan dilaksanakan pada hari Minggu, 14 Januari 2024 pukul 07:00 WIB. Kegiatan ini 
                        meliputi pembersihan saluran air, penataan taman, dan pembersihan sampah di sepanjang jalan desa. 
                        Peralatan kebersihan akan disediakan oleh pemerintah desa. Kegiatan ini merupakan bagian dari program 
                        kebersihan lingkungan desa yang dilaksanakan secara rutin setiap bulan.
                    </p>
                    <a href="#" class="text-green-800 text-sm font-medium hover:underline inline-flex items-center gap-1">
                        Baca selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </article>

        <!-- Berita 4 -->
        <article class="bg-white border border-gray-200 p-6 md:p-8 hover:border-green-600 transition-colors group">
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Gambar -->
                <div class="flex-shrink-0 w-full md:w-64">
                    <div class="aspect-video md:aspect-square bg-gray-100 overflow-hidden">
                        @if (file_exists(public_path('images/berita/musyawarah-desa.jpg')))
                            <img src="{{ asset('images/berita/musyawarah-desa.jpg') }}" alt="Musyawarah Desa" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Konten -->
                <div class="flex-1">
                    <div class="flex items-start gap-4 mb-4">
                        <span class="bg-green-100 text-green-800 px-4 py-1.5 text-xs font-semibold">Pengumuman</span>
                        <time class="text-sm text-gray-500">28 Desember 2023</time>
                    </div>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-3 group-hover:text-green-800 transition-colors">
                        Musyawarah Desa Perencanaan Pembangunan Tahun 2024
                    </h2>
                    <p class="text-gray-700 text-base md:text-lg leading-relaxed mb-4">
                        Pemerintah Desa akan menyelenggarakan musyawarah desa untuk perencanaan pembangunan tahun 2024 pada 
                        hari Sabtu, 6 Januari 2024 pukul 09:00 WIB di balai desa. Musyawarah ini membahas rencana kegiatan 
                        pembangunan, alokasi anggaran, dan prioritas program yang akan dilaksanakan sepanjang tahun 2024. 
                        Seluruh warga desa diundang untuk hadir dan menyampaikan aspirasi terkait pembangunan desa.
                    </p>
                    <a href="#" class="text-green-800 text-sm font-medium hover:underline inline-flex items-center gap-1">
                        Baca selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </article>

        <!-- Berita 5 -->
        <article class="bg-white border border-gray-200 p-6 md:p-8 hover:border-green-600 transition-colors group">
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Gambar -->
                <div class="flex-shrink-0 w-full md:w-64">
                    <div class="aspect-video md:aspect-square bg-gray-100 overflow-hidden">
                        @if (file_exists(public_path('images/berita/posyandu.jpg')))
                            <img src="{{ asset('images/berita/posyandu.jpg') }}" alt="Posyandu" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Konten -->
                <div class="flex-1">
                    <div class="flex items-start gap-4 mb-4">
                        <span class="bg-blue-100 text-blue-800 px-4 py-1.5 text-xs font-semibold">Informasi</span>
                        <time class="text-sm text-gray-500">3 Januari 2024</time>
                    </div>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-3 group-hover:text-green-800 transition-colors">
                        Pelaksanaan Posyandu Bulan Januari 2024
                    </h2>
                    <p class="text-gray-700 text-base md:text-lg leading-relaxed mb-4">
                        Pelaksanaan Posyandu untuk bulan Januari 2024 akan dilaksanakan di setiap RW sesuai jadwal yang telah 
                        ditetapkan. Kegiatan Posyandu meliputi penimbangan balita, pemberian imunisasi, pemberian vitamin A, 
                        dan penyuluhan kesehatan ibu dan anak. Jadwal lengkap dapat dilihat di papan pengumuman masing-masing RW 
                        atau ditanyakan kepada ketua RW setempat. Pelayanan Posyandu dilaksanakan secara gratis untuk seluruh warga.
                    </p>
                    <a href="#" class="text-green-800 text-sm font-medium hover:underline inline-flex items-center gap-1">
                        Baca selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </article>

        <!-- Berita 6 -->
        <article class="bg-white border border-gray-200 p-6 md:p-8 hover:border-green-600 transition-colors group">
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Gambar -->
                <div class="flex-shrink-0 w-full md:w-64">
                    <div class="aspect-video md:aspect-square bg-gray-100 overflow-hidden">
                        @if (file_exists(public_path('images/berita/pembangunan-jalan.jpg')))
                            <img src="{{ asset('images/berita/pembangunan-jalan.jpg') }}" alt="Pembangunan Jalan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Konten -->
                <div class="flex-1">
                    <div class="flex items-start gap-4 mb-4">
                        <span class="bg-yellow-100 text-yellow-800 px-4 py-1.5 text-xs font-semibold">Berita</span>
                        <time class="text-sm text-gray-500">20 Desember 2023</time>
                    </div>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-3 group-hover:text-green-800 transition-colors">
                        Pembangunan Jalan Lingkungan di RT 05 dan RT 06
                    </h2>
                    <p class="text-gray-700 text-base md:text-lg leading-relaxed mb-4">
                        Pemerintah Desa telah memulai pembangunan jalan lingkungan di RT 05 dan RT 06. Pembangunan ini merupakan 
                        bagian dari program peningkatan infrastruktur desa tahun 2023. Pekerjaan meliputi pengerasan jalan dengan 
                        beton dan perbaikan saluran drainase. Pembangunan diperkirakan selesai dalam waktu 2 bulan. Selama masa 
                        pembangunan, warga diimbau untuk berhati-hati saat melintasi area pekerjaan dan mengikuti arahan petugas 
                        yang bertugas di lokasi.
                    </p>
                    <a href="#" class="text-green-800 text-sm font-medium hover:underline inline-flex items-center gap-1">
                        Baca selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </article>

        <!-- Berita 7 -->
        <article class="bg-white border border-gray-200 p-6 md:p-8 hover:border-green-600 transition-colors group">
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Gambar -->
                <div class="flex-shrink-0 w-full md:w-64">
                    <div class="aspect-video md:aspect-square bg-gray-100 overflow-hidden">
                        @if (file_exists(public_path('images/berita/sensus-penduduk.jpg')))
                            <img src="{{ asset('images/berita/sensus-penduduk.jpg') }}" alt="Sensus Penduduk" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Konten -->
                <div class="flex-1">
                    <div class="flex items-start gap-4 mb-4">
                        <span class="bg-green-100 text-green-800 px-4 py-1.5 text-xs font-semibold">Pengumuman</span>
                        <time class="text-sm text-gray-500">15 Desember 2023</time>
                    </div>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-3 group-hover:text-green-800 transition-colors">
                        Pendataan Penduduk untuk Sensus Penduduk 2024
                    </h2>
                    <p class="text-gray-700 text-base md:text-lg leading-relaxed mb-4">
                        Pemerintah Desa akan melaksanakan pendataan penduduk untuk keperluan sensus penduduk tahun 2024. Pendataan 
                        akan dilakukan oleh petugas sensus yang akan mendatangi setiap rumah tangga. Warga diharapkan dapat 
                        memberikan data yang akurat dan lengkap kepada petugas sensus. Pendataan dimulai pada bulan Februari 2024 
                        dan diperkirakan selesai dalam waktu 1 bulan. Informasi lebih lanjut dapat ditanyakan di kantor desa.
                    </p>
                    <a href="#" class="text-green-800 text-sm font-medium hover:underline inline-flex items-center gap-1">
                        Baca selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </article>

        <!-- Berita 8 -->
        <article class="bg-white border border-gray-200 p-6 md:p-8 hover:border-green-600 transition-colors group">
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Gambar -->
                <div class="flex-shrink-0 w-full md:w-64">
                    <div class="aspect-video md:aspect-square bg-gray-100 overflow-hidden">
                        @if (file_exists(public_path('images/berita/pembagian-sembako.jpg')))
                            <img src="{{ asset('images/berita/pembagian-sembako.jpg') }}" alt="Pembagian Sembako" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Konten -->
                <div class="flex-1">
                    <div class="flex items-start gap-4 mb-4">
                        <span class="bg-blue-100 text-blue-800 px-4 py-1.5 text-xs font-semibold">Informasi</span>
                        <time class="text-sm text-gray-500">12 Desember 2023</time>
                    </div>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-3 group-hover:text-green-800 transition-colors">
                        Pembagian Sembako untuk Keluarga Miskin
                    </h2>
                    <p class="text-gray-700 text-base md:text-lg leading-relaxed mb-4">
                        Pemerintah Desa akan melaksanakan pembagian sembako untuk keluarga miskin pada hari Sabtu, 20 Januari 2024 
                        pukul 09:00 WIB di balai desa. Pembagian dilakukan berdasarkan data keluarga miskin yang telah terverifikasi. 
                        Setiap keluarga penerima akan mendapatkan paket sembako yang terdiri dari beras, minyak goreng, gula, dan 
                        bahan pokok lainnya. Penerima diharapkan hadir tepat waktu dan membawa Kartu Keluarga untuk verifikasi.
                    </p>
                    <a href="#" class="text-green-800 text-sm font-medium hover:underline inline-flex items-center gap-1">
                        Baca selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </article>

        <!-- Berita 9 -->
        <article class="bg-white border border-gray-200 p-6 md:p-8 hover:border-green-600 transition-colors group">
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Gambar -->
                <div class="flex-shrink-0 w-full md:w-64">
                    <div class="aspect-video md:aspect-square bg-gray-100 overflow-hidden">
                        @if (file_exists(public_path('images/berita/peresmian-balai-desa.jpg')))
                            <img src="{{ asset('images/berita/peresmian-balai-desa.jpg') }}" alt="Peresmian Balai Desa" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Konten -->
                <div class="flex-1">
                    <div class="flex items-start gap-4 mb-4">
                        <span class="bg-yellow-100 text-yellow-800 px-4 py-1.5 text-xs font-semibold">Berita</span>
                        <time class="text-sm text-gray-500">8 Desember 2023</time>
                    </div>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-3 group-hover:text-green-800 transition-colors">
                        Peresmian Balai Desa Baru
                    </h2>
                    <p class="text-gray-700 text-base md:text-lg leading-relaxed mb-4">
                        Pemerintah Desa meresmikan balai desa baru yang telah selesai dibangun pada hari Sabtu, 2 Desember 2023. 
                        Balai desa baru ini dilengkapi dengan ruang rapat, ruang pelayanan, dan fasilitas pendukung lainnya. 
                        Peresmian dihadiri oleh Bupati, Camat, dan seluruh perangkat desa. Balai desa baru ini diharapkan dapat 
                        meningkatkan kualitas pelayanan kepada masyarakat dan menjadi pusat kegiatan pemerintahan desa.
                    </p>
                    <a href="#" class="text-green-800 text-sm font-medium hover:underline inline-flex items-center gap-1">
                        Baca selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </article>

        <!-- Berita 10 -->
        <article class="bg-white border border-gray-200 p-6 md:p-8 hover:border-green-600 transition-colors group">
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Gambar -->
                <div class="flex-shrink-0 w-full md:w-64">
                    <div class="aspect-video md:aspect-square bg-gray-100 overflow-hidden">
                        @if (file_exists(public_path('images/berita/pelatihan-kewirausahaan.jpg')))
                            <img src="{{ asset('images/berita/pelatihan-kewirausahaan.jpg') }}" alt="Pelatihan Kewirausahaan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Konten -->
                <div class="flex-1">
                    <div class="flex items-start gap-4 mb-4">
                        <span class="bg-green-100 text-green-800 px-4 py-1.5 text-xs font-semibold">Pengumuman</span>
                        <time class="text-sm text-gray-500">1 Desember 2023</time>
                    </div>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-3 group-hover:text-green-800 transition-colors">
                        Program Pelatihan Kewirausahaan untuk Pemuda
                    </h2>
                    <p class="text-gray-700 text-base md:text-lg leading-relaxed mb-4">
                        Pemerintah Desa bekerja sama dengan Dinas Koperasi dan UKM Kabupaten menyelenggarakan program pelatihan 
                        kewirausahaan untuk pemuda desa. Pelatihan akan dilaksanakan selama 3 hari mulai tanggal 15 Desember 2023. 
                        Program ini bertujuan untuk meningkatkan kemampuan wirausaha pemuda dan mendorong tumbuhnya usaha kecil 
                        menengah di desa. Pendaftaran dibuka mulai tanggal 5 Desember 2023 di kantor desa.
                    </p>
                    <a href="#" class="text-green-800 text-sm font-medium hover:underline inline-flex items-center gap-1">
                        Baca selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </article>
    </div>

    <!-- Pagination -->
    <div class="scroll-animate mt-8 flex justify-center gap-2" data-animation="fade-up">
        <button class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium hover:bg-gray-300 transition-colors">Sebelumnya</button>
        <button class="px-4 py-2 bg-green-800 text-white text-sm font-medium hover:bg-green-900 transition-colors">1</button>
        <button class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium hover:bg-gray-300 transition-colors">2</button>
        <button class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium hover:bg-gray-300 transition-colors">3</button>
        <button class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium hover:bg-gray-300 transition-colors">Selanjutnya</button>
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

        // Skeleton Loading Management
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const beritaSkeleton = document.getElementById('berita-list-skeleton');
                const beritaContent = document.getElementById('berita-list-content');
                if (beritaSkeleton && beritaContent) {
                    beritaSkeleton.classList.add('hide');
                    beritaContent.classList.add('show');
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
