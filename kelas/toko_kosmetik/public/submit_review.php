<?php
session_start();
require_once '../classes/Review.php'; // Pastikan Anda memiliki kelas Review

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['product_id'];
    $userId = $_SESSION['user_id']; // Ambil ID pengguna dari sesi
    $comment = $_POST['comment'];
    $rating = $_POST['rating'];

    $review = new Review();
    if ($review->addReview($productId, $userId, $comment, $rating)) {
        header("Location: products.php?id=$productId"); // Kembali ke halaman produk
        exit();
    } else {
        echo "Gagal mengirim ulasan.";
    }
}
?>