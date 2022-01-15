<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Giỏ hàng</title>
	<?php
    include('../link.php');
    ?>
</head>

<body>
	<!-- Header -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						&times;
					</button>
					<h4 class="modal-title">SEARCH HERE</h4>
				</div>
				<div class="modal-body">
					<div class="input-group">
						<form method="get" class="searchform" action="/search" role="search">
							<input type="hidden" name="type" value="product" />
							<input type="text" name="q" class="form-control control-search" />
							<span class="input-group-btn">
								<button class="btn btn-default button_search" type="button">
									<i data-toggle="dropdown" class="ion-ios-search"></i>
								</button>
							</span>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="page-left-sidebar">
		<?php include('header.php') ?>
	</div>
	<div class="page-right-content">
		<div class="container">
		<div class="complete-page text-center">
				<h2 class="status"><span class="ion-checkmark-circled fa-4 icon-check"></span>Đặt hàng <span>thành công </span></h2>
				<h2> Kiểm tra đơn hàng của bạn trong email</h2>
				<a class="status" href="index.php">Tiếp tục mua hàng</a>
			</div>
			<?php include('footer.php') ?>
		</div>
	</div>

</body>

</html>