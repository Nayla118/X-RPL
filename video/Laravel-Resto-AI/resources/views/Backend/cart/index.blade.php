@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
    <section class="section">
        <div class="container">
            <h2 class="section-title">Keranjang Belanja</h2>
            
            @if(count($items) > 0)
            <div class="cart-items">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>
                                <div class="cart-item-info">
                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" width="80">
                                    <div>
                                        <h4>{{ $item['name'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.update', $item['id']) }}" method="POST">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="quantity-input">
                                    <button type="submit" class="btn-update">Update</button>
                                </form>
                            </td>
                            <td>Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-remove">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right"><strong>Total:</strong></td>
                            <td colspan="2">Rp {{ number_format($total, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
                
                <div class="cart-actions">
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline">Kosongkan Keranjang</button>
                    </form>
                    <a href="{{ route('menu') }}" class="btn btn-outline">Lanjut Belanja</a>
                    <a href="#" class="btn btn-primary">Proses Pembayaran</a>
                </div>
            </div>
            @else
            <div class="empty-cart">
                <p>Keranjang belanja Anda kosong</p>
                <a href="{{ route('menu') }}" class="btn btn-primary">Lihat Menu</a>
            </div>
            @endif
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
        }
        
        .cart-table th, .cart-table td {
            padding: 1rem;
            border-bottom: 1px solid #eee;
            text-align: left;
        }
        
        .cart-table th {
            background-color: #f9f9f9;
        }
        
        .cart-item-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .quantity-input {
            width: 60px;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .btn-update {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 0.5rem;
        }
        
        .btn-remove {
            background: #ff6b6b;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .cart-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }
        
        .empty-cart {
            text-align: center;
            padding: 4rem 0;
        }
        
        .empty-cart p {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }
    </style>
@endpush