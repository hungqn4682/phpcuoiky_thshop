<!DOCTYPE html>
<html lang="en">

<head>
	<title>Danh mục</title>
	<?php
	include('../link.php');
	?>
</head>

<body>
<?php include('searchbox.php') ?>
	<div id="page" class="site">
		<div class="page-fullwidth">
			<div class="page-left-sidebar">
				<?php include('header.php') ?>
			</div>
			<div class="page-right-content">
				<div class="container">
					<div class="heading-sub">
						<h3 class="pull-left">shop list</h3>
						<ul class="other-link-sub pull-right">
							<li><a href="#home">Home</a></li>
							<li><a class="active" href="#shop">Shop</a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<!-- Banner -->

					<!-- Item list -->
					<div class="widget-product-list">
						<div class="row">
							<div class="col">
								<div class="filter-block bd">
									<div class="row">
										<div class="col-md-5">
											<div class="box box-view">
												<span>Showing 1–12 of 40 results</span>
												<div class="button-view">
													<span class="col"><i class="ion-ios-keypad fa-3a"></i></span>
													<span class="list"><i class="icon-grid-4"></i></span>
												</div>
											</div>
										</div>
										<div class="col-md-7 margin-top3">

											<div class="box sort pull-right">
												<span>Sort by:</span>
												<button class="dropdown-toggle" type="button" data-toggle="dropdown" id="menu2">
													<span class="dropdown-label">Featured</span>
												</button>
												<ul class="dropdown-menu" role="menu" aria-labelledby="menu2">
													<li><a href="#" title="">Featured</a></li>
													<li><a href="#" title="">Best Selling</a></li>
													<li><a href="#" title="">Best Selling</a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="product-list grid_full grid_sidebar grid-uniform">

									<div class="Product-head">
										<div class="Product-head-tag">
											<?php
											if (isset($_GET['maloai']) && !empty($_GET['maloai'])) {
												include('../connectmysql.php');
												$lenh = "SELECT * from hangsx,loaisp where hangsx.loai=loaisp.loai and maloai=" . $_GET['maloai'];
												$result1 = mysqli_query($conn, $lenh);
												while ($row = mysqli_fetch_array($result1)) { ?>
													<p><a class="manu1" href="hangsanxuat.php?mahang=<?= $row['mahang'] ?>"><img class="a_category" src='../<?= $row['picture'] ?>' /></a></p>
											<?php
												}
											}
											?>
										</div>
										<div class="Product-content">
											<div class="Product-content-list">
												<?php
												if (isset($_GET['mahang']) && !empty($_GET['mahang'])) {
													include('../connectmysql.php');
													$cl = "SELECT * from kho,hangsx,loaisp where kho.mahang=hangsx.mahang and loaisp.maloai=kho.maloai and hangsx.mahang=" . $_GET['mahang'];
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
						</div>
					</div>
				</div>
			</div>
		</div>
</body>

</html>