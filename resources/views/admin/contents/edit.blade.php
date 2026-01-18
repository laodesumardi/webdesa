@extends('admin.layouts.app')

@section('title', 'Edit Konten - ' . ($pages[$page] ?? $page))

@section('content')
<div class="p-4 sm:p-6 md:p-8">
    <!-- Header -->
    <div class="mb-6 sm:mb-8">
        <div class="flex items-center gap-4 mb-4">
            <a href="{{ route('admin.contents.index') }}" class="text-gray-600 hover:text-[#1e3a8a] transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900">Edit Konten - {{ $pages[$page] ?? $page }}</h1>
                <p class="text-gray-600 text-sm sm:text-base mt-1">Kelola konten dan teks di halaman ini</p>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert">
            <p class="font-bold">{{ session('success') }}</p>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded" role="alert">
            <p class="font-bold">{{ session('error') }}</p>
        </div>
    @endif


    <form method="POST" action="{{ route('admin.contents.update', $page) }}" id="content-form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        @if($page === 'beranda')
        <!-- Simple Form for Sambutan -->
        <div class="bg-white rounded-lg shadow-md p-6 md:p-8 border border-gray-200 mb-6">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Edit Sambutan Kepala Desa</h2>
            
            @php
                $sambutanTitle = $contents['sambutan']->firstWhere('key', 'title')->content ?? 'Sambutan Kepala Desa';
                $sambutanFoto = $contents['sambutan']->firstWhere('key', 'foto')->content ?? 'images/kepala-desa.jpg';
                $sambutanNamaKepala = $contents['sambutan']->firstWhere('key', 'nama_kepala')->content ?? 'Kepala Desa';
                $sambutanContent = $contents['sambutan']->firstWhere('key', 'content')->content ?? "Assalamu'alaikum Warahmatullahi Wabarakatuh\n\nPuji syukur kehadirat Allah SWT, atas rahmat dan karunia-Nya, kami dapat menyampaikan sambutan melalui website resmi Pemerintah Desa ini.\n\nWebsite ini merupakan media komunikasi dan informasi antara Pemerintah Desa dengan seluruh masyarakat. Melalui website ini, kami berkomitmen untuk menyampaikan informasi yang transparan, akurat, dan dapat diakses oleh seluruh warga desa.\n\nKami mengajak seluruh masyarakat untuk berpartisipasi aktif dalam pembangunan desa. Semoga website ini dapat menjadi sarana yang bermanfaat bagi kita semua.\n\nWassalamu'alaikum Warahmatullahi Wabarakatuh";
            @endphp
            
            <!-- Judul Sambutan -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Sambutan</label>
                <input type="hidden" name="contents[0][section]" value="sambutan">
                <input type="hidden" name="contents[0][key]" value="title">
                <input type="text" name="contents[0][content]" value="{{ $sambutanTitle }}" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                    placeholder="Sambutan Kepala Desa">
            </div>
            
            <!-- Foto Kepala Desa -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Kepala Desa</label>
                <input type="hidden" name="contents[1][section]" value="sambutan">
                <input type="hidden" name="contents[1][key]" value="foto">
                <div class="flex items-center gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3">
                            <label class="cursor-pointer">
                                <input type="file" id="foto-upload" name="foto_kepala_desa" accept="image/*" class="hidden" onchange="handleFotoUpload(event)">
                                <span class="inline-flex items-center gap-2 px-4 py-2.5 bg-[#1e3a8a] text-white rounded-lg hover:bg-blue-800 transition-colors text-sm font-medium shadow-md hover:shadow-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Pilih Gambar
                                </span>
                            </label>
                            <input type="hidden" name="contents[1][content]" id="foto-path" value="{{ $sambutanFoto }}" required>
                            <span id="foto-filename" class="text-sm text-gray-600">{{ basename($sambutanFoto) }}</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-2">Klik tombol untuk memilih dan upload gambar kepala desa</p>
                    </div>
                    <div class="w-24 h-24 rounded-lg overflow-hidden border-2 border-gray-200 shadow-md">
                        @if($sambutanFoto)
                        <img src="{{ asset($sambutanFoto) }}" alt="Preview" id="foto-preview" class="w-full h-full object-cover" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-100 flex items-center justify-center\'><svg class=\'w-12 h-12 text-gray-400\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z\'></path></svg></div>'">
                        @else
                        <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Nama Kepala Desa -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Kepala Desa</label>
                <input type="hidden" name="contents[3][section]" value="sambutan">
                <input type="hidden" name="contents[3][key]" value="nama_kepala">
                <input type="text" name="contents[3][content]" value="{{ $sambutanNamaKepala }}" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                    placeholder="Kepala Desa">
                <p class="text-xs text-gray-500 mt-2">Nama akan ditampilkan di bawah foto kepala desa</p>
            </div>
            
            <script>
                function handleFotoUpload(event) {
                    const file = event.target.files[0];
                    if (file) {
                        // Show filename
                        document.getElementById('foto-filename').textContent = file.name;
                        
                        // Preview image
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const previewDiv = document.querySelector('.w-24.h-24');
                            if (previewDiv) {
                                previewDiv.innerHTML = `<img src="${e.target.result}" alt="Preview" id="foto-preview" class="w-full h-full object-cover">`;
                            }
                        };
                        reader.readAsDataURL(file);
                        
                        // Upload file via AJAX
                        const formData = new FormData();
                        formData.append('foto', file);
                        formData.append('_token', '{{ csrf_token() }}');
                        
                        fetch('{{ route("admin.contents.upload-foto") }}', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                document.getElementById('foto-path').value = data.path;
                                document.getElementById('foto-filename').textContent = data.filename;
                                
                                // Update preview with uploaded image
                                const previewDiv = document.querySelector('.w-24.h-24');
                                if (previewDiv) {
                                    previewDiv.innerHTML = `<img src="{{ asset('') }}${data.path}" alt="Preview" id="foto-preview" class="w-full h-full object-cover">`;
                                }
                            } else {
                                alert('Gagal upload gambar: ' + (data.message || 'Error'));
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Terjadi kesalahan saat upload gambar');
                        });
                    }
                }
            </script>
            
            <!-- Teks Sambutan Lengkap -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Teks Sambutan Lengkap</label>
                <input type="hidden" name="contents[2][section]" value="sambutan">
                <input type="hidden" name="contents[2][key]" value="content">
                <textarea name="contents[2][content]" rows="12" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                    placeholder="Masukkan teks sambutan lengkap">{{ $sambutanContent }}</textarea>
                <p class="text-xs text-gray-500 mt-2">Masukkan teks sambutan lengkap dari Assalamu'alaikum sampai Wassalamu'alaikum (tanpa nama kepala desa, karena sudah ada field terpisah di atas)</p>
            </div>
        </div>
        @elseif($page === 'profil')
        <!-- Simple Form for Profil -->
        <div class="bg-white rounded-lg shadow-md p-6 md:p-8 border border-gray-200 mb-6">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Edit Konten Profil Desa</h2>
            
            @php
                $headerTitle = isset($contents['header']) ? ($contents['header']->firstWhere('key', 'title')->content ?? 'Profil Desa') : 'Profil Desa';
                $headerSubtitle = isset($contents['header']) ? ($contents['header']->firstWhere('key', 'subtitle')->content ?? 'Informasi lengkap tentang desa kami') : 'Informasi lengkap tentang desa kami';
                
                $statistikLuasValue = isset($contents['statistik']) ? ($contents['statistik']->firstWhere('key', 'luas_value')->content ?? '250') : '250';
                $statistikLuasLabel = isset($contents['statistik']) ? ($contents['statistik']->firstWhere('key', 'luas_label')->content ?? 'Hektar Luas Wilayah') : 'Hektar Luas Wilayah';
                $statistikDplValue = isset($contents['statistik']) ? ($contents['statistik']->firstWhere('key', 'dpl_value')->content ?? '150') : '150';
                $statistikDplLabel = isset($contents['statistik']) ? ($contents['statistik']->firstWhere('key', 'dpl_label')->content ?? 'Meter DPL') : 'Meter DPL';
                $statistikCurahHujanValue = isset($contents['statistik']) ? ($contents['statistik']->firstWhere('key', 'curah_hujan_value')->content ?? '2.500-3.000') : '2.500-3.000';
                $statistikCurahHujanLabel = isset($contents['statistik']) ? ($contents['statistik']->firstWhere('key', 'curah_hujan_label')->content ?? 'mm Curah Hujan/Tahun') : 'mm Curah Hujan/Tahun';
                
                $sejarahTitle = isset($contents['sejarah']) ? ($contents['sejarah']->firstWhere('key', 'title')->content ?? 'Sejarah Desa') : 'Sejarah Desa';
                $sejarahContent = isset($contents['sejarah']) ? ($contents['sejarah']->firstWhere('key', 'content')->content ?? "Desa ini didirikan pada tahun 1920 dan memiliki sejarah panjang dalam pembangunan masyarakat.\n\nSeiring perkembangan zaman, desa ini terus berkembang menjadi desa yang maju dengan berbagai fasilitas umum yang memadai.") : "Desa ini didirikan pada tahun 1920 dan memiliki sejarah panjang dalam pembangunan masyarakat.\n\nSeiring perkembangan zaman, desa ini terus berkembang menjadi desa yang maju dengan berbagai fasilitas umum yang memadai.";
                
                $visiTitle = isset($contents['visi']) ? ($contents['visi']->firstWhere('key', 'title')->content ?? 'Visi') : 'Visi';
                $visiTeks = isset($contents['visi']) ? ($contents['visi']->firstWhere('key', 'teks')->content ?? 'Terwujudnya desa yang mandiri, sejahtera, dan berbudaya melalui peningkatan kualitas sumber daya manusia dan pengelolaan sumber daya alam yang berkelanjutan.') : 'Terwujudnya desa yang mandiri, sejahtera, dan berbudaya melalui peningkatan kualitas sumber daya manusia dan pengelolaan sumber daya alam yang berkelanjutan.';
                $visiDeskripsi = isset($contents['visi']) ? ($contents['visi']->firstWhere('key', 'deskripsi')->content ?? 'Visi tersebut mencerminkan cita-cita jangka panjang Pemerintah Desa dalam mewujudkan masyarakat yang mandiri, sejahtera, serta tetap mempertahankan nilai-nilai budaya lokal.') : 'Visi tersebut mencerminkan cita-cita jangka panjang Pemerintah Desa dalam mewujudkan masyarakat yang mandiri, sejahtera, serta tetap mempertahankan nilai-nilai budaya lokal.';
                
                $misiTitle = isset($contents['misi']) ? ($contents['misi']->firstWhere('key', 'title')->content ?? 'Misi') : 'Misi';
                $misiItem1 = isset($contents['misi']) ? ($contents['misi']->firstWhere('key', 'item1')->content ?? '') : '';
                $misiItem2 = isset($contents['misi']) ? ($contents['misi']->firstWhere('key', 'item2')->content ?? '') : '';
                $misiItem3 = isset($contents['misi']) ? ($contents['misi']->firstWhere('key', 'item3')->content ?? '') : '';
                $misiItem4 = isset($contents['misi']) ? ($contents['misi']->firstWhere('key', 'item4')->content ?? '') : '';
                $misiItem5 = isset($contents['misi']) ? ($contents['misi']->firstWhere('key', 'item5')->content ?? '') : '';
                
                $geografisTitle = isset($contents['geografis']) ? ($contents['geografis']->firstWhere('key', 'title')->content ?? 'Kondisi Geografis') : 'Kondisi Geografis';
                $geografisLetakTitle = isset($contents['geografis']) ? ($contents['geografis']->firstWhere('key', 'letak_title')->content ?? 'Letak Geografis') : 'Letak Geografis';
                $geografisLetakDeskripsi = isset($contents['geografis']) ? ($contents['geografis']->firstWhere('key', 'letak_deskripsi')->content ?? 'Desa ini terletak di wilayah yang memiliki posisi strategis dengan luas wilayah mencapai 250 hektar. Secara administratif, desa ini berbatasan langsung dengan beberapa desa di sekitarnya. Posisi geografis yang strategis ini memberikan keuntungan bagi desa dalam hal aksesibilitas dan potensi pengembangan ekonomi.') : 'Desa ini terletak di wilayah yang memiliki posisi strategis dengan luas wilayah mencapai 250 hektar. Secara administratif, desa ini berbatasan langsung dengan beberapa desa di sekitarnya. Posisi geografis yang strategis ini memberikan keuntungan bagi desa dalam hal aksesibilitas dan potensi pengembangan ekonomi.';
                $geografisBatasUtara = isset($contents['geografis']) ? ($contents['geografis']->firstWhere('key', 'batas_utara')->content ?? 'Desa Sebelah Utara') : 'Desa Sebelah Utara';
                $geografisBatasSelatan = isset($contents['geografis']) ? ($contents['geografis']->firstWhere('key', 'batas_selatan')->content ?? 'Desa Sebelah Selatan') : 'Desa Sebelah Selatan';
                $geografisBatasTimur = isset($contents['geografis']) ? ($contents['geografis']->firstWhere('key', 'batas_timur')->content ?? 'Desa Sebelah Timur') : 'Desa Sebelah Timur';
                $geografisBatasBarat = isset($contents['geografis']) ? ($contents['geografis']->firstWhere('key', 'batas_barat')->content ?? 'Desa Sebelah Barat') : 'Desa Sebelah Barat';
                $geografisTopografiTitle = isset($contents['geografis']) ? ($contents['geografis']->firstWhere('key', 'topografi_title')->content ?? 'Topografi dan Iklim') : 'Topografi dan Iklim';
                $geografisTopografiDeskripsi = isset($contents['geografis']) ? ($contents['geografis']->firstWhere('key', 'topografi_deskripsi')->content ?? 'Secara topografis, desa ini berada pada ketinggian rata-rata 150 meter di atas permukaan laut dengan kondisi topografi yang relatif datar hingga bergelombang. Sebagian besar wilayah desa merupakan dataran rendah yang cocok untuk kegiatan pertanian.') : 'Secara topografis, desa ini berada pada ketinggian rata-rata 150 meter di atas permukaan laut dengan kondisi topografi yang relatif datar hingga bergelombang. Sebagian besar wilayah desa merupakan dataran rendah yang cocok untuk kegiatan pertanian.';
                $geografisKetinggian = isset($contents['geografis']) ? ($contents['geografis']->firstWhere('key', 'ketinggian')->content ?? '150 mdpl') : '150 mdpl';
                $geografisTopografi = isset($contents['geografis']) ? ($contents['geografis']->firstWhere('key', 'topografi')->content ?? 'Datar hingga bergelombang') : 'Datar hingga bergelombang';
                $geografisIklim = isset($contents['geografis']) ? ($contents['geografis']->firstWhere('key', 'iklim')->content ?? 'Tropis') : 'Tropis';
                $geografisSuhu = isset($contents['geografis']) ? ($contents['geografis']->firstWhere('key', 'suhu')->content ?? '25-30°C') : '25-30°C';
                $geografisSdaTitle = isset($contents['geografis']) ? ($contents['geografis']->firstWhere('key', 'sda_title')->content ?? 'Sumber Daya Alam') : 'Sumber Daya Alam';
                $geografisSdaJenisTanahTitle = isset($contents['geografis']) ? ($contents['geografis']->firstWhere('key', 'sda_jenis_tanah_title')->content ?? 'Jenis Tanah') : 'Jenis Tanah';
                $geografisSdaJenisTanah = isset($contents['geografis']) ? ($contents['geografis']->firstWhere('key', 'sda_jenis_tanah')->content ?? 'Latosol dan Alluvial yang subur untuk pertanian') : 'Latosol dan Alluvial yang subur untuk pertanian';
                $geografisSdaSumberAirTitle = isset($contents['geografis']) ? ($contents['geografis']->firstWhere('key', 'sda_sumber_air_title')->content ?? 'Sumber Air') : 'Sumber Air';
                $geografisSdaSumberAir = isset($contents['geografis']) ? ($contents['geografis']->firstWhere('key', 'sda_sumber_air')->content ?? 'Beberapa aliran sungai untuk irigasi dan kebutuhan air bersih') : 'Beberapa aliran sungai untuk irigasi dan kebutuhan air bersih';
                $geografisSdaPotensiTitle = isset($contents['geografis']) ? ($contents['geografis']->firstWhere('key', 'sda_potensi_title')->content ?? 'Potensi Lain') : 'Potensi Lain';
                $geografisSdaPotensi = isset($contents['geografis']) ? ($contents['geografis']->firstWhere('key', 'sda_potensi')->content ?? 'Hutan, bahan galian, dan hasil pertanian') : 'Hutan, bahan galian, dan hasil pertanian';
            @endphp
            
            <!-- Header -->
            <div class="mb-6 pb-4 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Header</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Halaman</label>
                        <input type="hidden" name="contents[0][section]" value="header">
                        <input type="hidden" name="contents[0][key]" value="title">
                        <input type="text" name="contents[0][content]" value="{{ $headerTitle }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="Profil Desa">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Subtitle</label>
                        <input type="hidden" name="contents[1][section]" value="header">
                        <input type="hidden" name="contents[1][key]" value="subtitle">
                        <input type="text" name="contents[1][content]" value="{{ $headerSubtitle }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="Informasi lengkap tentang desa kami">
                    </div>
                </div>
            </div>
            
            <!-- Statistik -->
            <div class="mb-6 pb-4 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Informasi Umum</h3>
                <div class="space-y-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Luas Wilayah</label>
                            <input type="hidden" name="contents[2][section]" value="statistik">
                            <input type="hidden" name="contents[2][key]" value="luas_value">
                            <input type="text" name="contents[2][content]" value="{{ $statistikLuasValue }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="250">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Label Luas Wilayah</label>
                            <input type="hidden" name="contents[3][section]" value="statistik">
                            <input type="hidden" name="contents[3][key]" value="luas_label">
                            <input type="text" name="contents[3][content]" value="{{ $statistikLuasLabel }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="Hektar Luas Wilayah">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">DPL</label>
                            <input type="hidden" name="contents[4][section]" value="statistik">
                            <input type="hidden" name="contents[4][key]" value="dpl_value">
                            <input type="text" name="contents[4][content]" value="{{ $statistikDplValue }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="150">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Label DPL</label>
                            <input type="hidden" name="contents[5][section]" value="statistik">
                            <input type="hidden" name="contents[5][key]" value="dpl_label">
                            <input type="text" name="contents[5][content]" value="{{ $statistikDplLabel }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="Meter DPL">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Curah Hujan</label>
                            <input type="hidden" name="contents[6][section]" value="statistik">
                            <input type="hidden" name="contents[6][key]" value="curah_hujan_value">
                            <input type="text" name="contents[6][content]" value="{{ $statistikCurahHujanValue }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="2.500-3.000">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Label Curah Hujan</label>
                            <input type="hidden" name="contents[7][section]" value="statistik">
                            <input type="hidden" name="contents[7][key]" value="curah_hujan_label">
                            <input type="text" name="contents[7][content]" value="{{ $statistikCurahHujanLabel }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="mm Curah Hujan/Tahun">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sejarah -->
            <div class="mb-6 pb-4 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Sejarah Desa</h3>
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Sejarah</label>
                    <input type="hidden" name="contents[8][section]" value="sejarah">
                    <input type="hidden" name="contents[8][key]" value="title">
                    <input type="text" name="contents[8][content]" value="{{ $sejarahTitle }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                        placeholder="Sejarah Desa">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Teks Sejarah</label>
                    <input type="hidden" name="contents[9][section]" value="sejarah">
                    <input type="hidden" name="contents[9][key]" value="content">
                    <textarea name="contents[9][content]" rows="8" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                        placeholder="Masukkan teks sejarah desa">{{ $sejarahContent }}</textarea>
                    <p class="text-xs text-gray-500 mt-2">Pisahkan paragraf dengan baris kosong (double enter)</p>
                </div>
            </div>
            
            <!-- Visi -->
            <div class="mb-6 pb-4 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Visi</h3>
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Visi</label>
                    <input type="hidden" name="contents[10][section]" value="visi">
                    <input type="hidden" name="contents[10][key]" value="title">
                    <input type="text" name="contents[10][content]" value="{{ $visiTitle }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                        placeholder="Visi">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Teks Visi</label>
                    <input type="hidden" name="contents[11][section]" value="visi">
                    <input type="hidden" name="contents[11][key]" value="teks">
                    <textarea name="contents[11][content]" rows="3" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                        placeholder="Masukkan teks visi">{{ $visiTeks }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Visi</label>
                    <input type="hidden" name="contents[12][section]" value="visi">
                    <input type="hidden" name="contents[12][key]" value="deskripsi">
                    <textarea name="contents[12][content]" rows="3" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                        placeholder="Masukkan deskripsi visi">{{ $visiDeskripsi }}</textarea>
                </div>
            </div>
            
            <!-- Misi -->
            <div class="mb-6 pb-4 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Misi</h3>
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Misi</label>
                    <input type="hidden" name="contents[13][section]" value="misi">
                    <input type="hidden" name="contents[13][key]" value="title">
                    <input type="text" name="contents[13][content]" value="{{ $misiTitle }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                        placeholder="Misi">
                </div>
                <div class="space-y-3">
                    @for($i = 1; $i <= 5; $i++)
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Misi {{ $i }}</label>
                            <input type="hidden" name="contents[{{ 13 + $i }}][section]" value="misi">
                            <input type="hidden" name="contents[{{ 13 + $i }}][key]" value="item{{ $i }}">
                            <textarea name="contents[{{ 13 + $i }}][content]" rows="2"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="Masukkan misi {{ $i }}">@php
                                    $varName = "misiItem{$i}";
                                    echo ${$varName};
                                @endphp</textarea>
                        </div>
                    @endfor
                </div>
            </div>
            
            <!-- Kondisi Geografis -->
            <div class="mb-6">
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Kondisi Geografis</label>
                    <input type="hidden" name="contents[19][section]" value="geografis">
                    <input type="hidden" name="contents[19][key]" value="title">
                    <input type="text" name="contents[19][content]" value="{{ $geografisTitle }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                        placeholder="Kondisi Geografis">
                </div>
                
                <!-- Letak Geografis -->
                <div class="mb-6 pb-4 border-b border-gray-200">
                    <h4 class="font-semibold text-gray-800 mb-4">Letak Geografis</h4>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul</label>
                        <input type="hidden" name="contents[20][section]" value="geografis">
                        <input type="hidden" name="contents[20][key]" value="letak_title">
                        <input type="text" name="contents[20][content]" value="{{ $geografisLetakTitle }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="Letak Geografis">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                        <input type="hidden" name="contents[21][section]" value="geografis">
                        <input type="hidden" name="contents[21][key]" value="letak_deskripsi">
                        <textarea name="contents[21][content]" rows="4" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="Masukkan deskripsi letak geografis">{{ $geografisLetakDeskripsi }}</textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Batas Utara</label>
                            <input type="hidden" name="contents[22][section]" value="geografis">
                            <input type="hidden" name="contents[22][key]" value="batas_utara">
                            <input type="text" name="contents[22][content]" value="{{ $geografisBatasUtara }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="Desa Sebelah Utara">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Batas Selatan</label>
                            <input type="hidden" name="contents[23][section]" value="geografis">
                            <input type="hidden" name="contents[23][key]" value="batas_selatan">
                            <input type="text" name="contents[23][content]" value="{{ $geografisBatasSelatan }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="Desa Sebelah Selatan">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Batas Timur</label>
                            <input type="hidden" name="contents[24][section]" value="geografis">
                            <input type="hidden" name="contents[24][key]" value="batas_timur">
                            <input type="text" name="contents[24][content]" value="{{ $geografisBatasTimur }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="Desa Sebelah Timur">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Batas Barat</label>
                            <input type="hidden" name="contents[25][section]" value="geografis">
                            <input type="hidden" name="contents[25][key]" value="batas_barat">
                            <input type="text" name="contents[25][content]" value="{{ $geografisBatasBarat }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="Desa Sebelah Barat">
                        </div>
                    </div>
                </div>
                
                <!-- Topografi dan Iklim -->
                <div class="mb-6 pb-4 border-b border-gray-200">
                    <h4 class="font-semibold text-gray-800 mb-4">Topografi dan Iklim</h4>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul</label>
                        <input type="hidden" name="contents[26][section]" value="geografis">
                        <input type="hidden" name="contents[26][key]" value="topografi_title">
                        <input type="text" name="contents[26][content]" value="{{ $geografisTopografiTitle }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="Topografi dan Iklim">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                        <input type="hidden" name="contents[27][section]" value="geografis">
                        <input type="hidden" name="contents[27][key]" value="topografi_deskripsi">
                        <textarea name="contents[27][content]" rows="4" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="Masukkan deskripsi topografi">{{ $geografisTopografiDeskripsi }}</textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Ketinggian</label>
                            <input type="hidden" name="contents[28][section]" value="geografis">
                            <input type="hidden" name="contents[28][key]" value="ketinggian">
                            <input type="text" name="contents[28][content]" value="{{ $geografisKetinggian }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="150 mdpl">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Topografi</label>
                            <input type="hidden" name="contents[29][section]" value="geografis">
                            <input type="hidden" name="contents[29][key]" value="topografi">
                            <input type="text" name="contents[29][content]" value="{{ $geografisTopografi }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="Datar hingga bergelombang">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Iklim</label>
                            <input type="hidden" name="contents[30][section]" value="geografis">
                            <input type="hidden" name="contents[30][key]" value="iklim">
                            <input type="text" name="contents[30][content]" value="{{ $geografisIklim }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="Tropis">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Suhu</label>
                            <input type="hidden" name="contents[31][section]" value="geografis">
                            <input type="hidden" name="contents[31][key]" value="suhu">
                            <input type="text" name="contents[31][content]" value="{{ $geografisSuhu }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="25-30°C">
                        </div>
                    </div>
                </div>
                
                <!-- Sumber Daya Alam -->
                <div>
                    <h4 class="font-semibold text-gray-800 mb-4">Sumber Daya Alam</h4>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul</label>
                        <input type="hidden" name="contents[32][section]" value="geografis">
                        <input type="hidden" name="contents[32][key]" value="sda_title">
                        <input type="text" name="contents[32][content]" value="{{ $geografisSdaTitle }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="Sumber Daya Alam">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Tanah (Judul)</label>
                            <input type="hidden" name="contents[33][section]" value="geografis">
                            <input type="hidden" name="contents[33][key]" value="sda_jenis_tanah_title">
                            <input type="text" name="contents[33][content]" value="{{ $geografisSdaJenisTanahTitle }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="Jenis Tanah">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Tanah (Deskripsi)</label>
                            <input type="hidden" name="contents[34][section]" value="geografis">
                            <input type="hidden" name="contents[34][key]" value="sda_jenis_tanah">
                            <input type="text" name="contents[34][content]" value="{{ $geografisSdaJenisTanah }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="Latosol dan Alluvial yang subur untuk pertanian">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Sumber Air (Judul)</label>
                            <input type="hidden" name="contents[35][section]" value="geografis">
                            <input type="hidden" name="contents[35][key]" value="sda_sumber_air_title">
                            <input type="text" name="contents[35][content]" value="{{ $geografisSdaSumberAirTitle }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="Sumber Air">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Sumber Air (Deskripsi)</label>
                            <input type="hidden" name="contents[36][section]" value="geografis">
                            <input type="hidden" name="contents[36][key]" value="sda_sumber_air">
                            <input type="text" name="contents[36][content]" value="{{ $geografisSdaSumberAir }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="Beberapa aliran sungai untuk irigasi dan kebutuhan air bersih">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Potensi Lain (Judul)</label>
                            <input type="hidden" name="contents[37][section]" value="geografis">
                            <input type="hidden" name="contents[37][key]" value="sda_potensi_title">
                            <input type="text" name="contents[37][content]" value="{{ $geografisSdaPotensiTitle }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="Potensi Lain">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Potensi Lain (Deskripsi)</label>
                            <input type="hidden" name="contents[38][section]" value="geografis">
                            <input type="hidden" name="contents[38][key]" value="sda_potensi">
                            <input type="text" name="contents[38][content]" value="{{ $geografisSdaPotensi }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="Hutan, bahan galian, dan hasil pertanian">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @elseif($page === 'pemerintahan')
        <!-- Form for Pemerintahan -->
        <div class="bg-white rounded-lg shadow-md p-6 md:p-8 border border-gray-200 mb-6">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Edit Konten Pemerintahan Desa</h2>
            
            @php
                $strukturOrganisasi = isset($contents['struktur']) ? ($contents['struktur']->firstWhere('key', 'gambar')->content ?? '') : '';
                if (empty($strukturOrganisasi) && file_exists(public_path('images/struktur-organisasi.jpg'))) {
                    $strukturOrganisasi = 'images/struktur-organisasi.jpg';
                } elseif (empty($strukturOrganisasi) && file_exists(public_path('images/struktur-organisasi.png'))) {
                    $strukturOrganisasi = 'images/struktur-organisasi.png';
                }
            @endphp
            
            <!-- Upload Struktur Organisasi -->
            <div class="mb-8 pb-6 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Struktur Organisasi Pemerintahan Desa</h3>
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Upload Gambar Struktur Organisasi</label>
                    <div class="flex items-center gap-4">
                        <div class="flex-1">
                            <label class="cursor-pointer">
                                <input type="file" id="struktur-upload" name="struktur_organisasi" accept="image/*" class="hidden" onchange="handleStrukturUpload(event)">
                                <span class="inline-flex items-center gap-2 px-4 py-2.5 bg-[#1e3a8a] text-white rounded-lg hover:bg-blue-800 transition-colors text-sm font-medium shadow-md hover:shadow-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Pilih Gambar Struktur Organisasi
                                </span>
                            </label>
                            <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG. Maksimal 5MB</p>
                        </div>
                        <div class="w-32 h-32 rounded-lg overflow-hidden border-2 border-gray-200 shadow-md flex items-center justify-center bg-gray-100">
                            @if($strukturOrganisasi && file_exists(public_path($strukturOrganisasi)))
                                <img src="{{ asset($strukturOrganisasi) }}" alt="Preview Struktur" id="struktur-preview" class="w-full h-full object-contain">
                            @else
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Daftar Perangkat Desa -->
            <div class="mb-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Daftar Perangkat Desa</h3>
                    <button type="button" id="add-perangkat-btn" class="px-4 py-2 bg-[#1e3a8a] text-white rounded-lg hover:bg-blue-800 transition-colors text-sm font-medium flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Perangkat Desa
                    </button>
                </div>
                
                <div id="perangkat-list" class="space-y-4">
                    @foreach($perangkatDesa as $perangkat)
                        <div class="perangkat-item bg-gray-50 border border-gray-200 rounded-lg p-4" data-id="{{ $perangkat->id }}">
                            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start">
                                <div class="md:col-span-2">
                                    <div class="w-24 h-24 rounded-lg overflow-hidden border-2 border-gray-200 shadow-md flex items-center justify-center bg-gray-100 mx-auto">
                                        @if($perangkat->foto && file_exists(public_path($perangkat->foto)))
                                            <img src="{{ asset($perangkat->foto) }}" alt="Foto" class="w-full h-full object-cover">
                                        @else
                                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        @endif
                                    </div>
                                    <label class="block text-xs text-gray-600 mt-2 text-center cursor-pointer">
                                        <input type="file" class="hidden perangkat-foto-input" accept="image/*" data-id="{{ $perangkat->id }}">
                                        <span class="text-[#1e3a8a] hover:underline">Ganti Foto</span>
                                    </label>
                                </div>
                                <div class="md:col-span-9 grid grid-cols-1 md:grid-cols-3 gap-3">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-1">Jabatan</label>
                                        <input type="text" class="perangkat-jabatan w-full px-3 py-2 border border-gray-300 rounded-lg text-sm text-gray-900 bg-white focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a]" value="{{ $perangkat->jabatan }}" data-id="{{ $perangkat->id }}" placeholder="Masukkan jabatan">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama</label>
                                        <input type="text" class="perangkat-nama w-full px-3 py-2 border border-gray-300 rounded-lg text-sm text-gray-900 bg-white focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a]" value="{{ $perangkat->nama }}" data-id="{{ $perangkat->id }}" placeholder="Masukkan nama lengkap">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-1">NIP <span class="text-gray-500 text-xs font-normal">(Opsional)</span></label>
                                        <input type="text" name="nip" class="perangkat-nip w-full px-3 py-2 border border-gray-300 rounded-lg text-sm text-gray-900 bg-white focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a]" value="{{ $perangkat->nip ?? '' }}" data-id="{{ $perangkat->id }}" placeholder="Kosongkan jika tidak ada NIP" autocomplete="off">
                                    </div>
                                </div>
                                <div class="md:col-span-1 flex flex-col gap-2">
                                    <button type="button" class="update-perangkat-btn px-3 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors text-xs font-medium" data-id="{{ $perangkat->id }}">
                                        Update
                                    </button>
                                    <button type="button" class="delete-perangkat-btn px-3 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-xs font-medium" data-id="{{ $perangkat->id }}">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @elseif($page === 'layanan')
        <!-- Form for Layanan -->
        <div class="bg-white rounded-lg shadow-md p-6 md:p-8 border border-gray-200 mb-6">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Edit Konten Layanan Desa</h2>
            
            @php
                $headerTitle = isset($contents['header']) ? ($contents['header']->firstWhere('key', 'title')->content ?? 'Layanan Desa') : 'Layanan Desa';
                $headerSubtitle = isset($contents['header']) ? ($contents['header']->firstWhere('key', 'subtitle')->content ?? 'Pelayanan administrasi yang tersedia untuk masyarakat') : 'Pelayanan administrasi yang tersedia untuk masyarakat';
                
                // Jam Pelayanan
                $jamHariKerja = isset($contents['jam']) ? ($contents['jam']->firstWhere('key', 'hari_kerja')->content ?? 'Senin - Jumat') : 'Senin - Jumat';
                $jamWaktuPelayanan = isset($contents['jam']) ? ($contents['jam']->firstWhere('key', 'waktu_pelayanan')->content ?? '08:00 - 15:00 WIB') : '08:00 - 15:00 WIB';
                $jamWaktuIstirahat = isset($contents['jam']) ? ($contents['jam']->firstWhere('key', 'waktu_istirahat')->content ?? '12:00 - 13:00 WIB') : '12:00 - 13:00 WIB';
                
                // Daftar Layanan (6 layanan)
                $layananList = [];
                for ($i = 1; $i <= 6; $i++) {
                    $layananList[$i] = [
                        'judul' => isset($contents['layanan_' . $i]) ? ($contents['layanan_' . $i]->firstWhere('key', 'judul')->content ?? '') : '',
                        'deskripsi' => isset($contents['layanan_' . $i]) ? ($contents['layanan_' . $i]->firstWhere('key', 'deskripsi')->content ?? '') : '',
                        'persyaratan' => isset($contents['layanan_' . $i]) ? ($contents['layanan_' . $i]->firstWhere('key', 'persyaratan')->content ?? '') : '',
                        'waktu' => isset($contents['layanan_' . $i]) ? ($contents['layanan_' . $i]->firstWhere('key', 'waktu')->content ?? '') : '',
                        'biaya' => isset($contents['layanan_' . $i]) ? ($contents['layanan_' . $i]->firstWhere('key', 'biaya')->content ?? '') : '',
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

            <!-- Header -->
            <div class="mb-8 pb-6 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Header Halaman</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Halaman</label>
                        <input type="hidden" name="contents[0][section]" value="header">
                        <input type="hidden" name="contents[0][key]" value="title">
                        <input type="text" name="contents[0][content]" value="{{ $headerTitle }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="Layanan Desa">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Subtitle</label>
                        <input type="hidden" name="contents[1][section]" value="header">
                        <input type="hidden" name="contents[1][key]" value="subtitle">
                        <input type="text" name="contents[1][content]" value="{{ $headerSubtitle }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="Pelayanan administrasi yang tersedia untuk masyarakat">
                    </div>
                </div>
            </div>
            
            <!-- Daftar Layanan -->
            <div class="mb-8 pb-6 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Daftar Layanan Administrasi</h3>
                <div class="space-y-6">
                    @for($i = 1; $i <= 6; $i++)
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-4">Layanan {{ $i }}</h4>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Layanan</label>
                                    <input type="hidden" name="contents[{{ 1 + ($i-1)*5 + 1 }}][section]" value="layanan_{{ $i }}">
                                    <input type="hidden" name="contents[{{ 1 + ($i-1)*5 + 1 }}][key]" value="judul">
                                    <input type="text" name="contents[{{ 1 + ($i-1)*5 + 1 }}][content]" value="{{ $layananList[$i]['judul'] }}" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                        placeholder="Contoh: Surat Keterangan Domisili">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                                    <input type="hidden" name="contents[{{ 1 + ($i-1)*5 + 2 }}][section]" value="layanan_{{ $i }}">
                                    <input type="hidden" name="contents[{{ 1 + ($i-1)*5 + 2 }}][key]" value="deskripsi">
                                    <textarea name="contents[{{ 1 + ($i-1)*5 + 2 }}][content]" rows="2" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                        placeholder="Deskripsi layanan">{{ $layananList[$i]['deskripsi'] }}</textarea>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Persyaratan</label>
                                        <input type="hidden" name="contents[{{ 1 + ($i-1)*5 + 3 }}][section]" value="layanan_{{ $i }}">
                                        <input type="hidden" name="contents[{{ 1 + ($i-1)*5 + 3 }}][key]" value="persyaratan">
                                        <input type="text" name="contents[{{ 1 + ($i-1)*5 + 3 }}][content]" value="{{ $layananList[$i]['persyaratan'] }}" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                            placeholder="Contoh: KTP, Kartu Keluarga">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Waktu</label>
                                        <input type="hidden" name="contents[{{ 1 + ($i-1)*5 + 4 }}][section]" value="layanan_{{ $i }}">
                                        <input type="hidden" name="contents[{{ 1 + ($i-1)*5 + 4 }}][key]" value="waktu">
                                        <input type="text" name="contents[{{ 1 + ($i-1)*5 + 4 }}][content]" value="{{ $layananList[$i]['waktu'] }}" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                            placeholder="Contoh: 1-2 hari kerja">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Biaya</label>
                                        <input type="hidden" name="contents[{{ 1 + ($i-1)*5 + 5 }}][key]" value="biaya">
                                        <input type="hidden" name="contents[{{ 1 + ($i-1)*5 + 5 }}][section]" value="layanan_{{ $i }}">
                                        <input type="text" name="contents[{{ 1 + ($i-1)*5 + 5 }}][content]" value="{{ $layananList[$i]['biaya'] }}" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                            placeholder="Contoh: Gratis">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            
            <!-- Jam Pelayanan -->
            <div class="mb-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Jam Pelayanan</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Hari Kerja</label>
                        <input type="hidden" name="contents[32][section]" value="jam">
                        <input type="hidden" name="contents[32][key]" value="hari_kerja">
                        <input type="text" name="contents[32][content]" value="{{ $jamHariKerja }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="Senin - Jumat">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Waktu Pelayanan</label>
                        <input type="hidden" name="contents[33][section]" value="jam">
                        <input type="hidden" name="contents[33][key]" value="waktu_pelayanan">
                        <input type="text" name="contents[33][content]" value="{{ $jamWaktuPelayanan }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="08:00 - 15:00 WIB">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Waktu Istirahat</label>
                        <input type="hidden" name="contents[34][section]" value="jam">
                        <input type="hidden" name="contents[34][key]" value="waktu_istirahat">
                        <input type="text" name="contents[34][content]" value="{{ $jamWaktuIstirahat }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="12:00 - 13:00 WIB">
                    </div>
                </div>
            </div>
        </div>
        @elseif($page === 'data')
        <!-- Form for Data/Statistik -->
        <div class="bg-white rounded-lg shadow-md p-6 md:p-8 border border-gray-200 mb-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">Edit Konten Statistik</h2>
                <a href="{{ route('admin.penduduk.index') }}" class="bg-[#1e3a8a] text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition-colors text-sm font-medium flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Kelola Data Penduduk
                </a>
            </div>
            
            @php
                $headerTitle = isset($contents['header']) ? ($contents['header']->firstWhere('key', 'title')->content ?? 'Statistik') : 'Statistik';
                $headerSubtitle = isset($contents['header']) ? ($contents['header']->firstWhere('key', 'subtitle')->content ?? 'Data kependudukan dan statistik desa') : 'Data kependudukan dan statistik desa';
            @endphp

            <!-- Header -->
            <div class="mb-8 pb-6 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Header Halaman</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Halaman</label>
                        <input type="hidden" name="contents[0][section]" value="header">
                        <input type="hidden" name="contents[0][key]" value="title">
                        <input type="text" name="contents[0][content]" value="{{ $headerTitle }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="Statistik">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Subtitle</label>
                        <input type="hidden" name="contents[1][section]" value="header">
                        <input type="hidden" name="contents[1][key]" value="subtitle">
                        <input type="text" name="contents[1][content]" value="{{ $headerSubtitle }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="Data kependudukan dan statistik desa">
                    </div>
                </div>
            </div>
            
            <!-- Form Tambah Data Penduduk -->
            <div class="mb-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Tambah Data Penduduk</h3>
                <p class="text-sm text-gray-600 mb-4">Tambahkan data penduduk baru. Data akan otomatis terhitung dalam statistik.</p>
                
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                    <form id="form-tambah-penduduk" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">NIK <span class="text-red-600">*</span></label>
                                <input type="text" name="nik" required maxlength="16" pattern="[0-9]{16}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                    placeholder="Masukkan NIK (16 digit)">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap <span class="text-red-600">*</span></label>
                                <input type="text" name="nama" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                    placeholder="Masukkan nama lengkap">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Tempat Lahir <span class="text-red-600">*</span></label>
                                <input type="text" name="tempat_lahir" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                    placeholder="Masukkan tempat lahir">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir <span class="text-red-600">*</span></label>
                                <input type="date" name="tanggal_lahir" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kelamin <span class="text-red-600">*</span></label>
                                <select name="jenis_kelamin" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Tingkat Pendidikan</label>
                                <select name="pendidikan"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white">
                                    <option value="">Pilih Tingkat Pendidikan</option>
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="SD/Sederajat">SD/Sederajat</option>
                                    <option value="SMP/Sederajat">SMP/Sederajat</option>
                                    <option value="SMA/Sederajat">SMA/Sederajat</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="S1/Sederajat">S1/Sederajat</option>
                                    <option value="S2/Sederajat">S2/Sederajat</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">RT <span class="text-red-600">*</span></label>
                                <input type="number" name="rt" required min="1" max="999"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                    placeholder="Masukkan nomor RT (contoh: 1, 2, 3)">
                                <p class="text-xs text-gray-500 mt-1">Format akan otomatis dinormalisasi (1 menjadi 001)</p>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">RW <span class="text-red-600">*</span></label>
                                <input type="number" name="rw" required min="1" max="999"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                    placeholder="Masukkan nomor RW (contoh: 1, 2, 3)">
                                <p class="text-xs text-gray-500 mt-1">Format akan otomatis dinormalisasi (1 menjadi 001)</p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat <span class="text-red-600">*</span></label>
                            <textarea name="alamat" rows="3" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="Masukkan alamat lengkap"></textarea>
                        </div>
                        <div class="flex items-center gap-4">
                            <button type="submit" class="bg-[#1e3a8a] text-white px-6 py-3 rounded-lg hover:bg-blue-900 transition-colors text-sm font-medium">
                                Tambah Data Penduduk
                            </button>
                            <a href="{{ route('admin.penduduk.index') }}" class="text-[#1e3a8a] hover:underline text-sm font-medium">
                                Lihat Semua Data Penduduk →
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Daftar Data Penduduk Terbaru -->
            @if(isset($penduduk) && $penduduk->count() > 0)
            <div class="mb-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Data Penduduk Terbaru (10 Data)</h3>
                <div class="bg-gray-50 border border-gray-200 rounded-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-900">NIK</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-900">Nama</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-900">Jenis Kelamin</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-900">Pendidikan</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-900">RT/RW</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($penduduk as $p)
                                    <tr class="border-b border-gray-200 hover:bg-white">
                                        <td class="px-4 py-3">{{ $p->nik }}</td>
                                        <td class="px-4 py-3 font-medium">{{ $p->nama }}</td>
                                        <td class="px-4 py-3">{{ $p->jenis_kelamin }}</td>
                                        <td class="px-4 py-3">{{ $p->pendidikan ?? '-' }}</td>
                                        <td class="px-4 py-3">{{ $p->rt }}/{{ $p->rw }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <a href="{{ route('admin.penduduk.index') }}" class="text-[#1e3a8a] hover:underline text-sm font-medium">
                        Lihat Semua Data Penduduk →
                    </a>
                </div>
            </div>
            @endif
        </div>
        @elseif($page === 'darurat')
        <!-- Form for Darurat -->
        <div class="bg-white rounded-lg shadow-md p-6 md:p-8 border border-gray-200 mb-6">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Edit Konten Darurat & Keamanan</h2>
            
            @php
                $headerTitle = isset($contents['header']) ? ($contents['header']->firstWhere('key', 'title')->content ?? 'Darurat & Keamanan') : 'Darurat & Keamanan';
                $headerSubtitle = isset($contents['header']) ? ($contents['header']->firstWhere('key', 'subtitle')->content ?? 'Informasi darurat, keamanan, dan penanggulangan bencana') : 'Informasi darurat, keamanan, dan penanggulangan bencana';
            @endphp

            <!-- Header -->
            <div class="mb-8 pb-6 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Header Halaman</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Halaman</label>
                        <input type="hidden" name="contents[0][section]" value="header">
                        <input type="hidden" name="contents[0][key]" value="title">
                        <input type="text" name="contents[0][content]" value="{{ $headerTitle }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="Darurat & Keamanan">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Subtitle</label>
                        <input type="hidden" name="contents[1][section]" value="header">
                        <input type="hidden" name="contents[1][key]" value="subtitle">
                        <input type="text" name="contents[1][content]" value="{{ $headerSubtitle }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="Informasi darurat, keamanan, dan penanggulangan bencana">
                    </div>
                </div>
            </div>

            <!-- Kontak Darurat -->
            <div class="mb-8 pb-6 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Kontak Darurat</h3>
                <div class="space-y-6">
                    @for($i = 1; $i <= 6; $i++)
                        @php
                            $kontakNama = isset($contents['kontak_' . $i]) ? ($contents['kontak_' . $i]->firstWhere('key', 'nama')->content ?? '') : '';
                            $kontakDeskripsi = isset($contents['kontak_' . $i]) ? ($contents['kontak_' . $i]->firstWhere('key', 'deskripsi')->content ?? '') : '';
                            $kontakNomorDarurat = isset($contents['kontak_' . $i]) ? ($contents['kontak_' . $i]->firstWhere('key', 'nomor_darurat')->content ?? '') : '';
                            $kontakNomorAlternatif = isset($contents['kontak_' . $i]) ? ($contents['kontak_' . $i]->firstWhere('key', 'nomor_alternatif')->content ?? '') : '';
                            $kontakKeterangan = isset($contents['kontak_' . $i]) ? ($contents['kontak_' . $i]->firstWhere('key', 'keterangan')->content ?? '') : '';
                            
                            // Default values
                            if ($i == 1 && empty($kontakNama)) {
                                $kontakNama = 'Polisi';
                                $kontakDeskripsi = 'Polsek Kecamatan';
                                $kontakNomorDarurat = '110';
                                $kontakNomorAlternatif = '(021) 1234-5678';
                            } elseif ($i == 2 && empty($kontakNama)) {
                                $kontakNama = 'Pemadam Kebakaran';
                                $kontakDeskripsi = 'Damkar Kecamatan';
                                $kontakNomorDarurat = '113';
                                $kontakNomorAlternatif = '(021) 1234-5679';
                            } elseif ($i == 3 && empty($kontakNama)) {
                                $kontakNama = 'Ambulans';
                                $kontakDeskripsi = 'Rumah Sakit Terdekat';
                                $kontakNomorDarurat = '119';
                                $kontakNomorAlternatif = '(021) 1234-5680';
                            } elseif ($i == 4 && empty($kontakNama)) {
                                $kontakNama = 'Pos Keamanan Desa';
                                $kontakDeskripsi = 'Poskamling';
                                $kontakNomorDarurat = '(021) 1234-5681';
                                $kontakKeterangan = 'Tersedia 24 jam';
                            } elseif ($i == 5 && empty($kontakNama)) {
                                $kontakNama = 'Kantor Desa';
                                $kontakDeskripsi = 'Pemerintah Desa';
                                $kontakNomorDarurat = '(021) 1234-5682';
                                $kontakKeterangan = 'Senin - Jumat, 08:00 - 15:00 WIB';
                            } elseif ($i == 6 && empty($kontakNama)) {
                                $kontakNama = 'Ketua RT/RW';
                                $kontakDeskripsi = 'Koordinasi Lokal';
                                $kontakNomorDarurat = '(021) 1234-5683';
                                $kontakKeterangan = 'Hubungi ketua RT/RW setempat';
                            }
                        @endphp
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-3">Kontak {{ $i }}</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama</label>
                                    <input type="hidden" name="contents[{{ 1 + ($i-1)*5 + 1 }}][section]" value="kontak_{{ $i }}">
                                    <input type="hidden" name="contents[{{ 1 + ($i-1)*5 + 1 }}][key]" value="nama">
                                    <input type="text" name="contents[{{ 1 + ($i-1)*5 + 1 }}][content]" value="{{ $kontakNama }}" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                        placeholder="Contoh: Polisi">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                                    <input type="hidden" name="contents[{{ 1 + ($i-1)*5 + 2 }}][section]" value="kontak_{{ $i }}">
                                    <input type="hidden" name="contents[{{ 1 + ($i-1)*5 + 2 }}][key]" value="deskripsi">
                                    <input type="text" name="contents[{{ 1 + ($i-1)*5 + 2 }}][content]" value="{{ $kontakDeskripsi }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                        placeholder="Contoh: Polsek Kecamatan">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Darurat</label>
                                    <input type="hidden" name="contents[{{ 1 + ($i-1)*5 + 3 }}][section]" value="kontak_{{ $i }}">
                                    <input type="hidden" name="contents[{{ 1 + ($i-1)*5 + 3 }}][key]" value="nomor_darurat">
                                    <input type="text" name="contents[{{ 1 + ($i-1)*5 + 3 }}][content]" value="{{ $kontakNomorDarurat }}" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                        placeholder="Contoh: 110">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Alternatif (Opsional)</label>
                                    <input type="hidden" name="contents[{{ 1 + ($i-1)*5 + 4 }}][section]" value="kontak_{{ $i }}">
                                    <input type="hidden" name="contents[{{ 1 + ($i-1)*5 + 4 }}][key]" value="nomor_alternatif">
                                    <input type="text" name="contents[{{ 1 + ($i-1)*5 + 4 }}][content]" value="{{ $kontakNomorAlternatif }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                        placeholder="Contoh: (021) 1234-5678">
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan (Opsional)</label>
                                    <input type="hidden" name="contents[{{ 1 + ($i-1)*5 + 5 }}][section]" value="kontak_{{ $i }}">
                                    <input type="hidden" name="contents[{{ 1 + ($i-1)*5 + 5 }}][key]" value="keterangan">
                                    <input type="text" name="contents[{{ 1 + ($i-1)*5 + 5 }}][content]" value="{{ $kontakKeterangan }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                        placeholder="Contoh: Tersedia 24 jam">
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Informasi Potensi Bencana -->
            <div class="mb-8 pb-6 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Informasi Potensi Bencana</h3>
                <div class="space-y-4">
                    @php
                        $bencanaTitle = isset($contents['bencana']) ? ($contents['bencana']->firstWhere('key', 'title')->content ?? 'Informasi Potensi Bencana') : 'Informasi Potensi Bencana';
                    @endphp
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Section</label>
                        <input type="hidden" name="contents[31][section]" value="bencana">
                        <input type="hidden" name="contents[31][key]" value="title">
                        <input type="text" name="contents[31][content]" value="{{ $bencanaTitle }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="Informasi Potensi Bencana">
                    </div>
                    @for($i = 1; $i <= 4; $i++)
                        @php
                            $bencanaNama = isset($contents['bencana_' . $i]) ? ($contents['bencana_' . $i]->firstWhere('key', 'nama')->content ?? '') : '';
                            $bencanaDeskripsi = isset($contents['bencana_' . $i]) ? ($contents['bencana_' . $i]->firstWhere('key', 'deskripsi')->content ?? '') : '';
                            
                            // Default values
                            if ($i == 1 && empty($bencanaNama)) {
                                $bencanaNama = 'Banjir';
                                $bencanaDeskripsi = 'Potensi banjir pada musim hujan, terutama di daerah dekat aliran sungai. Warga diimbau memantau informasi cuaca dan ketinggian air sungai. Apabila terjadi banjir, segera evakuasi ke titik kumpul.';
                            } elseif ($i == 2 && empty($bencanaNama)) {
                                $bencanaNama = 'Kebakaran';
                                $bencanaDeskripsi = 'Potensi kebakaran terutama pada musim kemarau. Warga diimbau berhati-hati dalam penggunaan api dan listrik. Pastikan instalasi listrik dalam kondisi baik.';
                            } elseif ($i == 3 && empty($bencanaNama)) {
                                $bencanaNama = 'Angin Kencang';
                                $bencanaDeskripsi = 'Potensi angin kencang dan puting beliung pada musim hujan. Warga diimbau mengamankan benda-benda di luar rumah dan hindari berteduh di bawah pohon besar saat angin kencang.';
                            } elseif ($i == 4 && empty($bencanaNama)) {
                                $bencanaNama = 'Gempa Bumi';
                                $bencanaDeskripsi = 'Meskipun jarang terjadi, desa ini berada di wilayah berpotensi gempa bumi. Warga diimbau mengetahui prosedur evakuasi dan titik kumpul yang aman. Pastikan perabotan rumah diikat dengan baik.';
                            }
                        @endphp
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-3">Bencana {{ $i }}</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Bencana</label>
                                    <input type="hidden" name="contents[{{ 31 + ($i-1)*2 + 1 }}][section]" value="bencana_{{ $i }}">
                                    <input type="hidden" name="contents[{{ 31 + ($i-1)*2 + 1 }}][key]" value="nama">
                                    <input type="text" name="contents[{{ 31 + ($i-1)*2 + 1 }}][content]" value="{{ $bencanaNama }}" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                        placeholder="Contoh: Banjir">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                                    <input type="hidden" name="contents[{{ 31 + ($i-1)*2 + 2 }}][section]" value="bencana_{{ $i }}">
                                    <input type="hidden" name="contents[{{ 31 + ($i-1)*2 + 2 }}][key]" value="deskripsi">
                                    <textarea name="contents[{{ 31 + ($i-1)*2 + 2 }}][content]" rows="3" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                        placeholder="Deskripsi potensi bencana">{{ $bencanaDeskripsi }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Jalur Evakuasi -->
            <div class="mb-8 pb-6 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Jalur Evakuasi</h3>
                <div class="space-y-4">
                    @php
                        $evakuasiTitle = isset($contents['evakuasi']) ? ($contents['evakuasi']->firstWhere('key', 'title')->content ?? 'Jalur Evakuasi') : 'Jalur Evakuasi';
                    @endphp
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Section</label>
                        <input type="hidden" name="contents[40][section]" value="evakuasi">
                        <input type="hidden" name="contents[40][key]" value="title">
                        <input type="text" name="contents[40][content]" value="{{ $evakuasiTitle }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="Jalur Evakuasi">
                    </div>
                    @for($i = 1; $i <= 3; $i++)
                        @php
                            $evakuasiJenis = isset($contents['evakuasi_' . $i]) ? ($contents['evakuasi_' . $i]->firstWhere('key', 'jenis')->content ?? '') : '';
                            $evakuasiRute = isset($contents['evakuasi_' . $i]) ? ($contents['evakuasi_' . $i]->firstWhere('key', 'rute')->content ?? '') : '';
                            
                            // Default values
                            if ($i == 1 && empty($evakuasiJenis)) {
                                $evakuasiJenis = 'Banjir';
                                $evakuasiRute = 'RT 01-03: Menuju Balai Desa' . "\n" . 'RT 04-06: Menuju Sekolah Dasar' . "\n" . 'RT 07-09: Menuju Masjid' . "\n" . 'RT 10-12: Menuju Puskesmas';
                            } elseif ($i == 2 && empty($evakuasiJenis)) {
                                $evakuasiJenis = 'Kebakaran';
                                $evakuasiRute = 'Segera keluar melalui pintu/jendela terdekat' . "\n" . 'Jangan gunakan lift, gunakan tangga' . "\n" . 'Berlari menjauhi sumber api' . "\n" . 'Ikuti arahan petugas pemadam';
                            } elseif ($i == 3 && empty($evakuasiJenis)) {
                                $evakuasiJenis = 'Gempa Bumi';
                                $evakuasiRute = 'Berlindung di bawah meja kokoh' . "\n" . 'Jauhi jendela dan kaca' . "\n" . 'Setelah gempa, segera keluar' . "\n" . 'Berlari menuju titik kumpul';
                            }
                        @endphp
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-3">Jalur Evakuasi {{ $i }}</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Bencana</label>
                                    <input type="hidden" name="contents[{{ 40 + ($i-1)*2 + 1 }}][section]" value="evakuasi_{{ $i }}">
                                    <input type="hidden" name="contents[{{ 40 + ($i-1)*2 + 1 }}][key]" value="jenis">
                                    <input type="text" name="contents[{{ 40 + ($i-1)*2 + 1 }}][content]" value="{{ $evakuasiJenis }}" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                        placeholder="Contoh: Banjir">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Rute Evakuasi</label>
                                    <input type="hidden" name="contents[{{ 40 + ($i-1)*2 + 2 }}][section]" value="evakuasi_{{ $i }}">
                                    <input type="hidden" name="contents[{{ 40 + ($i-1)*2 + 2 }}][key]" value="rute">
                                    <textarea name="contents[{{ 40 + ($i-1)*2 + 2 }}][content]" rows="4" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                        placeholder="Masukkan rute evakuasi (satu per baris)">{{ $evakuasiRute }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Titik Kumpul -->
            <div class="mb-8 pb-6 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Titik Kumpul Evakuasi</h3>
                <div class="space-y-4">
                    @php
                        $titikTitle = isset($contents['titik_kumpul']) ? ($contents['titik_kumpul']->firstWhere('key', 'title')->content ?? 'Titik Kumpul Evakuasi') : 'Titik Kumpul Evakuasi';
                    @endphp
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Section</label>
                        <input type="hidden" name="contents[47][section]" value="titik_kumpul">
                        <input type="hidden" name="contents[47][key]" value="title">
                        <input type="text" name="contents[47][content]" value="{{ $titikTitle }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="Titik Kumpul Evakuasi">
                    </div>
                    @for($i = 1; $i <= 4; $i++)
                        @php
                            $titikNama = isset($contents['titik_' . $i]) ? ($contents['titik_' . $i]->firstWhere('key', 'nama')->content ?? '') : '';
                            $titikAlamat = isset($contents['titik_' . $i]) ? ($contents['titik_' . $i]->firstWhere('key', 'alamat')->content ?? '') : '';
                            $titikKapasitas = isset($contents['titik_' . $i]) ? ($contents['titik_' . $i]->firstWhere('key', 'kapasitas')->content ?? '') : '';
                            
                            // Default values
                            if ($i == 1 && empty($titikNama)) {
                                $titikNama = 'Balai Desa';
                                $titikAlamat = 'Jalan Raya Desa No. 123';
                                $titikKapasitas = '500 orang';
                            } elseif ($i == 2 && empty($titikNama)) {
                                $titikNama = 'Sekolah Dasar';
                                $titikAlamat = 'Jalan Pendidikan No. 45';
                                $titikKapasitas = '300 orang';
                            } elseif ($i == 3 && empty($titikNama)) {
                                $titikNama = 'Masjid';
                                $titikAlamat = 'Jalan Keagamaan No. 78';
                                $titikKapasitas = '400 orang';
                            } elseif ($i == 4 && empty($titikNama)) {
                                $titikNama = 'Puskesmas';
                                $titikAlamat = 'Jalan Kesehatan No. 12';
                                $titikKapasitas = '200 orang';
                            }
                        @endphp
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-3">Titik Kumpul {{ $i }}</h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama</label>
                                    <input type="hidden" name="contents[{{ 47 + ($i-1)*3 + 1 }}][section]" value="titik_{{ $i }}">
                                    <input type="hidden" name="contents[{{ 47 + ($i-1)*3 + 1 }}][key]" value="nama">
                                    <input type="text" name="contents[{{ 47 + ($i-1)*3 + 1 }}][content]" value="{{ $titikNama }}" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                        placeholder="Contoh: Balai Desa">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat</label>
                                    <input type="hidden" name="contents[{{ 47 + ($i-1)*3 + 2 }}][section]" value="titik_{{ $i }}">
                                    <input type="hidden" name="contents[{{ 47 + ($i-1)*3 + 2 }}][key]" value="alamat">
                                    <input type="text" name="contents[{{ 47 + ($i-1)*3 + 2 }}][content]" value="{{ $titikAlamat }}" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                        placeholder="Contoh: Jalan Raya Desa No. 123">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kapasitas</label>
                                    <input type="hidden" name="contents[{{ 47 + ($i-1)*3 + 3 }}][section]" value="titik_{{ $i }}">
                                    <input type="hidden" name="contents[{{ 47 + ($i-1)*3 + 3 }}][key]" value="kapasitas">
                                    <input type="text" name="contents[{{ 47 + ($i-1)*3 + 3 }}][content]" value="{{ $titikKapasitas }}" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                        placeholder="Contoh: 500 orang">
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Prosedur Darurat -->
            <div class="mb-8 pb-6 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Prosedur Darurat</h3>
                <div class="space-y-4">
                    @php
                        $prosedurTitle = isset($contents['prosedur']) ? ($contents['prosedur']->firstWhere('key', 'title')->content ?? 'Prosedur Darurat') : 'Prosedur Darurat';
                        $prosedurSubtitle1 = isset($contents['prosedur']) ? ($contents['prosedur']->firstWhere('key', 'subtitle_1')->content ?? 'Langkah Saat Terjadi Bencana') : 'Langkah Saat Terjadi Bencana';
                        $prosedurSubtitle2 = isset($contents['prosedur']) ? ($contents['prosedur']->firstWhere('key', 'subtitle_2')->content ?? 'Persiapan Sebelum Bencana') : 'Persiapan Sebelum Bencana';
                        $prosedurLangkah = isset($contents['prosedur']) ? ($contents['prosedur']->firstWhere('key', 'langkah')->content ?? '1. Tetap tenang dan jangan panik' . "\n" . '2. Segera hubungi nomor darurat' . "\n" . '3. Ikuti jalur evakuasi menuju titik kumpul' . "\n" . '4. Bawa dokumen penting jika memungkinkan' . "\n" . '5. Jangan kembali sebelum dinyatakan aman' . "\n" . '6. Ikuti arahan petugas berwenang') : '1. Tetap tenang dan jangan panik' . "\n" . '2. Segera hubungi nomor darurat' . "\n" . '3. Ikuti jalur evakuasi menuju titik kumpul' . "\n" . '4. Bawa dokumen penting jika memungkinkan' . "\n" . '5. Jangan kembali sebelum dinyatakan aman' . "\n" . '6. Ikuti arahan petugas berwenang';
                        $prosedurPersiapan = isset($contents['prosedur']) ? ($contents['prosedur']->firstWhere('key', 'persiapan')->content ?? '• Simpan nomor kontak darurat di tempat mudah dijangkau' . "\n" . '• Siapkan tas darurat berisi dokumen penting' . "\n" . '• Ketahui jalur evakuasi dan titik kumpul terdekat' . "\n" . '• Pastikan semua anggota keluarga tahu prosedur evakuasi' . "\n" . '• Periksa kondisi rumah secara berkala') : '• Simpan nomor kontak darurat di tempat mudah dijangkau' . "\n" . '• Siapkan tas darurat berisi dokumen penting' . "\n" . '• Ketahui jalur evakuasi dan titik kumpul terdekat' . "\n" . '• Pastikan semua anggota keluarga tahu prosedur evakuasi' . "\n" . '• Periksa kondisi rumah secara berkala';
                    @endphp
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Section</label>
                        <input type="hidden" name="contents[60][section]" value="prosedur">
                        <input type="hidden" name="contents[60][key]" value="title">
                        <input type="text" name="contents[60][content]" value="{{ $prosedurTitle }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="Prosedur Darurat">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Subtitle Kolom 1</label>
                            <input type="hidden" name="contents[61][section]" value="prosedur">
                            <input type="hidden" name="contents[61][key]" value="subtitle_1">
                            <input type="text" name="contents[61][content]" value="{{ $prosedurSubtitle1 }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="Langkah Saat Terjadi Bencana">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Subtitle Kolom 2</label>
                            <input type="hidden" name="contents[62][section]" value="prosedur">
                            <input type="hidden" name="contents[62][key]" value="subtitle_2">
                            <input type="text" name="contents[62][content]" value="{{ $prosedurSubtitle2 }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="Persiapan Sebelum Bencana">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Langkah-langkah</label>
                            <input type="hidden" name="contents[63][section]" value="prosedur">
                            <input type="hidden" name="contents[63][key]" value="langkah">
                            <textarea name="contents[63][content]" rows="6" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="Masukkan langkah-langkah (satu per baris)">{{ $prosedurLangkah }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Persiapan</label>
                            <input type="hidden" name="contents[64][section]" value="prosedur">
                            <input type="hidden" name="contents[64][key]" value="persiapan">
                            <textarea name="contents[64][content]" rows="6" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                                placeholder="Masukkan persiapan (satu per baris)">{{ $prosedurPersiapan }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informasi Keamanan -->
            <div class="mb-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Informasi Keamanan</h3>
                <div class="space-y-4">
                    @php
                        $keamananTitle = isset($contents['keamanan']) ? ($contents['keamanan']->firstWhere('key', 'title')->content ?? 'Informasi Keamanan') : 'Informasi Keamanan';
                        $keamananDeskripsi = isset($contents['keamanan']) ? ($contents['keamanan']->firstWhere('key', 'deskripsi')->content ?? 'Untuk menjaga keamanan dan ketertiban di lingkungan desa, Pemerintah Desa bekerja sama dengan masyarakat dalam program sistem keamanan lingkungan (siskamling). Setiap Rukun Tetangga (RT) memiliki jadwal ronda malam yang diatur secara bergiliran.' . "\n\n" . 'Apabila terjadi kejadian darurat atau kejahatan, segera hubungi nomor kontak darurat di atas atau laporkan ke kantor desa terdekat. Jangan ragu untuk melaporkan aktivitas mencurigakan kepada ketua RT/RW atau petugas keamanan setempat.') : 'Untuk menjaga keamanan dan ketertiban di lingkungan desa, Pemerintah Desa bekerja sama dengan masyarakat dalam program sistem keamanan lingkungan (siskamling). Setiap Rukun Tetangga (RT) memiliki jadwal ronda malam yang diatur secara bergiliran.' . "\n\n" . 'Apabila terjadi kejadian darurat atau kejahatan, segera hubungi nomor kontak darurat di atas atau laporkan ke kantor desa terdekat. Jangan ragu untuk melaporkan aktivitas mencurigakan kepada ketua RT/RW atau petugas keamanan setempat.';
                    @endphp
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Section</label>
                        <input type="hidden" name="contents[65][section]" value="keamanan">
                        <input type="hidden" name="contents[65][key]" value="title">
                        <input type="text" name="contents[65][content]" value="{{ $keamananTitle }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="Informasi Keamanan">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                        <input type="hidden" name="contents[66][section]" value="keamanan">
                        <input type="hidden" name="contents[66][key]" value="deskripsi">
                        <textarea name="contents[66][content]" rows="5" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                            placeholder="Masukkan informasi keamanan">{{ $keamananDeskripsi }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        @if($page !== 'beranda' && $page !== 'profil' && $page !== 'pemerintahan' && $page !== 'layanan' && $page !== 'data' && $page !== 'darurat')
        <div id="contents-container" class="space-y-6">
            <!-- Other contents will be added here dynamically -->
        </div>
        <!-- Add New Content Button -->
        <div class="mt-6 flex items-center gap-4">
            <button type="button" id="add-content-btn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors text-sm font-medium flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Konten Baru
            </button>
        </div>
        @endif

        <!-- Submit Button -->
        <div class="mt-8 flex items-center justify-end gap-4">
            <a href="{{ route('admin.contents.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium">
                Batal
            </a>
            <button type="submit" class="px-6 py-2 bg-[#1e3a8a] text-white rounded-lg hover:bg-blue-800 transition-colors text-sm font-medium shadow-md hover:shadow-lg">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    let contentIndex = 0;
    const existingContents = @json($contents->toArray());

    // Default contents for beranda page
    const defaultBerandaContents = {
        'beranda': [
            {section: 'sambutan', key: 'title', title: 'Judul Sambutan', content: 'Sambutan Kepala Desa'},
            {section: 'sambutan', key: 'foto', title: 'Foto Kepala Desa', content: 'images/kepala-desa.jpg'},
            {section: 'sambutan', key: 'content', title: 'Teks Sambutan Lengkap', content: "Assalamu'alaikum Warahmatullahi Wabarakatuh\n\nPuji syukur kehadirat Allah SWT, atas rahmat dan karunia-Nya, kami dapat menyampaikan sambutan melalui website resmi Pemerintah Desa ini.\n\nWebsite ini merupakan media komunikasi dan informasi antara Pemerintah Desa dengan seluruh masyarakat. Melalui website ini, kami berkomitmen untuk menyampaikan informasi yang transparan, akurat, dan dapat diakses oleh seluruh warga desa.\n\nKami mengajak seluruh masyarakat untuk berpartisipasi aktif dalam pembangunan desa. Semoga website ini dapat menjadi sarana yang bermanfaat bagi kita semua.\n\nWassalamu'alaikum Warahmatullahi Wabarakatuh\n\nKepala Desa"},
        ]
    };
    
    // Simple form for sambutan (only for beranda page)
    @if($page === 'beranda')
    const showSimpleSambutanForm = true;
    @else
    const showSimpleSambutanForm = false;
    @endif

    // Load existing contents
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('contents-container');
        
        @if($page !== 'beranda' && $page !== 'profil')
        // For other pages, load all existing contents
        if (existingContents && Object.keys(existingContents).length > 0) {
            Object.keys(existingContents).forEach(section => {
                existingContents[section].forEach(content => {
                    addContentField(content.section, content.key, content.title, content.content);
                });
            });
        } else {
            // Add one empty field by default for other pages
            addContentField();
        }
        @endif
    });

    // Add content field
    function addContentField(section = '', key = '', title = '', content = '') {
        const container = document.getElementById('contents-container');
        const index = contentIndex++;
        
        // Determine rows for textarea based on content type
        let rows = 4;
        if (section === 'sambutan') {
            if (key === 'content') {
                rows = 12; // Large textarea for full sambutan text
            } else if (key === 'foto') {
                rows = 2; // Small for image path
            }
        }
        
        // Escape HTML for display in textarea
        const escapedContent = (content || '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#039;');
        const displayTitle = title || `Konten #${index + 1}`;
        
        const contentDiv = document.createElement('div');
        let cardClass = 'bg-white rounded-lg shadow-md p-6 border border-gray-200';
        if (section === 'sambutan') {
            cardClass += ' border-blue-200 bg-blue-50/30';
        }
        contentDiv.className = cardClass;
        
        contentDiv.innerHTML = `
            <div class="flex items-start justify-between mb-4">
                <div>
                    <h3 class="text-lg font-bold text-gray-900">${displayTitle}</h3>
                    ${section && key ? `<p class="text-xs text-gray-500 mt-1">Section: <span class="font-semibold">${section}</span> | Key: <span class="font-semibold">${key}</span></p>` : ''}
                </div>
                <button type="button" onclick="this.closest('.bg-white, .border-blue-200').remove()" class="text-red-600 hover:text-red-800 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Section</label>
                    <input type="text" name="contents[${index}][section]" value="${section}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-sm"
                        placeholder="contoh: hero, sambutan, berita">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Key</label>
                    <input type="text" name="contents[${index}][key]" value="${key}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-sm"
                        placeholder="contoh: title, subtitle, description">
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Judul (Opsional)</label>
                <input type="text" name="contents[${index}][title]" value="${title}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-sm"
                    placeholder="Judul konten (opsional)">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Konten</label>
                <textarea name="contents[${index}][content]" rows="${rows}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-sm"
                    placeholder="Masukkan konten atau teks">${escapedContent}</textarea>
            </div>
        `;
        
        container.appendChild(contentDiv);
    }

    // Add content button
    document.getElementById('add-content-btn')?.addEventListener('click', function() {
        addContentField();
    });

    @if($page === 'pemerintahan')
    // Handle Struktur Organisasi Upload
    function handleStrukturUpload(event) {
        const file = event.target.files[0];
        if (file) {
            const formData = new FormData();
            formData.append('struktur', file);
            formData.append('_token', '{{ csrf_token() }}');
            
            fetch('{{ route("admin.contents.upload-struktur") }}', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const previewDiv = document.getElementById('struktur-preview');
                    if (previewDiv) {
                        previewDiv.src = '{{ asset("") }}' + data.path;
                        previewDiv.parentElement.querySelector('svg')?.remove();
                    }
                    alert('Gambar struktur organisasi berhasil diupload!');
                } else {
                    alert('Gagal upload gambar: ' + (data.message || 'Error'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat upload gambar');
            });
        }
    }

    // Add Perangkat Desa
    document.getElementById('add-perangkat-btn')?.addEventListener('click', function() {
        const formData = new FormData();
        formData.append('jabatan', 'Jabatan Baru');
        formData.append('nama', 'Nama Lengkap');
        formData.append('nip', '');
        formData.append('urutan', document.querySelectorAll('.perangkat-item').length);
        formData.append('_token', '{{ csrf_token() }}');
        
        fetch('{{ route("admin.perangkat-desa.store") }}', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Gagal menambah perangkat desa');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan');
        });
    });

    // Update Perangkat Desa
    document.querySelectorAll('.update-perangkat-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            const item = document.querySelector(`.perangkat-item[data-id="${id}"]`);
            if (!item) {
                alert('Item tidak ditemukan');
                return;
            }
            
            const jabatanInput = item.querySelector('.perangkat-jabatan');
            const namaInput = item.querySelector('.perangkat-nama');
            const nipInput = item.querySelector('.perangkat-nip');
            
            if (!jabatanInput || !namaInput || !nipInput) {
                alert('Field tidak ditemukan');
                return;
            }
            
            const jabatan = jabatanInput.value.trim();
            const nama = namaInput.value.trim();
            const nip = nipInput.value.trim();
            
            if (!jabatan || !nama) {
                alert('Jabatan dan Nama harus diisi');
                return;
            }
            
            const formData = new FormData();
            formData.append('jabatan', jabatan);
            formData.append('nama', nama);
            // FormData tidak bisa mengirim null, jadi kirim string kosong jika NIP kosong
            formData.append('nip', nip || '');
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'PUT');
            
            // NIP opsional, tidak perlu log jika kosong
            
            fetch(`{{ url('admin/perangkat-desa') }}/${id}`, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert('Perangkat desa berhasil diupdate!');
                    // Reload halaman untuk menampilkan data terbaru
                    setTimeout(() => {
                        location.reload();
                    }, 500);
                } else {
                    alert('Gagal update perangkat desa: ' + (data.message || 'Error'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan: ' + error.message);
            });
        });
    });

    // Delete Perangkat Desa
    document.querySelectorAll('.delete-perangkat-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            if (!confirm('Apakah Anda yakin ingin menghapus perangkat desa ini?')) {
                return;
            }
            
            const id = this.dataset.id;
            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'DELETE');
            
            fetch(`{{ url('admin/perangkat-desa') }}/${id}`, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelector(`.perangkat-item[data-id="${id}"]`).remove();
                    alert('Perangkat desa berhasil dihapus!');
                } else {
                    alert('Gagal menghapus perangkat desa');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan');
            });
        });
    });

    // Update Foto Perangkat Desa
    document.querySelectorAll('.perangkat-foto-input').forEach(input => {
        input.addEventListener('change', function() {
            const id = this.dataset.id;
            const file = this.files[0];
            if (file) {
                const formData = new FormData();
                formData.append('foto', file);
                const nipInput = document.querySelector(`.perangkat-item[data-id="${id}"] .perangkat-nip`);
                formData.append('jabatan', document.querySelector(`.perangkat-item[data-id="${id}"] .perangkat-jabatan`).value);
                formData.append('nama', document.querySelector(`.perangkat-item[data-id="${id}"] .perangkat-nama`).value);
                formData.append('nip', nipInput ? (nipInput.value || '') : '');
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('_method', 'PUT');
                
                fetch(`{{ url('admin/perangkat-desa') }}/${id}`, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Gagal update foto');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan');
                });
            }
        });
    });
    @endif

    @if($page === 'data')
    // Form Tambah Data Penduduk
    document.getElementById('form-tambah-penduduk')?.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        formData.append('_token', '{{ csrf_token() }}');
        
        fetch('{{ route('admin.penduduk.store') }}', {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => Promise.reject(err));
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                alert('Data penduduk berhasil ditambahkan!');
                this.reset();
                // Reload page setelah 1 detik untuk update statistik
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else {
                alert('Gagal menambahkan data penduduk: ' + (data.message || 'Error'));
            }
        })
        .catch(error => {
            console.error('Error:', error);
            if (error.errors) {
                const errorMessages = Object.values(error.errors).flat().join('\n');
                alert('Terjadi kesalahan:\n' + errorMessages);
            } else {
                alert('Terjadi kesalahan saat menambahkan data penduduk');
            }
        });
    });
    @endif
</script>
@endsection
