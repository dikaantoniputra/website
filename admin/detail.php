<h2>detail pembelian</h2>
<?php 
$ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan On 
        pembelian. id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian= '$_GET[id]'");
    $detail = $ambil->fetch_assoc();
?>

<pre><?php print_r($detail); ?></pre>
<strong><?php echo $detail['nama_pelanggan']?></strong>
<br>
<p>
    <?php echo $detail ['telepon']?>
    <br>
    <?php echo $detail ['email_pelanggan']?>
</p>
<p>tangga pembelian:
    <?php echo $detail ['tanggal_pembelian']?>  
</p>
<p>Total:
    <?php echo $detail ['total_pembelian']?>  
</p>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>SubTotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <!-- mengambil data dari table porduk -->
        <?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk 
        WHERE pembelian_produk.id_pembelian='$_GET[id]'");?>
        <!-- memecah data dari produk menjadi array asscoc -->
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $nomor?></td>
            <td><?php echo $pecah["nama_produk"]; ?></td>
            <td><?php echo $pecah["harga_produk"]; ?></td>
            <td><?php echo $pecah["jumlah"]; ?></td>
            <td>
                <?php echo $pecah["harga_produk"]*$pecah['jumlah']; ?>
            </td>

        </tr>
        <?php $nomor++;?>
        <?php  }?>
    </tbody>
</table>