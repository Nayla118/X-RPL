@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">Checkout</h1>

    @if(count($cart) == 0)
        <div class="alert alert-warning text-center">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            Keranjang kosong, silakan pilih produk terlebih dahulu.
        </div>
    @else
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat Pengiriman</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>

                        <h5 class="mt-4">Detail Pesanan:</h5>
                        <ul class="list-group mb-3">
                            @php $total = 0; @endphp
                            @foreach($cart as $item)
                                @php $total += $item['price'] * $item['quantity']; @endphp
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $item['name'] }} x {{ $item['quantity'] }}
                                    <span>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                                </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between fw-bold">
                                Total
                                <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </li>
                        </ul>

                        <button type="submit" class="btn btn-success w-100">
                            <i class="bi bi-check-circle me-1"></i> Konfirmasi Pesanan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
