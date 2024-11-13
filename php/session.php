<!-- ini digunakan untuk menginclude kan file - file yang lainn -->

<?php
session_start();
if($_SESSION['login']==false){
    header('location: login.php');
}
?>