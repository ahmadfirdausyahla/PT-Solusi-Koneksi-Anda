@extends('layouts.admin')

@section('title', 'Kelola Profil Perusahaan - Admin Panel')

@section('content')
<div class="max-w-4xl mx-auto space-y-6" data-aos="fade-up">
    <!-- Header -->
    <div class="flex justify-between items-center bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <h1 class="text-xl font-bold text-slate-900">Kelola Profil Perusahaan</h1>
            <p class="text-xs text-slate-500 mt-0.5">Perbarui informasi, sejarah, foto, visi, dan misi perusahaan.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold rounded-2xl">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-6">
        @csrf
        @method('PUT')

        <!-- Judul Utama -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-2">Judul Utama / Tagline Profil</label>
            <input type="text" name="title" value="{{ old('title', $profile->title ?? 'Pelopor Inovasi IoT, Robotika, dan Kecerdasan Buatan di Indonesia') }}" required class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs text-slate-800 focus:outline-none focus:border-blue-600 focus:bg-white transition-all">
        </div>

        <!-- Sejarah / Deskripsi -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-2">Sejarah / Profil Perusahaan</label>
            <textarea name="history" rows="4" required class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 text-xs text-slate-800 focus:outline-none focus:border-blue-600 focus:bg-white transition-all">{{ old('history', $profile->history) }}</textarea>
        </div>

        <!-- Foto Utama Profil dengan Live Preview -->
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-2">Foto / Banner Perusahaan</label>
            
            <!-- Preview Container -->
            <div class="mb-3 w-48 h-28 rounded-2xl overflow-hidden border border-slate-200 bg-slate-900 relative">
                <img id="imagePreview" src="{{ isset($profile->image) ? (Str::startsWith($profile->image, 'http') ? $profile->image : asset('storage/' . $profile->image)) : 'https://images.unsplash.com/photo-1518770660439-4636190af475?q=80&w=1000' }}" class="w-full h-full object-cover">
            </div>

            <input type="file" name="image" id="imageInput" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-2xl file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200 transition-colors">
            <span class="text-[10px] text-slate-400 mt-1 block">Format: JPG, PNG, WEBP (Max 2MB). Pilih file baru untuk mengganti foto yang sedang tampil.</span>
        </div>

        <!-- Visi & Misi -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-slate-100">
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-2">Visi Perusahaan</label>
                <textarea name="vision" rows="4" required class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 text-xs text-slate-800 focus:outline-none focus:border-blue-600 focus:bg-white transition-all">{{ old('vision', $profile->vision) }}</textarea>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-2">Misi Perusahaan</label>
                <textarea name="mission" rows="4" required class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 text-xs text-slate-800 focus:outline-none focus:border-blue-600 focus:bg-white transition-all">{{ old('mission', $profile->mission) }}</textarea>
                <span class="text-[10px] text-slate-400 mt-1 block">Gunakan baris baru (Enter) untuk memisahkan setiap poin misi.</span>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="pt-4 border-t border-slate-100 flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-2xl text-xs transition-colors shadow-xs">
                Simpan Perubahan Profil
            </button>
        </div>
    </form>
</div>

<!-- Script untuk Live Preview Gambar -->
<script>
    document.getElementById('imageInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection