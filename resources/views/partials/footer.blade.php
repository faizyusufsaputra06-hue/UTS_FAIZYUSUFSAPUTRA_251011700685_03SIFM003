<footer class="rf-footer">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5">
                <div class="rf-brand text-white mb-3">
                    <svg width="26" height="30" viewBox="0 0 26 30" aria-hidden="true"><path d="M2 29V13C2 6.9 6.9 2 13 2s11 4.9 11 11v16" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round"/><rect x="8" y="17" width="10" height="12" rx="1" fill="currentColor"/></svg>
                    <span>Ruang<b>Furni</b></span>
                </div>
                <p class="mb-0 footer-text">Furniture untuk rumah yang benar-benar ditinggali: kuat, nyaman, dan harganya masuk akal.</p>
            </div>
            <div class="col-6 col-lg-3">
                <h2 class="footer-title">Jelajahi</h2>
                <ul class="list-unstyled footer-text mb-0">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('products.index') }}">Semua produk</a></li>
                    <li><a href="{{ route('categories') }}">Kategori</a></li>
                    <li><a href="{{ route('about') }}">Tentang kami</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-4">
                <h2 class="footer-title">Hubungi kami</h2>
                <ul class="list-unstyled footer-text mb-0">
                    <li>Jl. Jawa Jl. O 1 Blok L No.3, RT.3/RW.5, Pd. Benda, Kec. Pamulang, Kota Tangerang Selatan, Banten 15416</li>
                    <li>(0813) 3197 5107</li>
                    <li>faizyusufsaputra06@gmail.com</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">&copy; {{ date('Y') }} RuangFurni.</div>
    </div>
</footer>
