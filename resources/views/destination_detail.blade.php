@extends('layouts.app')

@section('judul')
    {{ $destination->title }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 bg-light rounded p-4">
                <img src="{{ asset('storage/images/' . $destination->image) }}" alt="image" class="w-100 rounded">
                <div class="my-3">
                    <h2 class="fw-bold">{{ $destination->title }}</h2>
                    <span class="d-block fw-bold text-danger">Diskon
                        {{ $destination->discount }}%</span>
                    <strike class="fw-bold text-secondary">
                        Rp.
                        {{ number_format($destination->curr_price) }}
                    </strike>
                    <span class="fw-bold text-success">Rp.
                        {{ number_format($destination->price_after_discount) }}</span>
                    <p class="mt-3">{{ $destination->description }}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="col-md-12 rounded shadow p-3">
                    <h4 class="fw-bold">Pesan Tiket</h4>
                    <hr>
                    <form action="{{ route('order_ticket', $destination->id) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Jumlah Tiket</label>
                                <input type="number" name="ticket_qty"
                                    class="form-control @error('ticket_qty') is-invalid @enderror"
                                    value="{{ old('ticket_qty') }}" placeholder="Jumlah Tiket">
                                @error('ticket_qty')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Kunjungan</label>
                                <input type="date" name="visit_date"
                                    class="form-control @error('visit_date') is-invalid @enderror"
                                    value="{{ old('visit_date') }}" placeholder="Tanggal Kunjungan">
                                @error('visit_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor Kartu Kredit</label>
                            <input type="number" name="credit_card_number"
                                class="form-control @error('credit_card_number') is-invalid @enderror"
                                value="{{ old('credit_card_number') }}" placeholder="Nomor Kartu">
                            @error('credit_card_number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label d-block">Metode Pembayaran</label>
                            <input type="radio" name="payment_method"
                                class="@error('payment_method') is-invalid @enderror" value="BCA" id="BCA">
                            <label for="BCA">BCA</label>
                            <input type="radio" name="payment_method"
                                class="@error('payment_method') is-invalid @enderror" value="Mandiri" id="Mandiri">
                            <label for="Mandiri">Mandiri</label>
                            <input type="radio" name="payment_method"
                                class="@error('payment_method') is-invalid @enderror" value="Maybank" id="Maybank">
                            <label for="Maybank">Maybank</label>
                            <input type="radio" name="payment_method"
                                class="@error('payment_method') is-invalid @enderror" value="PayPal" id="PayPal">
                            <label for="PayPal">PayPal</label>
                            @error('payment_method')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        @guest
                            <a href="{{ route('login') }}" class="btn btn-primary w-100">Beli Tiket</a>
                        @else
                            @if (Auth::user()->is_admin == 0)
                                <button type="submit" class="btn btn-primary w-100">Beli Tiket</button>
                            @else
                                <a href="#" class="btn btn-secondary w-100" style="cursor: not-allowed">Beli Tiket</a>
                            @endif
                        @endguest
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
