@extends('layout.master')


@section('content')
    <div class="wrapper wrapper-full-page" style="background: #000;">


        <div class="full-page pricing-page" data-image="/assets/img/bg-pricing.jpeg">
            <div class="content" style="background: #fff;">
                <div class="container">

                    <div class="row">

                        <div class="col-md-6 col-md-offset-3 text-center">
                            <img align="middle" style="width: 300px;margin-bottom: -90px;margin-top: 40px;" src="/assets/img/scope.png" alt=""/>

                            <h3 style="color: #000;" class="title">اختر نوع الشبكة الخاصة بك</h3>
                            <h5 style="color: #000;" class="description">هناك نوعيتين للشبكات</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-pricing card-plain">
                                <div class="card-content">
                                    <h3 style="color: #000;">Wireless Reseller</h3>
                                    <div class="icon">
                                        <i style="color: #000;border: 1px solid #000;" class="material-icons">network_wifi</i>
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
                                    <h3 style="color: #000">FTTH Reseller</h3>
                                    <div class="icon icon-rose">
                                        <i style="color: #000;border: 1px solid #000;" class="material-icons">settings_input_hdmi</i>
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
                <br><br><br>

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
    $(function() {
        $('a[href*=#]').on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
        });
    });
</script>
@endsection