<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerangkatDesa;
use Illuminate\Http\Request;

class PerangkatDesaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jabatan' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'urutan' => 'nullable|integer',
        ]);

        $data = [
            'jabatan' => $request->jabatan,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'urutan' => $request->urutan ?? 0,
        ];

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = 'perangkat-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            $imagesPath = public_path('images');
            if (!file_exists($imagesPath)) {
                mkdir($imagesPath, 0755, true);
            }
            
            $file->move($imagesPath, $filename);
            $data['foto'] = 'images/' . $filename;
        }

        $perangkat = PerangkatDesa::create($data);

        return response()->json([
            'success' => true, 
            'message' => 'Perangkat desa berhasil ditambahkan.',
            'perangkat' => $perangkat
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $perangkat = PerangkatDesa::findOrFail($id);

        $request->validate([
            'jabatan' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'urutan' => 'nullable|integer',
        ]);

        // Handle NIP - opsional, jika kosong atau hanya whitespace, set ke null
        $nip = $request->input('nip');
        if ($nip !== null && $nip !== '') {
            $nip = trim($nip);
            // Jika setelah trim masih kosong, set ke null
            $nip = $nip === '' ? null : $nip;
        } else {
            $nip = null;
        }
        
        $data = [
            'jabatan' => $request->jabatan,
            'nama' => $request->nama,
            'nip' => $nip,
            'urutan' => $request->urutan ?? $perangkat->urutan,
        ];

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($perangkat->foto && file_exists(public_path($perangkat->foto))) {
                unlink(public_path($perangkat->foto));
            }

            $file = $request->file('foto');
            $filename = 'perangkat-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            $imagesPath = public_path('images');
            if (!file_exists($imagesPath)) {
                mkdir($imagesPath, 0755, true);
            }
            
            $file->move($imagesPath, $filename);
            $data['foto'] = 'images/' . $filename;
        }

        $perangkat->update($data);
        $perangkat->refresh(); // Refresh untuk mendapatkan data terbaru

        return response()->json([
            'success' => true, 
            'message' => 'Perangkat desa berhasil diupdate.',
            'perangkat' => [
                'id' => $perangkat->id,
                'jabatan' => $perangkat->jabatan,
                'nama' => $perangkat->nama,
                'nip' => $perangkat->nip,
                'foto' => $perangkat->foto,
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $perangkat = PerangkatDesa::findOrFail($id);

        // Hapus foto jika ada
        if ($perangkat->foto && file_exists(public_path($perangkat->foto))) {
            unlink(public_path($perangkat->foto));
        }

        $perangkat->delete();

        return response()->json(['success' => true, 'message' => 'Perangkat desa berhasil dihapus.']);
    }
}
