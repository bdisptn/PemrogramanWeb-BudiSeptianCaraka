<?php
$base = "../";
$title = "Daftar Anggota - AbsenUKM";

require_once '../includes/koneksi.php';
include '../includes/header.php';

// Ambil data anggota dari PostgreSQL
$stmt = $pdo->query("SELECT * FROM anggota ORDER BY id DESC");
$anggotaList = $stmt->fetchAll();
?>

<section>
  <h2>Daftar Anggota UKM</h2>
  <p><a href="tambah.php" class="btn-tambah">+ Tambah Anggota Baru</a></p>

  <div class="search-box">
    <input type="text" id="search-input" data-tabel="tabel-anggota" placeholder="Cari nama atau NIM...">
  </div>

  <div class="table-responsive">
    <table id="tabel-anggota">
      <thead>
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama Anggota</th>
          <th>UKM</th>
          <th>Jabatan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($anggotaList)): ?>
          <tr class="baris-kosong">
            <td colspan="6">Belum ada data anggota terdaftar.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($anggotaList as $index => $row): ?>
            <tr>
              <td><?= $index + 1 ?></td>
              <td><?= htmlspecialchars($row['nim']) ?></td>
              <td><strong><?= htmlspecialchars($row['nama']) ?></strong></td>
              <td><?= htmlspecialchars($row['ukm']) ?></td>
              <td><?= htmlspecialchars($row['jabatan']) ?></td>
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