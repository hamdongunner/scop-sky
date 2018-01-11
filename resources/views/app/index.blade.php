@extends('layout.master')


@section('content')
    <style>

        *,
        :after,
        :before {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        .scroll-down {
            color: black;
            background: black;
            opacity: 1;
            -webkit-transition: all .5s ease-in 3s;
            transition: all .5s ease-in 3s;
        }

        .scroll-down {
            position: absolute;
            /*bottom: 30px;*/
            left: 50%;
            margin-left: -16px;
            display: block;
            width: 32px;
            height: 32px;
            border: 2px solid #000;
            background-size: 14px auto;
            border-radius: 50%;
            z-index: 2;
            -webkit-animation: bounce 2s infinite 2s;
            animation: bounce 2s infinite 2s;
            -webkit-transition: all .2s ease-in;
            transition: all .2s ease-in;
        }

        .scroll-down:before {
            position: absolute;
            top: calc(50% - 8px);
            left: calc(50% - 6px);
            transform: rotate(-45deg);
            display: block;
            width: 12px;
            height: 12px;
            content: "";
            border: 2px solid white;
            border-width: 0px 0 2px 2px;
        }

        @keyframes bounce {
            0%,
            100%,
            20%,
            50%,
            80% {
                -webkit-transform: translateY(0);
                -ms-transform: translateY(0);
                transform: translateY(0);
            }
            40% {
                -webkit-transform: translateY(-10px);
                -ms-transform: translateY(-10px);
                transform: translateY(-10px);
            }
            60% {
                -webkit-transform: translateY(-5px);
                -ms-transform: translateY(-5px);
                transform: translateY(-5px);
            }
        }
    </style>
    <div class="wrapper wrapper-full-page" style="background: #000;">

        <div class="full-page pricing-page" data-image="/assets/img/bg-pricing.jpeg">
            <div class="content" style="background: #fff;">
                <div class="container">

                    <div class="row">

                        <div class="col-md-6 col-md-offset-3 text-center">
                            <img align="middle" style="width: 300px;margin-bottom: -90px;margin-top: 40px;" src="/assets/img/scope.png" alt=""/>
                            <h3 style="color: #000;margin-bottom: -50px;" class="title">اختر نوع الشبكة الخاصة بك</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-pricing card-plain">
                                <div class="card-content">
                                    <h3 style="color: #000;">Wireless Reseller</h3>
                                    <div class="icon">
                                        <i style="color: #000;border: 1px solid #000;    margin-bottom: -30px;" class="material-icons">network_wifi</i>
                                    </div>
                                    <h3 class="card-title"></h3>
                                    <a style="margin-bottom: -50px;" href="/wireless" class="btn btn-rose btn-round">Choose</a>
                                </div>

                            </div>
                        </div>
                            <a id="scroll" onclick="scrollWin(0, 350)" class="scroll-down" address="true" style="margin-top: 27px;"></a>

                        <div class="col-md-6">
                            <div class="card card-pricing card-plain">
                                <div class="card-content">
                                    <h3 style="color: #000">FTTH Reseller</h3>
                                    <div class="icon icon-rose">
                                        <i style="color: #000;border: 1px solid #000;    margin-bottom: -20px;" class="material-icons">settings_input_hdmi</i>
                                    </div>
                                    <h3 class="card-title"></h3>
                                    <a href="/ftth" class="btn btn-rose btn-round">Choose</a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <br>

            </div>

            <footer style="background: #000;" class="footer">
                <div class="container" style="background: #000;margin-bottom: -20px;">
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
    <script>
        function scrollWin(x, y) {
            document.getElementById('scroll').style.display = 'none';
            window.scrollBy(x, y);
        }
    </script>
    
@endsection