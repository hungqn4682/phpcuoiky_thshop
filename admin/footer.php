<?php if (!empty($_SESSION['UserName'])) { ?>
    </div>
    </div>
    <footer>
        <div class="footer">

        </div>
    </footer>
<?php } else { ?>
    <!DOCTYPE html>
    <html lang="en" class="h-100">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="../css/border.css" />
        <title>Trang đăng nhập</title>
        <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
        <link href="./css/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    </head>

    </html>

    <body class="h-100">
        <div class="authincation h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-md-5">
                        <div class="form-input-content text-center error-page">
                            <h1 class="error-text  font-weight-bold">403</h1>
                            <h4><i class="fa fa-times-circle text-danger"></i> Forbidden Error!</h4>
                            <p>Bạn chưa đăng nhập</p>
                            <div>
                                <a class="btn btn-primary" href=./index.php>Back to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    
                    <?php } ?>
                    <script src="./vendor/global/global.min.js"></script>
                    <script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
                    <script src="./js/custom.min.js"></script>
                    <script src="./js/deznav-init.js"></script>

                    <!-- Datatable -->
                    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
                    <script src="./js/plugins-init/datatables.init.js"></script>
    </body>

    </html>