<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    /**
     * Display a listing of pengaduan.
     */
    public function index(Request $request)
    {
        $query = Pengaduan::latest();

        // Filter by status
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Filter by kategori
        if ($request->has('kategori') && $request->kategori !== 'all') {
            $query->where('kategori', $request->kategori);
        }

        // Search
        if ($request->has('search') && $request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('isi', 'like', '%' . $request->search . '%');
            });
        }

        $pengaduan = $query->paginate(15)->withQueryString();
        $kategoriList = Pengaduan::getKategori();

        // Stats
        $stats = [
            'masuk' => Pengaduan::where('status', 'masuk')->count(),
            'diproses' => Pengaduan::where('status', 'diproses')->count(),
            'selesai' => Pengaduan::where('status', 'selesai')->count(),
            'ditolak' => Pengaduan::where('status', 'ditolak')->count(),
        ];

        return view('admin.pengaduan.index', compact('pengaduan', 'kategoriList', 'stats'));
    }

    /**
     * Display the specified pengaduan.
     */
    public function show(Pengaduan $pengaduan)
    {
        $kategoriList = Pengaduan::getKategori();
        return view('admin.pengaduan.show', compact('pengaduan', 'kategoriList'));
    }

    /**
     * Update the status of pengaduan.
     */
    public function updateStatus(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'status' => 'required|in:masuk,diproses,selesai,ditolak',
            'tanggapan' => 'nullable|string|max:2000',
        ]);

        $pengaduan->update([
            'status' => $request->status,
            'tanggapan' => $request->tanggapan,
            'user_id' => Auth::id(),
            'ditanggapi_at' => now(),
        ]);

        return redirect()->route('admin.pengaduan.show', $pengaduan->id)
            ->with('success', 'Status pengaduan berhasil diperbarui!');
    }

    /**
     * Remove the specified pengaduan.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        // Delete lampiran if exists
        if ($pengaduan->lampiran) {
            $filePath = public_path('uploads/pengaduan/' . $pengaduan->lampiran);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $pengaduan->delete();

        return redirect()->route('admin.pengaduan.index')
            ->with('success', 'Pengaduan berhasil dihapus!');
    }
}
