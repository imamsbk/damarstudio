<?php
// session
session_start();

// tidak bisa ke halaman index ketika belum login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// Koneksi
require 'functions.php';

?>
<!DOCTYPE html>
<html>

<head>
    <!-- <title>Export Data Ke Excel Dengan PHP</title> -->

</head>

<body>

    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Produk.xls");
    ?>

    <table border="1">
        <tr>
            <th>No</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Kategori</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Tanggal Di input</th>
            <th class="text-center">Waktu Di input</th>
        </tr>
        <?php

        // menampilkan data produk
        $data = mysqli_query($conn, "SELECT * FROM tbl_produk");
        $no = 1;
        while ($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td class="text-center"><?= $d['nama_produk']; ?></td>
            <td class="text-center"><?= $d['kategori']; ?></td>
            <td class="text-center">Rp. <?= $d['harga']; ?></td>
            <td class="text-center"><?= $d['tanggal']; ?></td>
            <td class="text-center"><?= $d['waktu']; ?> WIB </td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>