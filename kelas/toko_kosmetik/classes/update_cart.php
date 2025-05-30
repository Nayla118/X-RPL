<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['quantity'])) {
    foreach ($_POST['quantity'] as $productId => $quantity) {
        // Pastikan jumlah tidak kurang dari 1
        if ($quantity < 1) {
            $quantity = 1;
        }

        // Update jumlah item di keranjang
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $productId) {
                $item['quantity'] = $quantity;
                break;
            }
        }
    }
    // Redirect kembali ke halaman keranjang
    header("Location: cart.php");
    exit();
}
?>