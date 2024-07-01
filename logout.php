<?php
session_start(); // Mulai session

// Hapus semua data sesi
session_unset();
session_destroy();

// Redirect ke halaman login atau halaman lain setelah logout
header("Location: login.php");
exit;
