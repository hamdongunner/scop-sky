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
            <div class="row">

                <div class="col-md-12">

                    <div class="card card-testimonial">
                        <br>
                        <h4>The Checkout
                        </h4>
                        <br>
                        <div class="footer">
                            <div class="col-xs-8 col-xs-offset-2">
                                <input class="form-control" disabled value="{{$price}}" type="text">
                            </div>
                            <br><br>
                            <br><br>
                                <div class="col-xs-8 col-xs-offset-2">
                                    <h4 class="text-danger"> Total : IQD {{$amount}}</h4>
                                </div>

                            <br>
                            <div class="card-content">
                                <div class="card-description">
                                    <div class="dropdown ">
                                        <button href="#pablo"
                                                class="dropdown-toggle btn btn-info btn-round btn-block"
                                                data-toggle="dropdown">Choose Company
                                            <b class="caret"></b>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li v-for="(company,index) in companies">
                                                <button style="background-color: #ffffff;color: #000000;box-shadow: none"
                                                        class="btn btn-block" @click="addCompany(company.id)">@{{
                                                    company.name }}
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div v-if="confirmButtonShow" style="background: #ea4c89" class="card-avatar">
                                <form method="post" action="/checkout">
                                    {{csrf_field()}}
                                    <button type="submit">
                                        <img class="img" src="/assets/img/faces/card-profile1-square.png"/>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

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



