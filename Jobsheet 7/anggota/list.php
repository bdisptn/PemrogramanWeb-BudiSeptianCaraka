<?php
$base = "../";
$title = "Daftar Anggota - AbsenUKM";
include '../includes/header.php';

// Inisialisasi data awal di session jika belum ada
if (!isset($_SESSION['anggota'])) {
    $_SESSION['anggota'] = [
        ['id' => 1, 'nim' => '2341720001', 'nama' => 'Budi Septian Caraka', 'ukm' => 'UKM Pengembangan Pemrograman', 'jabatan' => 'Ketua Umum'],
        ['id' => 2, 'nim' => '2341720002', 'nama' => 'Siti Nurhaliza', 'ukm' => 'UKM Pengembangan Pemrograman', 'jabatan' => 'Sekretaris']
    ];
}
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
        <?php if (empty($_SESSION['anggota'])): ?>
          <tr class="baris-kosong">
            <td colspan="6">Belum ada data anggota terdaftar.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($_SESSION['anggota'] as $index => $row): ?>
            <tr>
              <td><?= $index + 1 ?></td>
              <td><?= htmlspecialchars($row['nim']) ?></td>
              <td><strong><?= htmlspecialchars($row['nama']) ?></strong></td>
              <td><?= htmlspecialchars($row['ukm']) ?></td>
              <td><?= htmlspecialchars($row['jabatan']) ?></td>
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