<?php
// public/cart.php
session_start();
require_once '../classes/Product.php';

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Proses checkout
    $userId = $_SESSION['user_id'];
    $order = new Order();
    $orderId = $order->createOrder($userId, $total);

    foreach ($cart as $item) {
        $order->addOrderItem($orderId, $item['id'], $item['quantity'], $item['price']);
    }

    // Kosongkan keranjang setelah checkout
    unset($_SESSION['cart']);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Keranjang - Toko Kosmetik</title>
</head>
<body>
    <header class="bg-dark text-white text-center py-4">
        <h1>Keranjang Belanja</h1>
    </header>
    <main class="container mt-4">
        <div class="cart-list">
            <?php if (empty($_SESSION['cart'])): ?>
                <p class="text-center">Keranjang Anda kosong.</p>
            <?php else: ?>
                <form method="POST" action="update_cart.php">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($_SESSION['cart'] as $item): 
                                $total += $item['price'] * $item['quantity'];
                            ?>
                            <tr>
                                <td><?php echo $item['name']; ?></td>
                                <td>Rp <?php echo number_format($item['price'], 2, ',', '.'); ?></td>
                                <td>
                                    <input type="number" name="quantity[<?php echo $item['id']; ?>]" value="<?php echo $item['quantity']; ?>" min="1" class="form-control" style="width: 80px;">
                                </td>
                                <td>Rp <?php echo number_format($item['price'] * $item['quantity'], 2, ',', '.'); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <h3>Total: Rp <?php echo number_format($total, 2, ',', '.'); ?></h3>
                    <button type="submit" class="btn btn-warning">Update Keranjang</button>
                </form>
                <form method="POST" action="checkout.php" class="mt-3">
                    <button type="submit" class="btn btn-success">Checkout</button>
                </form>
            <?php endif; ?>
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