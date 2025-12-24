<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tamu - Buku Tamu Digital</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        
        <!-- Header -->
        <div class="header">
            <div class="icon-wrapper">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 2rem; height: 2rem;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
            </div>
            <h1>Daftar Tamu</h1>
            <p>Lihat siapa saja yang telah berkunjung.</p>
        </div>

        <!-- Tombol Navigasi Atas -->
        <div style="margin-bottom: 2rem; animation: fadeInUp 0.8s ease-out 0.2s forwards; opacity: 0;">
            <a href="index.php" class="btn-submit" style="display: block; text-align: center; text-decoration: none; background: white; color: #ea580c; border: 1px solid #fed7aa; box-shadow: none;">
                &larr; Kembali ke Form Isi
            </a>
        </div>

        <!-- Daftar Buku Tamu -->
        <div class="guestbook-section" style="margin-top: 0; animation-delay: 0.4s;">
            <div class="guestbook-list" style="max-height: none;">
            <?php
            include 'koneksi.php'; // Hubungkan ke database

            // Query untuk mengambil data dari tabel 'tamu' diurutkan dari yang terbaru
            $sql = "SELECT name, email, message, created_at FROM tamu ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Loop melalui hasil query
                while($row = $result->fetch_assoc()) {
            ?>
                    <div class="guestbook-item">
                        <div class="guestbook-header">
                            <div class="avatar">
                                <?php echo strtoupper(substr($row['name'], 0, 1)); ?>
                            </div>
                            <div>
                                <div class="guestbook-name"><?php echo htmlspecialchars($row['name']); ?></div>
                                <div class="guestbook-time"><?php echo date('d M Y, H:i', strtotime($row['created_at'])); ?></div>
                            </div>
                        </div>
                        <p class="guestbook-message">
                            "<?php echo htmlspecialchars($row['message']); ?>"
                        </p>
                    </div>
            <?php
                }
            } else {
                echo '<div style="text-align: center; padding: 3rem; border: 1px dashed #d1d5db; border-radius: 0.75rem; color: #9ca3af; background: white;">
                        <p style="margin-bottom: 0.5rem; font-weight: 600;">Belum ada pesan</p>
                        <p style="font-size: 0.875rem;">Jadilah orang pertama yang mengisi buku tamu ini!</p>
                      </div>';
            }
            
            // Tutup koneksi (opsional di sini karena PHP akan menutupnya otomatis di akhir script, tapi good practice)
            $conn->close();
            ?>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; <?php echo date("Y"); ?> Project Buku Tamu.
        </div>
    </div>

</body>
</html>
