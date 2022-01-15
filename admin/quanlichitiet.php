<?php
include('header.php');
if (!empty($_SESSION['UserName'])) {
    include('../connectmysql.php');
    $caulenh = "select * from chitiet";
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
                                            <th>Tên danh mục</th>
                                            <th>Mô tả</th>
                                            <th>Nhận xét</th>
                                            <th>Quản lí</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?= $row['mats'] ?></td>
                                                <td><?= $row['tensp'] ?></td>
                                                <td><?= $row['mota'] ?></td>
                                                <td><?= $row['nhanxet'] ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="./capnhatchitiet.php?mats=<?= $row['mats'] ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                        <a href="./xoachitiet.php?mats=<?= $row['mats'] ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        </div>
    </div>

    <?php include('./footer.php'); ?>