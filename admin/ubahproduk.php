<h2>Ubah Produk</h2>

<?php

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

echo "<prev>";
print_r($pecah);
echo "</prev>";
?>

<?php 
$datakategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) {
    $datakategori[] =$tiap;
}

?>

<form method="post" enctype="multipart/form-data">
<div class="form-group">
        <label>Kategori</label>
        <select class="form-control" name="id_kategori">
            <option value="">Pilih Kategori</option>
            <?php foreach ($datakategori as $key => $value): ?>

            <option value="<?php echo $value["id_kategori"] ?>" <?php if ($pecah["id_kategori"]==$value["id_kategori"]) {
            echo "selected"; }?> >
            <?php echo $value["nama_kategori"]?>
            </option>

            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_produk'];?>">
    </div>

    <div class="form-group">
        <label>Stok Produk</label>
        <input type="text" class="form-control" name="stok" value="<?php echo $pecah['stok_produk'];?>">
    </div>

    <div class="form-group">
        <label>Harga</label>
        <input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga_produk'];?>">
    </div>

    <div class="form-group">
        <label>Berat</label>
        <input type="number" class="form-control" name="berat" value="<?php echo $pecah['berat_produk'];?>">
    </div>

    <div class="form-group">
        <label>Deskripsi</label>
        <textarea  class="form-control" name="deskripsi" rows="10" >
           <?php echo $pecah['deskripsi_produk'];?>
        </textarea>
    </div>
    <div class="form-group">
        <img src="../foto_produk/<?php echo $pecah["foto_produk"]; ?>" width="100">
    </div>

    <div class="form-group">
        <label>Foto</label>
        <input type="file" class="form-control" name="foto">
    </div>

    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
if (isset($_POST['ubah']))
{
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
    // jika foto di rubah
    if (!empty($lokasifoto)) 
    {
        move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

    $koneksi->query("UPDATE produk SET
    nama_produk='$_POST[nama]',
    harga_produk='$_POST[harga]',
    berat_produk= '$_POST[berat]',
    stok_produk= '$_POST[stok]',
    id_kategori= '$_POST[id_kategori]',
    foto_produk='$namafoto',
    deskripsi_produk='$_POST[deskripsi]'
    WHERE id_produk='$_GET[id]'");
    }
    else {
        $koneksi->query("UPDATE produk SET
    nama_produk='$_POST[nama]',
    harga_produk='$_POST[harga]',
    berat_produk= '$_POST[berat]',
    stok_produk= '$_POST[stok]',
    id_kategori= '$_POST[id_kategori]',
    deskripsi_produk='$_POST[deskripsi]'
    WHERE id_produk='$_GET[id]'");
    }
    echo "<script>alert ('data produk telah diubah');</script>";
    echo "<script>location='index.php?halaman=produk';</script>";
}

?>
