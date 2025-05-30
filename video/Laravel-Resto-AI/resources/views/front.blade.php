<nav class="navbar navbar-expand-lg fixed-top shadow-sm" style="background-color: #ffffff;">
    <div class="container-fluid px-4">
        <a href="/" class="navbar-brand">
            <img src="{{ asset('gambar/logo-ais.png') }}" alt="AIS Logo" style="width: 120px; height: auto;">
        </a>
        <ul class="navbar-nav ms-auto gap-4 align-items-center">
            @if (session()->has('cart'))
                <li class="nav-item">
                    <a href="{{ url('cart') }}" class="nav-link position-relative">
                        <i class="bi bi-cart3 fs-5"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ count(session('cart')) }}
                        </span>
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a href="#" class="nav-link"><i class="bi bi-cart3 fs-5"></i></a>
                </li>
            @endif

            @if (session()->missing('idpelanggan'))
                <li class="nav-item"><a href="{{ url('register') }}" class="btn btn-outline-primary">Register</a></li>
                <li class="nav-item"><a href="{{ url('login') }}" class="btn btn-primary">Login</a></li>
            @endif

            @if (session()->has('idpelanggan'))
                <li class="nav-item"><span class="nav-link">{{ session('idpelanggan')['email'] }}</span></li>
                <li class="nav-item"><a href="{{ url('logout') }}" class="btn btn-outline-danger">Logout</a></li>
            @endif
        </ul>
    </div>
</nav>

<div class="row mt-4">
            <div class="col-2">
                <ul class="list-group">
                    @foreach ($kategoris as $kategori)
                    <li class="list-group-item"><a href="{{ url('show/'.$kategori->idkategori) }}">{{ $kategori -> kategori }}</a></li>
                    @endforeach
                </ul>
                
            </div>
            <div class="col-10">
                @yield('content')
            </div>
        </div>
        <div class="bg-light mt5">
            <p class="text-center">Nayla-X-RPL.</p>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>