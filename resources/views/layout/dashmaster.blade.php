<!doctype html>
<html lang="en">
<head>
    <title>ScopeSky Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png"/>
    <link rel="icon" type="image/png" href="/assets/img/favicon.png"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>ScopeSky</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <!-- Bootstrap core CSS     -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet"/>
    <!--  Material Dashboard CSS    -->
    <link href="/assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, dont include it in your project     -->
    <link href="/assets/css/demo.css" rel="stylesheet"/>
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>
<body class="fuelux">

<div id="app" class="wrapper">
    <div class="sidebar" data-active-color="rose" data-background-color="black"
         data-image="/assets/img/sidebar-1.jpg">

        <div class="logo">
            <a href="#" class="simple-text logo-mini">

            </a>
            <a href="/" class="simple-text logo-normal">
                ScopeSky
            </a>
        </div>

        <!--////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="@yield('dashboard')">
                    <a href="/dashboard">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="@yield('orders')">
                    <a href="/dashboard/orders">
                        <i class="material-icons">shopping_cart</i>
                        <p>Orders
                        </p>
                    </a>
                </li>
                @if(Auth::user()->is_admin == 1)
                    <li class="@yield('cards')">
                        <a href="/dashboard/cards">
                            <i class="material-icons">credit_card</i>
                            <p>FTTH Cards
                            </p>
                        </a>

                    </li>
                    <li class="@yield('wireless')">
                        <a href="/dashboard/value">
                            <i class="material-icons">attach_money</i>
                            <p>Wireless Values
                            </p>
                        </a>

                    </li>

                    <li class="@yield('companies')">
                        <a href="/dashboard/companies">
                            <i class="material-icons">store_mall_directory</i>
                            <p>Companies
                            </p>
                        </a>

                    </li>

                    <li class="@yield('ftth')">
                        <a href="/dashboard/ftth">
                            <i class="material-icons">settings_input_hdmi</i>
                            <p> Resellers
                            </p>
                        </a>
                    </li>

                    <li class="@yield('faq')">
                        <a href="/dashboard/faq/index">
                            <i class="material-icons">error_outline</i>
                            <p> FAQ
                            </p>
                        </a>
                    </li>

                    <li class="@yield('banner')">
                        <a href="/dashboard/banners">
                            <i class="material-icons">mode_comment</i>
                            <p> Banner
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>

    <br>
    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                        <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                        <i class="material-icons visible-on-sidebar-mini">view_list</i>
                    </button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"> Dashboard </a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">person</i>
                                <!--<span class="notification">5</span>-->
                                <p class="hidden-lg hidden-md">
                                    Notifications
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                @if(Auth::user()->is_admin == 1)
                                    <li>
                                        <a href="/dashboard/admins">Show Admins</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="/dashboard/logout">Logout</a>
                                </li>
                            </ul>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>

                </div>
            </div>
        </nav>
        <br><br>
        @yield('content')
    </div>

</div>

</body>
<script src="https://unpkg.com/vue@2.4.2"></script>
@yield('js')
<script src="/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/js/material.min.js" type="text/javascript"></script>
<script src="/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Library for adding dinamically elements -->
<script src="/assets/js/arrive.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="/assets/js/jquery.validate.min.js"></script>
<!-- Promise Library for SweetAlert2 working on IE -->
<script src="/assets/js/es6-promise-auto.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="/assets/js/moment.min.js"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="/assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="/assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="/assets/js/bootstrap-notify.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="/assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="/assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="/assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
{{--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>--}}
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="/assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="/assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="/assets/js/sweetalert2.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="/assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="/assets/js/fullcalendar.min.js"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="/assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="/assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="/assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        md.initSliders()
        demo.initFormExtendedDatetimepickers();
    });
</script>
<script type="text/javascript">
    $().ready(function () {
        demo.checkFullPageBackgroundImage();

        setTimeout(function () {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

</html>
