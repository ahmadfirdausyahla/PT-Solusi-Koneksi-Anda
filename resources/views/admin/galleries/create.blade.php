@extends('layouts.admin')

@section('title', 'Tambah Galeri - Admin Panel')

@section('content')
<div class="max-w-3xl mx-auto space-y-6" data-aos="fade-up">
    <div class="flex items-center justify-between bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <h1 class="text-xl font-bold text-slate-900">Tambah Dokumentasi Galeri</h1>
            <p class="text-xs text-slate-500 mt-0.5">Unggah foto dokumentasi proyek lapangan dan instalasi IoT.</p>
        </div>
        <a href="{{ route('admin.galleries.index') }}" class="text-xs font-semibold text-slate-600 hover:text-blue-600">&larr; Kembali</a>
    </div>

    @if($errors->any())
        <div class="p-4 bg-rose-50 border border-rose-200 text-rose-700 text-xs rounded-2xl">
            <ul class="list-disc pl-4 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-6">
        @csrf

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-2">Judul / Keterangan Foto</label>
            <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Pemasangan Sensor IoT Pabrik Cikarang" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs text-slate-800 focus:outline-none focus:border-blue-600">
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-2">Status</label>
            <select name="status" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs text-slate-800 focus:outline-none focus:border-blue-600">
                <option value="active">Active (Tampil)</option>
                <option value="inactive">Inactive (Disembunyikan)</option>
            </select>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-2">File Foto Dokumentasi</label>
            <input type="file" name="image" accept="image/*" required onchange="previewGalleryImage(event)" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
            <div class="mt-4">
                <img id="gallery-preview" class="hidden w-full max-h-72 object-cover rounded-2xl border border-slate-200 shadow-sm">
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
            <a href="{{ route('admin.galleries.index') }}" class="px-6 py-3 rounded-2xl text-xs font-semibold bg-slate-100 text-slate-600 hover:bg-slate-200 transition-colors">Batal</a>
            <button type="submit" class="px-6 py-3 rounded-2xl text-xs font-semibold bg-blue-600 text-white hover:bg-blue-700 transition-colors shadow-sm">Simpan Galeri</button>
        </div>
    </form>
</div>

<script>
    function previewGalleryImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('gallery-preview');
            output.src = reader.result;
            output.classList.remove('hidden');
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection