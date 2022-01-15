<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/muahang1.css" />
    <style>
        form{
            padding-top: 50px;
        }
        .yeucaudn {
  			border: 1px solid black;
  			outline: #4CAF50 solid 10px;
  			margin: auto;  
  			padding: 20px;
  			text-align: center;
		}
        input{
				border-radius: 5px;
				line-height: 1.5;
				padding:3px 0px px 0px;
			}
			select{
				border-radius: 5px;
				line-height: 2.0;
			};
    </style>
</head>
<body>
<?php include('indextrangchu.php');
?>
<div class="yeucaudn green">
			<h1>Mua hàng thành công</h1>
			<a href=./trangchu.php>Quay lại</a>
		</div>
</body>
</html>

