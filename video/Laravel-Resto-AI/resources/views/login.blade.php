@extends('front')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">Login</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ url('/postlogin ') }}" method="post">
                    @csrf

                    @if (Session::Has('pesan'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{Session::get('pesan') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-envelope"></i> Email</label>
                        <input class="form-control" value="{{ old('email') }}" type="email" name="email" placeholder="Enter your email">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-lock"></i> Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Enter your password">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection