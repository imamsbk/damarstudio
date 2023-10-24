<?php

// Fungsi koneksi ke database
$conn = mysqli_connect("localhost:3310", "root", "", "damarstudio");
// End

#######################################################################
// Fungsi Tanggal Indo 1
function tgl_indo($tanggal_indo)
{
	$bulan_indo = array(
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan_indo = explode('-', $tanggal_indo);

	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun

	return $pecahkan_indo[2] . ' ' . $bulan_indo[(int)$pecahkan_indo[1]] . ' ' . $pecahkan_indo[0];
}
// End

// Fungsi Tanggal Indo 1
function tgl_indo_2($tanggal_indo_2)
{
	$bulan_indo_2 = array(
		1 =>   'Jan',
		'Feb',
		'Mar',
		'Apr',
		'Mei',
		'Jun',
		'Jul',
		'Aug',
		'Sep',
		'Okt',
		'Nov',
		'Des'
	);
	$pecahkan_indo_2 = explode('-', $tanggal_indo_2);

	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun

	return $pecahkan_indo_2[2] . '-' . $bulan_indo_2[(int)$pecahkan_indo_2[1]] . '-' . $pecahkan_indo_2[0];
}
// End

// End

######################################################################
// Fungsi Input Produk
function input_produk($row_input_data_produk)
{
	global $conn;
	date_default_timezone_set('Asia/Jakarta');
	$tanggal = date('Y-m-d');
	$jam = date('H:i:s');

	// 
	$name_tmp = $_FILES['cover']['name'];
	$file_tmp = $_FILES['cover']['tmp_name'];

	$row_input_data_produk = array(
		'nama_produk' 	=> addslashes($_POST["nama_produk"]),
		'kategori' 		=> addslashes($_POST["kategori"]),
		'harga' 		=> addslashes($_POST["harga"]),
		'cover' 		=> $name_tmp,
		'tanggal' 		=> $tanggal,
		'waktu' 		=> $jam,
	);

	// Pindah Ke dalam Folder
	move_uploaded_file($file_tmp, '../file/' . $name_tmp);

	foreach ($row_input_data_produk as $key => $value) {
		# code...
		$k[] = $key;
		$v[] = "'" . $value . "'";
	}

	$k = implode(",", $k);
	$v = implode(",", $v);

	$conn->query("INSERT INTO tbl_produk ($k) VALUES ($v)");
	return mysqli_affected_rows($conn);
}
// End

#######################################################################
// Fungsi Input Produk
function pesan_produk($row_pesan_produk)
{
	global $conn;
	date_default_timezone_set('Asia/Jakarta');
	$tanggal = date('Y-m-d');
	$jam = date('H:i:s');

	$row_pesan_produk = array(
		'id_produk' 		=> $_POST["id_produk"],
		'nama_pemesan' 		=> addslashes($_POST["nama_pemesan"]),
		'alamat' 			=> addslashes($_POST["alamat"]),
		'no_telpon' 		=> $_POST["no_telpon"],
		'jumlah' 			=> $_POST["jumlah"],
		'metode_pembayaran' => $_POST["metode_pembayaran"],
		'tanggal' 			=> $tanggal,
		'waktu' 			=> $jam,
	);


	foreach ($row_pesan_produk as $key => $value) {
		# code...
		$k[] = $key;
		$v[] = "'" . $value . "'";
	}

	$k = implode(",", $k);
	$v = implode(",", $v);

	$conn->query("INSERT INTO tbl_pemesan ($k) VALUES ($v)");
	return mysqli_affected_rows($conn);
}

// End

#######################################################################

// Fungsi tampilkan data produk
function tampil_produk()
{
	global $conn;

	$result_tampil_produk = $conn->query("SELECT * FROM tbl_produk ORDER BY id_produk DESC");
	$rows_produk = [];
	while ($row_produk = mysqli_fetch_assoc($result_tampil_produk)) {
		$rows_produk[] = $row_produk;
	}
	return $rows_produk;
}
// End

// End

#######################################################################

// Fungsi tampilkan data produk
function tampil_produk_2($sql_produl)
{
	global $conn;

	$result_tampil_produk = $conn->query($sql_produl);
	$rows_produk = [];
	while ($row_produk = mysqli_fetch_assoc($result_tampil_produk)) {
		$rows_produk[] = $row_produk;
	}
	return $rows_produk;
}
// End

// End

#######################################################################

// Fungsi tampilkan data pemesan
function tampil_pemesan($sql_pemesanan)
{
	global $conn;

	$result_tampil_pemesan = $conn->query($sql_pemesanan);
	$rows_pemesan = [];
	while ($row_pemesan = mysqli_fetch_assoc($result_tampil_pemesan)) {
		$rows_pemesan[] = $row_pemesan;
	}
	return $rows_pemesan;
}
// End

#######################################################################

// Fungsi tampilkan kategori balet
function kategori_balet()
{
	global $conn;

	$result_kategori_balet = $conn->query("SELECT * FROM tbl_produk WHERE kategori = 'Balet' ORDER BY id_produk DESC");
	$rows_produk = [];
	while ($row_produk = mysqli_fetch_assoc($result_kategori_balet)) {
		$rows_produk[] = $row_produk;
	}
	return $rows_produk;
}
// End

#######################################################################

// Fungsi tampilkan kategori tradisional
function kategori_tradisional()
{
	global $conn;

	$result_kategori_tradisional = $conn->query("SELECT * FROM tbl_produk WHERE kategori = 'Tradisional' ORDER BY id_produk DESC");
	$rows_produk = [];
	while ($row_produk = mysqli_fetch_assoc($result_kategori_tradisional)) {
		$rows_produk[] = $row_produk;
	}
	return $rows_produk;
}
// End

#######################################################################

// Fungsi edit produk
function edit_produk()
{
	global $conn;

	$id_produk = $_POST['id_produk'];
	$nama_produk = $_POST['nama_produk'];
	$kategori = $_POST['kategori'];
	$harga = $_POST['harga'];
	$coverLama = $_POST['coverLama'];

	// tangkap gambar
	$name_tmp = $_FILES['cover']['name'];
	$file_tmp = $_FILES['cover']['tmp_name'];

	// cek jika admin upload foto baru
	if ($name_tmp) {

		// kalau ada gambar baru, hapus gambar lama
		unlink('../file/' . $coverLama);

		// Pindah Ke dalam Folder
		move_uploaded_file($file_tmp, '../file/' . $name_tmp);

		// Update
		$conn->query("UPDATE tbl_produk SET

				nama_produk = '$nama_produk',
				kategori = '$kategori',
				harga = '$harga',
				cover = '$name_tmp'

				WHERE id_produk = '$id_produk'");
	} else {

		// Update
		$conn->query("UPDATE tbl_produk SET

				nama_produk = '$nama_produk',
				harga = '$harga'

				WHERE id_produk = '$id_produk'");
	}

	return mysqli_affected_rows($conn);
}
// End

######################################################################

// Fungsi edit pemesan
function edit_pemesan()
{
	global $conn;

	$id_pemesan = $_POST['id_pemesan'];
	$id_produk = $_POST['id_produk'];
	$nama_pemesan = $_POST['nama_pemesan'];
	$alamat = $_POST['alamat'];
	$no_telpon = $_POST['no_telpon'];
	$jumlah = $_POST['jumlah'];
	$metode_pembayaran = $_POST['metode_pembayaran'];

	// Update
	$conn->query("UPDATE tbl_pemesan SET

	id_pemesan = '$id_pemesan',
	id_produk = '$id_produk',
	nama_pemesan = '$nama_pemesan',
	alamat = '$alamat',
	no_telpon = '$no_telpon',
	jumlah = '$jumlah',
	metode_pembayaran = '$metode_pembayaran'

	WHERE id_pemesan = '$id_pemesan'");

	return mysqli_affected_rows($conn);
}
// End

######################################################################

// Fungsi hapus produk
function hapus_produk()
{
	global $conn;

	$id_produk = $_POST['id_produk'];
	$conn->query("DELETE FROM tbl_produk WHERE id_produk = $id_produk");

	return mysqli_affected_rows($conn);
}
// End

// End

#######################################################################

// Fungsi hapus pemesan
function hapus_pemesan()
{
	global $conn;

	$id_pemesan = $_POST['id_pemesan'];
	$conn->query("DELETE FROM tbl_pemesan  WHERE id_pemesan = $id_pemesan");

	return mysqli_affected_rows($conn);
}
// End

// End

#######################################################################

// Fungsi registrasi
function registrasi($data)
{
	global $conn;

	$nama = strtolower(stripslashes($data["nama"]));
	$username = htmlspecialchars($data["username"]);
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek apakah username sudah terdaftar apa belum
	$result = mysqli_query($conn, "SELECT username FROM tbl_admin WHERE username = '$username'");
	if (mysqli_fetch_assoc($result)) {
		echo "
				<script>
					alert('Maaf, username sudah terdaftar!')
				</script>";
		return false;
	}

	// cek konfirmasi password
	if ($password !== $password2) {
		echo "
				<script>
					alert('Maaf, konfirmasi password tidak sesuai!')
				</script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// menambahkan user baru ke dalam database
	mysqli_query($conn, "INSERT INTO tbl_admin VALUES ('', '$nama', '$username', '$password')");
	return mysqli_affected_rows($conn);
}
// End

// End

#######################################################################
// Tampil semua data All
$sql_produk = $conn->query("SELECT * FROM tbl_produk");
$jml_produk = mysqli_num_rows($sql_produk);

// Tampil Kategori Balet
$sql_kategori_balet = $conn->query("SELECT * FROM tbl_produk WHERE kategori = 'Balet'");
$jml_kategori_balet = mysqli_num_rows($sql_kategori_balet);


// Tampil Kategori tradisional
$sql_kategori_tradisional = $conn->query("SELECT * FROM tbl_produk WHERE kategori = 'Tradisional'");
$jml_kategori_tradisional = mysqli_num_rows($sql_kategori_tradisional);
// End

// End

#######################################################################
//Input Produk
if (isset($_POST['input_produk'])) {
	if (input_produk($_POST) > 0) {
		echo "
				<script>
				alert('Produk berhasil ditambahkan!');
				document.location.href='database-produk.php';
				</script>
			";
	}
	// die(var_dump($_POST['registrasi']));
}


//pesan Produk
if (isset($_POST['pesan_produk'])) {
	if (pesan_produk($_POST) > 0) {
		echo "
				<script>
				alert('Pemesanan produk berhasil!');
				document.location.href='detail-pesanan.php';
				</script>
			";
	}
	// die(var_dump($_POST['registrasi']));
}

//Hapus Produk
if (isset($_POST['hapus_produk'])) {
	if (hapus_produk($_POST) > 0) {
		echo "
				<script>
				alert('Data produk berhasil dihapus!');
				document.location.href='database-produk.php';
				</script>
			";
	}
}

//Hapus pemesan
if (isset($_POST['hapus_pemesan'])) {
	if (hapus_pemesan($_POST) > 0) {
		echo "
				<script>
				alert('Data pemesan berhasil dihapus!');
				document.location.href='data-pemesanan.php';
				</script>
			";
	}
}

//edit Produk
if (isset($_POST['edit_produk'])) {
	if (edit_produk($_POST) > 0) {
		echo "
				<script>
				alert('Data produk berhasil diubah!');
				document.location.href='database-produk.php';
				</script>
			";
	}
}

//edit pemesan
if (isset($_POST['edit_pemesan'])) {
	if (edit_pemesan($_POST) > 0) {
		echo "
				<script>
				alert('Data pemesan berhasil diubah!');
				document.location.href='data-pemesanan.php';
				</script>
			";
	}
}


// End

// End

#######################################################################

function notif_wa()
{

	$nama_pemesan = $_POST['nama_pemesan'];
	$alamat = $_POST['alamat'];
	$no_telpon = $_POST['no_telpon'];
	$jumlah = $_POST['jumlah'];
	$metode_pembayaran = $_POST['metode_pembayaran'];

	header('Location: https://api.whatsapp.com/send?phone=' . $nama_pemesan . '&text=NamaPemsan:%20' . $alamat . '%20%0DNoTelpon:%20' . $no_telpon . '%20%0DJumlah:%20' . $jumlah . '%20%0DMetodePembayaran:%20' . $metode_pembayaran);
}
