<?php
session_start();
// koneksi ke databse
include 'koneksi.php';

if (!isset($_SESSION['pelanggan'])) {
    echo "<script>alert ('anda harus login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home 03</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
<?php include 'nav.php' ?>

	<!-- Sidebar -->
	



	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1 rs2-slick1">
			<div class="slick1">

			<?php $ambil = $koneksi->query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT 1");?>
						<?php $terbaru = $ambil->fetch_assoc() ?>
				<div class="item-slick1 bg-overlay1" style="background-image: url('foto_produk/<?php echo $terbaru['foto_produk'];?>');" data-thumb="foto_produk/<?php echo $terbaru['foto_produk'];?>" data-caption="Women’s Wear">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									Produk Terbaru Kami
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
									<?php echo $terbaru['nama_produk'] ?>
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<?php $ambil = $koneksi->query("SELECT * FROM produk ORDER BY stok_produk DESC LIMIT 1");?>
						<?php $terbaru = $ambil->fetch_assoc() ?>
				<div class="item-slick1 bg-overlay1" style="background-image: url('foto_produk/<?php echo $terbaru['foto_produk'];?>');" data-thumb="foto_produk/<?php echo $terbaru['foto_produk'];?>" data-caption="Men’s Wear">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									Produk Stok Terbanyak
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
									<?php echo $terbaru['nama_produk'] ?>
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<?php $ambil = $koneksi->query("SELECT pembelian_produk.nama, produk.foto_produk from pembelian_produk INNER JOIN produk ON pembelian_produk.id_produk=produk.id_produk order by count(*) desc;");?>
						<?php $terlaris = $ambil->fetch_assoc() ?>
				<div class="item-slick1 bg-overlay1" style="background-image: url('foto_produk/<?php echo $terlaris['foto_produk'];?>');" data-thumb="foto_produk/<?php echo $terlaris['foto_produk'];?>" data-caption="Men’s Wear">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
								Produk Terlaris 
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
									<?php echo $terlaris['nama'] ?>
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="wrap-slick1-dots p-lr-10"></div>
		</div>
	</section>


	<!-- Banner -->
	<!-- KATEGORI -->
	<div class="sec-banner bg0 p-t-95 p-b-55">
		<div class="container">
			<div class="row">
				<?php $ambil = $koneksi->query("SELECT * FROM kategori");?>
						<?php while($kategori = $ambil->fetch_assoc()){ ?>
				<div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
					
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="images/kategori.jpg" alt="IMG-BANNER">

						<a href="kategori.php?kat=<?php echo $kategori['id_kategori'] ?>" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
								<h4>Kategori</h4>
								</span>

								<span class="block1-info stext-102 trans-04">
									<?php echo $kategori['nama_kategori']?>
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09" href="kategori.php?kat=<?php echo $kategori['id_kategori'] ?>">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
					<?php } ?>	

			
			</div>
		</div>
	</div>


	<!-- Product -->
	<section class="bg0 p-t-23 p-b-130">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" href="produk.php">
						All Products
					</button>

					<?php $ambil = $koneksi->query("SELECT * FROM kategori");?>
						<?php while($kategori = $ambil->fetch_assoc()){ ?>
					<a href="kategori.php?kat=<?php echo $kategori['id_kategori'] ?>" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" >
						<?php echo $kategori["nama_kategori"] ?>
					</a>
					<?php } ?>
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					
					
					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
					
					
				</div>

				<!-- pencarian produk -->
				<!-- Search product -->
				
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<form action="pencarian.php" method="get">
					<div class="bor8 dis-flex p-l-15">
						
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>
						
						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="keyword" placeholder="Cari Produk">
						</form>
					</div>	
				</div>
				
				<!-- Filter -->
				
			</div>

			<div class="row isotope-grid">

			<!-- pagination -->

				
			<?php 
			// pagination
			$batas = 4;
			$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
			$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
 
			$previous = $halaman - 1;
			$next = $halaman + 1;

			$data = mysqli_query($koneksi,"SELECT * FROM produk");
			$jumlah_data = mysqli_num_rows($data);
			$total_halaman = ceil($jumlah_data / $batas);

			$produk = mysqli_query($koneksi, "SELECT * FROM produk LIMIT $halaman_awal, $batas");
			$nomor = $halaman_awal+1;
				while ($perproduk = mysqli_fetch_array($produk)) {
			?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img  src="foto_produk/<?php echo $perproduk['foto_produk'];?>" alt="IMG-PRODUCT">

							<a href="product-detail.php?id=<?php echo $perproduk['id_produk']; ?>"  class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
								View Produk
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a  class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<h3><?php echo $perproduk['nama_produk']; ?></h3>
								</a>

								<span class="stext-105 cl3">
									<h3><?php echo $perproduk['harga_produk']; ?></h3>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
			<?php }?>


			</div>

			<!-- Pagination -->
			<nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
				</li>

				<?php 
				for($x=1;$x<=$total_halaman;$x++){?> 
				<!-- melihat sekarang halaman berapa -->
					<?php if( $x == $halaman) : ?>
					<li class="page-item"><a class="page-link" style="font-weight: bold; color: red;" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php else : ?>
						<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php endif; ?>
					<?php } ?>	
							
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
				</li>
			</ul>
		</nav>
		</div>
		
	</section>


<?php include 'footer.php' ?>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- pop up detail produk -->
 


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
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>
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