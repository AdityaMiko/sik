<?php
include 'common/koneksi.php';
// memulai session
session_start();

// cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if ($_SESSION['status'] != "sudah_login") {
    // melakukan pengalihan
    header("location:common/login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/sik/img/ico.png">
    <title>Dashboard - Sistem Informasi Keuangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container">
            <a class="navbar-brand text-white" href="#">
                <img src="/sik/img/financial.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                SI-Keuangan
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Data
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/sik/data/kategori.php">Data Kategori</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/sik/data/transaksi.php">Data Transaksi</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/sik/data/pengguna.php">Data Pengguna</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/sik/img/profile-icon.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                            <?php echo $_SESSION['nama']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Laporan</a></li>
                            <li><a class="dropdown-item" href="/sik/common/formupdate.php?id=<?php echo $_SESSION['id_login'] ?>">Ganti Password</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/sik/common/logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- NavBar End -->

    <hr width="1"> <!-- GAP -->

    <!-- Content -->
    <div class="container">
        <h4>Dashboard</h4>
        <br>

        <?php
        $sql = "SELECT COUNT(username) AS ju FROM user";
        $sql2 = "SELECT SUM(pemasukan) AS totmasuk, SUM(pengeluaran) AS totkeluar FROM transaksi";
        // Query Menampilkan Hasil Dari Database
        $result = mysqli_query($mysqli, $sql);
        $result2 = mysqli_query($mysqli, $sql2);
        // Data
        $r = mysqli_fetch_assoc($result);
        $r2 = mysqli_fetch_assoc($result2)
        ?>

        <div class="row">
            <div class="col-sm-4">
                <div class="card border-dark">
                    <div class="card-body text-bg-primary">
                        <h5 class="card-title"><?php echo $r['ju']; ?> User</h5>
                        <br>
                        <p class="card-text">Pengguna Sistem Informasi Keuangan</p>
                    </div>
                    <a class="card-footer text-bg-primary btn" href="/sik/data/pengguna.php">
                        More Info &rarr;
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card border-dark">
                    <div class="card-body text-bg-success">
                        <h5 class="card-title text-white">Rp. <?php echo $r2['totmasuk'] . ',-'; ?></h5>
                        <br>
                        <p class="card-text text-white">Seluruh Pemasukan</p>
                    </div>
                    <a class="card-footer text-bg-success btn text-white" href="/sik/data/transaksi.php">
                        More Info &rarr;
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card border-dark">
                    <div class="card-body text-bg-danger">
                        <h5 class="card-title text-white">Rp. <?php echo $r2['totkeluar'] . ',-'; ?></h5>
                        <br>
                        <p class="card-text text-white">Seluruh Pengeluaran</p>
                    </div>
                    <a class="card-footer text-bg-danger btn text-white" href="/sik/data/transaksi.php">
                        More Info &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
</body>

</html>