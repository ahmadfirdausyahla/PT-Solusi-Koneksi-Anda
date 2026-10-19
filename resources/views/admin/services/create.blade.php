@extends('layouts.admin')

@section('title', 'Tambah Layanan - Admin Panel')

@section('content')
<div class="max-w-3xl mx-auto space-y-6" data-aos="fade-up">
    <div class="flex items-center justify-between bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <h1 class="text-xl font-bold text-slate-900">Tambah Layanan IoT Baru</h1>
            <p class="text-xs text-slate-500 mt-0.5">Form penambahan layanan dan tarif solusi perusahaan.</p>
        </div>
        <a href="{{ route('admin.services.index') }}" class="text-xs font-semibold text-slate-600 hover:text-blue-600">&larr; Kembali</a>
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

    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-2">Nama Layanan</label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Smart Building Automation" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs text-slate-800 focus:outline-none focus:border-blue-600">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-2">Harga (Maks. 999.999.999)</label>
                <input type="number" name="price" value="{{ old('price') }}" required max="999999999" placeholder="Contoh: 5000000" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs text-slate-800 focus:outline-none focus:border-blue-600">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-2">Status Layanan</label>
            <select name="status" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs text-slate-800 focus:outline-none focus:border-blue-600">
                <option value="1">Aktif (Tampil di Website)</option>
                <option value="0">Nonaktif (Disembunyikan)</option>
            </select>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-2">Gambar / Ilustrasi Layanan</label>
            <input type="file" name="image" accept="image/*" onchange="previewServiceImage(event)" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
            <div class="mt-4">
                <img id="service-preview" class="hidden w-full max-h-64 object-cover rounded-2xl border border-slate-200 shadow-sm">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-2">Deskripsi Layanan</label>
            <textarea name="description" rows="5" required placeholder="Jelaskan detail spesifikasi layanan ini..." class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 text-xs text-slate-800 focus:outline-none focus:border-blue-600">{{ old('description') }}</textarea>
        </div>

        <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
            <a href="{{ route('admin.services.index') }}" class="px-6 py-3 rounded-2xl text-xs font-semibold bg-slate-100 text-slate-600 hover:bg-slate-200 transition-colors">Batal</a>
            <button type="submit" class="px-6 py-3 rounded-2xl text-xs font-semibold bg-blue-600 text-white hover:bg-blue-700 transition-colors shadow-sm">Simpan Layanan</button>
        </div>
    </form>
</div>

<script>
    function previewServiceImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('service-preview');
            output.src = reader.result;
            output.classList.remove('hidden');
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection