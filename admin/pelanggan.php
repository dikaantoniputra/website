
<h1>data pelanggan</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
             <th>alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <!-- mengambil data dari table porduk -->
        <?php $ambil=$koneksi->query("SELECT * FROM pelanggan");?>
        <!-- memecah data dari produk menjadi array asscoc -->
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $nomor?></td>
            <td><?php echo $pecah["nama_pelanggan"]; ?></td>
            <td><?php echo $pecah["email_pelanggan"]; ?></td>
            <td><?php echo $pecah["telepon"]; ?></td>
                <td><?php echo $pecah["alamat_pelanggan"]; ?></td>
            
           
        </tr>
        <?php $nomor++;?>
        <?php  }?>
    </tbody>
</table>
