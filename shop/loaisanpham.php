<!DOCTYPE html>
<html lang="en">

<head>
	<title>Loại sản phẩm</title>
	<?php
	include('../link.php');
	?>
</head>

<body>
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">SEARCH HERE</h4>
				</div>
				<div class="modal-body">
					<div class="input-group">
						<form method="get" action="timkiem.php" class="searchform" role="search">
							<input type="hidden" name="type" value="product">
							<input type="text" name="search" class="form-control control-search">
							<span class="input-group-btn">
								<button class="btn btn-default button_search" type="submit" name="btnsearch"><i class="ion-ios-search"></i></button>
							</span>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="page" class="site">
		<div class="page-fullwidth">
			<div class="page-left-sidebar">
				<?php include('header.php') ?>
			</div>
			<!-- ============ -->
			<div class="page-right-content">
				<!-- Banner -->
				<!-- Item list -->
				<div class="product-content">
					<div class="product-collection">
					<div class="pattern"></div>
						<div class="row">
							
								<?php
								if (isset($_GET['maloai']) && !empty($_GET['maloai'])) {
									include('../connectmysql.php');
									$lenh = "SELECT * FROM hangsx,loaisp WHERE hangsx.maloai=loaisp.maloai and loaisp.maloai=" . $_GET['maloai'];
									$result1 = mysqli_query($conn, $lenh);
									while ($row = mysqli_fetch_array($result1)) { ?>
										<div class="col-md-3 col-sm-6 col-xs-12">
											<div class="product-item product-content">
												<div class="product-item-img-ver6">
													<a href="hangsanxuat.php?mahang=<?= $row['mahang'] ?>"><img src='../<?= $row['picture'] ?>' alt="images" class="img-responsive" /></a>
												</div>
											</div>
										</div>

								<?php
									}
								}
								?>
							
						</div>
					</div>
					<div class="product-bestselling text-center">
						<div class="product-header">
							<h2>Best Selling Products</h2>
						</div>
						<div class="row">
							<!--HIỂN THỊ SẢN PHẨM-->
							<?php
							if (isset($_GET['maloai']) && !empty($_GET['maloai'])) {
								include('../connectmysql.php');
								$cl = "SELECT * from kho,loaisp where loaisp.maloai=kho.maloai and loaisp.maloai=" . $_GET['maloai'];
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
</body>

</html>