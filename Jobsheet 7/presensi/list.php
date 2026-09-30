<?php
$base = "../";
$title = "Daftar Presensi - AbsenUKM";
include '../includes/header.php';

// Inisialisasi data awal di session jika belum ada
if (!isset($_SESSION['presensi'])) {
    $_SESSION['presensi'] = [
        ['id' => 1, 'nim' => '2341720001', 'nama' => 'Budi Septian Caraka', 'kegiatan' => 'Workshop AIoT', 'tanggal' => '2026-03-15', 'status' => 'Hadir', 'poin' => 10]
    ];
}
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
        <?php if (empty($_SESSION['presensi'])): ?>
          <tr class="baris-kosong">
            <td colspan="8">Belum ada riwayat presensi.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($_SESSION['presensi'] as $index => $row): ?>
            <tr>
              <td><?= $index + 1 ?></td>
              <td><?= htmlspecialchars($row['nim']) ?></td>
              <td><strong><?= htmlspecialchars($row['nama']) ?></strong></td>
              <td><?= htmlspecialchars($row['kegiatan']) ?></td>
              <td><?= htmlspecialchars($row['tanggal']) ?></td>
              <td><?= htmlspecialchars($row['status']) ?></td>
              <td><?= htmlspecialchars($row['poin']) ?></td>
              <td>
                <button class="btn-hapus">Hapus</button>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</section>

<?php include '../includes/footer.php'; ?>