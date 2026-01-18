@extends('admin.layouts.app')

@section('title', 'Tambah Data Penduduk')

@section('content')
<div class="p-4 sm:p-6 md:p-8">
    <div class="mb-6">
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Tambah Data Penduduk</h1>
        <p class="text-gray-600 text-sm sm:text-base">Isi form di bawah ini untuk menambahkan data penduduk baru</p>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 md:p-8">
        <form action="{{ route('admin.penduduk.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">NIK <span class="text-red-600">*</span></label>
                    <input type="text" name="nik" value="{{ old('nik') }}" required maxlength="16" pattern="[0-9]{16}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                        placeholder="Masukkan NIK (16 digit)">
                    @error('nik')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap <span class="text-red-600">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama') }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                        placeholder="Masukkan nama lengkap">
                    @error('nama')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tempat Lahir <span class="text-red-600">*</span></label>
                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                        placeholder="Masukkan tempat lahir">
                    @error('tempat_lahir')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir <span class="text-red-600">*</span></label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white">
                    @error('tanggal_lahir')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kelamin <span class="text-red-600">*</span></label>
                    <select name="jenis_kelamin" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">RT <span class="text-red-600">*</span></label>
                    <input type="number" name="rt" value="{{ old('rt') }}" required min="1" max="999"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                        placeholder="Masukkan nomor RT (contoh: 1, 2, 3)">
                    <p class="text-xs text-gray-500 mt-1">Format akan otomatis dinormalisasi (1 menjadi 001)</p>
                    @error('rt')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">RW <span class="text-red-600">*</span></label>
                    <input type="number" name="rw" value="{{ old('rw') }}" required min="1" max="999"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                        placeholder="Masukkan nomor RW (contoh: 1, 2, 3)">
                    <p class="text-xs text-gray-500 mt-1">Format akan otomatis dinormalisasi (1 menjadi 001)</p>
                    @error('rw')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Tingkat Pendidikan</label>
                <select name="pendidikan"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white">
                    <option value="">Pilih Tingkat Pendidikan</option>
                    <option value="Tidak Sekolah" {{ old('pendidikan') == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                    <option value="SD/Sederajat" {{ old('pendidikan') == 'SD/Sederajat' ? 'selected' : '' }}>SD/Sederajat</option>
                    <option value="SMP/Sederajat" {{ old('pendidikan') == 'SMP/Sederajat' ? 'selected' : '' }}>SMP/Sederajat</option>
                    <option value="SMA/Sederajat" {{ old('pendidikan') == 'SMA/Sederajat' ? 'selected' : '' }}>SMA/Sederajat</option>
                    <option value="Diploma" {{ old('pendidikan') == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                    <option value="S1/Sederajat" {{ old('pendidikan') == 'S1/Sederajat' ? 'selected' : '' }}>S1/Sederajat</option>
                    <option value="S2/Sederajat" {{ old('pendidikan') == 'S2/Sederajat' ? 'selected' : '' }}>S2/Sederajat</option>
                </select>
                @error('pendidikan')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat <span class="text-red-600">*</span></label>
                <textarea name="alamat" rows="3" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] text-base text-gray-900 bg-white"
                    placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-8 flex items-center gap-4">
                <button type="submit" class="bg-[#1e3a8a] text-white px-6 py-3 rounded-lg hover:bg-blue-900 transition-colors text-sm font-medium">
                    Simpan Data
                </button>
                <a href="{{ route('admin.penduduk.index') }}" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors text-sm font-medium">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
