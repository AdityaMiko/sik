<?php
include "../common/koneksi.php";
$kategori = $_POST['kategori'];
$kodekat = $_POST['kodekat'];
$sql = "UPDATE kategori SET kategori='$kategori' WHERE kodekat='$kodekat'";
// Query Edit Ke Database
$result = mysqli_query($mysqli, $sql);
if ($sql) {
    // melakukan pengalihan
    header("location:kategori.php");
} else {
    echo "Gagal";
}
