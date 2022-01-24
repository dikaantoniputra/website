<h1>Data Kategori</h1>
<br>
 
<?php 
include "../koneksi.php";

$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) {
    $semuadata[] =$tiap;
}
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($semuadata as $key => $value) : ?>
        
        <tr>
            <td><?php echo $key+1 ?></td>
            <td><?php echo $value["nama_kategori"] ?></td>
            <td>
                <a href="index.php?halaman=hapuskategori&id=<?php echo $value['id_kategori'];?>" class="btn btn-danger">hapus</a>
                <a href="index.php?halaman=editkategori&id=<?php echo $value['id_kategori'];?>"  class="btn btn-warning">ubah</a>
                <a href="index.php?halaman=tambahkategori&id=<?php echo $value['id_kategori'];?>"  class="btn btn-info">Tambah</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>