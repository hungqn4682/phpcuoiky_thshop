<?php include('header.php');
if (!empty($_SESSION['UserName'])) {
  if (isset($_GET['themdm'])) {
    $error = false;
    $tendm = $_GET['tendm'];
    include('../connectmysql.php');
    $add = "insert into loaisp (loai) values ('" . $tendm . "');";
    $result = mysqli_query($conn, $add);
    $message = "Thêm thành công";
    //kiểm tra đã nhập đầy đủ thông tin hay chưa
    if ($tendm == "") {
    ?>
      $error = "vui lòng nhập đầy đủ thông tin";
    <?php
    } 
  }
?>
  <div class="container">
    <div class="content-body">
      <div class="container-fluid">
        <div class="page-titles">
          <h4 class="text-center">THÊM SẢN PHẨM VÀO KHO</h4>
        </div>

        <div class="row">
          <div class="col-xl-12 col-lg-12">
            <div class="card">
              <div class="card-header text-center">
                <legend><a href="#"><i class="glyphicon glyphicon-globe"></i></a> Nhập đầy đủ thông tin!</legend>
              </div>

              <form action="#" method="GET" class="form" role="form">
              <div class="form-group">
                <label for="" class="control-label m-3 primary"> <?php if(isset($message)) { echo $message; } else {$error;}?></label>
                  </div>
                <div class="form-group">
                  <input class="form-control" name="tendm" placeholder="Tên danh mục" type="text">
                </div>
                <div class="row justify-content-center">
                  <button id="button" type="submit" name="themdm" class="btn btn-primary btn-lg col-xl-4 col-lg-4 m-2">THÊM</button>
                  <a href="quanlisanpham.php" class="btn btn-outline-primary btn-lg col-xl-4 col-lg-4 m-2">quay lại</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
}

include('footer.php'); ?>