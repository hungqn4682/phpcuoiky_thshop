<link rel="stylesheet" type="text/css" href="../css/border.css" />
<?php
include('header.php');
if (!empty($_SESSION['UserName'])) {
        $error = false;
        if (isset($_GET['maloai']) && !empty($_GET['maloai'])) {
            include('../connectmysql.php');
            $result = mysqli_query($conn, "DELETE FROM loaisp WHERE maloai =".$_GET['maloai']);
            if (!$result) {
                $error = "Không thể xóa danh mục.";
            }
            mysqli_close($conn);
            if ($error !== false) {
                ?>
                <div class="yeucaudn red">
                    <h1>Thông báo</h1>
                    <h4><?= $error ?></h4>
                    <a href="./quanlidanhmuc.php">Danh sách danh mục</a>
                </div>
            <?php } else { ?>
                <div class="yeucaudn green">
                    <h1>Xóa thành công</h1>
                    <a href="./quanlidanhmuc.php">Danh sách danh mục</a>
                </div>
            <?php } ?>
        <?php }
    }
    include('footer.php');
     ?>