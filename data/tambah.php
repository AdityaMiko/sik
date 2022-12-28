<?php
include "../common/koneksi.php";
$tanggal = $_POST['tanggal'];
$kodekat = $_POST['kodekat'];
$keterangan = $_POST['keterangan'];
$pemasukan = $_POST['pemasukan'];
$pengeluaran = $_POST['pengeluaran'];

$sql = "INSERT INTO transaksi (tanggal, kodekat, keterangan, pemasukan, pengeluaran) VALUES ('$tanggal', '$kodekat', '$keterangan', '$pemasukan', '$pengeluaran')";
// Query Input Ke Database
$result = mysqli_query($mysqli, $sql);
if ($sql) {
    // melakukan pengalihan
    header("location:transaksi.php");
} else {
    echo "Gagal";
}