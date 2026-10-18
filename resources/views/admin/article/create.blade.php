@extends('layouts.admin')

@section('title', 'Tambah Artikel - Admin Panel')

@section('content')
<!-- CDN TinyMCE Rich Text Editor -->
<script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#rich-editor',
        plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
        toolbar: 'undo redo | formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
        height: 400,
        menubar: false,
        skin: 'oxide',
        content_css: 'default',
        branding: false
    });
</script>

<div class="max-w-4xl mx-auto space-y-6" data-aos="fade-up">
    <div class="flex items-center justify-between bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <h1 class="text-xl font-bold text-slate-900">Tambah Artikel & Berita Baru</h1>
            <p class="text-xs text-slate-500 mt-0.5">Form pembuatan publikasi wawasan dan informasi teknologi.</p>
        </div>
        <a href="{{ route('articles.index') }}" class="text-xs font-semibold text-slate-600 hover:text-blue-600">&larr; Kembali</a>
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

    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-2">Judul Artikel</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Perkembangan Teknologi AI di Industri..." class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs text-slate-800 focus:outline-none focus:border-blue-600">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-2">Tanggal Publikasi</label>
                <input type="date" name="date" value="{{ old('date', date('Y-m-d')) }}" required class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs text-slate-800 focus:outline-none focus:border-blue-600">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-2">Status Publikasi</label>
            <select name="status" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs text-slate-800 focus:outline-none focus:border-blue-600">
                <option value="published">Published</option>
                <option value="draft">Draft</option>
            </select>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-2">Unggah Gambar Utama</label>
            <input type="file" name="image" accept="image/*" onchange="previewArticleImage(event)" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
            <div class="mt-4">
                <img id="article-preview" class="hidden w-full max-h-64 object-cover rounded-2xl border border-slate-200 shadow-sm">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-2">Konten / Isi Berita (Dilengkapi Toolbar Format Teks)</label>
            <!-- ID "rich-editor" digunakan oleh TinyMCE -->
            <textarea id="rich-editor" name="content" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 text-xs text-slate-800 focus:outline-none focus:border-blue-600">{{ old('content') }}</textarea>
        </div>

        <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
            <a href="{{ route('articles.index') }}" class="px-6 py-3 rounded-2xl text-xs font-semibold bg-slate-100 text-slate-600 hover:bg-slate-200 transition-colors">Batal</a>
            <button type="submit" class="px-6 py-3 rounded-2xl text-xs font-semibold bg-blue-600 text-white hover:bg-blue-700 transition-colors shadow-sm">Simpan Artikel</button>
        </div>
    </form>
</div>

<script>
    function previewArticleImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('article-preview');
            output.src = reader.result;
            output.classList.remove('hidden');
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection