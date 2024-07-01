<?php
include 'koneksi.php';

// Ambil id dari parameter GET
$id = $_GET['id'];

// Query untuk mengambil data berdasarkan id
$query = "SELECT * FROM perhitungan WHERE id = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

// Tutup statement
$stmt->close();
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Perhitungan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container mt-3">
    <div class="container mt-3 bg-primary p-4 rounded-2 text-white">
      <h2>Edit Perhitungan</h2>
    </div>
    <form action="proses_editbaru.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

      <div class="mb-3 mt-3">
        <label for="nama" class="form-label">Nama Nasabah:</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
      </div>

      <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal Pengajuan:</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $data['tanggal']; ?>" required>
      </div>

      <div class="mb-3">
        <label for="jml_pjmn" class="form-label">Jumlah Pinjaman:</label>
        <input type="number" class="form-control" id="jml_pjmn" name="jml_pjmn" value="<?php echo $data['jml_pjmn']; ?>" required>
      </div>

      <div class="mb-3">
        <label for="lama_pjmn" class="form-label">Lama Pinjaman (bulan):</label>
        <input type="number" class="form-control" id="lama_pjmn" name="lama_pjmn" value="<?php echo $data['lama_pjmn']; ?>" required>
      </div>

      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      <a href="perhitungan.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>

</html>