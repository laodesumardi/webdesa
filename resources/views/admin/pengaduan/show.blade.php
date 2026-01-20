@extends('admin.layouts.app')

@section('title', 'Detail Pengaduan')

@section('content')
<div class="p-4 sm:p-6 lg:p-8">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.pengaduan.index') }}" class="p-2 text-gray-500 hover:bg-gray-100 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detail Pengaduan</h1>
                <p class="text-gray-600">{{ $pengaduan->created_at->translatedFormat('d F Y, H:i') }}</p>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
        <span class="text-green-800">{{ session('success') }}</span>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Detail Pengaduan -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-start justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-900">{{ $pengaduan->judul }}</h2>
                    <span class="px-3 py-1 text-sm font-medium rounded-full 
                        @if($pengaduan->status === 'masuk') bg-yellow-100 text-yellow-700
                        @elseif($pengaduan->status === 'diproses') bg-blue-100 text-blue-700
                        @elseif($pengaduan->status === 'selesai') bg-green-100 text-green-700
                        @else bg-red-100 text-red-700
                        @endif">{{ $pengaduan->status_label }}</span>
                </div>
                <span class="inline-block px-2 py-1 text-xs font-medium rounded bg-gray-100 text-gray-600 mb-4">{{ $kategoriList[$pengaduan->kategori] ?? $pengaduan->kategori }}</span>
                <div class="prose max-w-none text-gray-700">
                    {!! nl2br(e($pengaduan->isi)) !!}
                </div>
                @if($pengaduan->lampiran)
                <div class="mt-4 p-3 bg-gray-50 rounded-lg">
                    <p class="text-sm font-medium text-gray-700 mb-2">Lampiran:</p>
                    <a href="{{ asset('uploads/pengaduan/' . $pengaduan->lampiran) }}" target="_blank" class="text-blue-600 hover:underline text-sm">{{ $pengaduan->lampiran }}</a>
                </div>
                @endif
            </div>

            <!-- Tanggapan -->
            @if($pengaduan->tanggapan)
            <div class="bg-green-50 border border-green-200 rounded-xl p-6">
                <h3 class="font-semibold text-green-800 mb-2">Tanggapan Admin</h3>
                <p class="text-green-700">{!! nl2br(e($pengaduan->tanggapan)) !!}</p>
                @if($pengaduan->ditanggapi_at)
                <p class="text-xs text-green-600 mt-3">Ditanggapi pada {{ $pengaduan->ditanggapi_at->translatedFormat('d F Y, H:i') }}</p>
                @endif
            </div>
            @endif

            <!-- Form Update Status -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="font-semibold text-gray-900 mb-4">Update Status & Tanggapan</h3>
                <form action="{{ route('admin.pengaduan.update-status', $pengaduan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                <option value="masuk" {{ $pengaduan->status === 'masuk' ? 'selected' : '' }}>Masuk</option>
                                <option value="diproses" {{ $pengaduan->status === 'diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="selesai" {{ $pengaduan->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="ditolak" {{ $pengaduan->status === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggapan</label>
                            <textarea name="tanggapan" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Tulis tanggapan untuk pengaduan ini...">{{ $pengaduan->tanggapan }}</textarea>
                        </div>
                        <button type="submit" class="px-6 py-2 bg-[#1e3a8a] text-white rounded-lg hover:bg-blue-800">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar - Info Pengirim -->
        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="font-semibold text-gray-900 mb-4">Informasi Pengirim</h3>
                <div class="space-y-3">
                    <div>
                        <p class="text-xs text-gray-500">Nama Lengkap</p>
                        <p class="font-medium text-gray-900">{{ $pengaduan->nama }}</p>
                    </div>
                    @if($pengaduan->nik)
                    <div>
                        <p class="text-xs text-gray-500">NIK</p>
                        <p class="font-medium text-gray-900">{{ $pengaduan->nik }}</p>
                    </div>
                    @endif
                    <div>
                        <p class="text-xs text-gray-500">Telepon</p>
                        <a href="tel:{{ $pengaduan->telepon }}" class="font-medium text-blue-600 hover:underline">{{ $pengaduan->telepon }}</a>
                    </div>
                    @if($pengaduan->email)
                    <div>
                        <p class="text-xs text-gray-500">Email</p>
                        <a href="mailto:{{ $pengaduan->email }}" class="font-medium text-blue-600 hover:underline">{{ $pengaduan->email }}</a>
                    </div>
                    @endif
                    @if($pengaduan->alamat)
                    <div>
                        <p class="text-xs text-gray-500">Alamat</p>
                        <p class="text-gray-900">{{ $pengaduan->alamat }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="bg-red-50 border border-red-200 rounded-xl p-6">
                <h3 class="font-semibold text-red-800 mb-2">Hapus Pengaduan</h3>
                <p class="text-xs text-red-600 mb-4">Tindakan ini tidak dapat dibatalkan.</p>
                <form action="{{ route('admin.pengaduan.destroy', $pengaduan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengaduan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 text-sm">Hapus Pengaduan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
