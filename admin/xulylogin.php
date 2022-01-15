<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Trang đăng nhập</title>
	<link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
	<link href="./css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
</html>
<body class="h-100">
	<div class="authincation h-100">
		<div class="container h-100">
			<div class="row justify-content-center h-100 align-items-center">
				<div class="col-md-5">
					<?php
					if (isset($_POST['submit'])) {
						$username = $_POST['username'];
						$password = $_POST['password'];
						include('../connectmysql.php');
						$chon = "select UserName,PassWord from nhanvien where UserName='" . $username . "'";
						$result = mysqli_query($conn, $chon);
						//kiểm tra đã nhập đầy đủ thông tin hay chưa
						if (!$username || !$password) {
					?>

							<div class="form-input-content text-center error-page">
								<h1 class="error-text font-weight-bold">400</h1>
								<h4><i class="fa fa-thumbs-down text-danger"></i> Bad Request</h4>
								<p>Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu</p>
								<div>
									<a class="btn btn-primary" href=./index.php>Back to Home</a>
								</div>
							</div>
						<?php
							exit;
						}
						//kiểm tra tên đăng nhập có tồn tại hay không
						if (mysqli_num_rows($result) == 0) {
						?>
							<div class="form-input-content text-center error-page">
								<h1 class="error-text font-weight-bold">400</h1>
								<h4><i class="fa fa-thumbs-down text-danger"></i> Bad Request</h4>
								<p>Tên đăng nhập không tồn tại</p>
								<div>
									<a class="btn btn-primary" href=./index.php>Back to Home</a>
								</div>
							</div>
						<?php
							exit;
						}
						//lấy mk trong database ra
						$row = mysqli_fetch_array($result);
						//so sánh 2 mật khẩu có trùng khớp hay không
						if ($password != $row['PassWord']) {
						?>
							<div class="form-input-content text-center error-page">
								<h1 class="error-text font-weight-bold">400</h1>
								<h4><i class="fa fa-thumbs-down text-danger"></i> Bad Request</h4>
								<p>Sai mật khẩu</p>
								<div>
									<a class="btn btn-primary" href=./index.php>Back to Home</a>
								</div>
							</div>

					<?php
							exit;
						}
						//lưu tên đăng nhập
						$_SESSION['UserName'] = $username;
						header('Location:quanlisanpham.php');
					} else {
						header('Location:index.php');
					}
					?>
				</div>
			</div>
		</div>
	</div>
</body>