<?php
// Koneksi ke database
include 'koneksi.php';

// Periksa apakah parameter id telah diterima
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Query untuk menghapus data berdasarkan id
  $query = "DELETE FROM perhitungan WHERE id = ?";
  $stmt = $koneksi->prepare($query);
  $stmt->bind_param("i", $id);

  // Eksekusi statement
  if ($stmt->execute()) {
    // Redirect kembali ke halaman pesan.php setelah berhasil menghapus
    header("location: perhitungan.php");
    exit();
  } else {
    echo "Error: Gagal menghapus data.";
  }

  // Tutup statement
  $stmt->close();
}

// Tutup koneksi
$koneksi->close();
