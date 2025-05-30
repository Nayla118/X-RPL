<?php
// classes/Review.php
require_once 'Database.php';

class Review {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->dbConnection();
    }

    // Metode untuk menambahkan ulasan
    public function addReview($productId, $userId, $comment, $rating) {
        $query = "INSERT INTO reviews (product_id, user_id, comment, rating) VALUES (:product_id, :user_id, :comment, :rating)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':product_id', $productId);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':comment', $comment);
        $stmt->bindParam(':rating', $rating);
        return $stmt->execute();
    }

    // Metode untuk mengambil ulasan berdasarkan ID produk
    public function getReviews($productId) {
        $query = "SELECT r.comment, r.rating, u.username FROM reviews r JOIN users u ON r.user_id = u.id WHERE r.product_id = :product_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>