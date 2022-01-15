<link rel="stylesheet" type="text/css" href="../css/border.css" />
<?php
include('header.php');
if (!empty($_SESSION['UserName'])) {
        $error = false;
        if (isset($_GET['mahang']) && !empty($_GET['mahang'])) {
            include('../connectmysql.php');
            $result = mysqli_query($conn, "DELETE FROM hangsx WHERE mahang =".$_GET['mahang']);
            if (!$result) {
                $error = "Không thể xóa hãng sản xuất.";
            }
            mysqli_close($conn);
            if ($error !== false) {
                ?>
                <div class="yeucaudn red">
                    <h1>Thông báo</h1>
                    <h4><?= $error ?></h4>
                    <a href="./quanlihang.php">Danh sách hãng</a>
                </div>
            <?php } else { ?>
                <div class="yeucaudn green">
                    <h1>Xóa thành công</h1>
                    <a href="./quanlihang.php">Danh sách hãng</a>
                </div>
            <?php } ?>
        <?php }
    }
    include('footer.php');
     ?>