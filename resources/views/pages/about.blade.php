@extends('layouts.app')
@section('title', 'Tentang kami')

@section('content')
<div class="container section-tight">
    <nav aria-label="breadcrumb"><ol class="breadcrumb rf-crumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tentang kami</li>
    </ol></nav>

    <div class="row g-5 align-items-center mb-5">
        <div class="col-lg-7">
            <h1 class="display-title" style="font-size:clamp(2rem,4vw,3.2rem)">RuangFurni dibuat untuk rumah yang dipakai setiap hari.</h1>
            <p class="lead-text">Kami menyediakan berbagai pilihan furniture dengan desain modern, fungsional, dan harga terjangkau. Setiap produk dipilih supaya ruang hidup Anda lebih nyaman dan tertata.</p>
        </div>
        <div class="col-lg-5">
            <div class="arch arch-hero"><img src="{{ asset('assets/images/about-room.png') }}"
                    alt="Interior RuangFurni dengan sofa dan furniture kayu" loading="lazy">
            </div>
        </div>
    </div>

    <div class="row g-4">
        @foreach ([
            ['Kualitas terbaik', 'Material seperti kayu jati, mahoni, dan kain premium dipilih supaya awet bertahun-tahun.'],
            ['Desain modern', 'Garis bersih dan warna netral yang mudah dipadukan dengan isi rumah yang sudah ada.'],
            ['Harga terjangkau', 'Produk dibuat dan dikirim langsung, tanpa rantai perantara yang panjang.'],
            ] as [$title, $text])
            <div class="col-md-4">
                <div class="value-box">
                    <h2>{{ $title }}</h2>
                    <p class="mb-0">{{ $text }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
