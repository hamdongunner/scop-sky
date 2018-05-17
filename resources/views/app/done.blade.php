@extends('layout.master')


@section('content')


    <div id="root">
        <br><br>
        <div class="container-fluid">
            <div style="margin-top: 0px;margin-bottom: 0px;" class=" navbar-fixed-top">
                <div style="margin-bottom: 0px;padding-right: 0px;padding-left: 0px;"
                     class="col-lg-12 col-md-12 col-sm-12">
                    <div style="background: linear-gradient(to right, #232526 , #303030);">
                        <div style="" class="row">
                            <div class="col-xs-1 col-xs-offset-1 col-md-1">
                                <br>
                                <a onclick="window.history.back();">
                                    <i style="font-size: 34px;color: #fff;padding-bottom: 10px;"
                                       class="material-icons">chevron_left</i>
                                </a>
                            </div>
                            <div class="col-xs-6 col-xs-push-1 col-md-6 text-center">
                                <img align="middle" style="width: 100px;margin-bottom: 0px;margin-top: 0px;"
                                     src="/assets/img/scope2.png" alt="ScopSky"/>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="row">

                <div class="col-md-8 col-md-offset-2">

                    <div class="card card-testimonial">
                        <br>
                        <h1>{{ __('lang.p5_done') }}</h1>
                        <div class="container-fluid">
                            <h4>{{ __('lang.p5_request') }}</h4>
                            <h4>{{ __('lang.p5_team') }}</h4>
                        </div>
                        <br>
                        <div class="footer">
                            <button style="margin-bottom: 40px;" class="btn btn-linkedin">{{ __('lang.p5_button') }}</button>
                            <br>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br><br>
        <br>
        <footer class="footer navbar-fixed-bottom">
            <div class="container">
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
                    <a href="https://www.zaincash.iq/">Zaincash</a> iraqi wallet
                </p>
            </div>
        </footer>
    </div>

@endsection

@section('js')
    <script src="/vue/main.js"></script>
@endsection
