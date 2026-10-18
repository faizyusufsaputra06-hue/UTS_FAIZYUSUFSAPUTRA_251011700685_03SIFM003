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

            <form action="{{ route('checkout.create', $furniture) }}" method="GET" class="d-flex flex-wrap gap-3 align-items-center">
                <div class="input-group qty" style="width:140px">
                    <button class="btn btn-outline-ink" type="button" data-step="-1" aria-label="Kurangi">&minus;</button>
                    <input type="number" name="qty" id="qty" value="1" min="1" max="20" class="form-control text-center" aria-label="Jumlah">
                    <button class="btn btn-outline-ink" type="button" data-step="1" aria-label="Tambah">+</button>
                </div>
                <button type="submit" class="btn btn-rust btn-lg flex-grow-1">Checkout sekarang</button>
            </form>
            <p class="small text-muted mt-3 mb-0">Gratis ongkir untuk pembelian mulai Rp 5.000.000.</p>
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

@push('scripts')
<script>
    document.querySelectorAll('.qty [data-step]').forEach(btn => btn.addEventListener('click', () => {
        const input = document.getElementById('qty');
        const next = (parseInt(input.value) || 1) + parseInt(btn.dataset.step);
        input.value = Math.min(20, Math.max(1, next));
    }));
</script>
@endpush
