<?php
session_start();

// Daftar produk (contoh data produk)
$products = [
    [
        'id' => 1,
        'name' => 'Produk 1',
        'price' => 100000,
        'image' => 'images/liptint.jpg',
        'description' => 'Deskripsi produk 1'
    ],
    [
        'id' => 2,
        'name' => 'Produk 2',
        'price' => 150000,
        'image' => 'images/skintint.webp',
        'description' => 'Deskripsi produk 2'
    ],
    [
        'id' => 3,
        'name' => 'Produk 3',
        'price' => 200000,
        'image' => 'images/lip glos.jpg',
        'description' => 'Deskripsi produk 3'
    ]
];

// Menambahkan produk ke keranjang
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    
    // Cari produk berdasarkan ID
    foreach ($products as $product) {
        if ($product['id'] == $product_id) {
            $item = [
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $quantity
            ];
            
            // Menambah produk ke keranjang
            $_SESSION['cart'][$product_id] = $item;
            break;
        }
    }
    
    // Redirect ke halaman keranjang setelah produk ditambahkan
    header('Location: cart.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online - Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
        }
        .product-card img {
            width: 100%;
            height: auto;
            max-height: 200px;
            object-fit: cover;
        }
        .product-card .price {
            font-size: 18px;
            color: merah;
            font-weight: bold;
        }
        .product-card .btn {
            background-color: #28a745;
            color: white;
            border-radius: 5px;
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
        <div>
            <a href="cart.php" class="text-decoration-none">
                <img src="images/cart-icon.svg" alt="Keranjang" width="30" height="30">
                <span class="badge bg-danger"><?= isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0 ?></span>
            </a>
        </div>
    </div>
</header>

<!-- Daftar Produk -->
<div class="container my-4">
    <h3>Shop</h3>
    <div class="row">
        <?php foreach ($products as $product): ?>
        <div class="col-md-4 mb-4">
            <div class="product-card">
                <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                <h5 class="mt-3"><?= $product['name'] ?></h5>
                <p class="text-muted"><?= $product['description'] ?></p>
                <p class="price">Rp <?= number_format($product['price'], 0, ',', '.') ?></p>
                
                <!-- Form untuk menambahkan produk ke keranjang -->
                <form method="POST" action="shop.php">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Jumlah</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1" required>
                    </div>
                    <button type="submit" name="add_to_cart" class="btn btn-success w-100">Tambah ke Keranjang</button>
                </form>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
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
