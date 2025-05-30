<?php
// Memulai sesi untuk menyimpan data keranjang
session_start();

// Menangani penambahan produk ke keranjang
if (isset($_POST['add_to_cart'])) {
    // Ambil informasi produk yang dipilih
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    // Periksa apakah produk sudah ada di keranjang
    if (isset($_SESSION['cart'][$product_id])) {
        // Jika produk sudah ada, tambahkan jumlahnya
        $_SESSION['cart'][$product_id]['quantity']++;
    } else {
        // Jika produk belum ada, tambahkan ke keranjang
        $_SESSION['cart'][$product_id] = [
            'name' => $product_name,
            'price' => $product_price,
            'quantity' => 1
        ];
    }

    // Setelah produk ditambahkan, redirect ke halaman keranjang
    header('Location: cart.php');
    exit(); // Pastikan tidak ada kode lain yang dieksekusi setelah pengalihan
}

// Menghitung jumlah total produk di keranjang
$total_items = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel-item img {
            height: 400px;
            object-fit: cover;
        }
        .cart-icon {
            position: relative;
        }
        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #d03e70;
            color: white;
            border-radius: 50%;
            padding: 5px 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-light border-bottom py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="menu">
                <a href="index.php" class="text-decoration-none mx-2">Home</a>
                <a href="shop.php" class="text-decoration-none mx-2">Shop</a>
                <a href="about.php" class="text-decoration-none mx-2">About</a>
                <a href="contact.php" class="text-decoration-none mx-2">Contact</a>
            </div>
            <div class="search w-50 mx-3">
                <input type="text" class="form-control" placeholder="Cari produk...">
            </div>
            <div class="auth">
                <a href="register.php" class="btn btn-primary btn-sm mx-1">Register</a>
                <a href="login.php" class="btn btn-secondary btn-sm mx-1">Login</a>
            </div>
            <!-- Keranjang Belanja -->
            <div class="cart-icon">
                <a href="cart.php" class="text-decoration-none">
                    <img src="images/cart.jpeg" alt="Keranjang" width="30" height="30">
                    <span id="cart-badge" class="cart-badge"><?= $total_items ?></span>
                </a>
            </div>
        </div>
    </header>

    <!-- Carousel -->
    <div class="container my-4">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/home-bg.jpg" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="images/home-bg-2.jpg" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="images/home-bg 3.webp" class="d-block w-100" alt="Slide 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Daftar Produk -->
    <div class="container my-4">
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card text-center">
                    <img src="images/lip.jpg" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Lip mouse Rose All Day</h5>
                        <p class="card-text">Rp 83.000</p>
                        <form method="POST" action="index.php">
                            <input type="hidden" name="product_id" value="1">
                            <input type="hidden" name="product_name" value="Lip mouse Rose All Day">
                            <input type="hidden" name="product_price" value="83000">
                            <button class="btn btn-danger" type="submit" name="add_to_cart">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center">
                    <img src="images/liptint.jpg" class="card-img-top" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Plush Tint ROse All Day</h5>
                        <p class="card-text">Rp 90.000</p>
                        <form method="POST" action="index.php">
                            <input type="hidden" name="product_id" value="2">
                            <input type="hidden" name="product_name" value="Plush Tint ROse All Day">
                            <input type="hidden" name="product_price" value="90000">
                            <button class="btn btn-danger" type="submit" name="add_to_cart">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center">
                    <img src="images/skintint.webp" class="card-img-top" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">SkinTint Rose All Day</h5>
                        <p class="card-text">Rp 145.000</p>
                        <form method="POST" action="index.php">
                            <input type="hidden" name="product_id" value="3">
                            <input type="hidden" name="product_name" value="SkinTint Rose All Day">
                            <input type="hidden" name="product_price" value="145000">
                            <button class="btn btn-danger" type="submit" name="add_to_cart">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center">
                    <img src="images/lip glos.jpg" class="card-img-top" alt="Product 4">
                    <div class="card-body">
                        <h5 class="card-title">Lip Gloss - Rose All Day</h5>
                        <p class="card-text">Rp 70.000</p>
                        <form method="POST" action="index.php">
                            <input type="hidden" name="product_id" value="4">
                            <input type="hidden" name="product_name" value="Lip Gloss - Rose All Day">
                            <input type="hidden" name="product_price" value="70000">
                            <button class="btn btn-danger" type="submit" name="add_to_cart">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light border-top py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5>Menu</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none">Home</a></li>
                        <li><a href="#" class="text-decoration-none">Shop</a></li>
                        <li><a href="#" class="text-decoration-none">About</a></li>
                        <li><a href="#" class="text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Pembayaran</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none">Visa</a></li>
                        <li><a href="#" class="text-decoration-none">Mastercard</a></li>
                        <li><a href="#" class="text-decoration-none">PayPal</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Media Sosial</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none">Facebook</a></li>
                        <li><a href="#" class="text-decoration-none">Instagram</a></li>
                        <li><a href="#" class="text-decoration-none">Twitter</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Kontak</h5>
                    <p>Email: support@tokoonline.com</p>
                    <p>Telp: +62 123 4567</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
