<?php
include('header.php');
if (!empty($_SESSION['UserName'])) {
    include('../connectmysql.php');
    $caulenh = "SELECT  k.tensp,o.name,o.phone,o.address,o.email,o.note,od.quantity,od.price,od.created_time,od.last_updated,od.id FROM `order` as o,order_detail as od ,kho as k WHERE o.id=od.order_id and k.id=od.product_id";
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
                                
                                <table id="example3" class="display min-w850">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm mua</th>
                                            <th>Tên khách hàng</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Email</th>
                                            <th>Ghi chú</th>
                                            <th>Số lượng mua</th>
                                            <th>Tổng tiền</th>
                                            <th>Ngày mua</th>
                                            <th>Ngày cập nhật</th>
                                            <th>Hủy đơn </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $num = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?= $num++; ?></td>
                                                <td><?= $row['tensp'] ?></td>
                                                <td><?= $row['name'] ?></td>
                                                <td><?= $row['phone'] ?></td>
                                                <td><?= $row['address'] ?></td>
                                                <td><?= $row['email'] ?></td>
                                                <td><?= $row['note'] ?></td>
                                                <td><?= $row['quantity'] ?></td>
                                                <td><?= number_format($row['price'], 0, ",", ".") . 'đ'; ?></td>
                                                <td><?= date('d/m/Y H:i', $row['created_time']) ?></td>
                                                <td><?= date('d/m/Y H:i', $row['last_updated']) ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="./huydonhang.php?id=<?= $row['id'] ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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