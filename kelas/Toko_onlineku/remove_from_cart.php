<?php
session_start();

// Menghapus produk dari keranjang
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    unset($_SESSION['cart'][$product_id]);
}

// Redirect kembali ke halaman keranjang
header("Location: cart.php");
exit();
?>
