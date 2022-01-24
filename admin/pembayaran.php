<h1>data pembayaran</h1>

<?php 
$id_pembelian = $_GET['id'];

// mengambil data pembayaran berdasarkan id_pembelian
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();

echo "<prev>";
print_r($detail);
echo"</prev>";


?>

<div class="row">
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Nama</th>
                <th><?php echo $detail['nama']?></th>
            </tr>
            <tr>
                <th>Bank</th>
                <th><?php echo $detail['bank']?></th>
            </tr>
            <tr>
                <th>Jumlah</th>
                <th><?php echo $detail['jumlah']?></th>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <img src="../bukti_pembayaran/<?php echo $detail['bukti'] ?>" alt="" class="img-responsive">
    </div>
</div>

<form method="post">
    <div class="form-group">
        <label>No resi pengiriman</label>
        <input type="text" class="form-control" name="resi">
    </div>
    <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status">
            <option value="">Pilih Status</option>
            <option value="lunas">Lunas</option>
            <option value="barang dikirim">Barang dikirim</option>
            <option value="batal">batal</option>
        </select>   
    </div>
    <button class="btn btn-primary" name="proses">Proses</button>
</form>

<?php 
if (isset($_POST["proses"])) {
    $resi = $_POST["resi"];
    $status = $_POST["status"];
    $koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi',status_pembelian='$status'
    WHERE id_pembelian='$id_pembelian'");

    echo "<script>alert('data pembelian terupdate');</script>";
    echo "<script>location='index.php?halaman=pembelian';</script>";

}
?>

