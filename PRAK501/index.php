<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Perpustakaan - Halaman Utama</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="background.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="bg"></div>
    <div class="overlay"></div>

    <div class="container text-center mt-5 content">
        <h1 class="mb-4">Selamat Datang di Sistem Perpustakaan</h1>
        <p class="lead mb-5">Silakan pilih menu di bawah untuk mengelola data:</p>

        <div class="row justify-content-center">
            <div class="col-md-3 mb-3">
                <a href="Peminjaman.php" class="btn btn-primary w-100 py-3">Kelola Peminjaman</a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="Member.php" class="btn btn-success w-100 py-3">Kelola Member</a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="Buku.php" class="btn btn-warning w-100 py-3">Kelola Buku</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>