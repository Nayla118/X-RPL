@extends('front')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">Register</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ url('/postregister') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-user"></i> Nama Lengkap</label>
                        <input class="form-control" value="{{ old('pelanggan') }}" type="text" name="pelanggan" placeholder="Masukkan nama lengkap">
                        <span class="text-danger">
                            @error('pelanggan')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-map-marker-alt"></i> Alamat</label>
                        <input class="form-control" value="{{ old('alamat') }}" type="text" name="alamat" placeholder="Masukkan alamat lengkap">
                        <span class="text-danger">
                            @error('alamat')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label"><i class="fas fa-phone"></i> Telepon</label>
                            <input class="form-control" value="{{ old('telp') }}" type="text" name="telp" placeholder="Nomor telepon">
                            <span class="text-danger">
                                @error('telp')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><i class="fas fa-venus-mars"></i> Jenis Kelamin</label>
                            <select class="form-select" name="jeniskelamin">
                                <option value="l">Laki-laki</option>
                                <option value="p" selected>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-envelope"></i> Email</label>
                        <input class="form-control" value="{{ old('email') }}" type="email" name="email" placeholder="Masukkan email">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-lock"></i> Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Masukkan password">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-user-plus"></i> Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection