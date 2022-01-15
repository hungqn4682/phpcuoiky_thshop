<?php
include('header.php');
if (!empty($_SESSION['UserName'])) {
  include('../connectmysql.php');
  $caulenh = "select * from loaisp";
  $result = mysqli_query($conn, $caulenh) or die("lỗi truy vấn");
?>

  <div class="content-body">
    <div class="container-fluid">
      <div class="page-titles">
        <h4>Datatable</h4>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
          <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
        </ol>
      </div>
      <!--HIỂN THỊ DANH SÁCH SẢN PHẨM -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Profile Datatable</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <form action="themdanhmuc.php" class="d-flex justify-content-start m-2 ">
                  <input type="submit" name="them" value="Thêm sản phẩm" class="btn btn-primary">
                </form>
                <table id="example3" class="display min-w850">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên danh mục</th>
                      <th>Quản lí</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $stt = 1;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                      <tr>
                        <td><?= $stt++; ?></td>
                        <td><?= $row['loai'] ?></td>

                        <td>
                          <div class="d-flex">

                            <a href="./xoadm.php?maloai=<?= $row['maloai'] ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                    <?php }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php
  } ?>
    </div>
  </div>



  <?php include('./footer.php'); ?>