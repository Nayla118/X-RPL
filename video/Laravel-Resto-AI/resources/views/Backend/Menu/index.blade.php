@extends('layouts.app')

@section('title', 'Menu')

@push('styles')
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
@endpush

@section('content')
    <section class="section">
        <div class="container">
            <div class="menu-section">
                <!-- Sidebar Kategori -->
                <div class="menu-categories">
                    <h3>Kategori</h3>
                    <ul class="category-list">
                        <li><a href="{{ route('menu') }}" class="{{ !request('category') ? 'active' : '' }}">Semua Menu</a></li>
                        @foreach($categories as $category)
                        <li>
                            <a href="{{ route('menu', ['category' => $category->id]) }}" 
                               class="{{ request('category') == $category->id ? 'active' : '' }}">
                                {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Daftar Menu -->
                <div class="menu-items">
                    <div class="menu-filter">
                        <h3 class="filter-title">Filter Menu</h3>
                        <form action="{{ route('menu') }}" method="GET">
                            <div class="filter-group">
                                <h4>Urutkan Berdasarkan</h4>
                                <select name="sort" class="form-control" onchange="this.form.submit()">
                                    <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Populer</option>
                                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga Terendah</option>
                                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga Tertinggi</option>
                                </select>
                            </div>
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        </form>
                    </div>

                    <div class="menu-grid">
                        @foreach($menuItems as $item)
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

                    {{ $menuItems->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection