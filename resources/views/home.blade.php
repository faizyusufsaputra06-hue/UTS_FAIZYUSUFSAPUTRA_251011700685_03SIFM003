@extends('layouts.app')
@section('title', 'Beranda')

@section('content')
{{-- Hero --}}
<section class="rf-hero">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <h1 class="display-title">Furniture yang bikin rumah terasa seperti pulang.</h1>
                <p class="lead-text">Sofa, meja, lemari, sampai tempat tidur dari material pilihan. Pilih yang cocok, bayar langsung lewat checkout.</p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('products.index') }}" class="btn btn-rust btn-lg">Lihat koleksi</a>
                    <a href="{{ route('categories') }}" class="btn btn-outline-ink btn-lg">Jelajahi kategori</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="arch arch-hero">
                    <img
                        src="{{ asset('assets/images/hero-bedroom.png') }}"
                        alt="Kamar tidur minimalis dengan furniture kayu">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Keunggulan --}}
<section class="rf-perks">
    <div class="container">
        <div class="row g-0">
            @foreach ([
                ['Pengiriman cepat', 'Ke seluruh Indonesia'],
                ['Material berkualitas', 'Kayu dan kain pilihan'],
                ['Harga terjangkau', 'Langsung dari pengrajin'],
                ['Layanan 24/7', 'Siap membantu kapan saja'],
            ] as [$title, $text])
                <div class="col-6 col-lg-3 perk">
                    <strong>{{ $title }}</strong>
                    <span>{{ $text }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Koleksi terbaru --}}
<section class="section">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <h2 class="section-title mb-0">Koleksi terbaru</h2>
            <a href="{{ route('products.index') }}" class="link-rust">Lihat semua produk</a>
        </div>
        <div class="row g-4">
            @foreach ($latest as $item)
                <div class="col-6 col-lg-3">@include('partials.product-card', ['item' => $item])</div>
            @endforeach
        </div>
    </div>
</section>

{{-- Kategori --}}
<section class="section section-sand">
    <div class="container">
        <h2 class="section-title mb-4">Belanja per ruangan</h2>
        <div class="row g-4">
            @foreach ($categories as $cat)
                <div class="col-6 col-md-3 col-lg">
                    <a href="{{ route('products.index', ['kategori' => $cat->name]) }}" class="cat-tile">
                        <div class="arch"><img src="{{ $cat->image }}" alt="" loading="lazy"></div>
                        <span class="cat-name">{{ $cat->name }}</span>
                        <span class="cat-count">{{ $cat->count }} produk</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Ajakan --}}
<section class="section">
    <div class="container">
        <div class="rf-cta">
            <div>
                <h2>Rumah impian dimulai dari satu perabot.</h2>
                <p class="mb-0">Pilih satu, checkout, dan kami kirim ke depan pintu Anda.</p>
            </div>
            <a href="{{ route('products.index') }}" class="btn btn-light btn-lg">Belanja sekarang</a>
        </div>
    </div>
</section>
@endsection
