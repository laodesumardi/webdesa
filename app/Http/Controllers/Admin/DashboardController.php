<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Umkm;
use App\Models\Penduduk;
use App\Models\PerangkatDesa;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik Utama
        $stats = [
            'total_penduduk' => Penduduk::count(),
            'total_berita' => Berita::count(),
            'total_berita_published' => Berita::where('status', 'published')->count(),
            'total_galeri' => Galeri::count(),
            'total_galeri_published' => Galeri::where('status', 'published')->count(),
            'total_umkm' => Umkm::count(),
            'total_umkm_published' => Umkm::where('status', 'published')->count(),
            'total_perangkat' => PerangkatDesa::count(),
            'total_views' => Berita::sum('views'),
        ];

        // Statistik Penduduk
        $penduduk = Penduduk::all();
        $pendudukStats = [
            'laki_laki' => $penduduk->where('jenis_kelamin', 'Laki-laki')->count(),
            'perempuan' => $penduduk->where('jenis_kelamin', 'Perempuan')->count(),
        ];

        // Statistik Pendidikan
        $pendidikanStats = [
            'Tidak Sekolah' => $penduduk->where('pendidikan', 'Tidak Sekolah')->count(),
            'SD/Sederajat' => $penduduk->where('pendidikan', 'SD/Sederajat')->count(),
            'SMP/Sederajat' => $penduduk->where('pendidikan', 'SMP/Sederajat')->count(),
            'SMA/Sederajat' => $penduduk->where('pendidikan', 'SMA/Sederajat')->count(),
            'Diploma' => $penduduk->where('pendidikan', 'Diploma')->count(),
            'S1/Sederajat' => $penduduk->where('pendidikan', 'S1/Sederajat')->count(),
            'S2/Sederajat' => $penduduk->where('pendidikan', 'S2/Sederajat')->count(),
        ];

        // Statistik UMKM per Kategori
        $umkmKategori = Umkm::select('kategori', DB::raw('count(*) as total'))
            ->where('status', 'published')
            ->groupBy('kategori')
            ->get()
            ->pluck('total', 'kategori')
            ->toArray();

        $kategoriLabels = Umkm::getKategori();

        // Berita Terbaru
        $beritaTerbaru = Berita::with('user')
            ->latest()
            ->take(5)
            ->get();

        // Berita Populer
        $beritaPopuler = Berita::where('status', 'published')
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        // UMKM Terbaru
        $umkmTerbaru = Umkm::with('user')
            ->latest()
            ->take(5)
            ->get();

        // Galeri Terbaru
        $galeriTerbaru = Galeri::latest()
            ->take(6)
            ->get();

        // Aktivitas Terkini (gabungan dari berita, galeri, umkm)
        $aktivitas = collect();

        // Berita activities
        Berita::latest()->take(3)->get()->each(function ($item) use ($aktivitas) {
            $aktivitas->push([
                'type' => 'berita',
                'title' => $item->judul,
                'action' => 'Berita ditambahkan',
                'time' => $item->created_at,
                'icon' => 'newspaper',
                'color' => 'blue',
            ]);
        });

        // Galeri activities
        Galeri::latest()->take(3)->get()->each(function ($item) use ($aktivitas) {
            $aktivitas->push([
                'type' => 'galeri',
                'title' => $item->judul,
                'action' => 'Foto ditambahkan',
                'time' => $item->created_at,
                'icon' => 'photo',
                'color' => 'yellow',
            ]);
        });

        // UMKM activities
        Umkm::latest()->take(3)->get()->each(function ($item) use ($aktivitas) {
            $aktivitas->push([
                'type' => 'umkm',
                'title' => $item->nama_usaha,
                'action' => 'UMKM terdaftar',
                'time' => $item->created_at,
                'icon' => 'shop',
                'color' => 'green',
            ]);
        });

        // Sort by time and take 8
        $aktivitas = $aktivitas->sortByDesc('time')->take(8)->values();

        // Data untuk grafik berita per bulan (6 bulan terakhir)
        $beritaPerBulan = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $count = Berita::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
            $beritaPerBulan[] = [
                'bulan' => $date->translatedFormat('M Y'),
                'total' => $count,
            ];
        }

        // Penduduk per RT
        $pendudukPerRT = Penduduk::select('rt', DB::raw('count(*) as total'))
            ->groupBy('rt')
            ->orderBy('rt')
            ->get()
            ->pluck('total', 'rt')
            ->toArray();

        return view('admin.dashboard', compact(
            'stats',
            'pendudukStats',
            'pendidikanStats',
            'umkmKategori',
            'kategoriLabels',
            'beritaTerbaru',
            'beritaPopuler',
            'umkmTerbaru',
            'galeriTerbaru',
            'aktivitas',
            'beritaPerBulan',
            'pendudukPerRT'
        ));
    }
}
