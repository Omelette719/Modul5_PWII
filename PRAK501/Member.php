<?php
require 'Model.php';
$members = getAllMembers();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Member</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="background.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="bg"></div>
    <div class="overlay"></div>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Data Member</h2>
            <a href="FormMember.php" class="btn btn-success">Tambah Member</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nomor</th>
                    <th>Alamat</th>
                    <th>Tgl Daftar</th>
                    <th>Tgl Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($members as $m): ?>
                    <tr>
                        <td><?= $m['id_member'] ?></td>
                        <td><?= htmlspecialchars($m['nama_member']) ?></td>
                        <td><?= htmlspecialchars($m['nomor_member']) ?></td>
                        <td><?= htmlspecialchars($m['alamat']) ?></td>
                        <td><?= htmlspecialchars($m['tgl_mendaftar']) ?></td>
                        <td><?= htmlspecialchars($m['tgl_terakhir_bayar']) ?></td>
                        <td>
                            <a href="FormMember.php?id=<?= $m['id_member'] ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="FormMember.php?hapus=<?= $m['id_member'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data?')">Hapus</a>
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