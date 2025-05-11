<?php
require 'Model.php';
$peminjaman = getAllPeminjaman();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Peminjaman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="background.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="bg"></div>
    <div class="overlay"></div>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Data Peminjaman</h2>
            <a href="FormPeminjaman.php" class="btn btn-success">Tambah Peminjaman</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>ID Member</th>
                    <th>ID Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($peminjaman as $p): ?>
                    <tr>
                        <td><?= $p['id_peminjaman'] ?></td>
                        <td><?= htmlspecialchars($p['id_member']) ?></td>
                        <td><?= htmlspecialchars($p['id_buku']) ?></td>
                        <td><?= htmlspecialchars($p['tgl_pinjam']) ?></td>
                        <td><?= htmlspecialchars($p['tgl_kembali']) ?></td>
                        <td>
                            <a href="FormPeminjaman.php?id=<?= $p['id_peminjaman'] ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="FormPeminjaman.php?hapus=<?= $p['id_peminjaman'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data?')">Hapus</a>
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