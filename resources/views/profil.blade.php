@extends('layouts.app')

@section('title', 'Profil Desa - Website Resmi Pemerintah Desa')

@section('content')
    <div class="mb-8 scroll-animate" data-animation="fade-up">
        <h1 class="text-2xl md:text-3xl font-bold text-green-800 mb-2">Profil Desa</h1>
        <p class="text-gray-600 text-base md:text-lg">Informasi lengkap tentang desa kami</p>
    </div>

    <!-- Informasi Umum -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6 mb-8">
        <div class="scroll-animate bg-white border border-gray-200 p-6 text-center hover:border-green-600 transition-colors" data-animation="fade-up" data-delay="100">
            <div class="text-3xl md:text-4xl font-bold text-green-800 mb-2">250</div>
            <div class="text-sm md:text-base text-gray-600">Hektar Luas Wilayah</div>
        </div>
        <div class="scroll-animate bg-white border border-gray-200 p-6 text-center hover:border-green-600 transition-colors" data-animation="fade-up" data-delay="200">
            <div class="text-3xl md:text-4xl font-bold text-green-800 mb-2">150</div>
            <div class="text-sm md:text-base text-gray-600">Meter DPL</div>
        </div>
        <div class="scroll-animate bg-white border border-gray-200 p-6 text-center hover:border-green-600 transition-colors" data-animation="fade-up" data-delay="300">
            <div class="text-3xl md:text-4xl font-bold text-green-800 mb-2">2.500-3.000</div>
            <div class="text-sm md:text-base text-gray-600">mm Curah Hujan/Tahun</div>
        </div>
    </div>

    <!-- Sejarah Desa -->
    <div class="scroll-animate bg-white border border-gray-200 p-6 md:p-8 mb-8" data-animation="fade-up">
        <h2 class="text-xl md:text-2xl font-bold text-green-800 mb-6 pb-3 border-b-2 border-green-800">Sejarah Desa</h2>
        <div class="text-gray-700 text-base md:text-lg leading-relaxed space-y-4">
            <p>
                Desa ini didirikan pada tahun 1920 dan memiliki sejarah panjang dalam pembangunan masyarakat. 
                Awalnya merupakan wilayah pertanian yang subur dengan mayoritas penduduk bekerja sebagai petani. 
                Setelah kemerdekaan Indonesia, desa ini secara resmi ditetapkan sebagai desa administratif 
                dengan struktur pemerintahan yang lengkap.
            </p>
            <p>
                Seiring perkembangan zaman, desa ini terus berkembang menjadi desa yang maju dengan berbagai 
                fasilitas umum yang memadai. Pemerintah Desa berkomitmen untuk meningkatkan kesejahteraan 
                masyarakat melalui berbagai program pembangunan. Pada era reformasi, desa ini mengalami 
                transformasi signifikan dengan adanya otonomi daerah yang memberikan kewenangan lebih besar 
                kepada pemerintah desa.
            </p>
            <p>
                Sejak tahun 2000-an, desa ini mulai mengembangkan berbagai sektor ekonomi, tidak hanya 
                mengandalkan sektor pertanian, tetapi juga mulai mengembangkan sektor perdagangan, jasa, 
                dan industri kecil menengah. Hingga saat ini, desa ini terus berkomitmen untuk menjadi 
                desa yang mandiri, sejahtera, dan berbudaya.
            </p>
        </div>
    </div>

    <!-- Visi dan Misi -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 mb-8">
        <!-- Visi -->
        <div class="scroll-animate bg-white border border-gray-200 p-6 md:p-8" data-animation="slide-left">
            <h2 class="text-xl md:text-2xl font-bold text-green-800 mb-4 pb-2 border-b-2 border-green-800">Visi</h2>
            <p class="text-gray-700 text-base md:text-lg leading-relaxed italic mb-4">
                "Terwujudnya desa yang mandiri, sejahtera, dan berbudaya melalui peningkatan kualitas 
                sumber daya manusia dan pengelolaan sumber daya alam yang berkelanjutan."
            </p>
            <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                Visi tersebut mencerminkan cita-cita jangka panjang Pemerintah Desa dalam mewujudkan 
                masyarakat yang mandiri, sejahtera, serta tetap mempertahankan nilai-nilai budaya lokal.
            </p>
        </div>

        <!-- Misi -->
        <div class="scroll-animate bg-white border border-gray-200 p-6 md:p-8" data-animation="slide-right">
            <h2 class="text-xl md:text-2xl font-bold text-green-800 mb-4 pb-2 border-b-2 border-green-800">Misi</h2>
            <ul class="space-y-3 text-gray-700 text-sm md:text-base leading-relaxed">
                <li class="flex items-start gap-2">
                    <span class="text-green-800 font-bold mt-1">1.</span>
                    <span>Meningkatkan kualitas pelayanan publik melalui modernisasi sistem administrasi dan peningkatan aksesibilitas layanan.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-green-800 font-bold mt-1">2.</span>
                    <span>Mengembangkan ekonomi masyarakat desa melalui pemberdayaan ekonomi lokal dan pengembangan usaha kecil menengah.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-green-800 font-bold mt-1">3.</span>
                    <span>Memperkuat infrastruktur desa melalui pembangunan dan pemeliharaan jalan, jembatan, dan sarana publik lainnya.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-green-800 font-bold mt-1">4.</span>
                    <span>Meningkatkan partisipasi masyarakat dalam pembangunan melalui penguatan lembaga kemasyarakatan.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-green-800 font-bold mt-1">5.</span>
                    <span>Melestarikan nilai-nilai budaya lokal melalui dokumentasi dan pengembangan seni budaya tradisional.</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- Kondisi Geografis -->
    <div class="scroll-animate bg-white border border-gray-200 p-6 md:p-8 mb-8" data-animation="fade-up">
        <h2 class="text-xl md:text-2xl font-bold text-green-800 mb-6 pb-3 border-b-2 border-green-800">Kondisi Geografis</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
            <!-- Letak Geografis -->
            <div class="scroll-animate" data-animation="fade-up" data-delay="100">
                <h3 class="font-semibold text-gray-900 mb-3 text-lg">Letak Geografis</h3>
                <p class="text-gray-700 text-base leading-relaxed mb-4">
                    Desa ini terletak di wilayah yang memiliki posisi strategis dengan luas wilayah mencapai 250 hektar. 
                    Secara administratif, desa ini berbatasan langsung dengan beberapa desa di sekitarnya. 
                    Posisi geografis yang strategis ini memberikan keuntungan bagi desa dalam hal aksesibilitas 
                    dan potensi pengembangan ekonomi.
                </p>
                <div class="bg-gray-50 border border-gray-200 p-4 text-sm">
                    <p class="font-semibold text-gray-900 mb-2">Batas Wilayah:</p>
                    <ul class="space-y-1 text-gray-700">
                        <li>• Utara: Desa Sebelah Utara</li>
                        <li>• Selatan: Desa Sebelah Selatan</li>
                        <li>• Timur: Desa Sebelah Timur</li>
                        <li>• Barat: Desa Sebelah Barat</li>
                    </ul>
                </div>
            </div>

            <!-- Topografi dan Iklim -->
            <div class="scroll-animate" data-animation="fade-up" data-delay="200">
                <h3 class="font-semibold text-gray-900 mb-3 text-lg">Topografi dan Iklim</h3>
                <p class="text-gray-700 text-base leading-relaxed mb-4">
                    Secara topografis, desa ini berada pada ketinggian rata-rata 150 meter di atas permukaan laut 
                    dengan kondisi topografi yang relatif datar hingga bergelombang. Sebagian besar wilayah desa 
                    merupakan dataran rendah yang cocok untuk kegiatan pertanian.
                </p>
                <div class="bg-gray-50 border border-gray-200 p-4 text-sm">
                    <p class="font-semibold text-gray-900 mb-2">Karakteristik:</p>
                    <ul class="space-y-1 text-gray-700">
                        <li>• Ketinggian: 150 mdpl</li>
                        <li>• Topografi: Datar hingga bergelombang</li>
                        <li>• Iklim: Tropis</li>
                        <li>• Suhu: 25-30°C</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Sumber Daya Alam -->
        <div class="scroll-animate mt-6 pt-6 border-t border-gray-200" data-animation="fade-up" data-delay="300">
            <h3 class="font-semibold text-gray-900 mb-3 text-lg">Sumber Daya Alam</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="scroll-animate bg-gray-50 border border-gray-200 p-4 hover:border-green-600 transition-colors" data-animation="scale-fade" data-delay="400">
                    <p class="font-semibold text-gray-900 mb-2">Jenis Tanah</p>
                    <p class="text-gray-700 text-sm">Latosol dan Alluvial yang subur untuk pertanian</p>
                </div>
                <div class="scroll-animate bg-gray-50 border border-gray-200 p-4 hover:border-green-600 transition-colors" data-animation="scale-fade" data-delay="500">
                    <p class="font-semibold text-gray-900 mb-2">Sumber Air</p>
                    <p class="text-gray-700 text-sm">Beberapa aliran sungai untuk irigasi dan kebutuhan air bersih</p>
                </div>
                <div class="scroll-animate bg-gray-50 border border-gray-200 p-4 hover:border-green-600 transition-colors" data-animation="scale-fade" data-delay="600">
                    <p class="font-semibold text-gray-900 mb-2">Potensi Lain</p>
                    <p class="text-gray-700 text-sm">Hutan, bahan galian, dan hasil pertanian</p>
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
@endsection
