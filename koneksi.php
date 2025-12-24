<?php
// koneksi.php - File konfigurasi database

$host = "localhost";
$user = "root";
$pass = ""; // Default XAMPP password kosong
$db   = "db_bukutamu";

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>