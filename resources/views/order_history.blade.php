@extends('layouts.app')

@section('judul')
    Histori Order
@endsection

@section('content')
    <div class="container rounded shadow p-5 mt-5">
        <h1 class="fw-bold text-info">Histori Order</h1>
        <p class="fw-bold text-secondary">Berikut merupakan history order yang dipesan :
        </p>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    @if (Auth::user()->is_admin == 1)
                        <th scope="col">Customer</th>
                    @endif
                    <th scope="col">Destinasi Wisata</th>
                    <th scope="col">Harga Tiket</th>
                    <th scope="col">Jumlah Tiket</th>
                    <th scope="col">Tanggal Kunjungan</th>
                    <th scope="col">Nomor Kartu Kredit</th>
                    <th scope="col" style="width: 20%">Metode Pembayaran</th>
                    <th scope="col">Total Biaya</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderHistory as $order)
                    <tr class="text-center">
                        <th scope="row">{{ $loop->iteration }}</th>
                        @if (Auth::user()->is_admin == 1)
                            <td>{{ $order->user->name }}</th>
                        @endif
                        <td>{{ $order->destination->title }}</td>
                        <td>Rp. {{ number_format($order->ticket_price) }}</td>
                        <td>{{ $order->ticket_qty }}</td>
                        <td>{{ date('d M Y', strtotime($order->visit_date)) }}</td>
                        <td>{{ $order->credit_card_number }}</td>
                        <td>
                            @if ($order->payment_method == 'BCA')
                                <img src="{{ asset('images/bca.png') }}" alt="payment" width="50%">
                            @elseif ($order->payment_method == 'Mandiri')
                                <img src="{{ asset('images/mandiri.webp') }}" alt="payment" width="50%">
                            @elseif ($order->payment_method == 'Maybank')
                                <img src="{{ asset('images/maybank.png') }}" alt="payment" width="50%">
                            @elseif ($order->payment_method == 'PayPal')
                                <img src="{{ asset('images/paypal.png') }}" alt="payment" width="50%">
                            @endif
                        </td>
                        <td class="fw-bold text-success">Rp. {{ number_format($order->total_cost) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
