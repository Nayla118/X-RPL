@extends('layouts.app')

@section('content')
<h1 class="mb-4 text-center">
    <i class="bi bi-list-ul text-danger me-2"></i>Daftar Menu Ayam Geprek
</h1>

<div class="row">
    @forelse($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
            <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">
                    <i class="bi bi-fire text-warning me-1"></i>{{ $product->name }}
                </h5>
                <p class="card-text flex-grow-1">
                    <i class="bi bi-info-circle me-1 text-muted"></i>{{ \Illuminate\Support\Str::limit($product->description, 100) }}
                </p>
                <p class="card-text fw-bold">
                    <i class="bi bi-cash-stack text-success me-1"></i>Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-auto">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">
                        <i class="bi bi-cart-plus me-1"></i> Tambah ke Keranjang
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <p class="text-center">
        <i class="bi bi-exclamation-circle text-warning"></i> Menu sedang kosong, silakan cek kembali nanti.
    </p>
    @endforelse
</div>
@endsection
