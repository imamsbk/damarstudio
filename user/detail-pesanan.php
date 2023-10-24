<?php

// Koneksi
require '../admin/functions.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Konfirmasi Pemesanan</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="../img/logo/Logo.jpg" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&display=swap" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <?php
    // pemesan
    $query_pemesan = $conn->query("SELECT * FROM tbl_pemesan ORDER BY id_pemesan DESC LIMIT 1");
    $data_pemesan = mysqli_fetch_assoc($query_pemesan);

    $id_pemesan = $data_pemesan['id_pemesan'];
    $id_produk = $data_pemesan['id_produk'];
    $nama_pemesan = $data_pemesan['nama_pemesan'];
    $alamat = $data_pemesan['alamat'];
    $no_telpon = $data_pemesan['no_telpon'];
    $jumlah = $data_pemesan['jumlah'];
    $metode_pembayaran = $data_pemesan['metode_pembayaran'];
    $tanggal = $data_pemesan['tanggal'];
    $jam = $data_pemesan['waktu'];

    $query_produk = $conn->query("SELECT * FROM tbl_produk WHERE id_produk = '$id_produk'");
    $data_produk = mysqli_fetch_assoc($query_produk);

    $id_produk = $data_produk['id_produk'];
    $nama_produk = $data_produk['nama_produk'];
    $kategori = $data_produk['kategori'];
    $harga = $data_produk['harga'];
    $cover = $data_produk['cover'];

    // Total harga
    $total = $jumlah * $harga;
    ?>

    <div class="container">
        <div class="row" style="display: flex; justify-content: center; align-items: center; height: 100vh">
            <div class="card shadow col-md-7 py-3" style="border: 1px solid rgb(230, 230, 230); border-radius: 10px">
                <h3 class="mb-5 text-center">Konfirmasi Pemesanan</h3>
                <div style="position: absolute; top: -20px; right: -15px; font-size: 35px">
                    <a href="halaman-user.php">
                        <i class="bi bi-x-circle-fill" style="color: red"></i>
                    </a>
                </div>
                <div class="row mb-5" style="padding-left: 35px">
                    <div class="col-md-3 col-6">
                        <p class="mb-0">Nama Pemesan</p>
                        <p class="mb-0">Alamat</p>
                        <p class="mb-0">Nomor Telepon</p>
                        <p class="mb-0">Metode Pembayaran</p>
                        <p class="mb-0">Tanggal</p>
                        <p class="mb-0">Waktu</p>
                    </div>
                    <div class="col-md-9 col-6">
                        <p class="mb-0">: <?= ucwords($nama_pemesan); ?></p>
                        <p class="mb-0">: <?= ucwords($alamat); ?></p>
                        <p class="mb-0">: <?= ucwords($no_telpon); ?></p>
                        <p class="mb-0">: <?= ucwords($metode_pembayaran); ?></p>
                        <p class="mb-0">: <?= tgl_indo_2($tanggal); ?></p>
                        <p class="mb-0">: <?= ucwords($jam); ?> WIB </p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="row text-center fw-bold">
                        <div class="col-md-4 col-3">Nama Produk</div>
                        <div class="col-md-3 col-3">Harga</div>
                        <div class="col-md-2 col-3">Jumlah</div>
                        <div class="col-md-3 col-3 mb-2">Total Harga</div>
                        <div style="width: 90%; background-color: rgb(206, 206, 206); height: 1px; margin: auto"></div>
                    </div>
                    <div class="row text-center mt-3">
                        <div class="col-md-4 col-3"><?= ucwords($nama_produk); ?></div>
                        <div class="col-md-3 col-3">Rp. <?= number_format($harga); ?></div>
                        <div class="col-md-2 col-3"><?= ucwords($jumlah); ?> Pcs</div>
                        <div class="col-md-3 col-3 mb-3">Rp. <?= number_format($total); ?></div>
                        <div style="width: 90%; background-color: rgb(206, 206, 206); height: 1px; margin: auto"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12" style="padding-left: 35px">
                            <p class="fw-semibold">Note:<span class="fw-light"> Total harga belum termasuk
                                    ongkir</span>
                            </p>

                            <form action="./notifwa.php" class="" method="post">
                                <input type="hidden" value="<?= $nama_produk; ?> " name="nama_produk">
                                <input type="hidden" value="<?= $nama_pemesan; ?> " name="nama_pemesan">
                                <input type="hidden" value="<?= $alamat; ?> " name="alamat">
                                <input type="hidden" value="<?= $no_telpon; ?> " name="no_telpon">
                                <input type="hidden" value="<?= $jumlah; ?> " name="jumlah">
                                <input type="hidden" value="<?= $total; ?> " name="total">
                                <input type="hidden" value="<?= $metode_pembayaran; ?> " name="metode_pembayaran">
                                <input type="hidden" value="6282124047897" name="nohp">
                                <button type="submit" class="" style="background-color: #0245bc; color: white; padding: 10px 25px; border-radius: 30px; box-shadow: 0px 2px 20px rgba(121, 121, 121, 0.212); border: 0;">Konfirmasi
                                    Admin</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- <div style="padding-left: 25px; margin-bottom: 10px;">
                    <a href="https://wa.me/6282124047897?text=contoh%20isi%20pesan%20dikirim%20via%20whatsapp"
                        target="_blank"
                        style="background-color: #0245bc; color: white; padding: 9px 25px; border-radius: 30px; box-shadow: 0px 2px 20px rgba(121, 121, 121, 0.212)">Konfirmasi
                        Admin</a>
                </div> -->
            </div>
        </div>
    </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>