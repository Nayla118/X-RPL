<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $subjek = $_POST['subjek'];
    $pesan = $_POST['pesan'];

    // Menyiapkan email
    $to = "support@tokoonline.com"; // Ganti dengan email Anda
    $subject = "Pesan dari $nama - $subjek";
    $message = "Nama: $nama\nEmail: $email\n\nPesan:\n$pesan";
    $headers = "From: $email";

    // Mengirim email
    if (mail($to, $subject, $message, $headers)) {
        echo "Pesan berhasil dikirim. Kami akan segera merespon.";
    } else {
        echo "Terjadi kesalahan, pesan tidak dapat dikirim.";
    }
}
?>
