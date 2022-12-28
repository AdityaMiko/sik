<?php
include "../common/koneksi.php";
$password = $_POST['password'];
$id = $_POST['id'];
$sql = "UPDATE user SET password='$password' WHERE id='$id'";
// Query Edit Ke Database
$result = mysqli_query($mysqli, $sql);
if ($result) {
    header("location:../common/relogin.php");
} else {
    echo "Error Password Gagal Diubah";
}
