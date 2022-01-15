<!DOCTYPE html>
<html lang="en">

<head>
	<title>Trang chủ</title>
	<?php
	include('../link.php');
	?>
</head>

<body>
	<!-- Header -->
	<?php include('searchbox.php') ?>
	<div class="page-left-sidebar">
		<?php include('header.php') ?>
	</div>
	<!-- Content -->
	<div class="page-right-content">
		<!-- Banner -->
		<?php include('./banner.php') ?>
		<!-- Item list -->
		<div class="product-content">
			<div class="product-collection">
				<div class="pattern"></div>
				<div class="row">
					<?php
					include('../connectmysql.php');
					$lenh = "select * from loaisp";
					$result0 = mysqli_query($conn, $lenh);
					while ($row = mysqli_fetch_array($result0)) { ?>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="product-item product-content">
								<div class="product-item-img-ver6">
									<a href="loaisanpham.php?maloai=<?= $row['maloai'] ?>"><img src='../<?= $row['anhs'] ?>' alt="images" class="img-responsive" /></a>
									<div class="button-hover">
										<a href="loaisanpham.php?maloai=<?= $row['maloai'] ?>" class="btn btn-view v6">View Collection <i class="ion-chevron-right"></i></a>
									</div>
								</div>
								<div class="product-item-ds-ver1">
									<h3 class="product-title">
										<li><a href="loaisanpham.php?maloai=<?= $row['maloai'] ?>"><b><?= $row['loai'] ?></b></a></li>
									</h3>
								</div>
							</div>
						</div>
					<?php
					}
					?>
				</div>
			</div>
			<div class="product-bestselling text-center">
				<div class="product-header">
					<h2>GIÀY TRẺ EM BÁN CHẠY NHẤT</h2>
					<div class="row" style="display: flex; justify-content: center; padding: 5rem;">

						<?php
						include('../connectmysql.php');
						$lenh = "SELECT * FROM hangsx,loaisp WHERE hangsx.maloai=loaisp.maloai and loaisp.maloai=1";
						$result1 = mysqli_query($conn, $lenh);
						while ($row = mysqli_fetch_array($result1)) { ?>

							<p style="padding: 1rem;"><a href="hangsanxuat.php?mahang=<?= $row['mahang'] ?>"><?= $row['tenhang'] ?></a></p>

						<?php
						} ?>
					</div>
				</div>

				<div class="row">

					<!--HIỂN THỊ SẢN PHẨM-->
					<?php
					include('../connectmysql.php');
					$result = mysqli_query($conn, 'select * from kho WHERE maloai=1 limit 10');
					while ($row = mysqli_fetch_array($result)) {
						include('./product.php');
					}
					?>
				</div>
			</div>


			<div class="product-bestselling text-center">
				<div class="product-header">
					<h2>GIÀY NAM BÁN CHẠY NHẤT</h2>
					<div class="row" style="display: flex; justify-content: center; padding: 5rem;">
						<?php
						include('../connectmysql.php');
						$lenh = "SELECT * FROM hangsx,loaisp WHERE hangsx.maloai=loaisp.maloai and loaisp.maloai=2";
						$result1 = mysqli_query($conn, $lenh);
						while ($row = mysqli_fetch_array($result1)) { ?>
							<p style="padding: 1rem;"><a href="hangsanxuat.php?mahang=<?= $row['mahang'] ?>"><?= $row['tenhang'] ?></a></p>
						<?php
						} ?>
					</div>
				</div>

				<div class="row">
					<!--HIỂN THỊ SẢN PHẨM-->
					<?php
					include('../connectmysql.php');
					$result = mysqli_query($conn, 'select * from kho WHERE maloai=2 limit 10');
					while ($row = mysqli_fetch_array($result)) {
						include('./product.php');
					}
					?>
				</div>
			</div>

			<div class="product-bestselling text-center">
				<div class="product-header">
					<h2>GIÀY NỮ BÁN CHẠY NHẤT</h2>
					<div class="row" style="display: flex; justify-content: center; padding: 5rem;">
						<?php
						include('../connectmysql.php');
						$lenh = "SELECT * FROM hangsx,loaisp WHERE hangsx.maloai=loaisp.maloai and loaisp.maloai=3";
						$result1 = mysqli_query($conn, $lenh);
						while ($row = mysqli_fetch_array($result1)) { ?>
							<p style="padding: 1rem;"><a href="hangsanxuat.php?mahang=<?= $row['mahang'] ?>"><?= $row['tenhang'] ?></a></p>
						<?php
						} ?>
					</div>
				</div>

				<div class="row" style="display: flex; justify-content: center;">
					<!--HIỂN THỊ SẢN PHẨM-->
					<?php
					include('../connectmysql.php');
					$result = mysqli_query($conn, 'select * from kho WHERE maloai=3 limit 5');
					while ($row = mysqli_fetch_array($result)) {
						include('./product.php');
					}
					?>
				</div>
			</div>

			<div class="product-bestselling text-center">
				<div class="product-header">
					<h2>ĐỒNG HỒ BÁN CHẠY NHẤT</h2>
					<div class="row" style="display: flex; justify-content: center; padding: 5rem;">
						<?php
						include('../connectmysql.php');
						$lenh = "SELECT * FROM hangsx,loaisp WHERE hangsx.maloai=loaisp.maloai and loaisp.maloai=22";
						$result1 = mysqli_query($conn, $lenh);
						while ($row = mysqli_fetch_array($result1)) { ?>
							<p><a href="hangsanxuat.php?mahang=<?= $row['mahang'] ?>"><?= $row['tenhang'] ?></a></p>
						<?php
						} ?>
					</div>
				</div>

				<div class="row" style="display: flex; justify-content: center;">
					<!--HIỂN THỊ SẢN PHẨM-->
					<?php
					include('../connectmysql.php');
					$result = mysqli_query($conn, 'select * from kho WHERE maloai=22 limit 5');
					while ($row = mysqli_fetch_array($result)) {
						include('./product.php');
					}
					?>
				</div>
			</div>

			<?php include('footer.php') ?>
		</div>

</body>

</html>