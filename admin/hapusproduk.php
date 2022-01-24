<?php 

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
if (file_exists("../foto_produk/$namanamafoto")) {
    unlink("../foto_produk/$namanamafoto");
}

$koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");

    echo "<div class='alert alert-info'>Data Berhasil Di hapus</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";


?>

