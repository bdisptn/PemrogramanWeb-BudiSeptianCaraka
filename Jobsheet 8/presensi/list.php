<?php
$base = "../";
$title = "Daftar Presensi - AbsenUKM";

require_once '../includes/koneksi.php';
include '../includes/header.php';

// Ambil data presensi dari PostgreSQL
$stmt = $pdo->query("SELECT * FROM presensi ORDER BY id DESC");
$presensiList = $stmt->fetchAll();
?>

<section>
  <h2>Daftar Presensi Kegiatan</h2>
  <p><a href="tambah.php" class="btn-tambah">+ Catat Presensi Baru</a></p>

  <div class="search-box">
    <input type="text" id="search-input" data-tabel="tabel-presensi" placeholder="Cari kegiatan atau nama...">
  </div>

  <div class="table-responsive">
    <table id="tabel-presensi">
      <thead>
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama Anggota</th>
          <th>Kegiatan</th>
          <th>Tanggal</th>
          <th>Status</th>
          <th>Poin</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($presensiList)): ?>
          <tr class="baris-kosong">
            <td colspan="8">Belum ada riwayat presensi.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($presensiList as $index => $row): ?>
            <tr>
              <td><?= $index + 1 ?></td>
              <td><?= htmlspecialchars($row['nim']) ?></td>
              <td><strong><?= htmlspecialchars($row['nama']) ?></strong></td>
              <td><?= htmlspecialchars($row['kegiatan']) ?></td>
              <td><?= htmlspecialchars($row['tanggal']) ?></td>
              <td><?= htmlspecialchars($row['status']) ?></td>
              <td><?= htmlspecialchars($row['poin']) ?></td>
              <td>
                <button class="btn-hapus" data-id="<?= $row['id'] ?>">Hapus</button>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</section>

<?php include '../includes/footer.php'; ?>