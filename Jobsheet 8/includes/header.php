<?php
// Memulai session di setiap halaman jika belum aktif
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Menentukan variabel $base untuk path relatif (default di root)
$base = $base ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'AbsenUKM' ?></title>
  <link rel="stylesheet" href="<?= $base ?>assets/css/style.css">
</head>
<body>
  <header>
    <div class="brand">
      <h1>AbsenUKM</h1>
      <p>Sistem Presensi & Kegiatan Mahasiswa</p>
    </div>
    <button id="nav-toggle-btn" class="menu-button" aria-label="Buka Menu">☰</button>
    <nav>
      <ul>
        <li><a href="<?= $base ?>index.php">Beranda</a></li>
        <li><a href="<?= $base ?>anggota/list.php">Anggota</a></li>
        <li><a href="<?= $base ?>presensi/list.php">Presensi</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <!-- Display Flash Message jika ada -->
    <?php if (isset($_SESSION['flash'])): ?>
      <div class="alert alert-<?= $_SESSION['flash']['type'] ?>">
        <?= $_SESSION['flash']['message'] ?>
      </div>
      <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>