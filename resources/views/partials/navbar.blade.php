<div id="navbar-wrapper" class="fixed top-6 inset-x-0 z-50 flex justify-center transition-all duration-300 transform">
    <nav class="w-[90%] max-w-6xl bg-white/90 backdrop-blur-md rounded-full px-6 py-4 shadow-sm border border-slate-200/60 flex items-center justify-between">
        <a href="{{ route('home') }}" class="text-lg font-bold tracking-tight text-slate-900 flex items-center gap-2">
            Solusi<span class="text-blue-600">Koneksi</span>
        </a>

        <!-- Menu Navigasi -->
        <div class="hidden md:flex items-center space-x-8 text-sm font-medium text-slate-600">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">Home</a>
            <a href="{{ route('profile') }}" class="hover:text-blue-600 transition-colors">Profil</a>
            <a href="{{ route('services.public') }}" class="hover:text-blue-600 transition-colors">Produk & Layanan</a>
            <a href="{{ route('articles.public') }}" class="hover:text-blue-600 transition-colors">Artikel</a>
            <a href="{{ route('galleries.public') }}" class="hover:text-blue-600 transition-colors">Galeri</a>
        </div>

        <a href="{{ route('contact') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-full text-sm font-medium transition-colors shadow-sm">
            Kontak Kami
        </a>
    </nav>
</div>

<script>
    let lastScrollTop = 0;
    const navbarWrapper = document.getElementById('navbar-wrapper');

    window.addEventListener('scroll', function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > lastScrollTop && scrollTop > 100) {
            navbarWrapper.classList.add('-translate-y-28');
        } else {
            navbarWrapper.classList.remove('-translate-y-28');
        }
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });
</script>