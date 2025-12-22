<?php
// proses.php - File ini KHUSUS menangani logika penerimaan data

// Cek apakah request yang masuk adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Ambil & Sanitasi Data
    // htmlspecialchars() penting untuk mencegah kode jahat (XSS)
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');
    
    // 2. Validasi Sederhana
    if (empty($name) || empty($email) || empty($message)) {
        // Jika ada yang kosong, kembalikan ke form dengan error (opsional)
        header("Location: index.php?error=empty");
        exit;
    }

    // 3. Simpan ke Database (File Text)
    $data = [
        'timestamp' => date("Y-m-d H:i:s"),
        'name' => $name,
        'email' => $email,
        'message' => $message
    ];
    
    // Simpan dalam format JSON (satu baris per entri)
    // FILE_APPEND: Menambahkan di akhir file tanpa menghapus isi sebelumnya
    // LOCK_EX: Mengunci file saat menulis agar tidak bentrok jika banyak user
    file_put_contents('buku_tamu.txt', json_encode($data, JSON_UNESCAPED_UNICODE) . PHP_EOL, FILE_APPEND | LOCK_EX);

    // 4. Redirect ke Halaman Sukses
    // Kita kirim data via URL Parameter (Query String) agar bisa ditampilkan di halaman sukses
    // urlencode() penting agar karakter khusus (spasi, @, dll) aman di URL
    $redirectUrl = "sukses.php?name=" . urlencode($name) . 
                   "&email=" . urlencode($email) . 
                   "&message=" . urlencode($message);
                   
    header("Location: " . $redirectUrl);
    exit; // Pastikan script berhenti setelah redirect
} else {
    // Jika ada yang coba akses file ini langsung tanpa submit form
    header("Location: index.php");
    exit;
}
?>