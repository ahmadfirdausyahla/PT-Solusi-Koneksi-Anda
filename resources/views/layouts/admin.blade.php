<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - PT Solusi Koneksi Anda')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { bg: '#F3F4F6', primary: '#2563EB', dark: '#0F172A' }
                    },
                    fontFamily: {
                        sans: ['-apple-system', 'BlinkMacSystemFont', "SF Pro Display", "SF Pro Text", "Helvetica Neue", 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-brand-bg text-slate-800 font-sans antialiased">

    <div class="flex h-screen overflow-hidden p-3 md:p-5 gap-5">
        
        <!-- SIDEBAR -->
        <aside class="w-64 bg-white rounded-3xl p-6 flex flex-col justify-between hidden md:flex border border-slate-200/80 shadow-xs">
            <div class="space-y-6">
                <!-- User Profile -->
                <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                    <div class="w-10 h-10 rounded-full bg-blue-600 text-white font-bold flex items-center justify-center text-sm shadow-xs">
                        SK
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-slate-900 leading-tight">Admin SolusiKoneksi</h4>
                        <p class="text-[11px] text-slate-500">PT Solusi Koneksi Anda</p>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div>
                    <span class="text-[10px] uppercase tracking-wider font-bold text-slate-400 mb-2 block">General</span>
                    <nav class="space-y-1">
                        <!-- Dashboard -->
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-2xl {{ request()->routeIs('admin.dashboard') ? 'bg-slate-900 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-100' }} font-medium text-xs transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                            Dashboard
                        </a>

                        <!-- Pesanan Layanan (Orders) -->
                        <a href="{{ route('admin.orders.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-2xl {{ request()->routeIs('admin.orders.*') ? 'bg-slate-900 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-100' }} font-medium text-xs transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            Pesanan Layanan
                        </a>

                        <!-- Layanan IoT -->
                        <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-2xl {{ request()->routeIs('admin.services.*') ? 'bg-slate-900 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-100' }} font-medium text-xs transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A11.042 11.042 0 0012 2 11.042 11.042 0 003 12.55M2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                            Layanan IoT
                        </a>

                        <!-- Artikel Berita -->
                        <a href="{{ route('admin.articles.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-2xl {{ request()->routeIs('admin.articles.*') ? 'bg-slate-900 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-100' }} font-medium text-xs transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                            Artikel Berita
                        </a>

                        <!-- Galeri Kegiatan -->
                        <a href="{{ route('admin.galleries.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-2xl {{ request()->routeIs('admin.galleries.*') ? 'bg-slate-900 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-100' }} font-medium text-xs transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Galeri Kegiatan
                        </a>

                        <!-- Pesan Masuk / Contact Messages -->
                        <a href="{{ route('admin.messages.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-2xl {{ request()->routeIs('admin.messages.*') ? 'bg-slate-900 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-100' }} font-medium text-xs transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            Pesan Masuk
                        </a>

                        <!-- Profil Perusahaan -->
<a href="{{ route('admin.profile.edit') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-2xl {{ request()->routeIs('admin.profile.*') ? 'bg-slate-900 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-100' }} font-medium text-xs transition-colors">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
    Profil Perusahaan
</a>
                    </nav>
                </div>
            </div>

            <!-- Tombol Lihat Frontend & Keluar -->
            <div class="pt-4 border-t border-slate-100 space-y-2">
                <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-center gap-2 w-full bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-semibold py-2.5 rounded-2xl transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    Lihat Frontend
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center justify-center gap-2 w-full bg-rose-50 hover:bg-rose-100 text-rose-600 text-xs font-semibold py-2.5 rounded-2xl transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <!-- MAIN AREA -->
        <div class="flex-1 flex flex-col overflow-hidden space-y-4">
            <header class="bg-white rounded-3xl p-4 border border-slate-200/80 flex items-center justify-between shadow-xs">
                <!-- INPUT SEARCH DINAMIS -->
                <div class="flex items-center gap-3 bg-slate-100 px-4 py-2 rounded-2xl w-full max-w-md">
                    <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input type="text" id="adminSearchInput" placeholder="Cari data di halaman ini..." class="bg-transparent border-none text-xs text-slate-700 focus:outline-none w-full placeholder-slate-400">
                </div>
                <span class="text-xs font-semibold text-slate-600 bg-slate-100 px-3 py-1.5 rounded-xl">Tahun 2026</span>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto space-y-4">
                @yield('content')
            </main>
        </div>

    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });

        // SCRIPT SEARCH REAL-TIME DINAMIS
        document.getElementById('adminSearchInput').addEventListener('keyup', function () {
            const filterValue = this.value.toLowerCase().trim();
            
            // Filter untuk baris tabel (TR) jika ada tabel di halaman
            const tableRows = document.querySelectorAll('tbody tr');
            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(filterValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });

            // Filter untuk elemen berbentuk card/list item jika ada
            const cardItems = document.querySelectorAll('.searchable-item');
            cardItems.forEach(card => {
                const text = card.textContent.toLowerCase();
                if (text.includes(filterValue)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>