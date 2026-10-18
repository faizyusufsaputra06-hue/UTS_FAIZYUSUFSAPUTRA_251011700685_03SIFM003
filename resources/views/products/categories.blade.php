@extends('layouts.app')
@section('title', 'Kategori')

@section('content')
<div class="container section-tight">
    <nav aria-label="breadcrumb"><ol class="breadcrumb rf-crumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Kategori</li>
    </ol></nav>

    <h1 class="section-title mb-1">Kategori produk</h1>
    <p class="text-muted mb-5">Pilih furniture sesuai ruangan yang ingin Anda isi.</p>

    <div class="row g-4 g-lg-5">
        @foreach ($categories as $cat)
            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ route('products.index', ['kategori' => $cat->name]) }}" class="cat-tile">
                    <div class="arch"><img src="{{ $cat->image }}" alt="" loading="lazy"></div>
                    <span class="cat-name">{{ $cat->name }}</span>
                    <span class="cat-count">{{ $cat->count }} produk</span>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
