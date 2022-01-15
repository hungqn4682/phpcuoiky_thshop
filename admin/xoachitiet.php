<link rel="stylesheet" type="text/css" href="../css/border.css" />
<?php
include('header.php');
if (!empty($_SESSION['UserName'])) {
        $error = false;
        if (isset($_GET['mats']) && !empty($_GET['mats'])) {
            include('../connectmysql.php');
            $result = mysqli_query($conn, "DELETE FROM chitiet WHERE `mats` = ".$_GET['mats']);
            if (!$result) {
                $error = "Không thể xóa thông số.";
            }
            mysqli_close($conn);
            if ($error !== false) {
                ?>
                <div class="yeucaudn red text-center">
                    <h1>Thông báo</h1>
                    <h4><?= $error ?></h4>
                    <a href="./quanlithongso.php">Danh sách thông số</a>
                </div>
            <?php } else { ?>
                <div class="yeucaudn green text-center">
                    <h1>Xóa sản công</h1>
                    <a href="./quanlithongso.php">Danh sách thông số</a>
                </div>
            <?php } ?>
        <?php }
    }
    include('footer.php');
     ?>