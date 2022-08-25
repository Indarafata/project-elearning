<?php
session_start();
 
$errorMessage = '';
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['user'])) {
    include 'koneksi_db.php';
    $Username = $_POST['username'];
    $Password = $_POST['password'];
    $user = $_POST['user'];

    $sql = "SELECT * FROM akun WHERE Username = '$Username' AND Pswd ='$Password' AND user = '$user'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_is_logged_in'] = true;
        $_SESSION['id_mhs'] = $row['id'];

        if($user == "Dosen"){
            $_SESSION['user'] = true;
            //$_SESSION['id_dosen'] = $row['id'];
        }

        header('Location: overview.php');
        exit;
    } else {
        $errorMessage = 'Sorry, wrong user id / password';
    }
    include 'closedb.php';
}
?>
<html>  
    <head>
        <title>Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" >
        <style>
           body{
			background: linear-gradient(to left, #3E6294 , #a9abdc); 
		}
        #card {
            background: #fbfbfb;
            border-radius: 8px;
            box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
            height: 470px;
            margin: 6rem auto 8.1rem auto;
            width: 410px;
        }

        #card-content {
            padding: 12px 44px;
        }

        #card-title {
            font-family: "Raleway Thin", sans-serif;
            letter-spacing: 4px;
            padding-bottom: 23px;
            padding-top: 13px;
            text-align: center;
        }

        .underline-title {
            background: linear-gradient(to left, #3E6294 , #a9abdc); 
            height: 2px;
            margin: -1.1rem auto 0 auto;
            width: 89px;
        }

        a {
            text-decoration: none;
        }

        label {
            font-family: "Raleway", sans-serif;
            font-size: 11pt;
        }

        #forgot-pass {
            color: black;
            font-family: "Raleway", sans-serif;
            font-size: 10pt;
            margin-top: 3px;
            text-align: right;
        }

        .form {
            align-items: left;
            display: flex;
            flex-direction: column;
        }

        .form-border {
            background: linear-gradient(to left, #3E6294 , #a9abdc); 
            height: 1px;
            width: 90%;
            margin: auto;
        }

        .form-content {
            background: #fbfbfb;
            border: none;
            outline: none;
            padding-top: 14px;
        }

        #signup {
            color: #0085FF;
            font-family: "Raleway", sans-serif;
            font-size: 10pt;
            margin-top: 16px;
            text-align: center;
        }

        #submit-btn {
            background: -webkit-linear-gradient(right, #307ace, #19048d);
            border: none;
            border-radius: 21px;
            box-shadow: 0px 1px 5px #0085FF;
            cursor: pointer;
            color: white;
            font-family: "Raleway SemiBold", sans-serif;
            height: 42.3px;
            margin: 0 auto;
            margin-top: 50px;
            transition: 0.25s;
            width: 153px;
        }
        #submit-btn:hover {
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.3);
        }
        </style>
    

    </head>
    <body>
        <?php
        if ($errorMessage != '') {
            ?>
            <p align="center"><strong><font color="#990000"><?php echo $errorMessage; ?></font></strong></p>
            <?php
        }
        ?>
            <div id="card">
        <div id="card-content">
            <div id="card-title">
                <h2>LOGIN</h2>
                <div class="underline-title"></div>
            </div>
        </div>
        <form action="login_siswa.php" method="post" name="frmLogin" id="frmLogin" class="form">
            <label for="user-email" style="padding-top:13px">&nbsp;&nbsp;&nbsp;&nbsp;Username</label>
            <input style='width: 92%; margin: auto;' id="user-email" class="form-content" type="text" name="username" autocomplete="on" />
            <div class="form-border"></div><label for="user-password" style="padding-top:22px">&nbsp;&nbsp;&nbsp;&nbsp;Password</label>
            <input style='width: 92%; margin: auto;' id="user-password" class="form-content" type="password" name="password" />
            <div class="form-border"></div>

            <div class="row mb-3">
                <label for="user-email" style="padding-top:13px">&nbsp;&nbsp;&nbsp;&nbsp;Login Sebagai</label><br>
                <select style='width: 90%; margin: auto;' class="form-select form-select-sm" name="user">
                    <option style='width: 92%; margin: auto;' value="Dosen">Dosen</option>
                    <option style='width: 92%; margin: auto;' value="Mahasiswa">Mahasiswa</option>
                </select>
            </div>


            <a style="text-align: center;"><button id="submit-btn" type="submit">Login</button></a>
            <a href="daftar_siswa.php" id="signup">Belum memiliki akun? Daftar</a>
        </form>
    </div>
    </body>
</html>
