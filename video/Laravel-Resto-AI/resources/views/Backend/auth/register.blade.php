@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <section class="section">
        <div class="container">
            <div class="auth-form">
                <h2 class="section-title">Daftar Akun Baru</h2>
                
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                        @error('password')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                    
                    <div class="form-footer">
                        Sudah punya akun? <a href="{{ route('login') }}">Login disini</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endpush