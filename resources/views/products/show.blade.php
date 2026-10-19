@extends('layouts.app')
@section('title', $furniture->name)

@section('content')
<div class="container section-tight">
    <nav aria-label="breadcrumb"><ol class="breadcrumb rf-crumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produk</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index', ['kategori' => $furniture->category]) }}">{{ $furniture->category }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $furniture->name }}</li>
    </ol></nav>

    <div class="row g-5">
        <div class="col-md-6">
            <div class="detail-img"><img src="{{ $furniture->image_url }}" alt="{{ $furniture->name }}"></div>
        </div>

        <div class="col-md-6">
            <p class="rf-cat">{{ $furniture->category }}</p>
            <h1 class="detail-title">{{ $furniture->name }}</h1>
            <p class="detail-price">{{ $furniture->price_formatted }}</p>
            <p class="detail-desc">{{ $furniture->description }}</p>

            <table class="table rf-spec">
                <tbody>
                    <tr><th scope="row">Kategori</th><td>{{ $furniture->category }}</td></tr>
                    <tr><th scope="row">Material</th><td>{{ $furniture->material }}</td></tr>
                    <tr><th scope="row">Dimensi</th><td>{{ $furniture->dimensions }}</td></tr>
                </tbody>
            </table>

            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('products.index') }}" class="btn btn-rust btn-lg">Kembali ke produk</a>
                <a href="{{ route('products.index', ['kategori' => $furniture->category]) }}" class="btn btn-outline-ink btn-lg">Lihat {{ $furniture->category }} lainnya</a>
            </div>
        </div>
    </div>
    
    @if ($related->isNotEmpty())
        <section class="mt-5 pt-4">
            <h2 class="section-title mb-4">Produk terkait</h2>
            <div class="row g-4">
                @foreach ($related as $item)
                    <div class="col-6 col-lg-3">@include('partials.product-card', ['item' => $item])</div>
                @endforeach
            </div>
        </section>
    @endif
</div>
@endsection