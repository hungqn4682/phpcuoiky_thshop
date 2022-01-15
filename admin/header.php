<?php session_start();
if (!empty($_SESSION['UserName'])) {
?>
  <!DOCTYPE html>
  <html lang="vi">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Datatable -->
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <title>Quản lí</title>
  </head>

  <body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
      <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
      </div>
    </div>


    <div id="main-wrapper">
      <div class="nav-header">
        <a href="../index/index.php" class="brand-logo">
          <img class="logo-abbr" src="./images/logo.png" alt="">
          <img class="logo-compact" src="./images/logo-text.png" alt="">
          <img class="brand-title" src="./images/logo-text.png" alt="">
        </a>

        <div class="nav-control">
          <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
          </div>
        </div>
      </div>
      <!--**********************************
            Header start
        ***********************************-->
      <div class="header">
        <div class="header-content">
          <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
              <div class="header-left">
                <div class="dashboard_bar">
                  <div class="input-group search-area d-lg-inline-flex d-none">
                    <input type="text" class="form-control" placeholder="Search here...">
                    <div class="input-group-append">
                      <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                    </div>
                  </div>
                </div>
              </div>
              <ul class="navbar-nav header-right">
                <li class="nav-item dropdown header-profile">
                  <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                    <!-- <div class="header-info">
										<span class="text-black">Hello,<strong>Franklin</strong></span>
										<p class="fs-12 mb-0">Super Admin</p>
									</div> -->
                    <span class="ml-2"><?php echo 'TÀI KHOẢN:' . $_SESSION['UserName']; ?></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a href="./app-profile.html" class="dropdown-item ai-icon">
                      <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                      </svg>
                      <span class="ml-2">Profile </span>
                    </a>

                    <a href="logout.php" class="dropdown-item ai-icon">
                      <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                      </svg>
                      <span class="ml-2">Logout</span>
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <div class="deznav">
        <div class="deznav-scroll">
          <ul class="metismenu" id="menu">
            <li>
              <a class="ai-icon" href="quanlidanhmuc.php">
                <i class="flaticon-381-networking"></i>
                <span class="nav-text">QUẢN LÝ DANH MỤC</span>
              </a>
            </li>

            <li>
              <a class="ai-icon" href="quanlihang.php">
                <i class="flaticon-381-internet"></i>
                <span class="nav-text">QUẢN LÝ HÃNG</span>
              </a>
            </li>
            <li>
              <a class="ai-icon" href="quanlisanpham.php">
                <i class="flaticon-381-television"></i>
                <span class="nav-text">QUẢN LÝ KHO</span>
              </a>
            </li>
            <li>
              <a class="ai-icon" href="quanlidonhang.php">
                <i class="flaticon-381-notepad"></i>
                <span class="nav-text">QUẢN LÝ ĐƠN HÀNG</span>
              </a>
            </li>
            <li>
              <a class="ai-icon" href="quanlichitiet.php">
                <i class="flaticon-381-controls-3"></i>
                <span class="nav-text">QUẢN LÝ CHI TIẾT</span>
              </a>
            </li>

          </ul>

          <div class="copyright">
            <p><strong>Welly Hospital Admin Dashboard</strong> © 2020 All Rights Reserved</p>
            <p>by DexignZone</p>
          </div>
        </div>
      </div>


    <?php } ?>