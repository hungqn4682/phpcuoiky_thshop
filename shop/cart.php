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
	<?php include('searchbox.php') ?>
	<div class="page-left-sidebar">
		<?php include('header.php') ?>
	</div>
	<div class="page-right-content">
		<?php
		include '../connectmysql.php';
		if (!isset($_SESSION["cart"])) {
			$_SESSION["cart"] = array();
		}
		$error = false;
		$success = false;
		if (isset($_GET['action'])) {

			function update_cart($add = false)
			{
				foreach ($_POST['quantity'] as $id => $quantity) {
					if ($quantity == 0) {
						unset($_SESSION["cart"][$id]);
					} else {
						if ($add) {
							$_SESSION["cart"][$id] += $quantity;
						} else {
							$_SESSION["cart"][$id] = $quantity;
						}
					}
				}
			}
			switch ($_GET['action']) {
				case "add":
					update_cart(true);
					header('Location: ./cart.php');
					break;
				case "delete":
					if (isset($_GET['id'])) {
						unset($_SESSION["cart"][$_GET['id']]);
					}
					header('Location: ./cart.php');
					break;
				case "submit":
					if (isset($_POST['update_click'])) { //Cập nhật số lượng sản phẩm
						update_cart();
						header('Location: ./cart.php');
					} elseif ($_POST['order_click']) { //Đặt hàng sản phẩm
						if (empty($_POST['name'])) {
							$error = "Bạn chưa nhập tên ";
						} elseif (empty($_POST['phone'])) {
							$error = "Bạn chưa nhập số điện thoại";
						} elseif (empty($_POST['email'])) {
							$error = "Bạn chưa nhập email";
						} elseif (empty($_POST['address'])) {
							$error = "Bạn chưa nhập địa chỉ";
						} elseif (empty($_POST['quantity'])) {
							$error = "Giỏ hàng rỗng";
						}
						if ($error == false && !empty($_POST['quantity'])) { //Xử lý lưu giỏ hàng vào db
							$products = mysqli_query($conn, "SELECT * FROM `kho` WHERE `id` IN (" . implode(",", array_keys($_POST['quantity'])) . ")");
							$total = 0;
							$discount = 0;
							$totaldetail = 0;
							$discountdetail = 0;
							$orderProducts = array();
							while ($row = mysqli_fetch_array($products)) {
								$orderProducts[] = $row;
								$discount += $row['giamgia'] * $_SESSION["cart"][$row['id']];
								$total += $row['gia'] * $_POST['quantity'][$row['id']] - $discount;
							}
							$insertOrder = mysqli_query($conn, "INSERT INTO `order` (`id`, `name`, `phone`, `address`, `email`, `note`, `total`, `created_time`, `last_updated`) VALUES (NULL, '" . $_POST['name'] . "', '" . $_POST['phone'] . "', '" . $_POST['address'] . "', '" . $_POST['email'] . "', '" . $_POST['note'] . "', '" . $total . "', '" . time() . "', '" . time() . "');");
							$orderID = $conn->insert_id;
							$insertString = "";
							foreach ($orderProducts as $key => $product) {
								$discountdetail = $product['giamgia'] * $_SESSION["cart"][$product['id']];
								$totaldetail = $product['gia'] * $_POST['quantity'][$product['id']] - $discountdetail;
								$insertString .= "(NULL, '" . $orderID . "', '" . $product['id'] . "', '" . $_POST['quantity'][$product['id']] . "', '" . $totaldetail . "', '" . time() . "', '" . time() . "')";
								if ($key != count($orderProducts) - 1) {
									$insertString .= ",";
								}
							}
							$insertOrder = mysqli_query($conn, "INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_time`, `last_updated`) VALUES " . $insertString . ";");
							$success = "Đặt hàng thành công";
							unset($_SESSION['cart']);
							header('Location: ./thanhtoanthanhcong.php');
						}
					}
					break;
			}
		}
		if (!empty($_SESSION["cart"])) {
			$products = mysqli_query($conn, "SELECT * FROM `kho` WHERE `id` IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
		}
		?>
		<div class="container">
			<div class="heading-sub">
				<h3 class="pull-left">shop cart</h3>
				<ul class="other-link-sub pull-right">
					<li><a href="#home">Home</a></li>
					<li><a href="#shop">Shop</a></li>
					<li><a class="active" href="#cart">Cart</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<?php if (!empty($error)) { ?>
				<div id="notify-msg">
					<?= $error ?>. <a href="javascript:history.back()">Quay lại</a>
				</div>
			<?php } elseif (!empty($success)) { ?>
				<div id="notify-msg">
					<?= $success ?>. <a href="index.php">Tiếp tục mua hàng</a>
				</div>
			<?php } elseif (!empty($products)) { ?>
				<form id="cart-form" action="cart.php?action=submit" method="POST" class="checkout-cart-form">
					<div class="row">
						<div class="col-md-8 col-sm-12">
							<table class="table shop_table">
								<thead>
									<tr>
										<th class="product-thumbnail">IMAGE</th>
										<th class="product-name">Tên sản phẩm</th>
										<th class="quantity">Số lương</th>
										<th class="product-subtotal">Giá</th>
										<th class="product-subtotal"></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$total = 0;
									$totalsp = 0;
									$discount = 0;
									$num = 1;
									while ($row = mysqli_fetch_array($products)) {
									?>
										<tr class="cart_item">
											<td class="product-thumbnail"><img src="../<?= $row['anh'] ?>"  alt="images" class="img-responsive" width="100px" height="75px"/></td>
											<td class="product-name">
												<span><?= $row['tensp'] ?></span>
											</td>

											<td class="product-quantity">
												<div class="quantity">
													<input type="number" min="1" max="100" value="<?= $_SESSION["cart"][$row['id']] ?>" name="quantity[<?= $row['id'] ?>]" />
												</div>
											</td>
											<td class="product-price">
												<h4 class="product-price">Giá:<?= number_format($row['gia'], 0, ",", ".") ?>đ</h4>
											</td>
											<td class="product-name">
												<a href="cart.php?action=delete&id=<?= $row['id'] ?>">
													<p class="product-remove">
														<i class="fa fa-trash" aria-hidden="true"></i>
														<span class="remove">Xóa</span>
													</p>
												</a>
											</td>
										</tr>
									<?php
										$totalsp += $row['gia'] * $_SESSION["cart"][$row['id']];
										$discount += $row['giamgia'] * $_SESSION["cart"][$row['id']];
										$total += $row['gia'] * $_SESSION["cart"][$row['id']] - ($row['giamgia'] * $_SESSION["cart"][$row['id']]);
										$num++;
									}
									?>
								</tbody>
							</table>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="aside-shopping-cart-total">
								<h2>CART TOTALS</h2>
								<ul>
									<li><span class="text">Tạm tính:</span><span class="cart-number"><?= number_format($totalsp, 0, ",", ".") ?>Đ</span></li>
									<li><span class="text">Giảm giá:</span> <span class="cart-number"><?= number_format($discount, 0, ",", ".") ?>Đ</span></span>
									</li>
									<li><span class="text calculate">Calculate</span>
									</li>
									<li><span class="text">Tổng tiền:</span><span class="cart-number big-total-number"><?= number_format($total, 0, ",", ".") ?>Đ</span></li>
								</ul>
								<div class="process" id="form-button">
									<button type="submit" class="btn-checkout" name="update_click">Cập nhật giỏ hàng</button>
								</div>
							</div>
						</div>
					</div>
					<div class="billing-details">
						<div class="billing-details-heading">
							<h2 class="billing-title">Billing Details</h2>
						</div>
						<div class="contact-form">
							<div class="form-group">
								<div class="row">
									<div class="col-md-6 col-sm-12"><label>Họ và Tên: </label><input class="form-control" type="text" value="" name="name" placeholder="Nhập họ và tên" /></div>
									<div class="col-md-6 col-sm-12"><label>Điện thoại: </label><input type="tel" class="form-control" pattern="0[0-9]*.[0-9]{6}" value="" name="phone" placeholder="Nhập số điện thoại" /></div>
								
									<div class="col-md-6 col-sm-12"><label>Email: </label><input type="email" class="form-control" value="" name="email" placeholder="Nhập email (đơn hàng sẽ gửi vào email)" /></div>
									<div class="col-md-6 col-sm-12"><label>Địa chỉ nhận: </label><input class="form-control" type="text" value="" name="address" placeholder="Nhập địa chỉ " /></div>
								
								<div class="col-md-12"> <label>Yêu cầu khác: </label><textarea name="note" id="message" tabindex="2" placeholder="Nhập yêu cầu (Không bắt buộc)" class="form-control"></textarea></div>
								</div>
							</div>
							<div class="row">
							<input type="submit" name="order_click" class="btn-update-cart" value="Đặt hàng" />
							<div>
						</div>
					</div>
				</form>
			<?php

			} else { ?>
				<div class="text-center">
					<p>Không có sản phẩn nào trong giỏ hàng của bạn</p>
				</div>
			<?php
			}

			?>
		</div>
	</div>
</body>

</html>