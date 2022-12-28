<?php
require '../common/koneksi.php';
$kodekat = null;
if (!empty($_GET['kodekat'])) {
    $kodekat = $_GET['kodekat'];
}
if ($id == null) {
    header("Location: kategori.php");
}
if (!empty($_POST)) {
    $kodekat = $_POST['kodekat'];
    $sql = "DELETE FROM kategori WHERE kodekat='$kodekat'";
    // Query Delete
    $result = mysqli_query($mysqli, $sql);

    header("Location: kategori.php");
}