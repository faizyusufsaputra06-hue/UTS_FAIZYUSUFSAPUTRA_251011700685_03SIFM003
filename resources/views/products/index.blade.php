@extends('layouts.app')
@section('title', 'Produk')

@section('content')
<div class="container section-tight">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb rf-crumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Beranda</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Produk
            </li>
        </ol>
    </nav>

    <div class="row g-5">
        <aside class="col-lg-3">
            <h2 class="side-title">Kategori</h2>

            <div class="list-group rf-list">
                <a href="{{ route('products.index', array_filter([
                    'q' => request('q'),
                    'urut' => request('urut')
                ])) }}" 
                class="list-group-item {{ request('kategori') ? '' : 'active' }}">
                    Semua produk <span>{{ $total }}</span>
                </a>

                @foreach ($categories as $cat)
                    <a href="{{ route('products.index', array_filter([
                        'kategori' => $cat->name,
                        'q' => request('q'),
                        'urut' => request('urut')
                    ])) }}"
                    class="list-group-item {{ request('kategori') === $cat->name ? 'active' : '' }}">
                        {{ $cat->name }} <span>{{ $cat->count }}</span>
                    </a>
                @endforeach
            </div>
        </aside>

        <section class="col-lg-9">
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
                <div>
                    <h1 class="section-title mb-1">
                        {{ request('kategori') ?: 'Semua produk' }}
                    </h1>

                    <p class="text-muted mb-0 product-count">
                        Menampilkan {{ $furnitures->count() }} dari
                        {{ $furnitures->total() }} produk

                        @if (request('q'))
                            untuk &ldquo;{{ request('q') }}&rdquo;
                        @endif
                    </p>
                </div>

                <form method="GET" class="d-flex align-items-center gap-2">
                    @foreach (['kategori', 'q'] as $keep)
                        @if (request($keep))
                            <input type="hidden" name="{{ $keep }}" value="{{ request($keep) }}">
                        @endif
                    @endforeach

                    <label for="urut" class="small text-muted">
                        Urutkan
                    </label>

                    <select id="urut"
                            name="urut"
                            class="form-select form-select-sm"
                            onchange="this.form.submit()">
                        <option value="terbaru"
                            @selected(request('urut') === 'terbaru' || !request('urut'))>
                            Terbaru
                        </option>

                        <option value="termurah"
                            @selected(request('urut') === 'termurah')>
                            Harga terendah
                        </option>

                        <option value="termahal"
                            @selected(request('urut') === 'termahal')>
                            Harga tertinggi
                        </option>
                    </select>
                </form>
            </div>

            @if ($furnitures->isEmpty())
                <div class="rf-empty">
                    <p class="mb-3">
                        Tidak ada produk yang cocok dengan pencarian Anda.
                    </p>

                    <a href="{{ route('products.index') }}"
                       class="btn btn-rust">
                        Tampilkan semua produk
                    </a>
                </div>
            @else
                <div class="row g-4">
                    @foreach ($furnitures as $item)
                        <div class="col-6 col-xl-4">
                            @include('partials.product-card', ['item' => $item])
                        </div>
                    @endforeach
                </div>

                <div class="mt-5 pt-3 position-relative pagination-wrapper">
                    <div class="pagination-info text-center">
                        Showing {{ $furnitures->firstItem() }} to
                        {{ $furnitures->lastItem() }} of
                        {{ $furnitures->total() }} results
                    </div>

                    <div class="pagination-buttons">
                        <nav aria-label="Pagination">
                            <ul class="pagination mb-0">
                                {{-- Tombol sebelumnya --}}
                                @if ($furnitures->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">&lsaquo;</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link"
                                           href="{{ $furnitures->previousPageUrl() }}">
                                            &lsaquo;
                                        </a>
                                    </li>
                                @endif

                                {{-- Nomor halaman --}}
                                @foreach ($furnitures->getUrlRange(1, $furnitures->lastPage()) as $page => $url)
                                    <li class="page-item {{ $furnitures->currentPage() == $page ? 'active' : '' }}">
                                        <a class="page-link"
                                           href="{{ $url }}">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endforeach

                                {{-- Tombol berikutnya --}}
                                @if ($furnitures->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link"
                                           href="{{ $furnitures->nextPageUrl() }}">
                                            &rsaquo;
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link">&rsaquo;</span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            @endif
        </section>
    </div>
</div>
@endsection