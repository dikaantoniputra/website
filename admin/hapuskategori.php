<?php 

$koneksi->query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");

    echo "<div class='alert alert-info'>Data Berhasil Di hapus</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kategori'>";


?>

