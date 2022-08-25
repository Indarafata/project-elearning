<?php

session_start();

if (isset($_SESSION['user_is_logged_in'])) {
    unset($_SESSION['user_is_logged_in']);
    unset($_SESSION['user']);
}

header('Location: login_siswa.php');
?>
