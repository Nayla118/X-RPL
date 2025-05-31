@extends('layouts.app')

@section('content')
<div class="p-4 bg-light rounded shadow-sm">
    <h1 class="mb-4">
        <i class="bi bi-info-circle-fill text-danger"></i> Tentang Kami
    </h1>

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="bg-white p-3 rounded shadow-sm h-100">
                <h5><i class="bi bi-award-fill text-warning"></i> Sejak 2024</h5>
                <p>
                    Ayam Geprek Laravel berdiri sejak tahun 2024 dengan misi menyajikan ayam geprek pedas yang nikmat dan berkualitas.
                    Kami menggunakan bahan-bahan segar dan resep rahasia yang membuat pelanggan selalu kembali lagi.
                </p>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="bg-white p-3 rounded shadow-sm h-100">
                <h5><i class="bi bi-geo-alt-fill text-danger"></i> Lokasi & Layanan</h5>
                <p>
                    Lokasi kami berada di pusat kota, mudah dijangkau, dan melayani pemesanan secara online maupun offline.
                    <br>
                    <i class="bi bi-hand-thumbs-up-fill text-success"></i> Kepuasan pelanggan adalah prioritas utama kami.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
