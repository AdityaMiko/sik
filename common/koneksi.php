<?php
// Variabel Koneksi
$hostname = "localhost";
$username = "root";
$password = "";
$database = "sik";

// Query Connect Database
$mysqli = mysqli_connect("$hostname", "$username", "$password", "$database");

// Cek Koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi ke mysql server gagal. ";
    exit;
}