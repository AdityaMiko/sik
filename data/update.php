<?php
include "../common/koneksi.php";
$tanggal = $_POST['tanggal'];
$kodekat = $_POST['kodekat'];
$keterangan = $_POST['keterangan'];
$pemasukan = $_POST['pemasukan'];
$pengeluaran = $_POST['pengeluaran'];
$id = $_POST['id'];
$sql = "UPDATE transaksi SET tanggal='$tanggal', kodekat='$kodekat', keterangan='$keterangan', pemasukan='$pemasukan', pengeluaran='$pengeluaran' WHERE id='$id'";
// Query Edit Ke Database
$result = mysqli_query($mysqli, $sql);
if ($sql) {
    // melakukan pengalihan
    header("location:transaksi.php");
} else {
    echo "Gagal";
}
