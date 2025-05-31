@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Selamat Datang di AIS Restoran</h1>
            <p>Nikmati hidangan lezat dengan bahan-bahan berkualitas tinggi dan pelayanan terbaik</p>
            <a href="{{ route('menu') }}" class="btn btn-primary">Lihat Menu</a>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="section" id="categories">
        <div class="container">
            <h2 class="section-title">Kategori Menu</h2>
            <div class="category-grid">
                @foreach($categories as $category)
                <div class="category-card fade-in">
                    <div class="category-img" style="background-image: url('{{ $category->image }}');"></div>
                    <div class="category-info">
                        <h3>{{ $category->name }}</h3>
                        <p>{{ $category->menu_items_count }} menu tersedia</p>
                        <a href="{{ route('categories') }}" class="btn btn-outline">Lihat Semua</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Menu Section -->
    <section class="section bg-light" id="menu">
        <div class="container">
            <h2 class="section-title">Menu Populer</h2>
            <div class="menu-grid">
                @foreach($popularItems as $item)
                <div class="menu-card hover-grow">
                    <div class="menu-img" style="background-image: url('{{ $item->image }}');"></div>
                    <div class="menu-details">
                        <h3 class="menu-title">{{ $item->name }}</h3>
                        <p class="menu-desc">{{ Str::limit($item->description, 60) }}</p>
                        <span class="menu-price">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                        <a href="{{ route('menu.detail', $item->id) }}" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('menu') }}" class="btn btn-outline">Lihat Semua Menu</a>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link href="{{ asset('css/animations.css') }}" rel="stylesheet">
@endpush