<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function beranda()
    {
        // Ambil data statistik dari database penduduk (sama seperti halaman data)
        $penduduk = \App\Models\Penduduk::orderBy('rt')->orderBy('nama')->get();
        
        // Analisis statistik otomatis
        $statistik = [
            'jumlah_penduduk' => $penduduk->count(),
            'laki_laki' => $penduduk->where('jenis_kelamin', 'Laki-laki')->count(),
            'perempuan' => $penduduk->where('jenis_kelamin', 'Perempuan')->count(),
            'kepala_keluarga' => $penduduk->groupBy('rt')->count(), // Estimasi berdasarkan RT
        ];
        
        return view('beranda', compact('statistik'));
    }

    public function profil()
    {
        return view('profil');
    }

    public function pemerintahan()
    {
        $perangkatDesa = \App\Models\PerangkatDesa::orderBy('urutan')->orderBy('id')->get();
        return view('pemerintahan', compact('perangkatDesa'));
    }

    public function berita()
    {
        $berita = \App\Models\Berita::published()
            ->latest('published_at')
            ->paginate(10);
        
        $kategoriList = \App\Models\Berita::getKategori();
        
        return view('berita', compact('berita', 'kategoriList'));
    }

    public function beritaShow($slug)
    {
        $berita = \App\Models\Berita::where('slug', $slug)->firstOrFail();
        
        // Increment views
        $berita->incrementViews();
        
        // Get related berita
        $relatedBerita = \App\Models\Berita::published()
            ->where('id', '!=', $berita->id)
            ->where('kategori', $berita->kategori)
            ->latest('published_at')
            ->limit(3)
            ->get();
        
        $kategoriList = \App\Models\Berita::getKategori();
        
        return view('berita-detail', compact('berita', 'relatedBerita', 'kategoriList'));
    }

    public function layanan()
    {
        return view('layanan');
    }

    public function data()
    {
        // Ambil data penduduk fresh dari database
        $penduduk = \App\Models\Penduduk::orderBy('rt')->orderBy('nama')->get();
        
        // Analisis statistik otomatis
        $statistik = [
            'jumlah_penduduk' => $penduduk->count(),
            'laki_laki' => $penduduk->where('jenis_kelamin', 'Laki-laki')->count(),
            'perempuan' => $penduduk->where('jenis_kelamin', 'Perempuan')->count(),
            'kepala_keluarga' => $penduduk->groupBy('rt')->count(), // Estimasi berdasarkan RT
        ];
        
        // Hitung statistik pendidikan otomatis dari data penduduk (fresh dari database)
        $pendidikanStats = [
            'Tidak Sekolah' => $penduduk->where('pendidikan', 'Tidak Sekolah')->count(),
            'SD/Sederajat' => $penduduk->where('pendidikan', 'SD/Sederajat')->count(),
            'SMP/Sederajat' => $penduduk->where('pendidikan', 'SMP/Sederajat')->count(),
            'SMA/Sederajat' => $penduduk->where('pendidikan', 'SMA/Sederajat')->count(),
            'Diploma' => $penduduk->where('pendidikan', 'Diploma')->count(),
            'S1/Sederajat' => $penduduk->where('pendidikan', 'S1/Sederajat')->count(),
            'S2/Sederajat' => $penduduk->where('pendidikan', 'S2/Sederajat')->count(),
        ];
        
        // Hitung jumlah SD/Sederajat secara eksplisit
        $sdSederajatCount = $penduduk->where('pendidikan', 'SD/Sederajat')->count();
        
        // Data untuk grafik
        $chartData = [
            'jenis_kelamin' => [
                'labels' => ['Laki-laki', 'Perempuan'],
                'data' => [
                    $statistik['laki_laki'],
                    $statistik['perempuan'],
                ],
            ],
            'sd_sederajat' => [
                'label' => 'SD/Sederajat',
                'data' => $sdSederajatCount,
                'total' => $statistik['jumlah_penduduk'],
            ],
        ];
        
        // Hitung total pendidikan berdasarkan jumlah penduduk (otomatis)
        $pendidikanTotal = $statistik['jumlah_penduduk'];
        
        return view('data', compact('penduduk', 'statistik', 'chartData', 'pendidikanTotal', 'pendidikanStats'));
    }

    public function kesehatan()
    {
        return view('kesehatan');
    }

    public function galeri()
    {
        return view('galeri');
    }

    public function umkm()
    {
        return view('umkm');
    }

    public function kontak()
    {
        return view('kontak');
    }
}
