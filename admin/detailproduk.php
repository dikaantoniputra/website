<?php 
require 'koneksi.php';

$id_produk = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE id_produk='$id_produk'");
$detailproduk = $ambil->fetch_assoc();

$fotoproduk = array();
$ambilfoto = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$id_produk'");
while ($tiap = $ambilfoto->fetch_assoc()) {
    $fotoproduk[] = $tiap;
}

echo "<prev>";
print_r($detailproduk);
print_r($fotoproduk);
echo "</prev>";
?>

<table class="table">
<tr>
    <th>Kategori</th>
    <td><?php echo $detailproduk["nama_kategori"]?></td>
</tr>
<tr>
    <th>produk</th>
    <td><?php echo $detailproduk["nama_produk"]?></td>
</tr>
<tr>
    <th>harga</th>
    <td><?php echo $detailproduk["harga_produk"]?></td>
</tr>
<tr>
    <th>berat</th>
    <td><?php echo $detailproduk["berat_produk"]?></td>
</tr>
<tr>
    <th>deskripsi</th>
    <td><?php echo $detailproduk["deskripsi_produk"]?></td>
</tr>
<tr>
    <th>stok</th>
    <td><?php echo $detailproduk["stok_produk"]?></td>
</tr>

</table>

<div class="row">
    <?php foreach ($fotoproduk as $key => $value) : ?>
        <div class="col-md-3">
            <img src="../foto_produk/<?php echo $value['nama_produk_foto'] ?>" alt="" class="img-responsive">
            <a href="index.php?halaman=hapusfotoproduk&idfoto=<?php echo $value["id_produk_foto"]?> &idproduk=<?php echo $id_produk ?>" class="btn btn-danger btn-sm">Hapus</a>
        </div>
    <?php endforeach ?>
</div>

<form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>FILE FOTO</label>
            <input type="file" name="produk_foto">
        </div>
        <button class="btn btn-primary" name="simpan" value="simpan">SIMPAN</button>
</form>

<?php 
if (isset($_POST["simpan"])) {

    $lokasifoto = $_FILES["produk_foto"]["tmp_name"];
    $namafoto = $_FILES["produk_foto"]["name"];

    $namafoto = date("YmdHis").$namafoto;

    // upload
    move_uploaded_file($lokasifoto, "../foto_produk/".$namafoto);

    $koneksi->query("INSERT INTO produk_foto (id_produk,nama_produk_foto) VALUES ('$id_produk','$namafoto') ");

    echo "<script>alert('foto produk berhasil di SIMPAN')</script>";
    echo "<script>location='index.php?halaman=detailproduk&id=$id_produk';</script>";
}
?>