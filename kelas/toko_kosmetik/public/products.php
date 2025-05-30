<?php
// public/products.php
session_start();
require_once '../classes/Product.php';
require_once '../classes/Review.php';

$product = new Product();
$review = new Review();
$products = $product->getAllProducts(); // Pastikan ini mengembalikan array

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Produk - Toko Kosmetik</title>
</head>
<body>
    <header class="bg-dark text-white text-center py-4">
        <h1>Produk</h1>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Home</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="container mt-4">
        <h2 class="text-center">Daftar Produk</h2>

        <!-- Form Pencarian -->
        <form method="GET" action="products.php" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari produk..." required>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>

        <div class="row">
            <?php
            // Ambil produk berdasarkan pencarian
            $search = '';
            if (isset($_GET['search'])) {
                $search = $_GET['search'];
                $products = $product->searchProducts($search); // Pastikan metode ini ada di kelas Product
            } else {
                $products = $product->getAllProducts();
            }

            foreach ($products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['name']; ?></h5>
                            <p class="card-text"><?php echo $product['description']; ?></p>
                            <p class="card-text">Harga: Rp <?php echo number_format($product['price'], 2, ',', '.'); ?></p>
                            <a href="cart.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">Tambah ke Keranjang</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2023 Toko Kosmetik. Semua hak dilindungi.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>