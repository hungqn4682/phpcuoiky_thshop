<?php include('header.php');
if (!empty($_SESSION['UserName'])) {
?>
 <?php
  include('../connectmysql.php');
  $caulenh = "select * from chitiet where mats=" . $_GET['mats'];
  $result = mysqli_query($conn, $caulenh) or die("lỗi truy vấn");
  while ($row = mysqli_fetch_array($result)) {
    if (count($_POST) > 0) {
      mysqli_query($conn, "UPDATE chitiet 
  set  mota='" . $_POST['mota'] . "', nhanxet='" . $_POST['nhanxet'] . "'
  WHERE mats='" . $_POST['mats'] . "'");
      $message = "Record Modified Successfully";
      //kiểm tra đã nhập đầy đủ thông tin hay chưa

  }
	
  ?>
    <div class="container">
      <div class="content-body">
        <div class="container-fluid">
          <div class="page-titles">
            <h1 class="text-center">Thêm chi tiết</h1>
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
                    <input class="form-control" name="mats"  type="hidden" value="<?php echo $row['mats']; ?>">
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="tensp" placeholder="Tên sản phẩm" type="text" value="<?php echo $row['tensp']; ?>">
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="mota" placeholder="Mô tả" type="text" value="<?php echo $row['mota']; ?>">
                  </div>
                  
                  <div class="form-group">
                    <input class="form-control" name="nhanxet" placeholder="Nhận xét type="text" value="<?php echo $row['nhanxet']; ?>">
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