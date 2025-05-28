<?php
// banner.php
include 'config.php';
$query = "SELECT * FROM banners WHERE status = 'active'";
$result = $conn->query($query);
$banners = [];
while ($row = $result->fetch_assoc()) {
    $banners[] = $row;
}
echo json_encode($banners);
?>