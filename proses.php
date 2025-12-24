<?php
// proses.php - File ini KHUSUS menangani logika penerimaan data
include 'koneksi.php'; // Hubungkan ke database

// Cek apakah request yang masuk adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Ambil & Sanitasi Data
    // htmlspecialchars() penting untuk mencegah kode jahat (XSS)
    // mysqli_real_escape_string() penting untuk mencegah SQL Injection
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');
    
    // 2. Validasi Sederhana
    if (empty($name) || empty($email) || empty($message)) {
        header("Location: index.php?error=empty");
        exit;
    }

    // 3. Simpan ke Database MySQL
    // Gunakan Prepared Statement untuk keamanan maksimal
    $stmt = $conn->prepare("INSERT INTO tamu (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    
    if ($stmt->execute()) {
        // 4. Redirect ke Halaman Sukses
        $redirectUrl = "sukses.php?name=" . urlencode($name) . 
                       "&email=" . urlencode($email) . 
                       "&message=" . urlencode($message);
                       
        header("Location: " . $redirectUrl);
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
    exit; // Pastikan script berhenti setelah redirect
} else {
    // Jika ada yang coba akses file ini langsung tanpa submit form
    header("Location: index.php");
    exit;
}
?>