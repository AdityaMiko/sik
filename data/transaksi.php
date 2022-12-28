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
    <title>Transaksi - Sistem Informasi Keuangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container">
            <a class="navbar-brand text-white" href="../index.php">
                <img src="/sik/img/financial.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                SI-Keuangan
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="/sik/index.php">Dashboard</a>
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
                            <li><a class="dropdown-item" href="#">Data Transaksi</a></li>
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
        <h4>Transaksi</h4>
        <br>
        <!-- Modal Button Tambah -->
        <button type="button" class="btn btn-info rounded-0 text-white" data-bs-toggle="modal" data-bs-target="#exampleModalTambah">+ Tambah Transaksi</button>
        <!-- Modal Tambah Data -->
        <div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Transaksi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="tambah.php">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" placeholder="Tanggal">
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="kodekat">Kategori</label>
                                <select class="form-select" name="kodekat" id="kodekat">
                                    <option selected>Choose...</option>
                                    <?php
                                    $sql = "SELECT * FROM kategori";
                                    // Query Menampilkan Hasil Dari Database
                                    $result = mysqli_query($mysqli, $sql);
                                    $t = 1;
                                    // Perulangan While
                                    while ($u = mysqli_fetch_assoc($result)) { ?>
                                        <option value="<?php echo $u['kodekat']; ?>"><?php echo $u['kategori']; ?></option>
                                    <?php $t++;
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Pemasukan</label>
                                <input type="text" class="form-control" name="pemasukan" placeholder="Pemasukan">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Pengeluaran</label>
                                <input type="text" class="form-control" name="pengeluaran" placeholder="Pengeluaran">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-md rounded-0" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <hr width="1"> <!-- GAP -->

        <!-- Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">NO</th>
                    <th scope="col" class="text-center">TANGGAL</th>
                    <th scope="col" class="text-center">KATEGORI</th>
                    <th scope="col" class="text-center">KETERANGAN</th>
                    <th scope="col" class="text-center">PEMASUKAN</th>
                    <th scope="col" class="text-center">PENGELUARAN</th>
                    <th scope="col" class="text-center">OPSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql1 = "SELECT * FROM transaksi, kategori where transaksi.kodekat=kategori.kodekat";
                // Query Menampilkan Hasil Dari Database
                $result2 = mysqli_query($mysqli, $sql1);
                $i = 1;
                // Perulangan While
                while ($r = mysqli_fetch_assoc($result2)) { ?>
                    <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td><?php echo $r['tanggal']; ?> </td>
                        <td><?php echo $r['kategori']; ?> </td>
                        <td><?php echo $r['keterangan']; ?> </td>
                        <td><?php echo 'Rp. ' . $r['pemasukan'] . ',-'; ?> </td>
                        <td><?php echo 'Rp. ' . $r['pengeluaran'] . ',-'; ?> </td>
                        <td>
                            <!-- Modal Button Edit -->
                            <button type="button" class="btn btn-sm btn-warning rounded-0 text-white" data-bs-toggle="modal" data-bs-target="#exampleModalEdit<?php echo $r['id']; ?>">Edit</button>

                            <!-- Modal Button Hapus -->
                            <button type="button" class="btn btn-sm btn-danger rounded-0 text-white" data-bs-toggle="modal" data-bs-target="#exampleModalDelete<?php echo $r['id']; ?>">Hapus</button>

                        </td>
                    </tr>

                    <!-- Modal Edit Data -->
                    <div class="modal fade" id="exampleModalEdit<?php echo $r['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Data Transaksi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="update.php">
                                    <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" value="<?php echo $r['tanggal']; ?>">
                                        </div>
                                        <br>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="kodekat">Kategori</label>
                                            <select class="form-select" name="kodekat" id="kodekat">
                                                <option value="<?php echo $r['kodekat']; ?>" selected><?php echo $r['kategori']; ?></option>
                                                <?php
                                                $sql3 = "SELECT * FROM kategori";
                                                // Query Menampilkan Hasil Dari Database
                                                $result3 = mysqli_query($mysqli, $sql3);
                                                $v = 1;
                                                // Perulangan While
                                                while ($w = mysqli_fetch_assoc($result3)) { ?>
                                                    <option value="<?php echo $w['kodekat']; ?>"><?php echo $w['kategori']; ?></option>
                                                <?php $v++;
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Keterangan</label>
                                            <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="<?php echo $r['keterangan']; ?>">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Pemasukan</label>
                                            <input type="text" class="form-control" name="pemasukan" placeholder="Pemasukan" value="<?php echo $r['pemasukan']; ?>">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Pengeluaran</label>
                                            <input type="text" class="form-control" name="pengeluaran" placeholder="Pengeluaran" value="<?php echo $r['pengeluaran']; ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary btn-md rounded-0" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- Modal Edit Delete -->
                    <div class="modal fade" id="exampleModalDelete<?php echo $r['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Konfirmasi Hapus Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="delete.php">
                                    <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                                    <div class="modal-body">
                                        <p>Anda yakin akan menghapus data ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-md btn-primary rounded-0">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- End Content -->
</body>

</html>