<?php
session_start();
require_once '../includes/koneksi.php';

// Keamanan: Hanya izinkan method POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;

    if ($id) {
        try {
            $stmt = $pdo->prepare("DELETE FROM anggota WHERE id = :id");
            $stmt->execute([':id' => $id]);

            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Data anggota berhasil dihapus.'];
        } catch (PDOException $e) {
            $_SESSION['flash'] = ['type' => 'danger', 'message' => 'Gagal menghapus data: ' . $e->getMessage()];
        }
    }
}

header('Location: list.php');
exit;