<?php include('header.php');
if (!empty($_SESSION['UserName'])) {
?>

  <?php
  include('../connectmysql.php');
  $caulenh = "select * from kho where id=" . $_GET['id'];
  $result = mysqli_query($conn, $caulenh) or die("lỗi truy vấn");
  while ($row = mysqli_fetch_array($result)) {
    if (count($_POST) > 0) {
      mysqli_query($conn, "UPDATE kho 
  set gia='" . $_POST['gia'] . "', giamgia='" . $_POST['giamgia'] . "', soluong='" . $_POST['soluong'] . "' ,thoigiantao=".time()." 
  WHERE id='" . $_POST['id'] . "'");
      $message = "Record Modified Successfully";
      //kiểm tra đã nhập đầy đủ thông tin hay chưa

  }
	
  ?>
    <div class="container">
      <div class="content-body">
        <div class="container-fluid">
          <div class="page-titles">
            <h1 class="text-center">CẬP NHẬT SẢN PHẨM</h1>
          </div>
          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card">
                <div class="card-header text-center">
                  <legend><a href="#"><i class="glyphicon glyphicon-globe"></i></a> Nhập đầy đủ thông tin!
                  </legend>
                </div>
                <form action="" method="POST" class="form" role="form">
                <div class="form-group">
                <label for="" class="control-label m-3 primary"> <?php if(isset($message)) {echo $message;} ?></label>
                  </div>
                <div class="form-group">
                    <input class="form-control" name="id" placeholder="Tên sản phẩm" type="hidden" value="<?php echo $row['id']; ?>">
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="gia" placeholder="Giá" type="text" value="<?php echo $row['gia']; ?>">
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="giamgia" placeholder="Giảm giá" type="text" value="<?php echo $row['giamgia']; ?>">
                  </div>
                  
                  <div class="form-group">
                    <input class="form-control" name="soluong" placeholder="Số lượng" type="text" value="<?php echo $row['soluong']; ?>">
                  </div>
                  <div class="row justify-content-center">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary btn-lg col-xl-4 col-lg-4 m-2">CẬP NHẬT</button>
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
}
include('footer.php');
?>