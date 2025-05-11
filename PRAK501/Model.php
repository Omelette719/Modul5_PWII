<?php

require 'Koneksi.php';

function getAllMembers()
{
    $conn = getConnection();
    return $conn->query("SELECT * FROM member")->fetchAll(PDO::FETCH_ASSOC);
}

function getMemberById($id)
{
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM member WHERE id_member = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function insertMember($data)
{
    $conn = getConnection();
    $stmt = $conn->prepare("INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$data['nama'], $data['nomor'], $data['alamat'], $data['daftar'], $data['bayar']]);
}

function updateMember($id, $data)
{
    $conn = getConnection();
    $stmt = $conn->prepare("UPDATE member SET nama_member=?, nomor_member=?, alamat=?, tgl_mendaftar=?, tgl_terakhir_bayar=? WHERE id_member=?");
    return $stmt->execute([$data['nama'], $data['nomor'], $data['alamat'], $data['daftar'], $data['bayar'], $id]);
}

function deleteMember($id)
{
    $conn = getConnection();
    return $conn->prepare("DELETE FROM member WHERE id_member = ?")->execute([$id]);
}

function getAllBuku()
{
    $conn = getConnection();
    return $conn->query("SELECT * FROM buku")->fetchAll(PDO::FETCH_ASSOC);
}

function getBukuById($id)
{
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM buku WHERE id_buku = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function insertBuku($data)
{
    $conn = getConnection();
    $stmt = $conn->prepare("INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$data['judul'], $data['penulis'], $data['penerbit'], $data['tahun']]);
}

function updateBuku($id, $data)
{
    $conn = getConnection();
    $stmt = $conn->prepare("UPDATE buku SET judul_buku=?, penulis=?, penerbit=?, tahun_terbit=? WHERE id_buku=?");
    return $stmt->execute([$data['judul'], $data['penulis'], $data['penerbit'], $data['tahun'], $id]);
}

function deleteBuku($id)
{
    $conn = getConnection();
    return $conn->prepare("DELETE FROM buku WHERE id_buku = ?")->execute([$id]);
}


function getAllPeminjaman()
{
    $conn = getConnection();
    return $conn->query("SELECT * FROM peminjaman")->fetchAll(PDO::FETCH_ASSOC);
}

function getPeminjamanById($id)
{
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM peminjaman WHERE id_peminjaman = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function insertPeminjaman($data)
{
    $conn = getConnection();
    $stmt = $conn->prepare("INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$data['member'], $data['buku'], $data['pinjam'], $data['kembali']]);
}

function updatePeminjaman($id, $data)
{
    $conn = getConnection();
    $stmt = $conn->prepare("UPDATE peminjaman SET id_member=?, id_buku=?, tgl_pinjam=?, tgl_kembali=? WHERE id_peminjaman=?");
    return $stmt->execute([$data['member'], $data['buku'], $data['pinjam'], $data['kembali'], $id]);
}

function deletePeminjaman($id)
{
    $conn = getConnection();
    return $conn->prepare("DELETE FROM peminjaman WHERE id_peminjaman = ?")->execute([$id]);
}
