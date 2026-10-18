<header class="rf-header sticky-top">
    <nav class="navbar navbar-expand-lg py-3">
        <div class="container">
            <a class="navbar-brand rf-brand" href="{{ route('home') }}">
                <svg width="26" height="30" viewBox="0 0 26 30" aria-hidden="true"><path d="M2 29V13C2 6.9 6.9 2 13 2s11 4.9 11 11v16" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round"/><rect x="8" y="17" width="10" height="12" rx="1" fill="currentColor"/></svg>
                <span>Ruang<b>Furni</b></span>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Buka menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav mx-lg-auto gap-lg-3 pt-3 pt-lg-0">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">Produk</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('categories') ? 'active' : '' }}" href="{{ route('categories') }}">Kategori</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang kami</a></li>
                </ul>

                <form class="rf-search mt-3 mt-lg-0" action="{{ route('products.index') }}" method="GET" role="search">
                    <input class="form-control" type="search" name="q" value="{{ request('q') }}" placeholder="Cari furniture" aria-label="Cari furniture">
                    <button class="btn btn-rust" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </nav>
</header>
