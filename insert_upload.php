<?php
session_start();
// folder penenmapatan untuk file yang diupload bisa disesuaikan
// selama php bisa membaca folder tersebut
include 'koneksi_db.php';

$tipe_file = $_FILES['FILE']['type'];

//pengecekan tipe file
if(isset($_POST['upload'])){
    // $JUDUL = trim($_POST['JUDUL']);
    // $DESKRIPSI = trim($_POST['DESKRIPSI']);
    // $nama_file = $_FILES['FILE']['name'];


    $id_mhs = $_SESSION['id_mhs'];
    $id_tugas = $_POST['id_tugas'];
    $fileName = $_FILES['userfile']['name']; 
    $tmpName = $_FILES['userfile']['tmp_name'];
    $fileSize = $_FILES['userfile']['size'];
    $fileType = $_FILES['userfile']['type']; 
    $filePath = $uploadDir . $fileName; 
    $result = move_uploaded_file($tmpName, $filePath);


    // $query = "INSERT INTO up_materi VALUES ('','$JUDUL','$DESKRIPSI','$nama_file')";

    $query = "INSERT INTO upload(name, size, type, path, id_tugas, id_mhs) VALUES('$fileName', '$fileSize', '$fileType', '$filePath', '$id_tugas', '$id_mhs')";
    $sql = mysqli_query($koneksi, $query);

    if($sql){
        echo "Materi Baru Berhasil di Tambahkan";
        header("location: materi_guru.php");
    } else{
        echo "Terjadi Kesalahan Dalam Penginputan";
        header("location: materi_guru.php");
    }
}


// $uploadDir = 'file/';
// if (isset($_POST['upload'])) {
	//  $id_mhs = $_SESSION['id_mhs'];
	//  $id_tugas = $_POST['id_tugas'];
   	//  $fileName = $_FILES['userfile']['name']; 
   	//  $tmpName = $_FILES['userfile']['tmp_name'];
   	//  $fileSize = $_FILES['userfile']['size'];
    //  $fileType = $_FILES['userfile']['type']; 
   	//  $filePath = $uploadDir . $fileName; 
   	//  $result = move_uploaded_file($tmpName, $filePath);
//     	if (!$result) {
//         	echo "Error uploading file";
//         	exit;
//     	}
    	
//     	if (!get_magic_quotes_gpc()) {
//         	$fileName = addslashes($fileName);
//         	$filePath = addslashes($filePath);
//     	}
// $query = "INSERT INTO upload(name, size, type, path, id_tugas, id_mhs) VALUES('$fileName', '$fileSize', '$fileType', '$filePath', '$id_tugas', '$id_mhs')";

// mysqli_query($conn,$query) or die('Error, query failed : ' . mysqli_error());
//     	include 'close_db.php';
//     	echo "<br>File uploaded<br>";
// }
// header('Location: prak_download.php');
?>