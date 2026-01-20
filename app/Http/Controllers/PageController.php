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
        
        // Ambil berita terbaru (4 berita)
        $beritaTerbaru = \App\Models\Berita::published()
            ->latest('published_at')
            ->limit(4)
            ->get();
        
        // Ambil galeri terbaru (8 galeri)
        $galeriTerbaru = \App\Models\Galeri::published()
            ->orderBy('urutan')
            ->latest()
            ->limit(8)
            ->get();
        
        return view('beranda', compact('statistik', 'beritaTerbaru', 'galeriTerbaru'));
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
        $galeri = \App\Models\Galeri::published()
            ->orderBy('urutan')
            ->latest()
            ->paginate(12);
        
        $kategoriList = \App\Models\Galeri::getKategori();
        
        return view('galeri', compact('galeri', 'kategoriList'));
    }

    public function umkm()
    {
        $umkm = \App\Models\Umkm::published()
            ->orderBy('urutan')
            ->latest()
            ->paginate(12);
        
        $kategoriList = \App\Models\Umkm::getKategori();
        
        return view('umkm', compact('umkm', 'kategoriList'));
    }

    public function kontak()
    {
        $kategoriList = \App\Models\Pengaduan::getKategori();
        return view('kontak', compact('kategoriList'));
    }

    public function storePengaduan(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'nullable|string|size:16',
            'email' => 'nullable|email|max:255',
            'telepon' => 'required|string|max:20',
            'alamat' => 'nullable|string|max:500',
            'kategori' => 'required|string',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string|max:5000',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $data = $request->only(['nama', 'nik', 'email', 'telepon', 'alamat', 'kategori', 'judul', 'isi']);

        // Handle lampiran
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $filename = 'lampiran-' . time() . '-' . \Illuminate\Support\Str::random(10) . '.' . $file->getClientOriginalExtension();
            
            $uploadPath = public_path('uploads/pengaduan');
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            
            $file->move($uploadPath, $filename);
            $data['lampiran'] = $filename;
        }

        \App\Models\Pengaduan::create($data);

        return redirect()->route('kontak')->with('success', 'Pengaduan Anda telah berhasil dikirim. Kami akan segera menindaklanjuti.');
    }
}
