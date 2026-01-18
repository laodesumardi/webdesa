@extends('admin.layouts.app')

@section('title', 'Data Penduduk')

@section('content')
<div class="p-4 sm:p-6 md:p-8">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Data Penduduk</h1>
            <p class="text-gray-600 text-sm sm:text-base">Kelola data penduduk desa</p>
        </div>
        <a href="{{ route('admin.penduduk.create') }}" class="bg-[#1e3a8a] text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition-colors text-sm font-medium flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Penduduk
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-gray-900">No</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-900">NIK</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-900">Nama</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-900">Tempat, Tgl Lahir</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-900">Jenis Kelamin</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-900">Alamat</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-900">RT/RW</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-900">Pendidikan</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-900">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penduduk as $index => $p)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $penduduk->firstItem() + $index }}</td>
                            <td class="px-4 py-3">{{ $p->nik }}</td>
                            <td class="px-4 py-3 font-medium">{{ $p->nama }}</td>
                            <td class="px-4 py-3">{{ $p->tempat_lahir }}, {{ \Carbon\Carbon::parse($p->tanggal_lahir)->format('d M Y') }}</td>
                            <td class="px-4 py-3">{{ $p->jenis_kelamin }}</td>
                            <td class="px-4 py-3">{{ $p->alamat }}</td>
                            <td class="px-4 py-3">{{ $p->rt }}/{{ $p->rw }}</td>
                            <td class="px-4 py-3">{{ $p->pendidikan ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.penduduk.edit', $p->id) }}" class="text-blue-600 hover:text-blue-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.penduduk.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-4 py-8 text-center text-gray-500">
                                Belum ada data penduduk. <a href="{{ route('admin.penduduk.create') }}" class="text-[#1e3a8a] hover:underline">Tambah data pertama</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($penduduk->hasPages())
            <div class="px-4 py-3 border-t border-gray-200">
                {{ $penduduk->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
