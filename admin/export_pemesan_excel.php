<?php
// session
session_start();

// tidak bisa ke halaman index ketika belum login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// Koneksi
require '../admin/functions.php';

?>
<!DOCTYPE html>
<html>

<head>

</head>

<body>

    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Pemesan.xls");
    ?>

    <table border="1">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Pemesan</th>
            <th class="text-center">Alamat</th>
            <th class="text-center">No Telpon</th>
            <th class="text-center">Nama Produk</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Total</th>
            <th class="text-center">Metode Pembayaran</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Waktu</th>
        </tr>


        <?php $i = 1; ?>
        <?php
        $data_all = tampil_pemesan("SELECT * FROM tbl_pemesan INNER JOIN tbl_produk ON tbl_pemesan.id_produk = tbl_produk.id_produk");
        foreach ($data_all as $data_row) :
            $total = $data_row['harga'] * $data_row['jumlah'];

        ?>
            <tr>
                <td class="text-center"><?= $i; ?></td>
                <td class="text-center"><?= ucwords($data_row['nama_pemesan']); ?></td>
                <td class="text-center"><?= ucwords($data_row['alamat']); ?></td>
                <td class="text-center">'<?= ucwords($data_row['no_telpon']); ?>'</td>
                <td class="text-center"><?= ucwords($data_row['nama_produk']); ?></td>
                <td class="text-center">Rp. <?= number_format($data_row['harga']); ?></td>
                <td class="text-center"><?= ucwords($data_row['jumlah']); ?></td>
                <td class="text-center">Rp. <?= number_format($total); ?></td>
                <td class="text-center"><?= ucwords($data_row['metode_pembayaran']); ?></td>
                <td class="text-center"><?= tgl_indo_2($data_row['tanggal']); ?></td>
                <td class="text-center"><?= ucwords($data_row['waktu']); ?> WIB </td>
            </tr>

            <?php $i++; ?>
        <?php endforeach; ?>

    </table>
</body>

</html>