<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="app/css/bootstrap.min.css" rel="stylesheet">
    <link href="app/css/font-awesome.min.css" rel="stylesheet">
    <link href="app/css/prettyPhoto.css" rel="stylesheet">
    <link href="app/css/price-range.css" rel="stylesheet">
    <link href="app/css/animate.css" rel="stylesheet">
    <link href="app/css/main.css" rel="stylesheet">
    <link href="app/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header-middle" style="background: linear-gradient(-10deg, #314755, #26a0da);"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-xs-1 col-xs-offset-5" style="padding-right: 0 !important;padding-left: 0 !important;" >
                    <div class="logo pull-left">
                        <img src="app/images/home/zaincash.ico" alt="" />
                    </div>
                </div>
                <div style="padding: 0px !important;" class="col-sm-6 col-xs-6">
                    <div class="navbar-header">
                        <button  type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.html" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="shop.html">Products</a></li>
                                    <li><a href="product-details.html">Product Details</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="login.html">Login</a></li>
                                </ul>
                            </li>

                            <li><a href="404.html">404</a></li>
                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

</header><!--/header-->

<section>
    <div class="container">

        @yield('content')

    </div>
</section>
<br><br>
<footer style=" background: linear-gradient(-10deg, #667db6, #0082c8,#0082c8,#667db6);" id="footer"><!--Footer-->

    <div class="footer-bottom" style=" background: linear-gradient(-10deg, #667db6, #0082c8,#0082c8,#667db6);">
                <p class="copyright pull-left" style="color: white">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    <a style="color: white" href="https://www.zaincash.iq/">Zaincash</a> iraqi wallet
                </p>
        <br>
    </div>

</footer><!--/Footer-->



<script src="app/js/jquery.js"></script>
<script src="app/js/bootstrap.min.js"></script>
<script src="app/js/jquery.scrollUp.min.js"></script>
<script src="app/js/price-range.js"></script>
<script src="app/js/jquery.prettyPhoto.js"></script>
<script src="app/js/main.js"></script>
</body>
</html>