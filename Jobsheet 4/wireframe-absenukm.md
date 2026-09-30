# Wireframe & User Flow — AbsenUKM

Sub-CPMK: Merancang UI/UX aplikasi (proyek).

Halaman yang sudah ada (Beranda, Daftar/Tambah Anggota, Rekap/Input Presensi — Jobsheet 1-3) belum mencakup fitur Login, Dashboard Pengurus, Manajemen Kegiatan, dan Riwayat Kehadiran per Anggota. Dokumen ini merancang wireframe untuk halaman-halaman tersebut sebelum diimplementasikan pada jobsheet berikutnya.

## Aktor
- **Anggota / Tamu**: hanya bisa melihat Beranda dan agenda kegiatan tanpa login.
- **Pengurus (sekretaris)**: login untuk mengelola data anggota, membuat kegiatan, dan menginput presensi.

## User Flow — Input Presensi

```
[Pengurus Login] -> [Dashboard] -> [Pilih menu "Input Presensi"]
        -> [Pilih Kegiatan] -> [Daftar anggota aktif tampil]
        -> [Isi keterangan tiap anggota: Hadir/Izin/Sakit/Alfa]
        -> [Simpan] -> [Rekap kegiatan terbentuk] -> [Kembali ke Dashboard]
```

## User Flow — Membuat Kegiatan Baru

```
[Dashboard] -> [Menu "Kegiatan"] -> [Tombol "+ Kegiatan Baru"]
        -> [Isi nama, tanggal, lokasi] -> [Simpan]
        -> [Kegiatan muncul di Agenda Beranda dan pilihan Input Presensi]
```

## Wireframe: Halaman Login

```
+--------------------------------------+
|              AbsenUKM                |
|--------------------------------------|
|                                      |
|        [ Login Pengurus ]            |
|                                      |
|   Username : [______________]        |
|   Password : [______________]        |
|                                      |
|          [   Masuk   ]               |
|                                      |
|   Lupa password? Hubungi ketua UKM   |
+--------------------------------------+
```

## Wireframe: Dashboard Pengurus

```
+---------------------------------------------------------------+
| AbsenUKM   Beranda | Anggota | Kegiatan | Presensi | (Nama) Logout |
|---------------------------------------------------------------|
|  [Total Anggota]   [Kegiatan Bulan Ini]   [Rata-rata Hadir]   |
|                                                               |
|  Aksi Cepat:                                                  |
|  [ + Input Presensi ]   [ + Kegiatan Baru ]                   |
|                                                               |
|  Kegiatan Terbaru                                             |
|  ----------------------------------------------------------   |
|  Tanggal | Kegiatan | Hadir | Izin/Sakit | Alfa               |
+---------------------------------------------------------------+
```

## Wireframe: Form Kegiatan Baru

```
+--------------------------------------+
|  Form Kegiatan Baru                  |
|--------------------------------------|
|  Nama Kegiatan : [______________]    |
|  Tanggal       : [ pilih tanggal ]   |
|  Jam Mulai     : [ 15:00 ]           |
|  Lokasi        : [______________]    |
|                                      |
|          [  Simpan Kegiatan  ]       |
+--------------------------------------+
```

## Wireframe: Form Input Presensi

```
+---------------------------------------------------------+
|  Input Presensi                                         |
|---------------------------------------------------------|
|  Kegiatan : [ dropdown pilih kegiatan ]                 |
|  Tanggal  : [ otomatis sesuai kegiatan ]                |
|                                                         |
|  NIM | Nama | Keterangan | Catatan                      |
|  ---------------------------------------------------    |
|  2308... | Rina M.   | [Hadir v] | [_______]            |
|  2308... | Bagus P.  | [Izin  v] | [alasan izin]        |
|  2208... | Siti N.   | [Alfa  v] | [_______]            |
|                                                         |
|              [  Simpan Presensi  ]                      |
+---------------------------------------------------------+
```

## Wireframe: Riwayat Kehadiran per Anggota

```
+---------------------------------------------------------+
|  Riwayat Kehadiran — Rina Marlina (23081010001)         |
|---------------------------------------------------------|
|  Kegiatan          | Tanggal | Jam Datang | Keterangan   |
|  Latihan Rutin      | 12/09   | 15:02      | Hadir        |
|  Rapat Persiapan    | 16/09   | -          | Izin         |
|                                                         |
|  Ringkasan: Hadir 8 | Izin 1 | Sakit 0 | Alfa 1           |
+---------------------------------------------------------+
```

## Wireframe: Tampilan Mobile (≤480px)

```
+------------------------+
| AbsenUKM               |
| Sistem Absensi UKM     |
|------------------------|
|                    [≡] |   <- menu hamburger
|------------------------|
|  Ringkasan Statistik   |
|  Total Anggota         |
|  5 anggota terdaftar   |
|  ----------------      |
|  Hadir                 |
|  3 anggota hadir       |
+------------------------+
```

## Konsistensi dengan Desain yang Sudah Berjalan
- Warna navy dan aksen emas, tipografi judul, gaya tabel zebra, dan kartu statistik mengikuti `assets/css/style.css` yang sudah dibangun sejak Jobsheet 2-3.
- Navbar akan ditambah menu **Kegiatan** dan indikator status login (nama pengurus / tombol Logout) saat implementasi login.
- Field `nim` tetap menjadi penghubung antara data anggota dan data presensi.
- Edge case yang perlu ditangani saat implementasi: anggota berstatus nonaktif tidak muncul di daftar Input Presensi; presensi ganda untuk NIM dan kegiatan yang sama ditolak; keterangan Izin/Sakit wajib diisi catatan; anggota dengan alfa berulang diberi penanda pada Riwayat Kehadiran (tugas mandiri).
