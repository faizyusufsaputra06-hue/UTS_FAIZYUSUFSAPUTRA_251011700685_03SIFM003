@extends('layouts.app')
@section('title', 'Checkout')

@section('content')
<div class="container section-tight">
    <nav aria-label="breadcrumb"><ol class="breadcrumb rf-crumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.show', $furniture) }}">{{ $furniture->name }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
    </ol></nav>

    <h1 class="section-title mb-4">Checkout</h1>

    <form action="{{ route('checkout.store', $furniture) }}" method="POST" novalidate>
        @csrf
        <input type="hidden" name="quantity" value="{{ old('quantity', $qty) }}">

        <div class="row g-5">
            <div class="col-lg-7">
                <h2 class="side-title">Data penerima</h2>
                <div class="row g-3 mb-5">
                    <div class="col-md-6">
                        <label class="form-label" for="customer_name">Nama lengkap</label>
                        <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" class="form-control @error('customer_name') is-invalid @enderror">
                        @error('customer_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="phone">Nomor telepon</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="email">Email <span class="text-muted">(opsional)</span></label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="address">Alamat lengkap</label>
                        <textarea id="address" name="address" rows="3" class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                        @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-7">
                        <label class="form-label" for="city">Kota</label>
                        <input type="text" id="city" name="city" value="{{ old('city') }}" class="form-control @error('city') is-invalid @enderror">
                        @error('city') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-5">
                        <label class="form-label" for="postal_code">Kode pos</label>
                        <input type="text" id="postal_code" name="postal_code" inputmode="numeric" maxlength="5" value="{{ old('postal_code') }}" class="form-control @error('postal_code') is-invalid @enderror">
                        @error('postal_code') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="notes">Catatan untuk penjual <span class="text-muted">(opsional)</span></label>
                        <textarea id="notes" name="notes" rows="2" class="form-control">{{ old('notes') }}</textarea>
                    </div>
                </div>

                <h2 class="side-title">Metode pembayaran</h2>
                <div class="d-grid gap-2">
                    @foreach (\App\Models\Order::PAYMENTS as $value => $label)
                        <label class="pay-option">
                            <input type="radio" class="form-check-input" name="payment_method" value="{{ $value }}" @checked(old('payment_method', 'transfer') === $value)>
                            <span>{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                @error('payment_method') <div class="text-danger small mt-2">{{ $message }}</div> @enderror
            </div>

            <div class="col-lg-5">
                <div class="summary">
                    <h2 class="side-title">Ringkasan pesanan</h2>
                    <div class="d-flex gap-3 mb-4">
                        <img src="{{ $furniture->image_url }}" alt="" class="summary-img">
                        <div>
                            <p class="fw-semibold mb-1">{{ $furniture->name }}</p>
                            <p class="small text-muted mb-0">{{ $furniture->price_formatted }} &times; {{ $qty }}</p>
                        </div>
                    </div>
                    <dl class="summary-rows">
                        <div><dt>Subtotal</dt><dd>Rp {{ number_format($subtotal, 0, ',', '.') }}</dd></div>
                        <div><dt>Ongkos kirim</dt><dd>{{ $shipping ? 'Rp ' . number_format($shipping, 0, ',', '.') : 'Gratis' }}</dd></div>
                        <div class="total"><dt>Total</dt><dd>Rp {{ number_format($subtotal + $shipping, 0, ',', '.') }}</dd></div>
                    </dl>
                    <button type="submit" class="btn btn-rust btn-lg w-100">Buat pesanan</button>
                    <a href="{{ route('products.show', $furniture) }}" class="d-block text-center mt-3 link-rust">Kembali ke produk</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
