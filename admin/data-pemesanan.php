<?php
// session
session_start();

// tidak bisa ke halaman index ketika belum login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// menghubungkan file index dengan functions
require 'functions.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Damar Studio | Data Pemesanan</title>

    <!-- Favicons -->
    <link href="../img/logo/logo1.jpg" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<style>
    * {
        font-family: 'Poppins', sans-serif;
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion pt-3" id="accordionSidebar" style="background-color: #0245bc;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="bi bi-gift text-white" style="font-size: 25px; padding-right: 8px; color: #012970;"></i>
                </div>
                <div class="sidebar-brand-text mx-1">Damar Studio</div>
            </a>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="bi bi-house-door-fill"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading mt-4">
                Menu
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link" href="database-produk.php">
                    <i class="bi bi-bag-plus-fill"></i>
                    <span>Data Produk</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="data-pemesanan.php">
                    <i class="bi bi-chat-square-text-fill"></i>
                    <span>Data Pemesanan</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Keluar</span></a>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Keluar</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin keluar?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                <a href="logout.php">
                                    <button type="button" class="btn btn-danger">Keluar</button>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hello Admin</span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile_1.svg">
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-3">
                        <h1 class="h3 mb-0 text-gray-800">Data Pemesanan</h1>

                        <!-- export ke excel -->
                        <a href="export_pemesan_excel.php" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" style="padding: 7px 10px; font-weight: 500; font-size: 15px;">
                            <i class="fas fa-download fa-sm text-white"></i> Unduh Data Pemesanan</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 mx-0 lg:mx-3">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th class="text-center">Nama Pemesan</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">No Telepon</th>
                                            <th class="text-center">Nama Produk</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-center">Total Harga</th>
                                            <th class="text-center">Metode Pembayaran</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php
                                        $data_all = tampil_pemesan("SELECT * FROM tbl_pemesan INNER JOIN tbl_produk ON tbl_pemesan.id_produk = tbl_produk.id_produk ");
                                        foreach ($data_all as $data_row) :
                                            $total = $data_row['harga'] * $data_row['jumlah'];
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $i; ?></td>
                                                <td class="text-center"><?= ucwords($data_row['nama_pemesan']); ?></td>
                                                <td class="text-center"><?= ucwords($data_row['alamat']); ?></td>
                                                <td class="text-center"><?= ucwords($data_row['no_telpon']); ?></td>
                                                <td class="text-center"><?= ucwords($data_row['nama_produk']); ?></td>
                                                <td class="text-center">Rp. <?= number_format($data_row['harga']); ?></td>
                                                <td class="text-center"><?= ucwords($data_row['jumlah']); ?></td>
                                                <td class="text-center">Rp. <?= number_format($total); ?></td>
                                                <td class="text-center"><?= ucwords($data_row['metode_pembayaran']); ?>
                                                </td>
                                                <td class="text-center">

                                                    <!-- untuk edit pemesan -->
                                                    <button type="button" class="btn btn-warning text-white mb-1" data-bs-toggle="modal" data-bs-target="#edit<?= $data_row['id_pemesan']; ?>" style="font-size: 12px;">
                                                        <i class="bi bi-brush"></i>
                                                    </button>

                                                    <!-- untuk delete pemesan -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $data_row['id_pemesan']; ?>" style="font-size: 12px;">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>


                                            <!-- edit -->
                                            <div class="modal fade" id="edit<?= $data_row['id_pemesan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Edit
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form class="row g-3 needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                                                            <div class="modal-body">

                                                                <?php
                                                                $id_pemesan = $data_row['id_pemesan'];
                                                                $sql_edit = mysqli_query($conn, "SELECT * FROM tbl_pemesan INNER JOIN tbl_produk WHERE tbl_pemesan.id_produk = tbl_produk.id_produk AND id_pemesan = '$id_pemesan'");
                                                                while ($row_edit = mysqli_fetch_assoc($sql_edit)) {
                                                                ?>

                                                                    <div class="col-12 mb-2">
                                                                        <input type="hidden" class="form-control" id="validationCustom01" name="id_pemesan" value="<?= $row_edit['id_pemesan']; ?>" readonly>
                                                                    </div>
                                                                    <div class="col-12 mb-2">
                                                                        <label for="validationCustom01" class="form-label">Nama
                                                                            Pemesan</label>
                                                                        <input type="text" class="form-control" id="validationCustom01" name="nama_pemesan" value="<?= $row_edit['nama_pemesan']; ?>" required>
                                                                        <div class="valid-feedback">
                                                                            Nama pemesan sudah diisi!
                                                                        </div>
                                                                        <div class="invalid-feedback">
                                                                            Nama pemesan belum diisi!
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 mb-2">
                                                                        <label for="validationCustom01" class="form-label">Alamat</label>
                                                                        <input type="text" class="form-control" id="validationCustom01" name="alamat" value="<?= $row_edit['alamat']; ?>" required>
                                                                        <div class="valid-feedback">
                                                                            Alamat sudah diisi!
                                                                        </div>
                                                                        <div class="invalid-feedback">
                                                                            Alamat belum diisi!
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12 mb-2">
                                                                        <label for="validationCustom03" class="form-label">Nomor
                                                                            Telpon</label>
                                                                        <input type="tel" class="form-control" id="validationCustom03" name="no_telpon" value="<?= $row_edit['no_telpon']; ?>" required>
                                                                        <div class="valid-feedback">
                                                                            Nomor Telpon sudah diisi!
                                                                        </div>
                                                                        <div class="invalid-feedback">
                                                                            Nomor Telpon belum diisi!
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-12 mb-2">
                                                                        <label for="validationCustom02" class="form-label">Nama
                                                                            Produk</label>
                                                                        <select class="form-select" id="validationCustom02" name="id_produk" required>
                                                                            <option selected disabled value="<?= $row_edit['id_produk']; ?>">
                                                                                <?= $row_edit['nama_produk']; ?>
                                                                            </option>

                                                                            <?php
                                                                            $query_produk = $conn->query("SELECT * FROM tbl_produk ORDER BY id_produk ASC");
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
                                                                    </div>

                                                                    <div class="col-12 mb-2">
                                                                        <label for="validationCustom03" class="form-label">Jumlah</label>
                                                                        <input type="number" class="form-control" id="validationCustom03" name="jumlah" value="<?= $row_edit['jumlah']; ?>" required>
                                                                        <div class="valid-feedback">
                                                                            Jumlah sudah diisi!
                                                                        </div>
                                                                        <div class="invalid-feedback">
                                                                            Jumlah belum diisi!
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-12 mb-2">
                                                                        <label for="validationCustom02" class="form-label">Metode Pembayaran</label>
                                                                        <select class="form-select" id="validationCustom02" name="metode_pembayaran" required>
                                                                            <option selected value="<?= $row_edit['metode_pembayaran']; ?>">
                                                                                <?= $row_edit['metode_pembayaran']; ?>
                                                                            </option>
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

                                                                <?php } ?>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                                <button type="submit" class="btn btn-warning text-white" name="edit_pemesan">Edit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Delete -->
                                            <div class="modal fade" id="delete<?= $data_row['id_pemesan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Delete
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="" method="POST">
                                                            <div class="modal-body">
                                                                Apakah anda yakin akan menghapus data ini?
                                                                <input type="hidden" class="form-control" id="validationCustom01" name="id_pemesan" value="<?= $data_row['id_pemesan']; ?>" readonly>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                                <button type="submit" class="btn btn-danger" name="hapus_pemesan">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php $i++; ?>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>