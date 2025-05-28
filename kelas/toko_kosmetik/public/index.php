<?php
// public/index.php
session_start();
require_once '../classes/Product.php';

$product = new Product();
$products = $product->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Toko Kosmetik</title>
</head>
<body>
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Cari produk..." value="<?php echo $search; ?>">
        <button type="submit">Cari</button>
    </form> 
    <header>
        <h1>Toko Kosmetik</h1>
        <nav>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
            <a href="products.php">Products</a>
        </nav>
    </header>
    <main>
        <h2>Produk Terbaru</h2>
        <div class="product-list">
            <?php foreach ($products as $product): ?>
                <div class="product-item">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                    <h3><?php echo $product['name']; ?></h3>
                    <p><?php echo $product['description']; ?></p>
                    <p>Harga: Rp <?php echo number_format($product['price'], 2, ',', '.'); ?></p>
                    <a href="cart.php?id=<?php echo $product['id']; ?>">Tambah ke Keranjang</a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 Toko Kosmetik. Semua hak dilindungi.</p>
    </footer>
</body>
</html>