<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penduduk = Penduduk::orderBy('nama')->paginate(20);
        return view('admin.penduduk.index', compact('penduduk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.penduduk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|size:16|unique:penduduk,nik',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'rt' => 'required|numeric|min:1|max:999',
            'rw' => 'required|numeric|min:1|max:999',
            'pendidikan' => 'nullable|string|max:255',
        ]);

        // Normalisasi RT dan RW: pad dengan leading zero untuk konsistensi (1 menjadi 001)
        $data = $request->all();
        $data['rt'] = str_pad((string)intval($data['rt']), 3, '0', STR_PAD_LEFT);
        $data['rw'] = str_pad((string)intval($data['rw']), 3, '0', STR_PAD_LEFT);

        Penduduk::create($data);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Data penduduk berhasil ditambahkan.'
            ]);
        }

        return redirect()->route('admin.penduduk.index')
            ->with('success', 'Data penduduk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penduduk = Penduduk::findOrFail($id);
        return view('admin.penduduk.show', compact('penduduk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penduduk = Penduduk::findOrFail($id);
        return view('admin.penduduk.edit', compact('penduduk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $penduduk = Penduduk::findOrFail($id);

        $request->validate([
            'nik' => 'required|string|size:16|unique:penduduk,nik,' . $id,
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'rt' => 'required|numeric|min:1|max:999',
            'rw' => 'required|numeric|min:1|max:999',
            'pendidikan' => 'nullable|string|max:255',
        ]);

        // Normalisasi RT dan RW: pad dengan leading zero untuk konsistensi (1 menjadi 001)
        $data = $request->all();
        $data['rt'] = str_pad((string)intval($data['rt']), 3, '0', STR_PAD_LEFT);
        $data['rw'] = str_pad((string)intval($data['rw']), 3, '0', STR_PAD_LEFT);

        $penduduk->update($data);

        return redirect()->route('admin.penduduk.index')
            ->with('success', 'Data penduduk berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->delete();

        return redirect()->route('admin.penduduk.index')
            ->with('success', 'Data penduduk berhasil dihapus.');
    }
}
