<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/sik/img/ico.png">
    <title>Login - Sistem Informasi Keuangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto">
        <form action="logincontroller.php" method="POST">
            <h2>SISTEM INFORMASI KEUANGAN</h2>
            <img class="mb-4" src="/sik/img/financial.png" alt="" width="120" height="100">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="username" name="username" class="form-control rounded-0" id="floatingInput" placeholder="Username" autofocus="">
                <label for="floatingInput">Username</label>
            </div>
            <br>
            <div class="form-floating">
                <input type="password" name="password" class="form-control rounded-0" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <?php if (isset($_GET['pesan'])) { ?>
                <label style="color:red"><?php echo $_GET['pesan']; ?></label>
            <?php } ?>
            <?php if (isset($_GET['relog'])) { ?>
                <label style="color:green"><?php echo $_GET['relog']; ?></label>
            <?php } ?>
            </div>
            <button class="w-75 btn btn-md btn-primary rounded-0" type="submit">Sign in</button>
        </form>
    </main>



</body>

</html>