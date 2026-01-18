@extends('admin.layouts.app')

@section('title', 'Kelola Konten')

@section('content')
<div class="p-4 sm:p-6 md:p-8">
    <!-- Header -->
    <div class="mb-6 sm:mb-8">
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-2">Kelola Konten</h1>
        <p class="text-gray-600 text-sm sm:text-base">Kelola konten dan teks di setiap halaman website</p>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert">
            <p class="font-bold">{{ session('success') }}</p>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded" role="alert">
            <p class="font-bold">{{ session('error') }}</p>
        </div>
    @endif

    <!-- Pages Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
        @foreach($pages as $pageKey => $pageName)
            <a href="{{ route('admin.contents.edit', $pageKey) }}" class="group bg-white rounded-lg shadow-md hover:shadow-xl transition-all border border-gray-200 hover:border-[#1e3a8a] overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-[#1e3a8a]/10 p-3 rounded-lg group-hover:bg-[#1e3a8a] transition-colors">
                            <svg class="w-6 h-6 text-[#1e3a8a] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">
                            {{ isset($contents[$pageKey]) ? count($contents[$pageKey]) : 0 }} konten
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-[#1e3a8a] transition-colors">
                        {{ $pageName }}
                    </h3>
                    <p class="text-sm text-gray-600 text-sm">
                        Edit konten dan teks di halaman {{ $pageName }}
                    </p>
                </div>
                <div class="bg-gray-50 px-6 py-3 border-t border-gray-200 group-hover:bg-[#1e3a8a] transition-colors">
                    <div class="flex items-center justify-between text-sm font-medium text-gray-600 group-hover:text-white">
                        <span>Kelola Konten</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
