<div class="col-md-15 col-sm-4 col-xs-6">
    <div class="product-item product-content">
        <div class="product-item-img-ver6">
            <a href='chitietsanpham.php?id=<?= $row['id'] ?>'>
                <img src='../<?= $row['anh'] ?>' alt="img" class="img-responsive">
            </a>
        </div>
        <div class="product-item-ds">
            <p class="product-title"><?= $row['tensp'] ?></p>
            <?php $x = $row['gia']; ?>
            <?php $y = $row['giamgia']; ?>
            <?php if ($y > 0) { ?>
                <div class="product-price"><?= number_format($x - $y, 0, ",", ".") ?>đ<div class="product-price">Giá gốc: <?= number_format($row['gia'], 0, ",", ".") ?>đ</div>
                </div>
                <div class="product-price">Giảm:<?= number_format($row['giamgia'], 0, ",", ".") ?>đ</div>
            <?php } else { ?>
                <div class="product-price"><?= number_format($row['gia'], 0, ",", ".") ?>đ</div>
            <?php
            }
            ?>
        </div>
    </div>
</div>