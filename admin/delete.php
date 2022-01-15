<link rel="stylesheet" type="text/css" href="../css/border.css" />
<?php
include('header.php');
if (!empty($_SESSION['UserName'])) {
        $error = false;
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            include('../connectmysql.php');
            $result = mysqli_query($conn, "DELETE FROM `kho` WHERE `id` = " . $_GET['id']);
            if (!$result) {
                $error = "Không thể hủy đơn hàng.";
            }
            mysqli_close($conn);
            if ($error !== false) {
                ?>
                <div class="yeucaudn red">
                    <h1>Thông báo</h1>
                    <h4><?= $error ?></h4>
                    <a href="./quanlisanpham.php">Danh sách sản phẩm</a>
                </div>
            <?php } else { ?>
                <div class="yeucaudn green">
                    <h1>Xóa sản phẩm thành công</h1>
                    <a href="./quanlisanpham.php">Danh sách sản phẩm</a>
                </div>
            <?php } ?>
        <?php }
    }
    include('footer.php');
     ?>