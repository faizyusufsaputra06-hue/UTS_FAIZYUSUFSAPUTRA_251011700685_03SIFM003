@extends('layouts.app')
@section('title', 'Pesanan berhasil')

@section('content')
<div class="container section-tight">
    <div class="receipt mx-auto">
        <h1 class="section-title">Pesanan Anda sudah kami terima.</h1>
        <p class="text-muted">Simpan kode pesanan ini untuk menanyakan status pengiriman.</p>
        <p class="receipt-code">{{ $order->order_code }}</p>

        <table class="table rf-spec">
            <tbody>
                <tr><th scope="row">Produk</th><td>{{ $order->furniture_name }} &times; {{ $order->quantity }}</td></tr>
                <tr><th scope="row">Penerima</th><td>{{ $order->customer_name }} ({{ $order->phone }})</td></tr>
                <tr><th scope="row">Alamat</th><td>{{ $order->address }}, {{ $order->city }} {{ $order->postal_code }}</td></tr>
                <tr><th scope="row">Pembayaran</th><td>{{ \App\Models\Order::PAYMENTS[$order->payment_method] ?? $order->payment_method }}</td></tr>
                <tr><th scope="row">Subtotal</th><td>Rp {{ number_format($order->subtotal, 0, ',', '.') }}</td></tr>
                <tr><th scope="row">Ongkos kirim</th><td>{{ $order->shipping ? 'Rp ' . number_format($order->shipping, 0, ',', '.') : 'Gratis' }}</td></tr>
                <tr><th scope="row">Total bayar</th><td class="fw-bold">Rp {{ number_format($order->total, 0, ',', '.') }}</td></tr>
                <tr><th scope="row">Status</th><td>{{ ucfirst($order->status) }}</td></tr>
            </tbody>
        </table>

        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('products.index') }}" class="btn btn-rust">Lanjut belanja</a>
            <a href="{{ route('home') }}" class="btn btn-outline-ink">Ke beranda</a>
        </div>
    </div>
</div>
@endsection
