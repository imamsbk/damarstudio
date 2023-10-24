<?php

$nama_produk = $_POST['nama_produk'];
$nama_pemesan = $_POST['nama_pemesan'];
$alamat = $_POST['alamat'];
$no_telpon = $_POST['no_telpon'];
$jumlah = $_POST['jumlah'];
$total = $_POST['total'];
$metode_pembayaran = $_POST['metode_pembayaran'];


// echo urldecode('bima arya wicaksana');

$urlEncodedStringProduk = urlencode($nama_produk);


// header('Location: https://api.whatsapp.com/send?phone=' . $nohp . '&text=Nama:%20' . $nama_pemesan . '%20%0DAlamat:%20' . $alamat . '%20%0DTelpon:%20' . $no_telpon . '%20%0DProduk:%20' . $nama_produk . '%20%0DJumlah:%20' . $jumlah . '%20%0Total:%20' . $total . '%20%0Pembayaran:%20' . $metode_pembayaran);


header('Location: https://wa.me/6281381743443?text=Nama:%20' . $nama_pemesan . '%20%0DAlamat:%20' . $alamat . '%20%0DTelpon:%20' . $no_telpon . '%20%0DPemesanan:%20' . $urlEncodedStringProduk . '%20%0DJumlah:%20' . $jumlah . '%20%0DTotal:%20' . $total . '%20%0DPembayaran:%20' . $metode_pembayaran);
