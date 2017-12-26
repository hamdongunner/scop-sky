@extends('layout.master')


@section('content')
    <div class="wrapper wrapper-full-page">
        <div class="full-page pricing-page" data-image="/assets/img/bg-pricing.jpeg">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 text-center">
                            <h2 class="title">Pick the best plan for you</h2>
                            <h5 class="description">You have Free Unlimited Updates and Premium Support on each package.</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-pricing card-plain">
                                <div class="card-content">
                                    <h6 class="category">Freelancer</h6>
                                    <div class="icon">
                                        <i class="material-icons">weekend</i>
                                    </div>
                                    <h3 class="card-title">FREE</h3>
                                    <p class="card-description">
                                        This is good if your company size is between 2 and 10 Persons.
                                    </p>
                                    <a href="#pablo" class="btn btn-white btn-round">Choose Plan</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-pricing card-raised">
                                <div class="card-content">
                                    <h6 class="category">Small Company</h6>
                                    <div class="icon icon-rose">
                                        <i class="material-icons">home</i>
                                    </div>
                                    <h3 class="card-title">$29</h3>
                                    <p class="card-description">
                                        This is good if your company size is between 2 and 10 Persons.
                                    </p>
                                    <a href="#pablo" class="btn btn-rose btn-round">Choose Plan</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-pricing card-plain">
                                <div class="card-content">
                                    <h6 class="category">Medium Company</h6>
                                    <div class="icon">
                                        <i class="material-icons">business</i>
                                    </div>
                                    <h3 class="card-title">$69</h3>
                                    <p class="card-description">
                                        This is good if your company size is between 11 and 99 Persons.
                                    </p>
                                    <a href="#pablo" class="btn btn-white btn-round">Choose Plan</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-pricing card-plain">
                                <div class="card-content">
                                    <h6 class="category">Enterprise</h6>
                                    <div class="icon">
                                        <i class="material-icons">account_balance</i>
                                    </div>
                                    <h3 class="card-title">$159</h3>
                                    <p class="card-description">
                                        This is good if your company size is 99+ persons.
                                    </p>
                                    <a href="#pablo" class="btn btn-white btn-round">Choose Plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                    </p>
                </div>
            </footer>
        </div>
    </div>


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
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
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
        $().ready(function() {
            demo.checkFullPageBackgroundImage();

            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
    </script>
@endsection