@extends('layout.master')


@section('content')

    <div style="background: #fff" class="wrapper wrapper-full-page">
        <div style="background: #fff" class="full-page login-page" filter-color="black"
             data-image="../../assets/img/login.jpeg">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div style="background: #fff" class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 text-center">
                            <img align="middle" style="width: 200px;margin-bottom: 20px;margin-top: -100px;"
                                 src="/assets/img/scope.png" alt=""/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <div class="card card-login card-hidden">
                                <div class="card-content rtl">
                                    <h3 style="text-align: center;">{{ __('lang.p1_faq') }}</h3>
                                    <br><br>
                                    <p style="direction: {{$d}}" >{{$faq->text}}</p>
                                </div>
                                <div class="footer text-center">

                                    <button style="margin-top: -20px;"><a href="/"
                                                                          class="btn btn-rose btn-simple btn-wd btn-lg">Back
                                        </a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer style="background: #000" class="footer navbar-fixed-bottom">
                <div style="background: #000" class="container">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Zaincash
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    ScopeSky
                                </a>
                            </li>

                        </ul>
                    </nav>
                    <p class="copyright pull-left">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="https://www.zaincash.iq/">Zaincash</a> iraqi wallet
                    </p>
                </div>
            </footer>
        </div>
    </div>
    <!--   Core JS Files   -->

@endsection