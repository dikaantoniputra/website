<?php 
session_start();
include 'koneksi.php';
echo "<prev>";
print_r($_SESSION['checkout']);
echo "</prev>";
?>