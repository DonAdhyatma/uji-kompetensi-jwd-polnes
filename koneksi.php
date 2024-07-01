<?php
$servername = "localhost";
$username = "root";
$password = "";
$databases = "kreditdbs";

// Create connection
$koneksi = new mysqli($servername, $username, $password, $databases);

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}
