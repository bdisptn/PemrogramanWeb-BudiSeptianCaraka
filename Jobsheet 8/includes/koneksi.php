<?php
// Konfigurasi Database
$host = 'localhost';
$port = '5432';
$db   = 'absen_ukm';
$user = 'postgres'; 
$pass = '130905'; 

$dsn = "pgsql:host=$host;port=$port;dbname=$db";

try {
    // Membuat instance PDO
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
} catch (PDOException $e) {
    // Tampilkan pesan jika koneksi gagal
    die("Koneksi Database Gagal: " . $e->getMessage());
}