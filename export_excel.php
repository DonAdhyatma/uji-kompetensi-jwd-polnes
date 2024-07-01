<?php
// Pastikan path require autoload.php sudah benar
require 'vendor/autoload.php';

// Inisialisasi PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Membuat objek Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Header kolom
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Tanggal Pengajuan');
$sheet->setCellValue('C1', 'Nama Nasabah');
$sheet->setCellValue('D1', 'Jumlah Pinjaman');
$sheet->setCellValue('E1', 'Lama Pinjaman (bulan)');
$sheet->setCellValue('F1', 'Angsuran Bunga');
$sheet->setCellValue('G1', 'Angsuran Pokok');
$sheet->setCellValue('H1', 'Total Angsuran/Bulan');

// Query untuk mengambil data
include 'koneksi.php';
$sql = "SELECT * FROM perhitungan";
$tampil = mysqli_query($koneksi, $sql);
$nomor = 1;
$rowNumber = 2; // Baris data dimulai dari baris ke-2

// Fungsi untuk format rupiah
function formatRupiah($angka)
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

// Mengambil data dan menulis ke file Excel
if (mysqli_num_rows($tampil) > 0) {
    while ($row = mysqli_fetch_array($tampil)) {
        $sheet->setCellValue('A' . $rowNumber, $nomor); // Nomor urut
        $sheet->setCellValue('B' . $rowNumber, date('d-m-Y', strtotime($row['tanggal'])));
        $sheet->setCellValue('C' . $rowNumber, $row['nama']);
        $sheet->setCellValue('D' . $rowNumber, formatRupiah($row['jml_pjmn']));
        $sheet->setCellValue('E' . $rowNumber, $row['lama_pjmn'] . ' Bulan');
        $sheet->setCellValue('F' . $rowNumber, formatRupiah($row['angsr_bunga']));
        $sheet->setCellValue('G' . $rowNumber, formatRupiah($row['angsr_pokok']));
        $sheet->setCellValue('H' . $rowNumber, formatRupiah($row['total_angsr']));
        $nomor++;
        $rowNumber++;
    }
}

// Set header untuk download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="data_kredit_rakyat.xlsx"');
header('Cache-Control: max-age=0');

// Menyimpan file Excel
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

// Selesai
exit;
