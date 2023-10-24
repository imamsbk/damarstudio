<?php
// session
session_start();

// menghubungkan koneksi database pada file function
require 'functions.php';

// mengecek ada cookie atau tidak
if (isset($_COOKIE['satu']) && isset($_COOKIE['dua'])) {
    $satu = $_COOKIE['satu'];
    $dua = $_COOKIE['dua'];

    // mengambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM tbl_admin WHERE id = $satu");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($dua === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

// mengecek ada session atau tidak
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

// ketika tombol login di klik
if (isset($_POST["login"])) {

    $username = addslashes($_POST["username"]);
    $password = addslashes($_POST["password"]);
    $result = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if (isset($_POST['remember'])) {

                // membuat cookie
                setcookie('satu', $row['id'], time() + 60);
                setcookie('dua', hash('sha256', $row['username']), time() + 60);
            }

            // ketika login berhasil, maka pindah ke file index.php
            echo "
            <script>
            alert('Login Berhasil!');
            document.location.href='index.php';
            </script>
        ";
            exit;
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Take and gift | Masuk</title>

    <!-- Favicons -->
    <link href="../img/logo/Logo.jpg" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet" />
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

<!-- pesan ketika error -->
<?php if (isset($error)) : ?>
<script>
alert('Maaf, Username atau Password salah!')
</script>
<?php endif; ?>

<!-- <body class="bg-gradient-primary"> -->

<body>
    <div class="container">
        <div class="row" style="display: flex; justify-content: center; align-items: center; height: 100vh">
            <div class="col-4 p-4">
                <div class="text-center">
                    <!-- <h1 class="h4 text-gray-900 mb-4">Masuk</h1> -->
                    <h1 class="h4 text-white mb-4">Masuk</h1>
                </div>
                <form class="user" action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                            aria-describedby="emailHelp" name="username" placeholder="Masukkan Username" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                            name="password" placeholder="Masukkan Password" />
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="remember" name="remember" />
                            <label class="custom-control-label text-white" for="remember">Ingat Saya</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block" name="login">Masuk</button>
                </form>
                <!-- <div class="text-center mt-3">
                    <p>
                        Belum punya akun? <span> <a class="small" href="register.php">Daftar</a></span>
                    </p>
                </div> -->
                <div class="text-center mt-3">
                    <p class="text-white">
                        Belum punya akun? <span> <a href="register.php" class="text-white">Daftar</a></span>
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