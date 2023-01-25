@extends('layouts.app')

@section('judul')
    Sukses Order
@endsection

@section('content')
    <div class="text-center" style="padding: 100px 0;">
        <img src="{{ asset('images/mailbox.png') }}" alt="icon" width="200">
        <h1 class="text-info fw-bold">Yes, Sukses Membeli Tiket</h1>
        @if (session('status'))
            <p class="text-secondary">Kamu membeli tiket <b>{{ session('status') }}</b></p>
        @endif
        <p class="text-secondary mt-3">Terima kasih sudah membeli dan menyelesaikan pembayaran</p>
        <a href="/" class="btn btn-primary fw-bold">Kembali ke Beranda</a>
        <a href="/histories" class="btn btn-info fw-bold text-white">Lihat Histori Pembelian</a>
    </div>
@endsection
