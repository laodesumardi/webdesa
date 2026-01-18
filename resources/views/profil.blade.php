@extends('layouts.app')

@section('title', 'Profil Desa - Website Resmi Pemerintah Desa')

@php
    use App\Models\Content;
    
    // Helper function untuk mengambil konten
    function getContent($page, $section, $key, $default = '') {
        return Content::getContent($page, $section, $key, $default);
    }
@endphp

@section('content')
    <div class="container mx-auto px-4 sm:px-6">
        <div class="mb-6 sm:mb-8 scroll-animate" data-animation="fade-up">
            <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-[#1e3a8a] mb-2">{{ getContent('profil', 'header', 'title', 'Profil Desa') }}</h1>
            <p class="text-gray-600 text-sm sm:text-base md:text-lg">{{ getContent('profil', 'header', 'subtitle', 'Informasi lengkap tentang desa kami') }}</p>
        </div>

        <!-- Informasi Umum -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4 md:gap-6 mb-6 sm:mb-8">
            <div class="scroll-animate bg-white border border-gray-200 p-4 sm:p-5 md:p-6 text-center hover:border-[#1e3a8a] transition-colors rounded-lg" data-animation="fade-up" data-delay="100">
                <div class="text-2xl sm:text-3xl md:text-4xl font-bold text-[#1e3a8a] mb-2">{{ getContent('profil', 'statistik', 'luas_value', '250') }}</div>
                <div class="text-xs sm:text-sm md:text-base text-gray-600">{{ getContent('profil', 'statistik', 'luas_label', 'Hektar Luas Wilayah') }}</div>
            </div>
            <div class="scroll-animate bg-white border border-gray-200 p-4 sm:p-5 md:p-6 text-center hover:border-[#1e3a8a] transition-colors rounded-lg" data-animation="fade-up" data-delay="200">
                <div class="text-2xl sm:text-3xl md:text-4xl font-bold text-[#1e3a8a] mb-2">{{ getContent('profil', 'statistik', 'dpl_value', '150') }}</div>
                <div class="text-xs sm:text-sm md:text-base text-gray-600">{{ getContent('profil', 'statistik', 'dpl_label', 'Meter DPL') }}</div>
            </div>
            <div class="scroll-animate bg-white border border-gray-200 p-4 sm:p-5 md:p-6 text-center hover:border-[#1e3a8a] transition-colors rounded-lg sm:col-span-2 md:col-span-1" data-animation="fade-up" data-delay="300">
                <div class="text-2xl sm:text-3xl md:text-4xl font-bold text-[#1e3a8a] mb-2">{{ getContent('profil', 'statistik', 'curah_hujan_value', '2.500-3.000') }}</div>
                <div class="text-xs sm:text-sm md:text-base text-gray-600">{{ getContent('profil', 'statistik', 'curah_hujan_label', 'mm Curah Hujan/Tahun') }}</div>
            </div>
        </div>

        <!-- Sejarah Desa -->
        <div class="scroll-animate bg-white border border-gray-200 p-4 sm:p-6 md:p-8 mb-6 sm:mb-8 rounded-lg" data-animation="fade-up">
            <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-[#1e3a8a] mb-4 sm:mb-6 pb-2 sm:pb-3 border-b-2 border-[#1e3a8a]">{{ getContent('profil', 'sejarah', 'title', 'Sejarah Desa') }}</h2>
            <div class="text-gray-700 text-sm sm:text-base md:text-lg leading-relaxed space-y-3 sm:space-y-4">
                @php
                    $sejarahText = getContent('profil', 'sejarah', 'content', "Desa ini didirikan pada tahun 1920 dan memiliki sejarah panjang dalam pembangunan masyarakat. Awalnya merupakan wilayah pertanian yang subur dengan mayoritas penduduk bekerja sebagai petani. Setelah kemerdekaan Indonesia, desa ini secara resmi ditetapkan sebagai desa administratif dengan struktur pemerintahan yang lengkap.\n\nSeiring perkembangan zaman, desa ini terus berkembang menjadi desa yang maju dengan berbagai fasilitas umum yang memadai. Pemerintah Desa berkomitmen untuk meningkatkan kesejahteraan masyarakat melalui berbagai program pembangunan. Pada era reformasi, desa ini mengalami transformasi signifikan dengan adanya otonomi daerah yang memberikan kewenangan lebih besar kepada pemerintah desa.\n\nSejak tahun 2000-an, desa ini mulai mengembangkan berbagai sektor ekonomi, tidak hanya mengandalkan sektor pertanian, tetapi juga mulai mengembangkan sektor perdagangan, jasa, dan industri kecil menengah. Hingga saat ini, desa ini terus berkomitmen untuk menjadi desa yang mandiri, sejahtera, dan berbudaya.");
                    $paragraphs = preg_split('/\n\s*\n/', $sejarahText);
                @endphp
                @foreach($paragraphs as $paragraph)
                    @if(trim($paragraph))
                        <p>{{ trim($paragraph) }}</p>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Visi dan Misi -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 md:gap-8 mb-6 sm:mb-8">
            <!-- Visi -->
            <div class="scroll-animate bg-white border border-gray-200 p-4 sm:p-6 md:p-8 rounded-lg" data-animation="slide-left">
                <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-[#1e3a8a] mb-3 sm:mb-4 pb-2 border-b-2 border-[#1e3a8a]">{{ getContent('profil', 'visi', 'title', 'Visi') }}</h2>
                <p class="text-gray-700 text-sm sm:text-base md:text-lg leading-relaxed italic mb-3 sm:mb-4">
                    "{{ getContent('profil', 'visi', 'teks', 'Terwujudnya desa yang mandiri, sejahtera, dan berbudaya melalui peningkatan kualitas sumber daya manusia dan pengelolaan sumber daya alam yang berkelanjutan.') }}"
                </p>
                <p class="text-gray-600 text-xs sm:text-sm md:text-base leading-relaxed">
                    {{ getContent('profil', 'visi', 'deskripsi', 'Visi tersebut mencerminkan cita-cita jangka panjang Pemerintah Desa dalam mewujudkan masyarakat yang mandiri, sejahtera, serta tetap mempertahankan nilai-nilai budaya lokal.') }}
                </p>
            </div>

            <!-- Misi -->
            <div class="scroll-animate bg-white border border-gray-200 p-4 sm:p-6 md:p-8 rounded-lg" data-animation="slide-right">
                <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-[#1e3a8a] mb-3 sm:mb-4 pb-2 border-b-2 border-[#1e3a8a]">{{ getContent('profil', 'misi', 'title', 'Misi') }}</h2>
                <ul class="space-y-2 sm:space-y-3 text-gray-700 text-xs sm:text-sm md:text-base leading-relaxed">
                    @php
                        $misiItems = [
                            getContent('profil', 'misi', 'item1', 'Meningkatkan kualitas pelayanan publik melalui modernisasi sistem administrasi dan peningkatan aksesibilitas layanan.'),
                            getContent('profil', 'misi', 'item2', 'Mengembangkan ekonomi masyarakat desa melalui pemberdayaan ekonomi lokal dan pengembangan usaha kecil menengah.'),
                            getContent('profil', 'misi', 'item3', 'Memperkuat infrastruktur desa melalui pembangunan dan pemeliharaan jalan, jembatan, dan sarana publik lainnya.'),
                            getContent('profil', 'misi', 'item4', 'Meningkatkan partisipasi masyarakat dalam pembangunan melalui penguatan lembaga kemasyarakatan.'),
                            getContent('profil', 'misi', 'item5', 'Melestarikan nilai-nilai budaya lokal melalui dokumentasi dan pengembangan seni budaya tradisional.'),
                        ];
                    @endphp
                    @foreach($misiItems as $index => $misiItem)
                        @if($misiItem)
                            <li class="flex items-start gap-2">
                                <span class="text-[#1e3a8a] font-bold mt-1">{{ $index + 1 }}.</span>
                                <span>{{ $misiItem }}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Kondisi Geografis -->
        <div class="scroll-animate bg-white border border-gray-200 p-4 sm:p-6 md:p-8 mb-6 sm:mb-8 rounded-lg" data-animation="fade-up">
            <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-[#1e3a8a] mb-4 sm:mb-6 pb-2 sm:pb-3 border-b-2 border-[#1e3a8a]">{{ getContent('profil', 'geografis', 'title', 'Kondisi Geografis') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
                <!-- Letak Geografis -->
                <div class="scroll-animate" data-animation="fade-up" data-delay="100">
                    <h3 class="font-semibold text-gray-900 mb-2 sm:mb-3 text-base sm:text-lg">{{ getContent('profil', 'geografis', 'letak_title', 'Letak Geografis') }}</h3>
                    <p class="text-gray-700 text-sm sm:text-base leading-relaxed mb-3 sm:mb-4">
                        {{ getContent('profil', 'geografis', 'letak_deskripsi', 'Desa ini terletak di wilayah yang memiliki posisi strategis dengan luas wilayah mencapai 250 hektar. Secara administratif, desa ini berbatasan langsung dengan beberapa desa di sekitarnya. Posisi geografis yang strategis ini memberikan keuntungan bagi desa dalam hal aksesibilitas dan potensi pengembangan ekonomi.') }}
                    </p>
                    <div class="bg-gray-50 border border-gray-200 p-3 sm:p-4 text-xs sm:text-sm rounded-lg">
                        <p class="font-semibold text-gray-900 mb-2">Batas Wilayah:</p>
                        <ul class="space-y-1 text-gray-700">
                            <li>• Utara: {{ getContent('profil', 'geografis', 'batas_utara', 'Desa Sebelah Utara') }}</li>
                            <li>• Selatan: {{ getContent('profil', 'geografis', 'batas_selatan', 'Desa Sebelah Selatan') }}</li>
                            <li>• Timur: {{ getContent('profil', 'geografis', 'batas_timur', 'Desa Sebelah Timur') }}</li>
                            <li>• Barat: {{ getContent('profil', 'geografis', 'batas_barat', 'Desa Sebelah Barat') }}</li>
                        </ul>
                    </div>
                </div>

                <!-- Topografi dan Iklim -->
                <div class="scroll-animate" data-animation="fade-up" data-delay="200">
                    <h3 class="font-semibold text-gray-900 mb-2 sm:mb-3 text-base sm:text-lg">{{ getContent('profil', 'geografis', 'topografi_title', 'Topografi dan Iklim') }}</h3>
                    <p class="text-gray-700 text-sm sm:text-base leading-relaxed mb-3 sm:mb-4">
                        {{ getContent('profil', 'geografis', 'topografi_deskripsi', 'Secara topografis, desa ini berada pada ketinggian rata-rata 150 meter di atas permukaan laut dengan kondisi topografi yang relatif datar hingga bergelombang. Sebagian besar wilayah desa merupakan dataran rendah yang cocok untuk kegiatan pertanian.') }}
                    </p>
                    <div class="bg-gray-50 border border-gray-200 p-3 sm:p-4 text-xs sm:text-sm rounded-lg">
                        <p class="font-semibold text-gray-900 mb-2">Karakteristik:</p>
                        <ul class="space-y-1 text-gray-700">
                            <li>• Ketinggian: {{ getContent('profil', 'geografis', 'ketinggian', '150 mdpl') }}</li>
                            <li>• Topografi: {{ getContent('profil', 'geografis', 'topografi', 'Datar hingga bergelombang') }}</li>
                            <li>• Iklim: {{ getContent('profil', 'geografis', 'iklim', 'Tropis') }}</li>
                            <li>• Suhu: {{ getContent('profil', 'geografis', 'suhu', '25-30°C') }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Sumber Daya Alam -->
            <div class="scroll-animate mt-4 sm:mt-6 pt-4 sm:pt-6 border-t border-gray-200" data-animation="fade-up" data-delay="300">
                <h3 class="font-semibold text-gray-900 mb-3 sm:mb-4 text-base sm:text-lg">{{ getContent('profil', 'geografis', 'sda_title', 'Sumber Daya Alam') }}</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4">
                    <div class="scroll-animate bg-gray-50 border border-gray-200 p-3 sm:p-4 hover:border-[#1e3a8a] transition-colors rounded-lg" data-animation="scale-fade" data-delay="400">
                        <p class="font-semibold text-gray-900 mb-2 text-sm sm:text-base">{{ getContent('profil', 'geografis', 'sda_jenis_tanah_title', 'Jenis Tanah') }}</p>
                        <p class="text-gray-700 text-xs sm:text-sm">{{ getContent('profil', 'geografis', 'sda_jenis_tanah', 'Latosol dan Alluvial yang subur untuk pertanian') }}</p>
                    </div>
                    <div class="scroll-animate bg-gray-50 border border-gray-200 p-3 sm:p-4 hover:border-[#1e3a8a] transition-colors rounded-lg" data-animation="scale-fade" data-delay="500">
                        <p class="font-semibold text-gray-900 mb-2 text-sm sm:text-base">{{ getContent('profil', 'geografis', 'sda_sumber_air_title', 'Sumber Air') }}</p>
                        <p class="text-gray-700 text-xs sm:text-sm">{{ getContent('profil', 'geografis', 'sda_sumber_air', 'Beberapa aliran sungai untuk irigasi dan kebutuhan air bersih') }}</p>
                    </div>
                    <div class="scroll-animate bg-gray-50 border border-gray-200 p-3 sm:p-4 hover:border-[#1e3a8a] transition-colors rounded-lg sm:col-span-2 md:col-span-1" data-animation="scale-fade" data-delay="600">
                        <p class="font-semibold text-gray-900 mb-2 text-sm sm:text-base">{{ getContent('profil', 'geografis', 'sda_potensi_title', 'Potensi Lain') }}</p>
                        <p class="text-gray-700 text-xs sm:text-sm">{{ getContent('profil', 'geografis', 'sda_potensi', 'Hutan, bahan galian, dan hasil pertanian') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Initial states for animations */
        .scroll-animate {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .scroll-animate.animate-active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Specific animations */
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
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const element = entry.target;
                        const animationType = element.dataset.animation || 'fade-in';
                        const delay = parseInt(element.dataset.delay) || 0;

                        setTimeout(() => {
                            element.classList.add('animate-active');
                        }, delay);
                        observer.unobserve(element); // Animasi hanya sekali
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.scroll-animate').forEach(element => {
                observer.observe(element);
            });
        });
    </script>
    </div>
@endsection
