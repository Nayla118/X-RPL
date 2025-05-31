@extends('layouts.app')

@section('title', $menuItem->name)

@push('styles')
    <link href="{{ asset('css/animations.css') }}" rel="stylesheet">
@endpush

@section('content')
    <section class="section product-detail">
        <div class="container">
            <div class="product-container">
                <div class="product-image fade-in">
                    <img src="{{ $menuItem->image }}" alt="{{ $menuItem->name }}">
                </div>
                <div class="product-info">
                    <h1>{{ $menuItem->name }}</h1>
                    <div class="rating">
                        <div class="stars">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>☆</span>
                        </div>
                        <span class="review-count">({{ $menuItem->views }} dilihat)</span>
                    </div>
                    <div class="price">Rp {{ number_format($menuItem->price, 0, ',', '.') }}</div>
                    <p>{{ $menuItem->description }}</p>
                    
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $menuItem->id }}">
                        <div class="quantity-control">
                            <label for="quantity" class="quantity-label">Jumlah:</label>
                            <div class="quantity-input">
                                <button type="button" class="quantity-btn minus">-</button>
                                <input type="number" id="quantity" name="quantity" value="1" min="1">
                                <button type="button" class="quantity-btn plus">+</button>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                    </form>
                    
                    <div class="product-meta">
                        <h3>Detail Produk</h3>
                        <ul class="meta-list">
                            <li><strong>Kategori:</strong> {{ $menuItem->category->name }}</li>
                            <li><strong>Ketersediaan:</strong> Tersedia</li>
                            <li><strong>Porsi:</strong> 1 orang</li>
                            <li><strong>Waktu Penyajian:</strong> 15-20 menit</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            @if($relatedItems->count() > 0)
            <div class="related-items">
                <h2 class="section-title">Menu Serupa</h2>
                <div class="menu-grid">
                    @foreach($relatedItems as $item)
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
            </div>
            @endif
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const minusBtn = document.querySelector('.quantity-btn.minus');
            const plusBtn = document.querySelector('.quantity-btn.plus');
            const quantityInput = document.querySelector('#quantity');
            
            minusBtn.addEventListener('click', function() {
                let value = parseInt(quantityInput.value);
                if (value > 1) {
                    quantityInput.value = value - 1;
                }
            });
            
            plusBtn.addEventListener('click', function() {
                let value = parseInt(quantityInput.value);
                quantityInput.value = value + 1;
            });
        });
    </script>
@endpush