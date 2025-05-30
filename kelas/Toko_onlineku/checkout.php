<?php
session_start();

// Mengecek apakah keranjang belanja ada dan tidak kosong
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    header('Location: cart.php');
    exit();
}

// Menghitung total harga dari semua produk di keranjang
$total_price = 0;
foreach ($_SESSION['cart'] as $item) {
    $total_price += $item['price'] * $item['quantity'];
}

// Mengecek apakah form checkout telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari form
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    
    // Proses pembayaran bisa ditambahkan di sini (misalnya integrasi dengan gateway pembayaran)
    
    // Mengosongkan keranjang setelah checkout
    unset($_SESSION['cart']);
    
    // Tampilkan konfirmasi pembayaran
    echo "<script>alert('Terima kasih, $name! Pembelian Anda berhasil.')</script>";
    echo "<script>window.location.href = 'index.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .cart-item-table th, .cart-item-table td {
            text-align: center;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
    </style>
</head>
<body>

<!-- Header -->
<header class="bg-light border-bottom py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <a href="index.php" class="text-decoration-none mx-2">Home</a>
            <a href="shop.php" class="text-decoration-none mx-2">Shop</a>
            <a href="about.php" class="text-decoration-none mx-2">About</a>
            <a href="contact.php" class="text-decoration-none mx-2">Contact</a>
        </div>
    </div>
</header>

<!-- Checkout Form -->
<div class="container my-5">
    <h3>Checkout</h3>

    <!-- Ringkasan Pesanan -->
    <div class="table-responsive">
        <table class="table table-bordered cart-item-table">
            <thead class="table-light">
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td>Rp <?= number_format($item['price'], 0, ',', '.') ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td>Rp <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between total-section">
        <h4>Total: Rp <?= number_format($total_price, 0, ',', '.') ?></h4>
    </div>

    <!-- Form Pengiriman -->
    <h4>Informasi Pengiriman</h4>
    <form method="POST" action="checkout.php">
        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat Pengiriman</label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-success">Lanjutkan ke Pembayaran</button>
    </form>
</div>

<!-- Footer -->
<footer class="bg-light border-top py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5>Menu</h5>
                <ul class="list-unstyled">
                    <li><a href="index.php" class="text-decoration-none">Home</a></li>
                    <li><a href="shop.php" class="text-decoration-none">Shop</a></li>
                    <li><a href="about.php" class="text-decoration-none">About</a></li>
                    <li><a href="contact.php" class="text-decoration-none">Contact</a></li>
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
