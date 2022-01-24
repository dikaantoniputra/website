<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['pelanggan'])) {
    echo "<script>alert ('anda harus login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}

?>

<?php 
$ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON
        pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian= '$_GET[id]'");
    $detail = $ambil->fetch_assoc();
?>

<!-- data orang yang beli -->
<!-- <pre><?php print_r($detail); ?></pre>

<pre><?php print_r($_SESSION); ?></pre> -->

<!-- jika pelanggan yang beli tidak sama dengan pelanggan yang login maka dilarikan ke riwayat.php
karen tidak berhak query di bawah-->
<!-- pelanggan yang beli harus sama  -->

<?php 
// mendapatkan id_pelanggan di beli
$idpelangganyangbeli = $detail["id_pelanggan"];

// mendapatkan id_pelanggan yang login
$idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

if ($idpelangganyangbeli!==$idpelangganyanglogin) {
    echo "<script>alert('jangan nakal');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shoping Cart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Nota Pembelian
					</div>

					
				</div>
			</div>

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.html">Home</a>
							</li>

							<li>
								<a href="riwayat_pembelian.php">Daftar Belanja</a>
							</li>
						</ul>
					</div>	

					
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.html"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->


			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">

			<ul class="main-menu-m">
				<li>
					<a href="home.php">Home</a>
					
					
				</li>

				<li>
					<a href="riwayat_pembelian.php">Daftar Belanja</a>
				</li>

				
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="home.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Nota Pembelian
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2">Harga Produk</th>
									<th class="column-3">Berat</th>
									<th class="column-3">Jumlah</th>
									<th class="column-5">Total </th>
									
								</tr>
					
								<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'");?>
								<!-- memecah data dari produk menjadi array asscoc -->
								<?php while ($pecah = $ambil->fetch_assoc()) { ?>	
						
								<tr class="table_row">
									<td class="column-1">
										<?php echo $pecah["nama"]; ?>
									</td>
									<td class="column-2">RP. <?php echo number_format($pecah["harga"]); ?></td>
									<td class="column-3"><?php echo $pecah["berat"]; ?> GR.</td>

									
									<td class="column-3">
											<?php echo $pecah["jumlah"]; ?>
									</td>
									

									<td class="column-5">RP.<?php echo number_format($pecah['subharga']) ?></td>

								
								</tr>
								<?php  }?>
								
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<h2>Total Bayar :</h2>
							<div  class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
							RP <?php echo number_format ($detail['total_pembelian'])?>
							</div>
						</div>
					</div>
				</div>


			

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Nota Pembelian :  <?php echo $detail['id_pembelian']?>
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Tanggal Pembelian : 
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									&ensp; <?php echo $detail['tanggal_pembelian']?>
								</span>
							</div>
						</div>
							<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Status Pembelian :
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									&ensp;<?php echo $detail['status_pembelian'] ?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Data Pelanggan:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									 <strong>Nama Pembeli: &ensp;<?php echo $detail['nama_pelanggan']?></strong><br>
									 Telepon: &ensp;<?php echo $detail['telepon']?> </br>
								eMAIL :&ensp;<?php echo ($detail['email_pelanggan'])?>
														</p>
													</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Pengiriman:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
						
									<strong>Nama Kota: <?php echo $detail['nama_kota']?></strong><br>
									Tarif ongkir: RP <?php echo number_format ($detail['tarif'])?><br>
									Alamat: <?php echo  ($detail['alamat_lengkap'])?><br>
									kodepos: <?php echo  ($detail['kodepos'])?>
							</div>
						</div>
				

						
						</div>
				</div>
			</div>
		</div>
	

	<div class=" m-lr-auto m-b-50 ">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Pembayaran
						</h4>

						

							<div class="alert alert-info">
									<h3>
										Silahkan melakukan pembayaran Rp. <?php echo number_format($detail ['total_pembelian']);?> ke <br>
										<strong>BANK MANDIRI 137-001088-3276 Dika Antoni Putra</strong>
									</h3>
								</div>
						</div>

					

						<a href="pembayaran.php?id=<?php echo $detail["id_pembelian"]; ?>" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							membayar
						</a>
					</div>
				</div>
								
	
	

 

	<!-- Footer -->
<?php include "footer.php"?>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>