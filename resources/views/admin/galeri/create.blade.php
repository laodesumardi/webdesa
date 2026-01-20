@extends('admin.layouts.app')

@section('title', 'Tambah Foto Galeri')

@section('content')
<div class="p-4 sm:p-6 lg:p-8">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center gap-4 mb-4">
            <a href="{{ route('admin.galeri.index') }}" class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Tambah Foto Galeri</h1>
                <p class="text-gray-600">Upload foto baru untuk galeri website desa</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Gambar Upload -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-4">Upload Gambar <span class="text-red-500">*</span></label>
                    
                    <div id="upload-area" class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-blue-500 transition-colors cursor-pointer">
                        <input type="file" name="gambar" id="gambar" accept="image/*" class="hidden" required onchange="previewGambar(event)">
                        
                        <div id="upload-placeholder">
                            <svg class="w-12 h-12 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-gray-600 mb-2">Klik untuk memilih gambar atau drag & drop</p>
                            <p class="text-xs text-gray-500">Format: JPG, PNG, WebP. Maksimal 5MB</p>
                        </div>
                        
                        <div id="preview-container" class="hidden">
                            <img id="gambar-preview" src="" alt="Preview" class="max-h-64 mx-auto rounded-lg mb-4">
                            <p id="gambar-filename" class="text-sm text-gray-600"></p>
                            <button type="button" onclick="removePreview()" class="mt-2 text-sm text-red-600 hover:underline">Hapus gambar</button>
                        </div>
                    </div>
                    
                    @error('gambar')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Judul & Deskripsi -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-4">
                    <div>
                        <label for="judul" class="block text-sm font-semibold text-gray-700 mb-2">Judul Foto <span class="text-red-500">*</span></label>
                        <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Contoh: Kegiatan Gotong Royong">
                        @error('judul')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis deskripsi singkat tentang foto ini (opsional)...">{{ old('deskripsi') }}</textarea>
                        <p class="text-xs text-gray-500 mt-1">Maksimal 1000 karakter</p>
                        @error('deskripsi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Options -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-sm font-semibold text-gray-700 mb-4">Opsi Publikasi</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="published" {{ old('status', 'published') === 'published' ? 'selected' : '' }}>Published</option>
                                <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>

                        <div>
                            <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                            <select name="kategori" id="kategori" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @foreach($kategoriList as $key => $label)
                                <option value="{{ $key }}" {{ old('kategori', 'umum') === $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="urutan" class="block text-sm font-medium text-gray-700 mb-1">Urutan</label>
                            <input type="number" name="urutan" id="urutan" value="{{ old('urutan', 0) }}" min="0"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <p class="text-xs text-gray-500 mt-1">Angka kecil tampil lebih dulu</p>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="space-y-3">
                        <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-[#1e3a8a] text-white rounded-lg hover:bg-blue-800 transition-colors font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Simpan Foto
                        </button>
                        <a href="{{ route('admin.galeri.index') }}" class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors font-medium">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
const uploadArea = document.getElementById('upload-area');
const fileInput = document.getElementById('gambar');

uploadArea.addEventListener('click', () => fileInput.click());

uploadArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    uploadArea.classList.add('border-blue-500', 'bg-blue-50');
});

uploadArea.addEventListener('dragleave', () => {
    uploadArea.classList.remove('border-blue-500', 'bg-blue-50');
});

uploadArea.addEventListener('drop', (e) => {
    e.preventDefault();
    uploadArea.classList.remove('border-blue-500', 'bg-blue-50');
    if (e.dataTransfer.files.length) {
        fileInput.files = e.dataTransfer.files;
        previewGambar({ target: fileInput });
    }
});

function previewGambar(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('upload-placeholder').classList.add('hidden');
            document.getElementById('preview-container').classList.remove('hidden');
            document.getElementById('gambar-preview').src = e.target.result;
            document.getElementById('gambar-filename').textContent = file.name;
        };
        reader.readAsDataURL(file);
    }
}

function removePreview() {
    document.getElementById('gambar').value = '';
    document.getElementById('upload-placeholder').classList.remove('hidden');
    document.getElementById('preview-container').classList.add('hidden');
    document.getElementById('gambar-preview').src = '';
    document.getElementById('gambar-filename').textContent = '';
}
</script>
@endsection
