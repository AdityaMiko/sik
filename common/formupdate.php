<?php
include '../common/koneksi.php';
// memulai session
session_start();

// cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if ($_SESSION['status'] != "sudah_login") {
    // melakukan pengalihan
    header("location:../common/login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/sik/img/ico.png">
    <title>Ganti Password - Sistem Informasi Keuangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <?php
    $id = $_SESSION['id_login'];
    $sql = "SELECT * from user WHERE id = $id";
    // Query Menampilkan Hasil Dari Database
    $result = mysqli_query($mysqli, $sql);
    // Data
    $r = mysqli_fetch_assoc($result);
    ?>
    <main class="form-signin w-100 m-auto">
        <h1 class="h3 mb-3 fw-normal">Ganti Password</h1>
        <div class="form-floating">
            <input type="text" class="form-control rounded-0" id="floatingPassword" value="<?php echo $r['nama']; ?>" placeholder="Nama" readonly>
            <label for="floatingPassword">Nama</label>
        </div>
        <br>
        <div class="form-floating">
            <input type="username" class="form-control rounded-0" id="floatingInput" value="<?php echo $r['username']; ?>" placeholder="Username" readonly>
            <label for="floatingInput">Username</label>
        </div>
        <br>
        <div class="form-floating">
            <input type="text" class="form-control rounded-0" id="floatingPassword" value="<?php echo $r['password']; ?>" placeholder="Password" readonly>
            <label for="floatingPassword">Password</label>
        </div>
        <br>
        <form action="gantipassword.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
            <div class="form-floating">
                <input type="password" class="form-control rounded-0" id="floatingPassword" name="password" placeholder="password">
                <label for="floatingPassword">Password Baru</label>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <a class="w-75 btn btn-md btn-danger text-white rounded-0" href="../index.php" type="button">Batal</a>
                </div>
                <div class="col">
                    <button class="w-75 btn btn-md btn-success text-white rounded-0" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </main>
</body>

</html>