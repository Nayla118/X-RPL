@extends('front')

@section('content')
<div class="row g-4">
    @foreach ($menus as $menu)
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm hover-shadow transition-300">
            <div class="position-relative">
                <img src="{{ asset('gambar/'.$menu->gambar) }}" class="card-img-top object-fit-cover" style="height: 200px;" alt="{{ $menu->menu }}">
                <div class="position-absolute top-0 end-0 m-2">
                    <span class="badge bg-primary fs-6">Rp {{ number_format($menu->harga, 0, ',', '.') }}</span>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3">{{ $menu->menu }}</h5>
                <p class="card-text text-muted">{{ $menu->deskripsi }}</p>
            </div>
            <div class="card-footer bg-transparent border-0 pt-0">
                <a href="{{ url('beli/'.$menu->idmenu) }}" class="btn btn-primary w-100 d-flex align-items-center justify-content-center gap-2">
                    <i class="bi bi-cart-plus"></i> Tambah ke Keranjang
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="d-flex justify-content-center mt-5">
    {{ $menus->links() }}
</div>
@endsection
</div>