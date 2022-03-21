<?php
include_once "lib/session.php";
include_once 'model/banner.php';
include_once 'model/db.php';
include_once 'model/users.php';
include_once 'model/products.php';
include_once 'model/order.php';
include_once "lib/format.php";
Session::init();
$db = new Database();
$user = new User;
$product = new Product;
$format = new Format;
$order = new Order;
$banner = new Banner;
?>
<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookstore</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="public/alertify/src/alertify.js"></script>
    <script type="text/javascript" src="public/script/script.js"></script>
    <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.core.css">
    <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.default.css">


    <!-- Bootstrap -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="public/css/owl.carousel.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="public/css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="header-area" style="background:#F8E0EC">
        <div class="container">
            <div class="row">


                <!--  Phần của banner -->
                <!-- 
                <?php
                $result = $banner->show();
                if ($result) {
                    while ($row = $result->fetch_assoc()) {

                        ?>
                
                <font style="font-family: Calibri; font-size: 30px"><marquee direction="left" style="background: <?php echo $row['bgcolor'] ?>; height: 50px; color: <?php echo $row['color'] ?>"><b>WWW.BOOKSTORE.COM</b> - " <?php echo $row['content'] ?>"</marquee></font>
                <?php
                    }
                }
                ?>
                  -->



                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li>
                                <?php

                                $login_check = session::get("user_login");
                                if ($login_check == false) { } else {
                                    echo ' <a href="?controller=account"><i class="fa fa-user"></i> <b>Hi ' . session::get("user_name") . '</b></a>';
                                }
                                ?>

                            </li>

                            <li><a href="?controller=cart"><i class="fa fa-user"></i> Giỏ hàng</a></li>
                            <li><a href="?controller=checkout"><i class="fa fa-user"></i> Thanh toán</a></li>
                            <?php
                            if (isset($_GET["user_id"])) {
                                echo '<script language="javascript">';

                                echo 'confirm("Bạn muốn đăng xuất?",function(e){';
                                echo       'if(e==true){' . session::destroy() . ';}';
                                echo '});';

                                echo '</script>';
                            }
                            ?>
                            <li>
                                <?php
                                $login_check = session::get("user_login");
                                if ($login_check == false) {
                                    echo '<a href="?controller=login"><i class="fa fa-user"></i> Đăng nhập</a>';
                                } else {
                                    echo '<a href="?user_id=' . session::get("user_id") . '"><i class="fa fa-user"></i> Đăng xuất</a>';
                                }
                                ?>

                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4" style="background: #F8E0EC">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">Tiền tệ :</span><span class="value">VND </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <!--<li><a href="#">USD</a></li>-->
                                    <li><a href="#">VND</a></li>

                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">Ngôn ngữ :</span><span class="value">Vietnamese </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <!--<li><a href="#">English</a></li>-->
                                    <li><a href="#">Vietnamese</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="../img/lgbt.png"></a></h1>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="?controller=cart">Giỏ Hàng - <span class="cart-amunt">0 VND</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="shopping-item-2" style="position: fixed;padding: 10px;border: 1px solid black;border-radius: 5px;right: 10px;z-index: 1000;bottom: 10px;background-color: white;cursor: pointer;display: none;" onclick="window.location.href='?controller=cart'">
        <i class="fa fa-shopping-cart" style="font-size: 30px;"></i>
        <span class="product-count">5</span>
    </div>