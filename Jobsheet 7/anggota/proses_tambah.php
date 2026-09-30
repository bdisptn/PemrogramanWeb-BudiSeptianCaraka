<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = trim($_POST['nim'] ?? '');
    $nama = trim($_POST['nama'] ?? '');
    $ukm = trim($_POST['ukm'] ?? '');
    $jabatan = trim($_POST['jabatan'] ?? '');

    $errors = [];

    // Validasi Server-Side
    if (empty($nim)) {
        $errors[] = "NIM wajib diisi.";
    } elseif (!ctype_digit($nim)) {
        $errors[] = "NIM harus berupa angka.";
    }

    if (empty($nama)) {
        $errors[] = "Nama Anggota wajib diisi.";
    }

    if (empty($ukm)) {
        $errors[] = "Nama UKM wajib diisi.";
    }

    // Jika terjadi error validasi
    if (!empty($errors)) {
        $_SESSION['flash'] = [
            'type' => 'danger',
            'message' => implode('<br>', $errors)
        ];
        header('Location: tambah.php');
        exit;
    }

    // Simpan data ke session
    if (!isset($_SESSION['anggota'])) {
        $_SESSION['anggota'] = [];
    }

    $_SESSION['anggota'][] = [
        'id' => time(),
        'nim' => $nim,
        'nama' => $nama,
        'ukm' => $ukm,
        'jabatan' => $jabatan
    ];

    $_SESSION['flash'] = [
        'type' => 'success',
        'message' => 'Data anggota berhasil disimpan!'
    ];

    header('Location: list.php');
    exit;
}