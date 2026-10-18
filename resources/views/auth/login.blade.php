<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - PT Solusi Koneksi Anda</title>
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
</head>
<body class="bg-brand-bg text-slate-800 font-sans antialiased flex items-center justify-center h-screen p-4">

    <div class="w-full max-w-md bg-white p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-6">
        <div class="text-center space-y-2">
            <div class="w-12 h-12 rounded-2xl bg-blue-600 text-white font-bold flex items-center justify-center text-base mx-auto shadow-xs">
                SK
            </div>
            <h1 class="text-xl font-bold text-slate-900">Admin Panel Login</h1>
            <p class="text-xs text-slate-500">PT Solusi Koneksi Anda</p>
        </div>

        @if($errors->any())
            <div class="p-4 bg-rose-50 border border-rose-200 text-rose-600 text-xs font-semibold rounded-2xl">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-2">Alamat Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@solusikoneksianda.co.id" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs text-slate-800 focus:outline-none focus:border-blue-600 focus:bg-white transition-all">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-2">Password</label>
                <input type="password" name="password" required placeholder="••••••••••••" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs text-slate-800 focus:outline-none focus:border-blue-600 focus:bg-white transition-all">
            </div>

            <button type="submit" class="w-full bg-slate-900 hover:bg-blue-600 text-white font-bold py-3.5 rounded-2xl text-xs transition-colors shadow-xs">
                Masuk ke Dashboard
            </button>
        </form>
    </div>

</body>
</html>