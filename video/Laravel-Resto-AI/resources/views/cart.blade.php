@extends('front')

@section('content')
@if (session('cart'))
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Shopping Cart</h5>
            <a class="btn btn-danger btn-sm" href="{{ url('batal') }}">
                <i class="fas fa-trash"></i> Batal
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                            $total = 0;
                        @endphp
                        @foreach (session('cart') as $idmenu=>$menu)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $menu['menu'] }}</td>
                                <td>Rp {{ number_format($menu['harga'], 0, ',', '.') }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ url('kurang/'.$menu['idmenu']) }}" class="btn btn-outline-secondary"><i class="fas fa-minus"></i></a>
                                        <span class="btn btn-outline-secondary">{{ $menu['jumlah'] }}</span>
                                        <a href="{{ url('tambah/'.$menu['idmenu']) }}" class="btn btn-outline-secondary"><i class="fas fa-plus"></i></a>
                                    </div>
                                </td>
                                <td>Rp {{ number_format($menu['jumlah'] * $menu['harga'], 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ url('hapus/'.$menu['idmenu']) }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @php
                                $total = $total + ($menu['jumlah'] * $menu['harga']);
                            @endphp
                        @endforeach
                        <tr class="table-primary">
                            <td colspan="4" class="text-end fw-bold">Total Pembayaran:</td>
                            <td colspan="2" class="fw-bold">Rp {{ number_format($total, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-end mt-3">
                <a class="btn btn-success" href="{{ url('checkout') }}">
                    <i class="fas fa-check"></i> Checkout
                </a>
            </div>
        </div>
    </div>
@else
    <script>
        window.location.href="/";
    </script>
@endif
@endsection