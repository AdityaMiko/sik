<?php
require '../common/koneksi.php';
$id = null;
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
}
if ($id == null) {
    header("Location: transaksi.php");
}
if (!empty($_POST)) {
    $id = $_POST['id'];
    $sql = "DELETE FROM transaksi WHERE id='$id'";
    // Query Delete
    $result = mysqli_query($mysqli, $sql);

    header("Location: transaksi.php");
}