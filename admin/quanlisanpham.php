<?php include('header.php');
if (!empty($_SESSION['UserName'])) {
    //KẾT NỐI CSDL
    include('../connectmysql.php');
    //TÌM TỔNG SỐ RECORDS
    $result = mysqli_query($conn, 'select count(id) as total from kho');
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];
    //TÌM LIMIT VÀ CURRENT_PAGE
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;
    //TÍNH TOÁN TOTAL_PAGE VÀ START
    // tổng số trang
    $total_page = ceil($total_records / $limit);
    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }
    //tim start
    $start = ($current_page - 1) * $limit;
    //TRUY VẤN LẤY DANH SÁCH
    // Có limit và start rồi thì truy vấn CSDL lấy danh sách
    $result = mysqli_query($conn, "select * from kho LIMIT $start ,$limit");

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
                            <h4 class="card-title">Quản lí kho</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="insert.php" class="d-flex justify-content-start m-2 ">
                                    <input type="submit" name="them" value="Thêm sản phẩm" class="btn btn-primary">
                                </form>
                                <table id="example3" class="display min-w850">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Giảm giá</th>
                                            <th>Ảnh</th>
                                            <th>Số lượng</th>
                                            <th>Danh mục</th>
                                            <th>Hãng sản xuất</th>
                                            <th>Thời gian tạo</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stt = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?= $stt++; ?></td>
                                                <td><?= $row['tensp'] ?></td>
                                                <td><?php echo number_format($row['gia'], 0, ",", ".") . 'đ'; ?></td>
                                                <td><?php echo number_format($row['giamgia'], 0, ",", ".") . 'đ'; ?></td>
                                                <td><?php echo "<img src='../" . $row['anh'] . "' class='rounded-circle' width='35' alt=''/>"; ?></td>
                                                <td><?= $row['soluong'] ?></td>
                                                <td><?= $row['maloai'] ?></td>
                                                <td><?= $row['mahang'] ?></td>
                                                <td><?= date('d/m/Y H:i', $row['thoigiantao']) ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="./update.php?id=<?= $row['id'] ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                        <a href="./delete.php?id=<?= $row['id'] ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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