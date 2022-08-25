<?php
session_start();

if(!$_SESSION['user_is_logged_in']){
	header("Location: login_siswa.php");
	exit;
}

include 'koneksi_db.php';

if(isset($_POST['submit_tugas'])){
	$tugas = $_POST['tugas'];
	$dosen = $_POST['dosen'];
	$dl = $_POST['dl'];
	$id_dosen = $_SESSION['id_mhs'];

	//$sql = "INSERT INTO tugas(tugas, dosen, dl) VALUES('$tugas', '$dosen', '$dl')";
	$sql = "INSERT INTO tugas(tugas, dosen, dl, id_dosen) VALUES('$tugas', '$dosen', '$dl', '$id_dosen')";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html  lang="en">
<head>
	<title>Tambah Tugas</title>
	<style>
    	#navbarNav{
        font-size:21px
		}
		#navmenu{
		font-size:21px
		}
		#navmenu{
			color:rgb(190, 190, 190);
			text-decoration: none;
		}
		#navmenu:hover{
			color:rgb(231, 231, 231);
		}

		*{
			box-sizing: border-box;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
		}
		body{
			font-family: Helvetica;
			-webkit-font-smoothing: antialiased;
			background: linear-gradient(to left, #3E6294 , #a9abdc); 
		}
		.section-content{
		text-align: center; 
		}
		.section-header{
			font-family: 'Teko', sans-serif;
			color : #fff;  
		}
		h2{
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
			letter-spacing: 1px;
			color: white;
			padding: 30px 0;
		}

		/* Table Styles */

		.table-wrapper{
			margin: 10px 70px 70px;
		}

		.fl-table {
			border-radius: 5px;
			font-size: 12px;
			font-weight: normal;
			border: none;
			border-collapse: collapse;
			width: 100%;
			max-width: 100%;
			white-space: nowrap;
			background-color: white;
		}

		.fl-table td, .fl-table th {
			text-align: center;
			padding: 8px;
		}

		.fl-table td {
			border-right: 1px solid #f8f8f8;
			font-size: 12px;
		}

		.fl-table thead th {
			color: #ffffff;
			background: #4FC3A1;
		}


		.fl-table thead th:nth-child(odd) {
			color: #ffffff;
			background: #324960;
		}

		.fl-table tr:nth-child(even) {
			background: #F8F8F8;
		}

		/* Responsive */

		@media (max-width: 767px) {
			.fl-table {
				display: block;
				width: 100%;
			}
			.table-wrapper:before{
				content: "Scroll horizontally >";
				display: block;
				text-align: right;
				font-size: 11px;
				color: white;
				padding: 0 0 10px;
			}
			.fl-table thead, .fl-table tbody, .fl-table thead th {
				display: block;
			}
			.fl-table thead th:last-child{
				border-bottom: none;
			}
			.fl-table thead {
				float: left;
			}
			.fl-table tbody {
				width: auto;
				position: relative;
				overflow-x: auto;
			}
			.fl-table td, .fl-table th {
				padding: 20px .625em .625em .625em;
				height: 60px;
				vertical-align: middle;
				box-sizing: border-box;
				overflow-x: hidden;
				overflow-y: auto;
				width: 120px;
				font-size: 13px;
				text-overflow: ellipsis;
			}
			.fl-table thead th {
				text-align: left;
				border-bottom: 1px solid #f7f7f9;
			}
			.fl-table tbody tr {
				display: table-cell;
			}
			.fl-table tbody tr:nth-child(odd) {
				background: none;
			}
			.fl-table tr:nth-child(even) {
				background: transparent;
			}
			.fl-table tr td:nth-child(odd) {
				background: #F8F8F8;
				border-right: 1px solid #E6E4E4;
			}
			.fl-table tr td:nth-child(even) {
				border-right: 1px solid #E6E4E4;
			}
			.fl-table tbody td {
				display: block;
				text-align: center;
			}
			.tambah{
				margin: 10px 70px 70px;
			}
		}
    </style>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="main.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-menu d-flex align-items-center justify-content-between w-100">
				<div class="left-menu d-flex align-items">
					
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
						aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="javascript:void(0)"
									id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
									aria-expanded="false">
									Menu
								</a>
                                <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink" id="navmenu">
									<a class="dropdown-item bg bg-dark" href="overview.php" style="color:white">Overview</a>
									<?php
									
									 if(isset($_SESSION['user'])){
										echo"<a class='dropdown-item bg bg-dark' href='siswa_show.php' style='color:white'>Data Mahasiswa</a>"; 
										echo"<a class='dropdown-item bg bg-dark' href='prak_download.php' style='color:white'>Download File</a>"; 
										echo"<a class='dropdown-item bg bg-dark' href='tambah_tugas.php' style='color:white'>Tambah Tugas</a>"; 
									 }
									 else{
										echo"<a class='dropdown-item bg bg-dark' href='prak_download.php' style='color:white'>Daftar Tugas</a>"; 
									 }
											?>
                                </div>
							</li>
						</ul>
					</div>
				</div>
				<div class="right-menu d-flex flex-row-reverse align-items-center">
					<a class="btn"  href="logout_siswa.php" id="navmenu">Logout</a>
					<a class="btn"  href="" id="navmenu">Profile</a>
					<form class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" type="search" placeholder="Cari" aria-label="Cari">
						<a href="search sebelum login.html" class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</a>
					</form>
				</div>
			</div>
		</div>
	</nav>
</div>

    <section id="contact">
			<div class="section-content">
				<h1 class="section-header">Tambah Tugas</h1>
			</div>
			<div class="contact-section">
				<div class="container">
				<form action='tambah_tugas.php' method='post'>
			  			<div class="form-group">
			  				<label for="exampleInputUsername">Tugas Baru</label>
					    	<input type="text" class="form-control" name="tugas" placeholder=" Masukkan Tugas Baru">
				  		</div>
                        <div class="form-group">
			  				<label for="exampleInputUsername">Nama Dosen</label>
					    	<input type="text" class="form-control" name="dosen" placeholder=" Masukan Nama Dosen">
				  		</div>
                        <div class="form-group">
			  				<label for="exampleInputUsername">Deadline</label>
					    	<input type="text" class="form-control" name="dl" placeholder=" DD/MM/YY">
				  		</div>

                        <a style='text-align: center;'><button id='submit-btn' name='submit_tugas' type='submit' class='btn btn-primary' style='padding: 2px 15px;'>Submit</button></a>
					</form>
				</div>
			</div>
		</section>
</body>

<script src="asset/js/jquery-3.5.1.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/popper.min.js"></script>


</html>