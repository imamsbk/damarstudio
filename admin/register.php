<?php

require 'functions.php';

// ketika tombol daftar di klik
if (isset($_POST["daftar"])) {

    if (registrasi($_POST) > 0) {
        echo "
        <script>
            alert('Registrasi Berhasil!')
        </script>";

        // ketika registrasi berhasil, maka pindah ke file login.php
        header("Location: login.php");
        exit;
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Take and Gift | Daftar</title>

    <!-- Favicons -->
    <link href="../img/logo/Logo.jpg" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<style>
* {
    font-family: 'Poppins', sans-serif;
}

body {
    background-image: url(../img/logo/3.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.row .col-4 {
    /* From https://css.glass */
    background: rgba(255, 255, 255, 0.1);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    border: none;
    /* border: 1px solid rgba(255, 255, 255, 0.3); */
}
</style>

<!-- <body class="bg-gradient-primary"> -->

<body>
    <div class="container">
        <div class="row" style="display: flex; justify-content: center; align-items: center; height: 100vh">
            <div class="col-4 p-4" style="border-radius: 15px">
                <div class="text-center">
                    <h1 class="h4 text-white mb-4">Daftar</h1>
                </div>
                <form class="user" action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                            aria-describedby="emailHelp" name="nama" placeholder="Masukkan nama" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                            aria-describedby="emailHelp" name="username" placeholder="Masukkan Username" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                            name="password" placeholder="Masukkan Password" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                            name="password2" placeholder="Konfirmasi Password" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block" name="daftar">Daftar</button>
                </form>
                <div class="text-center mt-3">
                    <p class="text-white">
                        Sudah punya akun? <span> <a href="login.php" class="text-white"
                                style="text-decoration: none;">Login</a></span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
</body>

</html>