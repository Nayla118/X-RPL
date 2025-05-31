@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">Keranjang Belanja</h1>

    @if(session('success'))
    <div class="alert alert-success text-center">
        <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
    </div>
    @endif

    @if(!$cart || count($cart) === 0)
        <div class="alert alert-warning text-center">
            <i class="bi bi-cart-x-fill me-1"></i> Keranjang masih kosong.
        </div>
    @else
    <form action="{{ route('cart.update') }}" method="POST">
        @csrf
        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach($cart as $id => $details)
                        @php
                            $subtotal = $details['price'] * $details['quantity'];
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td>{{ $details['name'] }}</td>
                            <td style="max-width: 100px;">
                                <input type="number" name="quantity[{{ $id }}]" value="{{ $details['quantity'] }}" min="1" class="form-control">
                            </td>
                            <td>Rp {{ number_format($details['price'], 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST" onsubmit="return confirm('Yakin hapus produk ini?')">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash-fill"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr class="fw-bold">
                            <td colspan="3" class="text-end">Total</td>
                            <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex justify-content-between flex-wrap gap-2">
                <button class="btn btn-warning" type="submit">
                    <i class="bi bi-arrow-repeat"></i> Update Jumlah
                </button>
                <a href="{{ route('checkout.index') }}" class="btn btn-success">
                    <i class="bi bi-cart-check-fill"></i> Checkout
                </a>
            </div>
        </div>
    </form>
    @endif
</div>
@endsection
