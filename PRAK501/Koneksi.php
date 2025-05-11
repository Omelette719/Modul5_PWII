<?php

function getConnection()
{
    $host = 'localhost';
    $db = 'perpustakaan';
    $user = 'root';
    $pass = '';
    $dsn = "mysql:host=$host;dbname=$db";
    try {
        return new PDO($dsn, $user, $pass);
    } catch (PDOException $e) {
        die("Koneksi gagal: " . $e->getMessage());
    }
}
