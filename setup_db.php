<?php
$host = "localhost";
$user = "root";
$pass = "";

// Create connection to MySQL server (without selecting DB yet)
$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error . "\nPastikan XAMPP MySQL sudah berjalan.");
}

// Read SQL file
$sqlFile = 'database.sql';
if (!file_exists($sqlFile)) {
    die("File database.sql tidak ditemukan.");
}

$sql = file_get_contents($sqlFile);

// Execute multi query
if ($conn->multi_query($sql)) {
    echo "Database dan Tabel berhasil dibuat/diinisialisasi!\n";
    // Loop through results to clear buffer
    do {
        if ($res = $conn->store_result()) {
            $res->free();
        }
    } while ($conn->more_results() && $conn->next_result());
} else {
    echo "Error creating database: " . $conn->error . "\n";
}

$conn->close();
?>