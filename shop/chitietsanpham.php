<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thông tin sản phẩm</title>
    <?php
    include('../link.php');
    ?>
</head>

<body>
    <!-- Header -->
    <?php include('searchbox.php') ?>
    <div class="page-left-sidebar">
        <?php include('header.php') ?>
    </div>
    <div class="page-right-content">
        <div class="container">
           
            <div class="heading-sub">
                <h3 class="pull-left">shop single</h3>
                <ul class="other-link-sub pull-right">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php">Shop</a></li>
                    <li><a class="active" href="#detail">Detail</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="widget-shop-single">
                <div class="row">
                    <div class="col-md-5">
                        <div class="shop-single-item-img">
                            <div class="main-img">
                                <?php
                                if (isset($_GET['id']) && !empty($_GET['id'])) {
                                    include('../connectmysql.php');
                                    $caulenh = "SELECT * from kho, chitiet where kho.tensp = chitiet.tensp and id=" . $_GET['id'];
                                    $result = mysqli_query($conn, $caulenh) or die("loi!!!");
                                    $row = mysqli_fetch_array($result)
                                ?>
                                    <div class="main-img-item">
                                        <img src='../<?= $row['anh'] ?>' width="400px" height="400px" alt="images" class="img-responsive" />
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="shop-sing-item-detail">
                            <form action="cart.php?action=add" method="POST">

                                <h3 style="color:DodgerBlue;"><?= $row['tensp'] ?></h3>

                                <?php
                                    $t = $row['soluong'];

                                    if ($t > 0) { ?>
                                    <div class="brandname">
                                        <p style="border:2px solid DodgerBlue;width: 165px;"><b>Tình trạng:còn hàng </b></p>
                                    </div>
                                <?php } else { ?>
                                    <p style="border:2px solid DodgerBlue;width: 198px;"><b>Tình trạng:tạm hết hàng </b></p>
                                <?php
                                    }
                                ?>

                                <div class="description">
                                    <div class="prod-price">
                                        <?php
                                        $x = $row['gia'];
                                        $y = $row['giamgia'];
                                        if ($y > 0) { ?>
                                            <span class="price old"><b style="color:rgb(60, 60, 60)">Giá niêm yết: <del><?= number_format($row['gia'], 0, ",", ".") ?>đ</del></b></span>
                                            <span class="price"><b style="color:rgb(255,0,0)"><?= number_format($x - $y, 0, ",", ".") ?>đ</b></span>
                                        <?php } else { ?>
                                            <span class="price"><b style="color:rgb(255,0,0)">Giá: <?= number_format($row['gia'], 0, ",", ".") ?>đ</b></span>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="group-button">

                                    <input type="number" value="1" id="quantity" name="quantity[<?= $row['id'] ?>]" min="1" max="100">

                                    <input type="submit" value="Mua sản phẩm" style="padding: 15px; margin-left: 10px; border-radius:5px;" class="btn btn-success" />

                                </div>
                            </form>

                        <?php
                                }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="product-detail-bottom">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#desc">Description</a>
                        </li>
                        <li><a data-toggle="tab" href="#review">Reviews</a></li>
                    </ul>
                    <div class="tab-content padding-lr">
                        <div id="desc" class="tab-pane fade in active">
                            <p>
                                <?= $row['mota'] ?>
                            </p>
                        </div>
                        <div id="review" class="tab-pane fade">
                             <p>
                                <?= $row['nhanxet'] ?>
                            </p>
                        </div>

                </div>
            </div>
            <div class="related-product-page">
                <div class="heading-shop">
                    <h3>Có thể bạn thích?</h3>
                </div>
                <div class="widget-product-related">
                    <div class="owl-carousel owl-theme js-owl-product">
                        <?php
                        include('../connectmysql.php');
                        $rd = "SELECT * FROM kho ORDER BY RAND ( ) LIMIT 4";
                        $rs = mysqli_query($conn, $rd);
                        while ($row = mysqli_fetch_array($rs)) { ?>
                            <div class="product-item">
                                <div class="product-item-img-related prod-item-img">
                                    <a href='chitietsanpham.php?id=<?= $row['id'] ?>'>
                                        <img src='../<?= $row['anh'] ?>' class="img-responsive" />
                                        <div class="product-item-info-related">
                                            <h3><?= $row['tensp'] ?></h3>
                                            <?php
                                            $x = $row['gia'];
                                            $y = $row['giamgia'];
                                            if ($y > 0) { ?>

                                                <p><span class="price old">Giá niêm yết: <del><?= number_format($row['gia'], 0, ",", ".") ?>đ</del></span></p>
                                                <span class='price black'>Giảm:<?= number_format($row['giamgia'], 0, ",", ".") ?>đ</span>
                                                <p><span class="price">Giảm còn:<?= number_format($x - $y, 0, ",", ".") ?>đ</span></p>
                                            <?php } else { ?>
                                                <span class="price">Giá:<?= number_format($row['gia'], 0, ",", ".") ?>đ</span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php')?>
    </div>
</body>

</html>
<?php
exit();
ob_end_flush();
?>