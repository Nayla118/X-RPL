@extends('layouts.app')

@section('content')

<!-- Hero / Header -->
<div class="bg-danger text-white p-5 rounded mb-4 text-center">
    <h1 class="display-4 fw-bold">
        <i class="bi bi-fire"></i> Ayam Geprek Laravel
    </h1>
    <p class="lead">
        <i class="bi bi-emoji-smile"></i> Nikmati ayam geprek pedas yang menggoda selera, langsung dari dapur kami!
    </p>
    <a class="btn btn-light btn-lg mt-3" href="{{ route('menu.index') }}"> 
        <i class="bi bi-eye-fill"></i> Lihat Menu
    </a>
</div>

<!-- Menu Produk -->
<h2 id="menu" class="mb-4 text-center">
    <i class="bi bi-basket2-fill text-danger"></i> Menu Ayam Geprek
</h2>

<div class="row">
    @forelse($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $product->name }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">
                        <i class="bi bi-star-fill text-warning"></i> {{ $product->name }}
                    </h5>
                    <p class="card-text flex-grow-1">
                        <i class="bi bi-info-circle"></i> {{ \Illuminate\Support\Str::limit($product->description, 80) }}
                    </p>
                    <p class="card-text fw-bold text-success">
                        <i class="bi bi-cash-coin"></i> Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-auto">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-cart-plus-fill"></i> Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p class="text-center text-muted">Belum ada menu tersedia saat ini.</p>
    @endforelse
</div>

@endsection
