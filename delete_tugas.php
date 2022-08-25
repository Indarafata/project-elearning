<?php
include 'koneksi_db.php';

$id = $_GET['ID'];

$sql = "DELETE FROM tugas WHERE id=" .$id;
mysqli_query($conn, $sql);
mysqli_close($conn);

header("location: prak_download.php");
?>