<?php
    include 'lib/session.php';
    session::init();
     include_once ("lib/database.php");
    include_once ("helpers/format.php");
    Spl_autoload_register(function ($className){ 
        include_once ("classes/".$className.".php");
    });
    $db=new database();
    $fm=new format();
    $ct=new cart();
    $cat=new category();
    $brand = new brand();
    $pro=new product();
    $city=new city();
    $user=new User();
    $bill=new bill();
?>
<?php 
$buyer= Session::get('customer_user');
 ?>
 <?php  

                if(isset($_GET['customer_user'])){
                    $destroyCart = $ct->Del_cart_by_Session();
                    Session::destroy();
                }

            ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SPORTS SHOP</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
        .dropdown .btn {
            font-size: 14px; /* Adjust the font size as needed */
        }
        .dropdown:hover>.dropdown-menu {
            display: block;
        }
        .dropdown>.dropdown-toggle:active {
            /*Without this, clicking will make it sticky*/
            pointer-events: none;   
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> contact@sportsshop.com</li>
                                <li>Miễn phí giao hàng cho hóa đơn từ 99$</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <?php 
                                    $check = Session::get('customer_login');
                                    if($check== false){
                            ?>
                                          
                                 <div class="header__top__right__social">
                                     <a href="register.php"><i ></i> Đăng ký</a>
                                 </div><?php 
                                  }
                             ?>             
                            <div class="header__top__right__auth">
    <?php
                                $check = Session::get('customer_login');
                                if ($check == false) {
                                    echo '<a href="login.php"><i class="fa fa-user"></i> Login</a>';
                                } else {
                                    $username = "";
                                    if (isset($_SESSION['customer_user'])) {
                                        $username = $_SESSION['customer_user'];
                                    }

                                    echo '
                                    <div class="dropdown">
                                        <button class="btn btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-user fa-lg"></i> Xin chào ' . $username . '
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="profile.php">Thông tin tài khoản</a>
                                            <a class="dropdown-item" href="logout.php">Đăng xuất</a>
                                        </div>
                                    </div>';
                                }
                                ?>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/1.png" alt="" ></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.php">Trang chủ</a></li>
                            <li><a href="./product.php">Sản phẩm</a></li>
                            
                            
                            <?php 
                                 $login = Session::get('customer_login');
                                 if($login == false){
                                   echo '';
                                  }else
                                  {
                                     echo  '<li><a href="./profile.php">Thông tin </a></li>';
                                     echo  '<li><a href="./bill.php">Đơn hàng</a></li>';
                                   }
                            ?>                         
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="cart.php"><i class="fa fa-shopping-bag"></i> <span>
                                <?php  
                                        $qtt = '0';
                                        $qtt=Session::get("qtt");
                                        echo $qtt;
                                ?></span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>
                            <?php  
                                        $a = '0';
                                        $a=Session::get('total');
                                        echo '$'.$fm->format_currency($a) ;
                            ?></span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>