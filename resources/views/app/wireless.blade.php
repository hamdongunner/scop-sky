@extends('layout.master')


@section('content')


    <div id="root">
        <div class="content">
            <div class="container-fluid">
                <div style="margin-top: 0px;margin-bottom: 0px;" class=" navbar-fixed-top">
                    <div style="margin-bottom: 0px;padding-right: 0px;padding-left: 0px;"
                         class="col-lg-12 col-md-12 col-sm-12">
                        <div style="background: linear-gradient(to right, #232526 , #303030);">
                            <div style="" class="row">
                                <div class="col-xs-1 col-xs-offset-1 col-md-1">
                                    <br>
                                    <a href="/">
                                        <i style="font-size: 34px;color: #fff;padding-bottom: 10px;"
                                           class="material-icons">chevron_left</i>
                                    </a>
                                </div>
                                <div class="col-xs-6 col-xs-push-1 col-md-6 text-center">
                                    <img align="middle" style="width: 100px;margin-bottom: 0px;margin-top: 0px;"
                                         src="/assets/img/scope2.png" alt="ScopSky"/>
                                </div>
                                <div class="col-xs-2 col-xs-push-1 col-md-1 col-md-offset-1">
                                    <br>
                                    <a href="/wireless/checkout">
                                        <i style="font-size: 34px;color: #fff;padding-bottom: 10px;"
                                           class="material-icons">shopping_cart</i>
                                    </a>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <br>
                {{--<div class="row">--}}

                @if(session()->has('message'))
                    <div style="margin-top: 0px;" class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <br>
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-testimonial">
                            <div class="col-md-6 col-md-offset-3 text-center">
                                <img align="middle" style="width: 300px;margin-bottom: 0px;margin-top: 0px;"
                                     src="/assets/img/scope.png" alt=""/>
                            </div>
                            <br><br>
                            <br><br>
                            <div class="footer">
                                <div class="col-xs-8 col-md-12">
                                    <h4>The Amount</h4>
                                </div>
                                <div class="col-xs-8 col-md-6">
                                    <div style="width: 100%;" class="form-group">
                                        <input @change="sendTheValue()" v-model="price" class="form-control"
                                               type="text">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div style=" margin-top: 15px;" class="col-xs-4 col-md-2">
                                    <button style="padding: 0px;" @click="addFifty()" type="button"
                                            class=" btn btn-info btn-simple">
                                        + 50
                                    </button>
                                    <button style="padding: 0px;" @click="deleteFifty()"
                                            class="btn btn-simple btn-danger" v-if="price">
                                        - 50
                                    </button>
                                </div>
                                <br><br>
                                <br><br>
                                <br>
                                <div class="col-md-12">
                                    <div v-if="price" style="background: #ea4c89 !important;" class="card-avatar">
                                        <form method="post" action="/checkout">
                                            {{csrf_field()}}
                                            <button type="submit">
                                                <img style="background: #ea4c89 !important;width: 100%" class="img"
                                                     src="/assets/img/faces/card-profile1-square.png"/>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{--</div>--}}
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
                    <a href="https://www.zaincash.iq/">Zaincash</a> iraqi wallet
                </p>
            </div>
        </footer>
    </div>

@endsection


@section('js')
    <script src="/vue/main.js"></script>
@endsection


