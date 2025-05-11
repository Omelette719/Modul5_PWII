<?php
require 'Model.php';
$id = $_GET['id'] ?? '';
$hapus = $_GET['hapus'] ?? '';

if ($hapus) {
    deleteMember($hapus);
    header('Location: Member.php');
    exit;
}

$data = [
    'nama' => '',
    'nomor' => '',
    'alamat' => '',
    'daftar' => '',
    'bayar' => ''
];

if ($id) $data = getMemberById($id);

if ($_POST) {
    $data = $_POST;
    if ($id) updateMember($id, $data);
    else insertMember($data);
    header('Location: Member.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Member</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="background.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="bg"></div>
    <div class="overlay"></div>

    <div class="container mt-5">
        <h2><?= $id ? 'Edit Member' : 'Tambah Member' ?></h2>
        <form method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($data['nama_member'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label for="nomor" class="form-label">Nomor</label>
                <input type="text" class="form-control" id="nomor" name="nomor" value="<?= htmlspecialchars($data['nomor_member'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat"><?= htmlspecialchars($data['alamat'] ?? '') ?></textarea>
            </div>
            <div class="mb-3">
                <label for="daftar" class="form-label">Tanggal Daftar</label>
                <input type="datetime-local" step="1" class="form-control" id="daftar" name="daftar" value="<?= isset($data['tgl_mendaftar']) ? date('Y-m-d', strtotime($data['tgl_mendaftar'])) : '' ?>">
            </div>
            <div class="mb-3">
                <label for="bayar" class="form-label">Tanggal Bayar</label>
                <input type="date" class="form-control" id="bayar" name="bayar" value="<?= isset($data['tgl_terakhir_bayar']) ? date('Y-m-d', strtotime($data['tgl_terakhir_bayar'])) : '' ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="Member.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>