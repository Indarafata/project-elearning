<!DOCTYPE html>
<html>
	<head>
		<style>
			body{
				background: black;
			}
			#form_upload{
			position: absolute;
			top: 50%;
			left: 50%;
			margin-top: -100px;
			margin-left: -250px;
			width: 500px;
			height: 200px;
			border: 4px dashed #fff;
			}
			#form_upload p{
			width: 100%;
			height: 100%;
			text-align: center;
			line-height: 170px;
			color: #ffffff;
			font-family: Arial;
			}
			#form_upload input{
			position: absolute;
			margin: 0;
			padding: 0;
			width: 100%;
			height: 100%;
			outline: none;
			opacity: 0;
			}
			#form_upload button{
			margin: 0;
			color: #fff;
			background: #16a085;
			border: none;
			width: 508px;
			height: 35px;
			margin-top: -20px;
			margin-left: -4px;
			border-radius: 4px;
			border-bottom: 4px solid #117A60;
			transition: all .2s ease;
			outline: none;
			}
			#form_upload button:hover{
			background: #149174;
				color: #0C5645;
			}
			#form_upload button:active{
			border:0;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<form id="form_upload" action="insert_upload.php" method="post" enctype="multipart/form-data">
				<input type="file" name="userfile" id="fileToUpload">
				<?php
				$a = "Tugas UAS";
				//<p>Drag your files here or click in this area.</p>
				echo"<p>$a</p>";
				?>
				<button type="submit"><input type="submit" value="Upload" name="upload">Upload</button>
			</form>
		</div>
	</body>
</html>