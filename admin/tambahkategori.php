<h1>halaman tambah kategori</h1>


<h2>tambah kategori nama</h2>

<form method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label>Nama Kategori</label>
        <input type="text" class="form-control" name="kategori">
    </div>


    <button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php

if (isset($_POST['save'])) {

    $koneksi->query("INSERT INTO kategori 
    (nama_kategori)
    VALUES('$_POST[kategori]')");
    
    // mendapatakan id_produk barusan
   
    echo "<div class='alert alert-info'>Data tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kategori'>";
}
?>
