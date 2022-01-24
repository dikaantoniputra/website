<?php 
// mefilter data pembelian
$semuadata=array();
$tgl_mulai="-";
$tgl_selesai="-";
if (isset($_POST["kirim"])) {
    $tgl_mulai = $_POST["tglm"];
    $tgl_selesai = $_POST["tgls"];
    // PM ADALAH PEMBELIAN
    // PL ADALAH PELANGGAN
    $ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON
    pm.id_pelanggan=pl.id_pelanggan WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");
    while ($pecah = $ambil->fetch_assoc()) {
        $semuadata[]=$pecah;
    }
}

// echo "<prev>";
// print_r($semuadata);
// echo "</prev>";

?>

<h1>laporan pembelian Dari <?php echo $tgl_mulai ?> Hingga <?php $tgl_selesai ?></h1>
<hr>

<form method="post">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label>Tanggal Selasai</label>
                <input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>&nbsp;</label><br>
                <button class="btn btn-primary" name="kirim">Lihat</button>
            </div>
        </div>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <!-- membuat totoal dari semua tabel -->
        <?php $total=0;?>
        <?php foreach ($semuadata as $key => $value) : ?>
        <!-- lanjutan dari total di atas -->
        <?php $total+=$value["total_pembelian"]?>
        <tr>
            <td><?php echo $key+1; ?></td>
            <td><?php echo $value["nama_pelanggan"]; ?></td>
            <td><?php echo $value["tanggal_pembelian"]; ?></td>
            <td>Rp. <?php echo number_format($value["total_pembelian"]) ?></td>
            <td><?php echo $value["status_pembelian"]; ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
            <tr>
                <th colspan="3">Total</th>
                <th>Rp. <?php echo number_format($total)?></th>
                <th></th>
            </tr>
    </tfoot>
</table>