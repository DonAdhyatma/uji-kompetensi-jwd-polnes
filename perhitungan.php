<?php
include 'koneksi.php';

// Tetapkan jumlah data per halaman
$limit = 5;

// Dapatkan nomor halaman saat ini dari parameter URL, jika tidak ada, default ke halaman 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Hitung total jumlah data
$totalQuery = "SELECT COUNT(*) as total FROM perhitungan";
$totalResult = mysqli_query($koneksi, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$totalData = $totalRow['total'];
$totalPages = ceil($totalData / $limit);

// Ambil data dari database sesuai halaman
$sql = "SELECT * FROM perhitungan LIMIT $limit OFFSET $offset";
$tampil = mysqli_query($koneksi, $sql);
$nomor = $offset + 1;
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body,
    html {
      height: 100%;
      margin: 0;
    }

    .main-container {
      min-height: 100%;
      display: flex;
      flex-direction: column;
    }

    .content {
      flex: 1;
    }

    footer {
      color: #ffffff;
      text-align: center;
      padding: 10px 0;
    }

    .table th {
      text-align: center;
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="./img/logo_kredit-transformed.png" alt="" width="100" height="50"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link text-white-50" aria-current="page" href="index.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white-50" href="perhitungan-input.php">Form Perhitungan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white active" href="perhitungan.php">Data Perhitungan</a>
            </li>
          </ul>

          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <form action="logout.php" method="post" class="d-flex">
                <button class="btn btn-outline-light" type="submit">Logout</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="container mt-3 main-container">

    <div class="content">
      <div class="mt-4 p-3 bg-secondary text-white rounded">
        <h2>DATA PERHITUNGAN</h2>
      </div>

      <div class="container mt-3">
        <div class="row">
          <div class="col">
            <a href="#" class="btn btn-success" onclick="window.print(); return false;">Cetak</a>
            <a href="export_excel.php" class="btn btn-success">Export Excel</a>
          </div>
          <div class="col" style="text-align:right">
            <a href="perhitungan-input.php" class="btn btn-primary">Tambah Perhitungan</a>
          </div>
        </div>
      </div>

      <div class="container mt-3">
        <table class="table table-striped">
          <tr>
            <th class="small">No</th>
            <th class="small">Tanggal Pengajuan</th>
            <th class="small">Nama Nasabah</th>
            <th class="small">Jumlah Pinjaman</th>
            <th class="small">Lama Pinjaman (bulan)</th>
            <th class="small">Angsuran Bunga</th>
            <th class="small">Angsuran Pokok</th>
            <th class="small">Total Angsuran/Bulan</th>
            <th class="small">Aksi</th>
          </tr>

          <?php
          if (mysqli_num_rows($tampil) > 0) {
            while ($row = mysqli_fetch_array($tampil)) {
              echo "<tr>";
              echo "<td>" . $nomor . "</td>";
              // Memformat tanggal dari format default MySQL (YYYY-MM-DD) menjadi (DD-MM-YYYY)
              $tanggal = date('d-m-Y', strtotime($row['tanggal']));
              echo "<td>" . $tanggal . "</td>";
              echo "<td>" . $row['nama'] . "</td>";
              echo "<td>Rp " . number_format($row['jml_pjmn'], 0, ',', '.') . "</td>";
              echo "<td class='text-center'>" . $row['lama_pjmn'] . " Bulan</td>";
              echo "<td>Rp " . number_format($row['angsr_bunga'], 0, ',', '.') . "</td>";
              echo "<td>Rp " . number_format($row['angsr_pokok'], 0, ',', '.') . "</td>";
              echo "<td>Rp " . number_format($row['total_angsr'], 0, ',', '.') . "</td>";
              echo "<td><a href='editperhitungan.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>EDIT</a>";
              echo "<a href='hapusper.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm ms-2' onclick=\"return confirm('Anda yakin ingin menghapus data ini?');\">HAPUS</a></td>";
              echo "</tr>";
              $nomor++;
            }
          } else {
            echo "<tr><td colspan='9'>Tidak ada data yang tersedia</td></tr>";
          }
          ?>
        </table>
        <nav aria-label="Page navigation">
          <ul class="pagination justify-content-end">
            <?php if ($page > 1) : ?>
              <li class="page-item">
                <a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a>
              </li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
              <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
              </li>
            <?php endfor; ?>
            <?php if ($page < $totalPages) : ?>
              <li class="page-item">
                <a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a>
              </li>
            <?php endif; ?>
          </ul>
        </nav>

        <div class="d-flex justify-content-start mb-4">
          <a href="index.php" class="btn btn-danger mt-3">Kembali</a>
        </div>
      </div>
    </div>

  </div>
  <footer class="py-2 bg-primary">
    <div class="container text-light text-center">
      <p class="display-6 mb-3">KREDIT</p>
      <small class="text-white">&copy; Copyright by KREDIT. All rights reserved</small>
    </div>
  </footer>

</body>

</html>