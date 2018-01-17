@extends('layout.master')


@section('content')
    <div class="wrapper wrapper-full-page" style="background: #000;">

        <div class="full-page pricing-page" >
            <div class="content" style="background: #fff;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 text-center">
                            <img align="middle" style="width: 300px;margin-bottom: -90px;margin-top: 40px;" src="/assets/img/scope.png" alt=""/>
                            <h3 style="color: #000;margin-bottom: -50px;" class="title">{{ __('lang.p1_choose_net') }}</h3>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <div class="card card-pricing card-plain">
                                <div class="card-content">
                                    <h4 style="color: #000;">{{ __('lang.p1_wireless') }}</h4>
                                    <div class="icon">
                                        <i style="color: #000;border: 1px solid #000;margin-bottom: -30px;line-height: 105px;font-size: 50px;width: 100px;height: 100px;" class="material-icons">network_wifi</i>
                                    </div>
                                    <h3 class="card-title"></h3>
                                    <a  href="/wireless" class="btn btn-rose btn-round">{{ __('lang.p1_choose_button') }}</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-6">
                            <div class="card card-pricing card-plain">
                                <div class="card-content">
                                    <h4 style="color: #000">{{ __('lang.p1_ftth') }}</h4>
                                    <div class="icon icon-rose">
                                        <i style="color: #000;border: 1px solid #000;margin-bottom: -30px;line-height: 105px;font-size: 50px;width: 100px;height: 100px;" class="material-icons">settings_input_hdmi</i>
                                    </div>
                                    <h3 class="card-title"></h3>
                                    <a href="/ftth" class="btn btn-rose btn-round">{{ __('lang.p1_choose_button') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <footer style="background: #000;" class="footer navbar-fixed-bottom">
                <div class="container" style="background: #000;">
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
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="https://www.zaincash.iq/">Zaincash</a> iraqi wallet
                    </p>
                </div>
            </footer>
        </div>
    </div>


@endsection