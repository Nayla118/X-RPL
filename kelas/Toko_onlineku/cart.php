<?php
session_start();

// Menghapus produk dari keranjang
if (isset($_POST['remove_from_cart'])) {
    $product_id = $_POST['product_id'];

    // Hapus produk berdasarkan product_id
    unset($_SESSION['cart'][$product_id]);

    // Redirect kembali ke halaman keranjang setelah produk dihapus
    header('Location: cart.php');
    exit();
}

// Menghitung jumlah total produk di keranjang
$total_items = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background-color: #f8f9fa;
            padding: 20px 0;
        }
        .cart-icon {
            position: relative;
        }
        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            padding: 5px 10px;
            font-size: 14px;
        }
        .table th, .table td {
            text-align: center;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .total-section {
            font-size: 18px;
            font-weight: bold;
        }

        /* Sticky footer styles */
        footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
            padding: 20px 0;
            margin-top: auto; /* Ensures the footer is at the bottom */
        }
    </style>
</head>
<body>

<!-- Header -->
<header class="border-bottom">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <a href="index.php" class="text-decoration-none mx-2">Home</a>
            <a href="shop.php" class="text-decoration-none mx-2">Shop</a>
            <a href="about.php" class="text-decoration-none mx-2">About</a>
            <a href="contact.php" class="text-decoration-none mx-2">Contact</a>
        </div>
        <div class="cart-icon">
            <a href="cart.php" class="text-decoration-none">
                <span class="cart-badge"><?= $total_items ?></span>
                <img src="images/cart.jpeg" alt="">
            </a>
        </div>
    </div>
</header>

<!-- Keranjang Belanja -->
<div class="container my-5">
    <h3>Keranjang Belanja</h3>

    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_price = 0;
                    foreach ($_SESSION['cart'] as $product_id => $item):
                        $total_price += $item['price'] * $item['quantity'];
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td>Rp <?= number_format($item['price'], 0, ',', '.') ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td>Rp <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?></td>
                        <td>
                            <form method="POST" action="cart.php" style="display:inline;">
                                <input type="hidden" name="product_id" value="<?= $product_id ?>">
                                <button type="submit" name="remove_from_cart" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between total-section">
            <h4>Total: Rp <?= number_format($total_price, 0, ',', '.') ?></h4>
            <a href="checkout.php" class="btn btn-success">Checkout</a>
        </div>
    <?php else: ?>
        <p>Keranjang belanja Anda kosong.</p>
    <?php endif; ?>
</div>

<!-- Footer -->
<footer>
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
