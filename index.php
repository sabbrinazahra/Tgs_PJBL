<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Digital</title>
    <!-- Link ke file CSS eksternal -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        
        <!-- Header Hiasan -->
        <div class="header">
            <div class="icon-wrapper">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 2rem; height: 2rem;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
            </div>
            <h1>Buku Tamu</h1>
            <p>Silakan isi form di bawah ini untuk meninggalkan pesan.</p>
        </div>

        <!-- Form Input -->
        <div class="card">
            <!-- Action mengarah ke proses.php -->
            <form action="proses.php" method="POST">
                
                <div class="form-group">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="form-input" placeholder="Contoh: Budi Santoso" required>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="nama@email.com" required>
                </div>

                <div class="form-group">
                    <label for="message" class="form-label">Pesan Anda</label>
                    <textarea id="message" name="message" rows="4" class="form-input" placeholder="Tuliskan pesan kesan anda di sini..." required></textarea>
                </div>

                <button type="submit" class="btn-submit">
                    Kirim Pesan
                </button>
            </form>
        </div>

        <!-- Tombol Navigasi ke Daftar Tamu -->
        <div class="nav-link-wrapper">
            <p style="color: #6b7280; font-size: 0.875rem; margin-bottom: 0.5rem;">Ingin melihat pesan orang lain?</p>
            <a href="lihat_tamu.php" class="nav-link">
                Lihat Daftar Tamu &rarr;
            </a>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; <?php echo date("Y"); ?> Project Buku Tamu.
        </div>
    </div>

</body>
</html>
