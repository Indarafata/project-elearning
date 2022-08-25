<?php
include 'koneksi_db.php';

$nama = $_POST['nama_lengkap'];
$nrp = $_POST['nrp'];
$Username = $_POST['Username'];
$Pswd = $_POST['Password'];
$user = $_POST['user'];

$sql = "INSERT INTO akun(Username, Pswd, user, nama, nrp) VALUES('$Username', '$Pswd', '$user', '$nama', '$nrp')";

if(mysqli_query($conn, $sql))
    echo "Data berhasil ditambahkan";
else
    echo "Data gagal masuk";

mysqli_close($conn);
header("location: login_siswa.php");
?>