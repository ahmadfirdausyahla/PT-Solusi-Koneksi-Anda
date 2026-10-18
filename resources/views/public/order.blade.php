<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan {{ $service->name }} - PT Solusi Koneksi Anda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { bg: '#F8FAFC', primary: '#2563EB', dark: '#0F172A' }
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
<body class="bg-[#F8FAFC] text-slate-800 font-sans antialiased min-h-screen flex flex-col justify-between">

    <!-- NAVBAR CLEAN -->
    <header class="max-w-6xl mx-auto w-full px-6 py-6 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-base font-bold text-slate-900 tracking-tight">
            Solusi<span class="text-blue-600">Koneksi</span>
        </a>
        <a href="{{ route('services.public') }}" class="text-xs font-medium text-slate-500 hover:text-slate-900 transition-colors">
            &larr; Kembali ke Layanan
        </a>
    </header>

    <!-- FORM ORDER CONTAINER -->
    <main class="max-w-2xl mx-auto w-full px-6 py-4 my-auto" data-aos="fade-up">
        <div class="bg-white p-8 md:p-10 rounded-3xl border border-slate-200/80 shadow-sm space-y-8">
            
            <!-- RINGKASAN LAYANAN -->
            <div class="flex justify-between items-center pb-6 border-b border-slate-100">
                <div>
                    <span class="text-[11px] font-semibold text-blue-600 uppercase tracking-wider block mb-1">Pemesanan Layanan</span>
                    <h1 class="text-xl font-bold text-slate-900">{{ $service->name }}</h1>
                </div>
                <div class="text-right">
                    <span class="text-xs text-slate-400 block mb-0.5">Estimasi</span>
                    <span class="text-base font-bold text-blue-600">Rp {{ number_format($service->price, 0, ',', '.') }}</span>
                </div>
            </div>

            @if($errors->any())
                <div class="p-4 bg-rose-50 border border-rose-200 text-rose-700 text-xs rounded-2xl">
                    <ul class="list-disc pl-4 space-y-1">
                        @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
            @endif

            <!-- FORM INPUT -->
            <form action="{{ route('services.order.store', $service->id) }}" method="POST" class="space-y-5">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-2">Nama Lengkap / Perusahaan</label>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="PT Industri Utama" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs text-slate-800 focus:outline-none focus:border-blue-600 focus:bg-white transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-2">Nomor WhatsApp</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" required placeholder="081234567890" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs text-slate-800 focus:outline-none focus:border-blue-600 focus:bg-white transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="kontak@perusahaan.com" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs text-slate-800 focus:outline-none focus:border-blue-600 focus:bg-white transition-all">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-2">Catatan Tambahan (Opsional)</label>
                    <textarea name="notes" rows="3" placeholder="Sebutkan detail lokasi, jadwal instalasi, atau spesifikasi khusus..." class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 text-xs text-slate-800 focus:outline-none focus:border-blue-600 focus:bg-white transition-all">{{ old('notes') }}</textarea>
                </div>

                <!-- 2 TOMBOL SAMA BESAR: KIRIM & KIRIM KE WHATSAPP -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-4">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 rounded-2xl text-xs transition-colors shadow-xs text-center">
                        Kirim
                    </button>
                    
                    <a href="{{ $waLink }}" target="_blank" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3.5 rounded-2xl text-xs transition-colors shadow-xs text-center flex items-center justify-center gap-2">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        Kirim ke WhatsApp
                    </a>
                </div>
            </form>

        </div>
    </main>

    <!-- FOOTER SIMPLE -->
    <footer class="text-center py-6 text-[11px] text-slate-400">
        &copy; 2026 PT Solusi Koneksi Anda.
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init({ duration: 600, once: true });</script>
</body>
</html>