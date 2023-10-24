<?php
// Koneksi
require '../admin/functions.php';

$id = $_GET['produk'];
// die(var_dump($id));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Damar Studio | Detail Produk</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../img/logo/Logo.jpg" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="halaman-user.php" class="logo d-flex align-items-center">
                <i class="bi bi-gift" style="font-size: 30px; padding-right: 8px; color: #012970;"></i>
                <span>Damar Studio</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="halaman-user.php">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="halaman-user.php">Tentang</a></li>
                    <li><a class="nav-link scrollto" href="halaman-user.php">Kategori</a></li>
                    <li><a class="nav-link scrollto" href="halaman-user.php">Produk</a></li>
                    <li><a class="nav-link scrollto getstarted" href="halaman-user.php" style=" padding: 8px 25px;">Hubungi
                            Kami</a></li>
                    <!-- <li><a class="nav-link scrollto getstarted" href="halaman-user.php">Kontak</a></li> -->
                    <!-- <li><a class="getstarted scrollto"
                            href="https://wa.me/6282124047897?text=contoh%20isi%20pesan%20dikirim%20via%20whatsapp"
                            target="_blank">Kontak</a></li> -->
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->

        </div>
    </header>
    <!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <?php $i = 1; ?>
                <?php
                $data_all = tampil_produk_2("SELECT * FROM tbl_produk WHERE id_produk = '$id' ORDER BY id_produk DESC");
                foreach ($data_all as $data_row) : ?>

                    <ol style="font-size: 17px;">
                        <li><a href="halaman-user.php">Beranda</a></li>
                        <li>Detail Produk</li>
                    </ol>
                    <h2 style="font-size: 30px;"><?= ucwords($data_row['nama_produk']); ?></h2>

                    <?php $i++; ?>
                <?php endforeach; ?>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <?php $i = 1; ?>
                <?php
                $data_all = tampil_produk_2("SELECT * FROM tbl_produk WHERE id_produk = '$id' ORDER BY id_produk DESC");
                foreach ($data_all as $data_row) : ?>

                    <div class="row gy-4">

                        <div class="col-lg-8">
                            <div class="portfolio-details-slider swiper">
                                <div class="swiper-wrapper align-items-center">

                                    <img src="../file/<?= $data_row['cover']; ?>" alt="" />


                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="portfolio-info">
                                <h3 style="font-size: 25px;">Informasi Tentang Produk</h3>
                                <ul style="font-size: 17px;">
                                    <li><strong>Nama Produk</strong>: <?= ucwords($data_row['nama_produk']); ?></li>
                                    <li><strong>Kategori</strong>: <?= $data_row['kategori']; ?></li>
                                    <li><strong>Harga</strong>: Rp. <?= number_format($data_row['harga']); ?></li>
                                    <!-- <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li> -->
                                </ul>
                                <ul>

                                    <!-- modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pemesan<?= $data_row['id_produk']; ?>" style="background-color: #012970; border: none; padding: 7px 22px; font-size: 18px; border-radius: 30px;">
                                        <i class="bi bi-bag-check-fill pe-2"></i><span>Pesan Sekarang</span>
                                    </button>

                                    <!-- Modal -->
                                    <div class=" modal fade" id="pemesan<?= $data_row['id_produk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-3" id="exampleModalLabel">Form Pemesanan
                                                        Produk</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="row g-3 needs-validation px-4" method="POST" enctype="multipart/form-data" novalidate>

                                                        <input type="hidden" class="form-control" id="validationCustom01" name="id_produk" value="<?= $data_row['id_produk']; ?>" required>

                                                        <div class="col-md-6">
                                                            <label for="validationCustom01" class="form-label">Nama
                                                                Pemesanan</label>
                                                            <input type="text" class="form-control" id="validationCustom01" name="nama_pemesan" placeholder="Masukkan nama pemesan" required>
                                                            <div class="valid-feedback">
                                                                Nama Pemesan sudah diisi!
                                                            </div>
                                                            <div class="invalid-feedback">
                                                                Nama Pemesan belum diisi!
                                                            </div>
                                                        </div>

                                                        <!-- <div class="col-md-6">
                                                            <label for="validationCustom02" class="form-label">Pilih
                                                                Produk</label>
                                                            <select class="form-select" id="validationCustom02" name="id_produk" required>
                                                                <option selected disabled value="">- Pilih -</option>

                                                                <?php
                                                                $query_produk = $conn->query("SELECT * FROM tbl_produk ORDER BY id_produk");
                                                                while ($data_produk = mysqli_fetch_assoc($query_produk)) {
                                                                ?>
                                                                    <option value="<?= $data_produk['id_produk'] ?>">
                                                                        <?= $data_produk['nama_produk'] ?>
                                                                    </option>
                                                                <?php } ?>

                                                            </select>
                                                            <div class="valid-feedback">
                                                                Produk sudah diisi!
                                                            </div>
                                                            <div class="invalid-feedback">
                                                                Produk belum diisi!
                                                            </div>
                                                        </div> -->

                                                        <div class="col-md-6">
                                                            <label for="validationCustom01" class="form-label">Jumlah</label>
                                                            <input type="number" class="form-control" id="validationCustom01" name="jumlah" placeholder="Masukkan jumlah" required>
                                                            <div class="valid-feedback">
                                                                Jumlah sudah diisi!
                                                            </div>
                                                            <div class="invalid-feedback">
                                                                Jumlah belum diisi!
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-6">
                                                            <label for="validationCustom01" class="form-label">Nomor
                                                                WhatsApp</label>
                                                            <input type="text" class="form-control" id="validationCustom01" name="no_telpon" placeholder="Masukkan nomor whatsapp" required>
                                                            <div class="valid-feedback">
                                                                Nomor WhatsApp sudah diisi!
                                                            </div>
                                                            <div class="invalid-feedback">
                                                                Nomor WhatsApp belum diisi!
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-6">
                                                            <label for="validationCustom02" class="form-label">Metode
                                                                Pembayaran</label>
                                                            <select class="form-select" id="validationCustom02" name="metode_pembayaran" required>
                                                                <option selected disabled value="">- Pilih -</option>
                                                                <option value="Transfer">Transfer</option>
                                                                <option value="COD">COD</option>
                                                            </select>
                                                            <div class="valid-feedback">
                                                                Metode Pembayaran sudah diisi!
                                                            </div>
                                                            <div class="invalid-feedback">
                                                                Metode Pembayaran belum diisi!
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="validationCustom01" class="form-label">Alamat</label>
                                                            <!-- <input type="text" class="form-control" id="validationCustom01" name="alamat" placeholder="Masukkan alamat " required> -->
                                                            <textarea class="form-control" id="validationCustom01" name="alamat" placeholder="Masukkan alamat " rows="2"></textarea>
                                                            <div class="valid-feedback">
                                                                Alamat sudah diisi!
                                                            </div>
                                                            <div class="invalid-feedback">
                                                                Alamat belum diisi!
                                                            </div>
                                                        </div>

                                                        <!-- <div class="col-12" style="display: flex; justify-content: center;">
                              <button class="btn btn-primary mx-auto" style="background-color: #012970; border: none; width: 80%; " type="submit" name="pesan_produk">Pesan Produk</button>
                            </div> -->
                                                </div>
                                                <div class="modal-footer">
                                                    <!-- <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button> -->
                                                    <button type="submit" class="btn btn-primary" name="pesan_produk" style="background-color: #012970; border: none; padding: 7px 30px; font-size: 18px; border-radius: 30px;">Pesan
                                                        Produk</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                            <div class="portfolio-description">
                                <h2>Note:</h2>
                                <p>
                                    Jika sudah berhasil mengisi form pemesanan, diharapkan segera untuk konfirmasi ke admin!
                                </p>
                            </div>
                        </div>

                    </div>

                    <?php $i++; ?>
                <?php endforeach; ?>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->

    <footer id="footer" class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="#" class="logo d-flex align-items-center ">
                            <span class="mb-2">Damar Studio</span>
                        </a>
                        <p>Take and Gift adalah art center yang menyediakan persewaan baju dan juga memberikan pelatihan tari</p>
                        <div class="social-links mt-3">
                            <a href="https://wa.me/6281381743443?text=contoh%20isi%20pesan%20dikirim%20via%20whatsapp" target="_blank" class="twitter">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                            <a href="https://www.instagram.com/sanggar.damarstudio/" target="_blank class=" instagram">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="https://www.tiktok.com/@sitifatimah21497" target="_blank" class="tiktok"><i class="bi bi-tiktok"></i></a>
                            <a href="mailto:fdamar735@gmail.com" class="email"><i class="bi bi-envelope"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Tautan</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#hero">Beranda</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#tentang">Tentang Kami</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#kategori">Kategori</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#produk">Produk Kami</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#kontak">Hubungi Kami</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Kategori Produk</h4>
                        <ul>
                            <!-- <li><i class="bi bi-chevron-right"></i> <a href="#">Gift</a></li> -->
                            <li><i class="bi bi-chevron-right"></i> <a href="#produk">Balet</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#produk">Tradisional</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                        <h4>Hubungi Kami</h4>
                        <p>
                            Jl. Bungsan Gg.Wagirin No.17<br>
                            Kelurahan Bedahan Kecamatan Sawangan<br>
                            Kota Depok <br><br>
                            <strong>Telpon:</strong> +62813 8174 3443<br>
                            <strong>Email:</strong> fdamar735@gmail.com<br>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>DamarStudioRz</span></strong>. 2023
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center" style="border-radius: 50px;"><i class="bi bi-arrow-up-short"></i></a>


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

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>

</body>

</html>