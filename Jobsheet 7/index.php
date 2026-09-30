<?php
$base = "";
$title = "Beranda - AbsenUKM";
include 'includes/header.php';

// Menghitung statistik langsung dari PHP Session
$total_anggota = isset($_SESSION['anggota']) ? count($_SESSION['anggota']) : 0;
$total_presensi = isset($_SESSION['presensi']) ? count($_SESSION['presensi']) : 0;
?>

<section>
  <h2>Selamat Datang di AbsenUKM</h2>
  <p>Sistem informasi pengelolaan data anggota dan presensi kegiatan Unit Kegiatan Mahasiswa.</p>
</section>

<section>
  <h2>Statistik Ringkas</h2>
  <article>
    <h3>Total Anggota</h3>
    <p><?= $total_anggota ?> Mahasiswa</p>
  </article>
  <article>
    <h3>Total Presensi</h3>
    <p><?= $total_presensi ?> Catatan</p>
  </article>
</section>

<?php include 'includes/footer.php'; ?>