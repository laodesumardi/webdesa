<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Helpers\ImageHelper;
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

        // For beranda page, clean up and delete all existing allowed sections before re-creating
        if ($page === 'beranda') {
            $allowedSections = [
                'header_website',
                'sambutan',
                'hero',
                'statistik',
                'berita',
                'galeri',
                'akses_cepat',
            ];
            
            // Delete all contents for allowed sections (will be recreated)
            Content::where('page', $page)
                ->whereIn('section', $allowedSections)
                ->delete();
        }
        
        // For profil page, delete all existing contents before re-creating
        if ($page === 'profil') {
            $allowedSections = ['header', 'statistik', 'sejarah', 'visi', 'misi', 'geografis'];
            Content::where('page', $page)
                ->whereIn('section', $allowedSections)
                ->delete();
        }

        // For pemerintahan page, delete all existing contents before re-creating
        if ($page === 'pemerintahan') {
            $allowedSections = ['header', 'struktur'];
            Content::where('page', $page)
                ->whereIn('section', $allowedSections)
                ->delete();
        }

        // For layanan page, delete all existing contents before re-creating
        if ($page === 'layanan') {
            $allowedSections = ['header', 'jam', 'layanan_1', 'layanan_2', 'layanan_3', 'layanan_4', 'layanan_5', 'layanan_6'];
            Content::where('page', $page)
                ->whereIn('section', $allowedSections)
                ->delete();
        }

        // For data page, delete all existing contents before re-creating
        if ($page === 'data') {
            Content::where('page', $page)->delete();
        }

        // For kontak page, delete all existing contents before re-creating
        if ($page === 'kontak') {
            $allowedSections = ['header', 'alamat', 'telepon', 'jam', 'perangkat', 'peta'];
            Content::where('page', $page)
                ->whereIn('section', $allowedSections)
                ->delete();
        }

        // Delete all existing contents for this page first (to handle deletions)
        // Except for pages with specific allowed keys
        if (!in_array($page, ['beranda', 'profil', 'pemerintahan', 'layanan', 'data', 'kontak'])) {
            Content::where('page', $page)->delete();
        }

        // Create/update new contents
        foreach ($request->contents as $contentData) {
            if (!empty($contentData['section']) && !empty($contentData['key'])) {
                // For beranda page, only allow specific keys per section
                if ($page === 'beranda') {
                    $allowedKeys = [
                        'header_website' => ['nama_desa', 'subtitle'],
                        'sambutan' => ['title', 'foto', 'content', 'nama_kepala'],
                        'hero' => ['slide1_badge', 'slide1_title', 'slide1_subtitle', 'slide2_badge', 'slide2_title', 'slide2_subtitle', 'slide3_badge', 'slide3_title', 'slide3_subtitle'],
                        'statistik' => ['title', 'subtitle'],
                        'berita' => ['title', 'subtitle'],
                        'galeri' => ['title', 'subtitle'],
                        'akses_cepat' => ['title', 'subtitle'],
                    ];
                    
                    if (isset($allowedKeys[$contentData['section']])) {
                        if (!in_array($contentData['key'], $allowedKeys[$contentData['section']])) {
                            continue; // Skip invalid fields
                        }
                    } else {
                        continue; // Skip invalid sections
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

                // For kontak page, only allow specific keys per section
                if ($page === 'kontak') {
                    $allowedKeys = [
                        'header' => ['title', 'subtitle'],
                        'alamat' => ['nama_kantor', 'alamat_lengkap'],
                        'telepon' => ['telepon', 'fax', 'email'],
                        'jam' => ['hari_kerja', 'waktu', 'istirahat', 'hari_libur'],
                        'perangkat' => ['jabatan_1', 'telepon_1', 'jabatan_2', 'telepon_2', 'jabatan_3', 'telepon_3'],
                        'peta' => ['embed_url'],
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
     * Saves to public/images/
     */
    public function uploadFoto(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        try {
            $file = $request->file('foto');
            $filename = 'kepala-desa-' . time() . '.' . $file->getClientOriginalExtension();
            
            // Get images path from helper
            $imagesPath = ImageHelper::getImagesPath();
            
            // Move file to public/images/
            $file->move($imagesPath, $filename);
            
            // Verify file was uploaded
            if (!file_exists($imagesPath . DIRECTORY_SEPARATOR . $filename)) {
                throw new \Exception('File gagal disimpan ke server');
            }
            
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
     * Saves to public/images/
     */
    public function uploadStruktur(Request $request)
    {
        $request->validate([
            'struktur' => 'required|image|mimes:jpeg,jpg,png|max:5120',
        ]);

        try {
            $file = $request->file('struktur');
            $filename = 'struktur-organisasi.' . $file->getClientOriginalExtension();
            
            // Delete old images with same basename
            ImageHelper::deleteOldImages('struktur-organisasi');
            
            // Get images path and move file
            $imagesPath = ImageHelper::getImagesPath();
            $file->move($imagesPath, $filename);
            
            // Verify file was uploaded
            if (!file_exists($imagesPath . DIRECTORY_SEPARATOR . $filename)) {
                throw new \Exception('File gagal disimpan ke server');
            }
            
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
     * Upload gambar hero slider
     * Saves to public/images/
     */
    public function uploadHero(Request $request)
    {
        $request->validate([
            'hero' => 'required|image|mimes:jpeg,jpg,png,webp|max:5120',
            'slide' => 'required|in:1,2,3',
        ]);

        try {
            $file = $request->file('hero');
            $slide = $request->input('slide');
            $extension = $file->getClientOriginalExtension();
            $filename = 'hero-' . $slide . '.' . $extension;
            
            // Delete old images with same basename
            ImageHelper::deleteOldImages('hero-' . $slide);
            
            // Get images path and move file
            $imagesPath = ImageHelper::getImagesPath();
            $file->move($imagesPath, $filename);
            
            // Verify file was uploaded
            if (!file_exists($imagesPath . DIRECTORY_SEPARATOR . $filename)) {
                throw new \Exception('File gagal disimpan ke server');
            }
            
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
     * Upload gambar header background
     * Saves to public/images/
     */
    public function uploadHeaderBg(Request $request)
    {
        $request->validate([
            'header_bg' => 'required|image|mimes:jpeg,jpg,png,webp|max:5120',
        ]);

        try {
            $file = $request->file('header_bg');
            $extension = $file->getClientOriginalExtension();
            $filename = 'header-bg.' . $extension;
            
            // Delete old images with same basename
            ImageHelper::deleteOldImages('header-bg');
            
            // Get images path and move file
            $imagesPath = ImageHelper::getImagesPath();
            $file->move($imagesPath, $filename);
            
            // Verify file was uploaded
            if (!file_exists($imagesPath . DIRECTORY_SEPARATOR . $filename)) {
                throw new \Exception('File gagal disimpan ke server');
            }
            
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
