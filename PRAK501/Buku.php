<?php
require 'Model.php';
$buku = getAllBuku();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="background.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="bg"></div>
    <div class="overlay"></div>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Data Buku</h2>
            <a href="FormBuku.php" class="btn btn-success">Tambah Buku</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($buku as $b): ?>
                    <tr>
                        <td><?= $b['id_buku'] ?></td>
                        <td><?= htmlspecialchars($b['judul_buku']) ?></td>
                        <td><?= htmlspecialchars($b['penulis']) ?></td>
                        <td><?= htmlspecialchars($b['penerbit']) ?></td>
                        <td><?= htmlspecialchars($b['tahun_terbit']) ?></td>
                        <td>
                            <a href="FormBuku.php?id=<?= $b['id_buku'] ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="FormBuku.php?hapus=<?= $b['id_buku'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>