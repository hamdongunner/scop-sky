@extends('layout.appMaster')


@section('content')
    <div class="wrapper wrapper-full-page">
        <div class="full-page pricing-page" data-image="/assets/img/bg-pricing.jpeg">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 text-center">
                            <br><br>
                            <h2 class="title" style="font-size: 26px">اختر نوع الشبكة الخاصة بك</h2>
                            <h3 class="description">هناك نوعيتين للشبكات</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-pricing card-plain">
                                <div class="card-content">
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2 style="text-align: center">Wireless Reseller</h2>
                                            <div class="logo pull-left">
                                                <img src="app/images/home/ic_network_wifi_black_36dp_2x.png" alt=""/>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <p class="card-description" style="text-align: center">
                                                <a style="border-radius: 20px;background: linear-gradient(-10deg, #314755, #26a0da);color: #fff"
                                                   href="/wireless" class="btn btn-default add-to-cart">Choose</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-pricing card-plain">
                                <div class="card-content">
                                    <br><br><br>

                                    <h2 style="text-align: center">FTTH Reseller</h2>
                                    <div class="logo pull-left">
                                        <img src="app/images/home/ic_settings_input_hdmi_black_36dp_2x.png" alt=""/>
                                    </div>
                                    <h3 class="card-title"></h3>

                                    <p class="card-description" style="text-align: center">
                                        <a style="border-radius: 20px;background: linear-gradient(-10deg, #314755, #26a0da);color: #fff"
                                           href="/ftth" class="btn btn-rose btn-round">Choose</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection