<?php
require 'Model.php';
$id = $_GET['id'] ?? '';
$hapus = $_GET['hapus'] ?? '';

if ($hapus) {
    deleteBuku($hapus);
    header('Location: Buku.php');
    exit;
}

$data = ['judul' => '', 'penulis' => '', 'penerbit' => '', 'tahun' => ''];
if ($id) $data = getBukuById($id);
if ($_POST) {
    $data = $_POST;
    if ($id) updateBuku($id, $data);
    else insertBuku($data);
    header('Location: Buku.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="background.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="bg"></div>
    <div class="overlay"></div>

    <div class="container mt-5">
        <h2><?= $id ? 'Edit Buku' : 'Tambah Buku' ?></h2>
        <form method="post">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?= htmlspecialchars($data['judul_buku'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" value="<?= htmlspecialchars($data['penulis'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= htmlspecialchars($data['penerbit'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control" id="tahun" name="tahun" value="<?= htmlspecialchars($data['tahun_terbit'] ?? '') ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="Buku.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>