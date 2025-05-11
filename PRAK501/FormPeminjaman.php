<?php
require 'Model.php';
$id = $_GET['id'] ?? '';
$hapus = $_GET['hapus'] ?? '';

if ($hapus) {
    deletePeminjaman($hapus);
    header('Location: Peminjaman.php');
    exit;
}

$data = ['member' => '', 'buku' => '', 'pinjam' => '', 'kembali' => ''];
if ($id) $data = getPeminjamanById($id);

if ($_POST) {
    $data = $_POST;
    if ($id) updatePeminjaman($id, $data);
    else insertPeminjaman($data);
    header('Location: Peminjaman.php');
    exit;
}

$members = getAllMembers();
$books = getAllBuku();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Peminjaman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="background.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="bg"></div>
    <div class="overlay"></div>

    <div class="container mt-5">
        <h2><?= $id ? 'Edit Peminjaman' : 'Tambah Peminjaman' ?></h2>
        <form method="post">
            <div class="mb-3">
                <label for="member" class="form-label">Member</label>
                <select class="form-select" id="member" name="member">
                    <?php foreach ($members as $m): ?>
                        <option value="<?= $m['id_member'] ?>" <?= ($data['id_member'] ?? '') == $m['id_member'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($m['nama_member']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="buku" class="form-label">Buku</label>
                <select class="form-select" id="buku" name="buku">
                    <?php foreach ($books as $b): ?>
                        <option value="<?= $b['id_buku'] ?>" <?= ($data['id_buku'] ?? '') == $b['id_buku'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($b['judul_buku']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control" id="pinjam" name="pinjam" value="<?= isset($data['tgl_pinjam']) ? date('Y-m-d', strtotime($data['tgl_pinjam'])) : '' ?>">
            </div>
            <div class="mb-3">
                <label for="kembali" class="form-label">Tanggal Kembali</label>
                <input type="date" class="form-control" id="kembali" name="kembali" value="<?= isset($data['tgl_kembali']) ? date('Y-m-d', strtotime($data['tgl_kembali'])) : '' ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="Peminjaman.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>