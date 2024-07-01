<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Perhitungan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container mt-3">
    <div class="mt-4 p-5 bg-secondary text-white rounded">
      <h2>Form Perhitungan</h2>
    </div>
  </div>

  <div class="container mt-3">
    <form action="simpanbaru.php" method="post">
      <div class="mb-3 mt-3">
        <label for="nama" class="form-label">Nama Nasabah :</label>
        <input type="text" class="form-control" id="nama" placeholder="Enter Nama" name="nama" required>
      </div>

      <div class="mb-3 mt-3">
        <label for="tanggal" class="form-label">Tanggal Pengajuan :</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
      </div>

      <div class="mb-3 mt-3">
        <label for="jml_pjmn" class="form-label">Jumlah Pinjaman :</label>
        <input type="number" class="form-control" id="jml_pjmn" name="jml_pjmn" required>
      </div>

      <div class="mb-3 mt-3">
        <label for="lama_pjmn" class="form-label">Lama Pinjaman (bulan) :</label>
        <input type="number" class="form-control" id="lama_pjmn" name="lama_pjmn" required>
      </div>

      <div class="d-flex justify-content-start gap-2 mb-5">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="index.php" class="btn btn-danger">Kembali</a>
      </div>
    </form>
  </div>
</body>

</html>