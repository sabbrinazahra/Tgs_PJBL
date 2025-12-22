<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Terkirim - Buku Tamu Digital</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        
        <!-- Kartu Sukses -->
        <div class="success-card">
            <div class="success-header">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 3rem; height: 3rem; margin: 0 auto 0.5rem auto;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h2 style="font-size: 1.5rem; font-weight: 700;">Pesan Diterima!</h2>
                <p style="opacity: 0.9; font-size: 0.875rem; margin-top: 0.25rem;">Terima kasih telah menghubungi kami.</p>
            </div>
            
            <div class="success-content">
                <!-- Data diambil dari URL Parameter (GET) -->
                <!-- htmlspecialchars() tetap WAJIB di sini untuk keamanan tampilan -->
                <div class="data-row">
                    <label class="data-label">Nama Pengunjung</label>
                    <p class="data-value"><?php echo htmlspecialchars($_GET['name'] ?? '-'); ?></p>
                </div>
                
                <div class="data-row">
                    <label class="data-label">Alamat Email</label>
                    <p class="data-value"><?php echo htmlspecialchars($_GET['email'] ?? '-'); ?></p>
                </div>
                
                <div class="data-row">
                    <label class="data-label">Pesan</label>
                    <div class="message-box">
                        "<?php echo htmlspecialchars($_GET['message'] ?? '-'); ?>"
                    </div>
                </div>

                <a href="index.php" class="btn-back">
                    Kembali ke Form
                </a>
            </div>
        </div>

        <div class="footer">
            &copy; <?php echo date("Y"); ?> Project Buku Tamu.
        </div>
    </div>

</body>
</html>
