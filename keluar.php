<?php 
session_start();
$_SESSION['pelanggan'] ='';
unset($_SESSION['pelanggan']);
session_unset();
session_destroy();
echo "<script>alert('anda telah logout');</script>";
echo "<script>location='index.php';</script>";
?>