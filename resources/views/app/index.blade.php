@extends('layout.master')


@section('content')
    <div class="wrapper wrapper-full-page">
        <div class="full-page pricing-page" data-image="/assets/img/bg-pricing.jpeg">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 text-center">
                            <h2 class="title">اختر نوع الشبكة الخاصة بك</h2>
                            <h5 class="description">هناك نوعيتين للشبكات</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-pricing card-plain">
                                <div class="card-content">
                                    <h2 style="color: white">Wireless Reseller</h2>
                                    <div class="icon">
                                        <i class="material-icons">network_wifi</i>
                                    </div>
                                    <h3 class="card-title"></h3>
                                    <p class="card-description">
                                        Some description on this network
                                    </p>
                                    <a href="/wireless" class="btn btn-rose btn-round">Choose</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-pricing card-plain">
                                <div class="card-content">
                                    <h2 style="color: white">FTTH Reseller</h2>
                                    <div class="icon icon-rose">
                                        <i class="material-icons">settings_input_hdmi</i>
                                    </div>
                                    <h3 class="card-title"></h3>
                                    <p class="card-description">
                                        Some description on this Network
                                    </p>
                                    <a href="/ftth" class="btn btn-rose btn-round">Choose</a>
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

@endsection