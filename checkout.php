<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['pelanggan'])) {
    echo "<script>alert ('anda harus login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}

echo "<prev>";
print_r($_SESSION['keranjang']);
echo "</prev>";

// koneksi ke databse







if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
    echo "<script>alert('keranjang kososng, silahkan belanja dulu');</script>";
    echo "<script>location='index.php';</script>";
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
						Keranjang
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
								<a href="product.html">Shop</a>
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
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>
				</li>

				<li>

				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.html">Home</a>
					<ul class="sub-menu-m">
						<li><a href="index.html">Homepage 1</a></li>
						<li><a href="home-02.html">Homepage 2</a></li>
						<li><a href="home-03.html">Homepage 3</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="product.html">Shop</a>
				</li>

				<li>
					<a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
				</li>

				<li>
					<a href="blog.html">Blog</a>
				</li>

				<li>
					<a href="about.html">About</a>
				</li>

				<li>
					<a href="contact.html">Contact</a>
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
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" method="post">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Harga</th>
									<th class="column-3">Jumlah</th>
									<th class="column-5">Total</th>
									
								</tr>
					
							 <?php $totalbelanja = 0; ?>
							  <?php $produk = 0; ?>
								<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah ) : ?>
           						 <!-- menampilkan produk yang diperlukan berdasarkan id produk -->
							<?php 
							$ambil=$koneksi->query("SELECT * FROM produk 
							WHERE id_produk='$id_produk'");
							$pecah = $ambil->fetch_assoc();
							$subharga = $pecah["harga_produk"]*$jumlah;
							// echo "<prev>";
							// print_r($pecah);
							// echo "</prev>";
							?>
						
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="foto_produk/<?php echo $pecah['foto_produk']; ?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $pecah["nama_produk"]; ?></td>
									<td class="column-3">RP.<?php echo number_format($pecah["harga_produk"]); ?></td>

									
									<td class="column-3">
											<p>&ensp;&ensp;<?php echo $jumlah ?></p>
									</td>
									

									<td class="column-5">RP.<?php echo number_format($subharga); ?></td>
							
									 
									
								<?php $totalbelanja+=$subharga; ?>
								<?php $produk+=$jumlah; ?>	
								
								</tr>
								<?php  endforeach ?>
								
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
						
							<a href="keranjang.php?id=<?php echo $pecah['id_produk']; ?>" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Kembali Keranjang
							</a>
						</div>
					</div>
				</div>


			

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Detail Pembelian
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Nama Pembeli :
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									&ensp;<?php echo $_SESSION['pelanggan'] ['nama_pelanggan'] ?>
								</span>
							</div>
						</div>
							<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Nomer Telepon :
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									&ensp;<?php echo $_SESSION['pelanggan'] ['telepon'] ?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									Barang Yang Sudah Di beli Berarti Setuju dengan dengan apa yang dibeli komlite memerlukan video dan asuransi
								</p>
							</div>
					</div>
					<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total Produk:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									Jumlah <?php echo $produk ?>
								</span>
							</div>
						</div>
				</div>
			</div>
		</div>
	

		<div class=" m-lr-auto m-b-50 ">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Data Pembeli
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Nama
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?php echo $_SESSION["pelanggan"]["nama_pelanggan"]?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Detail Pengiriman:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									Masukan Alamat Detail Anda Untuk Mempermudah pengiriman Barang Ongkir kelipatan dari juamlah barang 
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Pengiriman
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="id_ongkir">
											<option>Masukan Kota Tujuan</option>
											<?php 
												$ambil = $koneksi->query("SELECT * FROM ongkir");
												
												while ($perongkir = $ambil->fetch_assoc()) { 
													$tlongkir = $perongkir["tarif"]*$produk;?>
										
												<option value="<?php echo $perongkir["id_ongkir"] ?>">
												<?php echo $perongkir['nama_kota'] ?> -
												RP. <?php echo number_format($tlongkir) ?>
												</option>												
											<?php } ?>
										</select>

										<div class="dropDownSelect2"></div>
									</div>
								<div class="form-group">
									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="alamat_lengkap" placeholder="Alamat Pengiriman">
									</div>
												
									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="kode_pos" placeholder="Postcode">
									</div>
								</div>	
							
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total Belanja:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									<?php echo $totalbelanja ?>
								</span>
							</div>
						</div>

						<button name="checkout" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</button>
					</div>
								</div>
								
	</form>
	
	<!-- coding untuk checkout ke dua  -->
 <?php 
 if (isset($_POST["checkout"])) 
 {
    $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
    $id_ongkir = $_POST["id_ongkir"];
    $tannggal_pembelian = date("Y-m-d");
    // coding di bawah ini codingan mengepos alamat
    $alamat_lengkap = $_POST['alamat_lengkap'];
	 $kodepos = $_POST['kode_pos'];

    // mengambil data tari di tabel ongkir
    $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
    $arrayongkir = $ambil->fetch_assoc();
    $nama_kota = $arrayongkir['nama_kota'];
    $tarif = $tlongkir;


    $total_pembelian = $totalbelanja + $tarif;

    // 1 menyimpan data ke tabel pembelian
    $koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_lengkap,kodepos)
    VALUES ('$id_pelanggan','$id_ongkir','$tannggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_lengkap','$kodepos') ");
    
    
    // mendapatkan atau menyimpan id _pembelian barusan terjadi pada tabel pembelian
    $id_pembelian_barusan = $koneksi->insert_id;

    foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
    {
        // mendapatkan data produk berdasarkan id_produk
        $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
        $perproduk = $ambil->fetch_assoc();

        $nama = $perproduk['nama_produk'];
        $harga = $perproduk['harga_produk'];
        $berat = $perproduk['berat_produk'];

        $subberat = $perproduk['berat_produk']*$jumlah;
        $subharga = $perproduk['harga_produk']*$jumlah;
        
        // $koneksi->query("INSERT INTO pembelian_produk(iSd_pembelian,id_produk,jumlah)
        // VALUES ('$id_pembelian_barusan','$id_produk','$jumlah')"); lama

             $koneksi->query("INSERT INTO pembelian_produk(id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah)        
        VALUES ('$id_pembelian_barusan','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah') ");

        // skrip update stok
        $koneksi->query("UPDATE produk SET stok_produk=stok_produk -$jumlah 
        WHERE id_produk='$id_produk'");
    }
    // mengososngkan keranjang
    unset($_SESSION["keranjang"]);

    // tampilan di alihkan ke halaman nota , nota dari pembelian yang barusan
    echo "<script>alert('pembelian sukses');</script>";
    echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";

 }
 ?>	
</div>
	<!-- Footer -->

<?php include 'footer.php' ?>


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