<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = [
            'beranda' => 'Beranda',
            'profil' => 'Profil',
            'pemerintahan' => 'Pemerintahan',
            'layanan' => 'Layanan',
            'data' => 'Data',
            'darurat' => 'Darurat',
            'galeri' => 'Galeri',
            'umkm' => 'UMKM',
            'kontak' => 'Kontak',
        ];

        // Get all contents grouped by page
        $contents = Content::orderBy('page')
            ->orderBy('section')
            ->orderBy('key')
            ->get()
            ->groupBy('page');

        return view('admin.contents.index', compact('pages', 'contents'));
    }

    /**
     * Show the form for editing contents for a specific page.
     */
    public function edit($page)
    {
        $pages = [
            'beranda' => 'Beranda',
            'profil' => 'Profil',
            'pemerintahan' => 'Pemerintahan',
            'layanan' => 'Layanan',
            'data' => 'Data',
            'darurat' => 'Darurat',
            'galeri' => 'Galeri',
            'umkm' => 'UMKM',
            'kontak' => 'Kontak',
        ];

        if (!isset($pages[$page])) {
            return redirect()->route('admin.contents.index')
                ->with('error', 'Halaman tidak ditemukan.');
        }

        // Get all contents for this page
        $contents = Content::where('page', $page)
            ->orderBy('section')
            ->orderBy('key')
            ->get()
            ->groupBy('section');

        // Get perangkat desa for pemerintahan page
        $perangkatDesa = [];
        if ($page === 'pemerintahan') {
            $perangkatDesa = \App\Models\PerangkatDesa::orderBy('urutan')->orderBy('id')->get();
        }

        // Get penduduk and statistics for data page
        $penduduk = [];
        $statistikAuto = [];
        $pendidikanStats = [];
        if ($page === 'data') {
            $penduduk = \App\Models\Penduduk::orderBy('nama')->limit(10)->get();
            $allPenduduk = \App\Models\Penduduk::all();
            $statistikAuto = [
                'jumlah_penduduk' => $allPenduduk->count(),
                'laki_laki' => $allPenduduk->where('jenis_kelamin', 'Laki-laki')->count(),
                'perempuan' => $allPenduduk->where('jenis_kelamin', 'Perempuan')->count(),
                'kepala_keluarga' => $allPenduduk->groupBy('rt')->count(),
            ];
            $pendidikanStats = [
                'Tidak Sekolah' => $allPenduduk->where('pendidikan', 'Tidak Sekolah')->count(),
                'SD/Sederajat' => $allPenduduk->where('pendidikan', 'SD/Sederajat')->count(),
                'SMP/Sederajat' => $allPenduduk->where('pendidikan', 'SMP/Sederajat')->count(),
                'SMA/Sederajat' => $allPenduduk->where('pendidikan', 'SMA/Sederajat')->count(),
                'Diploma' => $allPenduduk->where('pendidikan', 'Diploma')->count(),
                'S1/Sederajat' => $allPenduduk->where('pendidikan', 'S1/Sederajat')->count(),
                'S2/Sederajat' => $allPenduduk->where('pendidikan', 'S2/Sederajat')->count(),
            ];
        }

        return view('admin.contents.edit', compact('page', 'pages', 'contents', 'perangkatDesa', 'penduduk', 'statistikAuto', 'pendidikanStats'));
    }

    /**
     * Update or create contents for a specific page.
     */
    public function update(Request $request, $page)
    {
        $request->validate([
            'contents' => 'required|array',
            'contents.*.section' => 'required|string',
            'contents.*.key' => 'required|string',
            'contents.*.title' => 'nullable|string',
            'contents.*.content' => 'nullable|string',
        ]);

        // For beranda page, remove old sambutan fields that are no longer needed
        if ($page === 'beranda') {
            $allowedSambutanKeys = ['title', 'foto', 'content', 'nama_kepala'];
            Content::where('page', $page)
                ->where('section', 'sambutan')
                ->whereNotIn('key', $allowedSambutanKeys)
                ->delete();
        }
        
        // For profil page, remove old fields that are no longer needed
        if ($page === 'profil') {
            $allowedKeys = [
                'header' => ['title', 'subtitle'],
                'statistik' => ['luas_value', 'luas_label', 'dpl_value', 'dpl_label', 'curah_hujan_value', 'curah_hujan_label'],
                'sejarah' => ['title', 'content'],
                'visi' => ['title', 'teks', 'deskripsi'],
                'misi' => ['title', 'item1', 'item2', 'item3', 'item4', 'item5'],
                'geografis' => ['title', 'letak_title', 'letak_deskripsi', 'batas_utara', 'batas_selatan', 'batas_timur', 'batas_barat', 'topografi_title', 'topografi_deskripsi', 'ketinggian', 'topografi', 'iklim', 'suhu', 'sda_title', 'sda_jenis_tanah_title', 'sda_jenis_tanah', 'sda_sumber_air_title', 'sda_sumber_air', 'sda_potensi_title', 'sda_potensi'],
            ];
            
            foreach ($allowedKeys as $section => $keys) {
                Content::where('page', $page)
                    ->where('section', $section)
                    ->whereNotIn('key', $keys)
                    ->delete();
            }
        }

        // For pemerintahan page, remove old fields that are no longer needed
        if ($page === 'pemerintahan') {
            $allowedKeys = [
                'header' => ['title', 'subtitle'],
                'struktur' => ['gambar'],
            ];
            
            foreach ($allowedKeys as $section => $keys) {
                Content::where('page', $page)
                    ->where('section', $section)
                    ->whereNotIn('key', $keys)
                    ->delete();
            }
        }

        // For layanan page, remove old fields that are no longer needed
        if ($page === 'layanan') {
            $allowedKeys = [
                'header' => ['title', 'subtitle'],
                'jam' => ['hari_kerja', 'waktu_pelayanan', 'waktu_istirahat'],
            ];
            
            // Allow layanan_1 to layanan_6 with keys: judul, deskripsi, persyaratan, waktu, biaya
            for ($i = 1; $i <= 6; $i++) {
                $allowedKeys['layanan_' . $i] = ['judul', 'deskripsi', 'persyaratan', 'waktu', 'biaya'];
            }
            
            foreach ($allowedKeys as $section => $keys) {
                Content::where('page', $page)
                    ->where('section', $section)
                    ->whereNotIn('key', $keys)
                    ->delete();
            }
        }

        // For data page, remove old fields that are no longer needed
        if ($page === 'data') {
            $allowedKeys = [
                'header' => ['title', 'subtitle'],
            ];
            
            foreach ($allowedKeys as $section => $keys) {
                Content::where('page', $page)
                    ->where('section', $section)
                    ->whereNotIn('key', $keys)
                    ->delete();
            }
            
            // Hapus semua data statistik, wilayah, dan pendidikan
            Content::where('page', $page)
                ->whereIn('section', ['statistik', 'wilayah', 'pendidikan'])
                ->delete();
            
            for ($i = 1; $i <= 7; $i++) {
                Content::where('page', $page)
                    ->where('section', 'pendidikan_' . $i)
                    ->delete();
            }
        }

        // Delete all existing contents for this page first (to handle deletions)
        // Except for pages with specific allowed keys
        if (!in_array($page, ['beranda', 'profil', 'pemerintahan', 'layanan', 'data'])) {
            Content::where('page', $page)->delete();
        }

        // Create/update new contents
        foreach ($request->contents as $contentData) {
            if (!empty($contentData['section']) && !empty($contentData['key'])) {
                // For beranda sambutan, only allow specific keys
                if ($page === 'beranda' && $contentData['section'] === 'sambutan') {
                    $allowedSambutanKeys = ['title', 'foto', 'content', 'nama_kepala'];
                    if (!in_array($contentData['key'], $allowedSambutanKeys)) {
                        continue; // Skip old fields
                    }
                }
                
                // For profil page, only allow specific keys per section
                if ($page === 'profil') {
                    $allowedKeys = [
                        'header' => ['title', 'subtitle'],
                        'statistik' => ['luas_value', 'luas_label', 'dpl_value', 'dpl_label', 'curah_hujan_value', 'curah_hujan_label'],
                        'sejarah' => ['title', 'content'],
                        'visi' => ['title', 'teks', 'deskripsi'],
                        'misi' => ['title', 'item1', 'item2', 'item3', 'item4', 'item5'],
                        'geografis' => ['title', 'letak_title', 'letak_deskripsi', 'batas_utara', 'batas_selatan', 'batas_timur', 'batas_barat', 'topografi_title', 'topografi_deskripsi', 'ketinggian', 'topografi', 'iklim', 'suhu', 'sda_title', 'sda_jenis_tanah_title', 'sda_jenis_tanah', 'sda_sumber_air_title', 'sda_sumber_air', 'sda_potensi_title', 'sda_potensi'],
                    ];
                    
                    if (isset($allowedKeys[$contentData['section']])) {
                        if (!in_array($contentData['key'], $allowedKeys[$contentData['section']])) {
                            continue; // Skip invalid fields
                        }
                    } else {
                        continue; // Skip invalid sections
                    }
                }

                // For pemerintahan page, only allow specific keys per section
                if ($page === 'pemerintahan') {
                    $allowedKeys = [
                        'header' => ['title', 'subtitle'],
                        'struktur' => ['gambar'],
                    ];
                    
                    if (isset($allowedKeys[$contentData['section']])) {
                        if (!in_array($contentData['key'], $allowedKeys[$contentData['section']])) {
                            continue; // Skip invalid fields
                        }
                    } else {
                        continue; // Skip invalid sections
                    }
                }

                // For layanan page, only allow specific keys per section
                if ($page === 'layanan') {
                    $allowedKeys = [
                        'header' => ['title', 'subtitle'],
                        'jam' => ['hari_kerja', 'waktu_pelayanan', 'waktu_istirahat'],
                    ];
                    
                    // Allow layanan_1 to layanan_6 with keys: judul, deskripsi, persyaratan, waktu, biaya
                    for ($i = 1; $i <= 6; $i++) {
                        $allowedKeys['layanan_' . $i] = ['judul', 'deskripsi', 'persyaratan', 'waktu', 'biaya'];
                    }
                    
                    if (isset($allowedKeys[$contentData['section']])) {
                        if (!in_array($contentData['key'], $allowedKeys[$contentData['section']])) {
                            continue; // Skip invalid fields
                        }
                    } else {
                        continue; // Skip invalid sections
                    }
                }

                // For data page, only allow specific keys per section
                if ($page === 'data') {
                    $allowedKeys = [
                        'header' => ['title', 'subtitle'],
                    ];
                    
                    if (isset($allowedKeys[$contentData['section']])) {
                        if (!in_array($contentData['key'], $allowedKeys[$contentData['section']])) {
                            continue; // Skip invalid fields
                        }
                    } else {
                        continue; // Skip invalid sections
                    }
                }
                
                Content::create([
                    'page' => $page,
                    'section' => $contentData['section'],
                    'key' => $contentData['key'],
                    'title' => $contentData['title'] ?? null,
                    'content' => $contentData['content'] ?? null,
                ]);
            }
        }

        return redirect()->route('admin.contents.edit', $page)
            ->with('success', 'Konten berhasil disimpan.');
    }

    /**
     * Upload foto kepala desa
     */
    public function uploadFoto(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        try {
            $file = $request->file('foto');
            $filename = 'kepala-desa-' . time() . '.' . $file->getClientOriginalExtension();
            
            // Ensure images directory exists
            $imagesPath = public_path('images');
            if (!file_exists($imagesPath)) {
                mkdir($imagesPath, 0755, true);
            }
            
            // Move file to public/images
            $file->move($imagesPath, $filename);
            
            return response()->json([
                'success' => true,
                'path' => 'images/' . $filename,
                'filename' => $filename,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal upload gambar: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Upload gambar struktur organisasi
     */
    public function uploadStruktur(Request $request)
    {
        $request->validate([
            'struktur' => 'required|image|mimes:jpeg,jpg,png|max:5120',
        ]);

        try {
            $file = $request->file('struktur');
            $filename = 'struktur-organisasi.' . $file->getClientOriginalExtension();
            
            // Ensure images directory exists
            $imagesPath = public_path('images');
            if (!file_exists($imagesPath)) {
                mkdir($imagesPath, 0755, true);
            }
            
            // Hapus file lama jika ada
            $oldFiles = glob($imagesPath . '/struktur-organisasi.*');
            foreach ($oldFiles as $oldFile) {
                if (is_file($oldFile)) {
                    unlink($oldFile);
                }
            }
            
            // Move file to public/images
            $file->move($imagesPath, $filename);
            
            return response()->json([
                'success' => true,
                'path' => 'images/' . $filename,
                'filename' => $filename,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal upload gambar: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get default content structure for a page
     */
    private function getDefaultContents($page)
    {
        $defaults = [
            'beranda' => [
                ['section' => 'hero', 'key' => 'title', 'title' => 'Judul Hero', 'content' => 'Website Resmi Pemerintah Desa'],
                ['section' => 'hero', 'key' => 'subtitle', 'title' => 'Subtitle Hero', 'content' => 'Media resmi untuk menyampaikan informasi, kebijakan, dan layanan publik yang transparan dan akuntabel'],
            ],
            // Add more defaults as needed
        ];

        return $defaults[$page] ?? [];
    }
}
