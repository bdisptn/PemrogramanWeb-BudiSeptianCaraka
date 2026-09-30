<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = trim($_POST['nim'] ?? '');
    $nama = trim($_POST['nama'] ?? '');
    $kegiatan = trim($_POST['kegiatan'] ?? '');
    $tanggal = trim($_POST['tanggal'] ?? '');
    $status = trim($_POST['status'] ?? '');
    $poin = trim($_POST['poin'] ?? '0');

    $errors = [];

    // Validasi Server-Side
    if (empty($nim) || !ctype_digit($nim)) {
        $errors[] = "NIM wajib berupa angka.";
    }

    if (empty($nama)) {
        $errors[] = "Nama Mahasiswa wajib diisi.";
    }

    if (empty($kegiatan)) {
        $errors[] = "Nama Kegiatan wajib diisi.";
    }

    if (empty($tanggal)) {
        $errors[] = "Tanggal wajib diisi.";
    }

    if (!is_numeric($poin) || $poin < 0) {
        $errors[] = "Poin tidak boleh bernilai negatif.";
    }

    if (!empty($errors)) {
        $_SESSION['flash'] = [
            'type' => 'danger',
            'message' => implode('<br>', $errors)
        ];
        header('Location: tambah.php');
        exit;
    }

    // Simpan ke session
    if (!isset($_SESSION['presensi'])) {
        $_SESSION['presensi'] = [];
    }

    $_SESSION['presensi'][] = [
        'id' => time(),
        'nim' => $nim,
        'nama' => $nama,
        'kegiatan' => $kegiatan,
        'tanggal' => $tanggal,
        'status' => $status,
        'poin' => (int)$poin
    ];

    $_SESSION['flash'] = [
        'type' => 'success',
        'message' => 'Catatan presensi berhasil ditambahkan!'
    ];

    header('Location: list.php');
    exit;
}