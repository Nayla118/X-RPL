<?php
// Mulai sesi untuk keranjang
session_start();

// Data produk (biasanya ini diambil dari database, di sini hanya contoh)
$products = [
    1 => ['name' => 'Lipstick Rose', 'price' => 83000, 'image' => 'images/lip.jpg'],
    2 => ['name' => 'Plush Tint', 'price' => 90000, 'image' => 'images/liptint.jpg'],
    3 => ['name' => 'SkinTint', 'price' => 145000, 'image' => 'images/skintint.webp'],
    4 => ['name' => 'Lip Gloss', 'price' => 70000, 'image' => 'images/lipgloss.jpg'],
];

// Menangani penambahan produk ke keranjang
if (isset($_GET['add_to_cart'])) {
    $product_id = $_GET['add_to_cart'];

    if (array_key_exists($product_id, $products)) {
        // Cek apakah produk sudah ada di keranjang
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += 1;  // Jika ada, tambah jumlahnya
        } else {
            // Jika belum ada, tambahkan produk baru ke keranjang
            $_SESSION['cart'][$product_id] = $products[$product_id];
            $_SESSION['cart'][$product_id]['quantity'] = 1;  // Set jumlah produk
        }
    }
}
?>
