

<h1>data pembelian</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Status pembelian</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <!-- mengambil data dari table porduk -->
        <?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan On 
        pembelian. id_pelanggan=pelanggan.id_pelanggan");?>
        <!-- memecah data dari produk menjadi array asscoc -->
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $nomor?></td>
            <td><?php echo $pecah["nama_pelanggan"]; ?></td>
            <td><?php echo $pecah["tanggal_pembelian"]; ?></td>
            <td>
                <?php echo $pecah["status_pembelian"]; ?>
                <br>
                <?php if (!empty($pecah["resi_pengiriman"])): ?>
                    Resi: <?php echo $pecah['resi_pengiriman'];?>
                    <?php endif ?>
            </td>
            <td><?php echo $pecah["total_pembelian"]; ?></td>
            
            <td>
                <a  class="btn btn-primary" href="index.php?halaman=detail&id=<?php echo $pecah["id_pembelian"]; ?>
                ">Detail</a>

                <?php if ($pecah['status_pembelian']!=="pending"): ?> 
                    <a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian']?>" class="btn btn-success">pembayaran</a>
                <?php endif ?>
            </td>
        </tr>
        <?php $nomor++;?>
        <?php  }?>
    </tbody>
</table>