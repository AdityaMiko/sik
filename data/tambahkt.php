<?php
include "../common/koneksi.php";
$kategori = $_POST['kategori'];

$sql = "INSERT INTO kategori (kategori) VALUES ('$kategori')";
// Query Input Ke Database
$result = mysqli_query($mysqli, $sql);
if ($sql) {
    // melakukan pengalihan
    header("location:kategori.php");
} else {
    echo "Gagal";
}
