<?php
// Koneksi ke database
include "koneksi.php";

// Ambil data dari form
$id = $_POST["id"];
$tanggal = $_POST["tanggal"];
$nama = $_POST["nama"];
$jml_pjmn = $_POST["jml_pjmn"];
$lama_pjmn = $_POST["lama_pjmn"];

// Konversi format tanggal ke format MySQL "YYYY-MM-DD"
$tanggal_mysql = date('Y-m-d', strtotime($tanggal));

// Hitung angsuran pokok
$angsr_pokok = $jml_pjmn / $lama_pjmn;

// Hitung angsuran bunga (1.5% dari angsuran pokok)
$angsr_bunga = $angsr_pokok * 0.015;

// Hitung total angsuran per bulan
$total_angsr = $angsr_bunga + $angsr_pokok;

// Query untuk mengupdate data di tabel perhitungan
$query = "UPDATE perhitungan SET tanggal = ?, nama = ?, jml_pjmn = ?, lama_pjmn = ?, angsr_bunga = ?, angsr_pokok = ?, total_angsr = ? WHERE id = ?";

// Persiapkan statement
$stmt = $koneksi->prepare($query);

// Bind parameter ke statement
$stmt->bind_param("ssiidddi", $tanggal_mysql, $nama, $jml_pjmn, $lama_pjmn, $angsr_bunga, $angsr_pokok, $total_angsr, $id);

// Eksekusi statement
if ($stmt->execute()) {
  header("location: perhitungan.php"); // Redirect ke halaman perhitungan.php jika update berhasil
} else {
  echo "Error: " . $query . "<br>" . $stmt->error; // Tampilkan pesan error jika query gagal
}

// Tutup statement
$stmt->close();
$koneksi->close();
