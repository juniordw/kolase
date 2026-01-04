@extends('admin.layout')

@section('title', 'Tambah Layanan Baru')
@section('header_title', 'Tambah Layanan Baru')

@section('content')
{{-- Breadcrumb --}}
<div class="mb-6">
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.services.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-rose-600">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                    Layanan
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Tambah Baru</span>
                </div>
            </li>
        </ol>
    </nav>
</div>

{{-- Form Card --}}
<div class="bg-gradient-to-br from-rose-50 to-pink-50 rounded-2xl p-1 mb-8">
    <div class="bg-white rounded-xl p-8">
        <div class="flex items-center mb-6">
            <div class="w-12 h-12 bg-rose-100 rounded-xl flex items-center justify-center mr-4">
                <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Tambah Layanan Baru</h2>
                <p class="text-sm text-gray-600 mt-1">Isi formulir di bawah untuk menambahkan layanan baru</p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.services._form')
        </form>
    </div>
</div>

{{-- Help Section --}}
<div class="bg-blue-50 border-l-4 border-blue-400 p-6 rounded-lg">
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div class="ml-3">
            <h3 class="text-sm font-semibold text-blue-800">Tips Menambah Layanan</h3>
            <div class="mt-2 text-sm text-blue-700">
                <ul class="list-disc list-inside space-y-1">
                    <li>Pastikan nama layanan jelas dan mudah dipahami</li>
                    <li>Gunakan deskripsi yang informatif dan menarik</li>
                    <li>Atur harga dan durasi dengan tepat</li>
                    <li>Pilih tipe layanan yang tersedia (kunjungan rumah, klinik, atau online)</li>
                    <li>Gunakan fitur SEO untuk meningkatkan visibilitas di mesin pencari</li>
                    <li>Tandai sebagai "Unggulan" untuk menampilkan di halaman utama</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
