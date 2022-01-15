<!DOCTYPE html>
<html lang="en">

<head>
	<title>Tìm kiếm sản phẩm</title>
	<?php
	include('../link.php');
	?>
</head>

<body>
	<!-- BackToTop -->
	<?php include('searchbox.php') ?>
	<div class="page-left-sidebar">
		<?php include('header.php') ?>
	</div>
	<div class="page-right-content">
		<div class="container">
			<div class="heading-sub">
				<h3 class="pull-left">shop list</h3>
				<ul class="other-link-sub pull-right">
					<li><a href="#home">Home</a></li>
					<li><a class="active" href="#shop">search</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="widget-banner">
				<a href="#" class="images"><img src="../image/banner/banner-v2.png" alt="images" class="img-responsive" /></a>
				<div class="banner-text">
					<h2>Just Press</h2>
					<p>Mini camera by Instax</p>
				</div>
				<div class="banner-button">
					<a href="#" title="button" class="btn-getit">Get It</a>
				</div>
			</div>
			<div class="widget-product-list">
				<div class="row">
					<div class="col">
						<div class="product-content">
							<div class="product-bestselling text-center">
							<div class="row">
								<?php
								if (isset($_GET['btnsearch'])) {
									include('../connectmysql.php');
									$tim = $_GET['search'];
									$cl = "select * from kho  WHERE tensp LIKE '%" . $tim . "%'";
									$result = mysqli_query($conn, $cl);
									while ($row = mysqli_fetch_array($result)) {
										include('./product.php');
									}
								}
								?>
							</div>
							</div>
						</div>
					</div>
				</div>
				<?php include('footer.php') ?>
			</div>
		</div>
	</div>
</body>

</html>