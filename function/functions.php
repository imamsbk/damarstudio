<?php
// koneksi ke database
$server = "localhost:3310";
$user = "root";
$password = "";
$nama_db = "takeandgift";
$koneksi = mysqli_connect($server,$user,$password,$nama_db);

//$koneksi = mysqli_connect("localhost", "root", "", "takeandgift");

// function koneksi
function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];

    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

// function tambah data
// function tambah($data){
//     global $koneksi;
    
//      // ambil data dari tiap elemen dalam form
//      $nama_mahasiswa = htmlspecialchars($data["nama_mahasiswa"]);
//      $nim = htmlspecialchars($data["nim"]);
//      $email = htmlspecialchars($data["email"]);
//      $jurusan = htmlspecialchars($data["jurusan"]);

//     // upload gambar
//     $gambar = upload();
//     if( !$gambar) {
//         return false;
//     }

//     // query insert data
//     $query = "INSERT INTO tbl_mahasiswa VALUES ('', '$nama_mahasiswa', '$nim', '$email', '$jurusan', '$gambar')";
//     mysqli_query($koneksi, $query);
// return mysqli_affected_rows($koneksi);
// }

// function hapus data
// function hapus($id){
//     global $koneksi;
//     mysqli_query($koneksi, "DELETE FROM tbl_mahasiswa WHERE id = $id");
//     return mysqli_affected_rows($koneksi);
// }


// function upload gambar
// function upload() {
//     $namaFile = $_FILES['gambar']['name'];
//     $ukuranFile = $_FILES['gambar']['size'];
//     $error = $_FILES['gambar']['error'];
//     $tmpName = $_FILES['gambar']['tmp_name'];

//     // cek apakah tidak ada gambar yang di upload
//     if( $error === 4) {
//         echo "
//             <script>
//                 alert('Silakan upload gambar!')
//             </script>";
//         return false;
//     }

//     // cek apakah yang di upload adalah gambar apa bukan
//     $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
//     $ekstensiGambar = explode('.', $namaFile);
//     $ekstensiGambar = strtolower(end($ekstensiGambar));

//     if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
//         echo "
//         <script>
//             alert('Maaf, yang anda upload bukan gambar!')
//         </script>";
//     return false;
//     }

//      // cek jika ukuran file atau gambar terlalu besar
//      if( $ukuranFile > 1000000) {
//         echo "
//         <script>
//             alert('Maaf, ukuran file atau gambar terlalu besar!')
//         </script>";
//     return false;
//     }

//     // lolos pengecekan, maka gambar siap di upload
//     // generate nama gambar baru
//     $namaFileBaru = uniqid();
//     $namaFileBaru .= '.';
//     $namaFileBaru .= $ekstensiGambar;
//     move_uploaded_file($tmpName, '.image/' . $namaFileBaru);
//     return $namaFileBaru;
// }


// function ubah data
// function ubah($data){
//     global $koneksi;
    
//      // ambil data dari tiap elemen dalam form
//      $id = $data["id"];
//      $nama_mahasiswa = htmlspecialchars($data["nama_mahasiswa"]);
//      $nim = htmlspecialchars($data["nim"]);
//      $email = htmlspecialchars($data["email"]);
//      $jurusan = htmlspecialchars($data["jurusan"]);
//      $gambarLama = htmlspecialchars($data["gambarLama"]);

//     //  cek apakah user pilih gambar baru tidak
//     if( $_FILES['gambar']['error'] === 4) {
//         $gambar = $gambarLama;
//     } else {
//         $gambar = upload();
//     }

//       // query insert data
//     $query = "UPDATE tbl_mahasiswa SET 
//             nama_mahasiswa = '$nama_mahasiswa',
//             nim = '$nim',
//             email = '$email',
//             jurusan = '$jurusan',
//             gambar = '$gambar'
//             WHERE id = $id
//              ";
// mysqli_query($koneksi, $query);
// return mysqli_affected_rows($koneksi);
// }

// function mencari data
// function cari($keyword) {
//     $query = "SELECT * FROM tbl_mahasiswa WHERE
//                 nama_mahasiswa LIKE '%$keyword%' OR
//                 nim LIKE '%$keyword%' OR
//                 email LIKE '%$keyword%' OR
//                 jurusan LIKE '%$keyword%'
//                 ";
//     return query($query);
// }

// function registrasi
function registrasi($data) {
    global $koneksi;
    $username = strtolower(stripslashes($data["username"]));
    $email = htmlspecialchars($data["email"]);
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    // cek apakah username sudah terdaftar apa belum
    $result = mysqli_query($koneksi, "SELECT username FROM tbl_user WHERE username = '$username'");
    if( mysqli_fetch_assoc($result)) {
        echo "
        <script>
            alert('Maaf, username sudah terdaftar!')
        </script>";
    return false;
    }

    // cek konfirmasi password
    if( $password !== $password2 ) {
        echo "
        <script>
            alert('Maaf, konfirmasi password tidak sesuai!')
        </script>";
    return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // menambahkan user baru ke dalam database
    mysqli_query($koneksi, "INSERT INTO tbl_user VALUES ('', '$username', '$email', '$password')");
    return mysqli_affected_rows($koneksi);
}



?>