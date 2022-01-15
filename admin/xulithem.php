<?php
include('header.php');
if (!empty($_SESSION['UserName'])) {
	if (isset($_GET['dangky'])) {
		$tensp = $_GET['tensp'];
		$gia = $_GET['gia'];
		$giamgia = $_GET['giamgia'];
		$anh = $_GET['anh'];
		$soluong = $_GET['soluong'];
		$hangsx = $_GET['hangsx'];
		$loaisp = $_GET['loaisp'];

		//kiểm tra đã nhập đầy đủ thông tin hay chưa
		if ($tensp == "" || $gia == "" || $giamgia == "" || $anh == "" || $soluong == "" || $loaisp == "" || $hangsx == "") {
?>
		
			<div class="content-body">
				<div class="container-fluid">

						<div class="row justify-content-center h-100 align-items-center">
							<div class="col-md-5">
								<div class="form-input-content text-center error-page">
									<h3 class="font-weight-bold">vui lòng nhập đầy đủ thông tin</h3>
									<div>
										<a class="btn btn-primary" href="insert.php">Back to Home</a>
									</div>
								</div>
							</div>
						</div>

				</div>
			</div>
		<?php
		} else {
			include('../connectmysql.php');
			$add = "insert into kho (tensp,gia,giamgia,anh,soluong,maloai,mahang,thoigiantao)
		values ('" . $tensp . "', " . $gia . "," . $giamgia . ",'image/" . $anh . "'," . $soluong . ",'" . $loaisp . "','" . $hangsx . "'," . time() . ");";
			$addd = "insert into chitiet (tensp)
		values ('" . $tensp . "');";
			mysqli_query($conn, $add);
			mysqli_query($conn, $addd);
		?>
			<div class="content-body">
				<div class="container-fluid">

						<div class="row justify-content-center h-100 align-items-center">
							<div class="col-md-5">
								<div class="form-input-content text-center error-page">
									<h3 class="  font-weight-bold">THÊM SẢN PHẨM THÀNH CÔNG</h3>
									<div>
										<a class="btn btn-primary" href="quanlisanpham.php">Back to Home</a>
									</div>
								</div>
							</div>
						</div>

				</div>
			</div>
			
<?php
		}
	}
}
include('footer.php');
?>