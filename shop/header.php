<div class="navbar-wrapper js-navbar-wrapper">
	<div class="navbar-control js-navbar-control">
		<div class="navbar-header">
			<a href="index.php"><img src="../image/logo1.png" alt="images" class="img-responsive"/></a>
		</div>
		<div class="navbar-button js-navbar-button">
            <div class="bars js-bars">
              <a>
                <i class="ion-android-menu icon-mobile"></i>
              </a>
            </div>
          </div>
		<div class="navbar-meta js-navbar-meta">
			<div class="search-ver6 dropdown" data-toggle="modal" data-target="#myModal">
				<i class="ion-ios-search"></i>
			</div>
			<div class="cart v6 js-cart">
				<a href='cart.php'>
					<div class="photo">
						<img src="../image/cart.png" alt="images" class="img-reponsive">
						<span class="lbl v6">0</span>
					</div>
				</a>
			</div>
		</div>
	</div>

	<div class="navbar__content">
		<div id="bars" class="navbar__container js-container">
			<div class="navbar__wrap">
			<ul class="level">
				<?php
				include('../connectmysql.php');
				$lenh = "select * from loaisp";
				$result0 = mysqli_query($conn, $lenh);
				while ($row = mysqli_fetch_array($result0)) { ?>
						<li><a href="loaisanpham.php?maloai=<?= $row['maloai'] ?>"><b><?= $row['loai'] ?></b></a></li>
					
				<?php
				}
				?>
					<li><a  href="../admin/" title="ADMIN"><b>Đăng Nhập</b></a></li>				

				</ul>
			</div>
		</div>
	</div>
</div>