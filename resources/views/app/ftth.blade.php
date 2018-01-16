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
                                    <a href="/ftth/checkout">
                                        <i style="font-size: 34px;color: #fff;padding-bottom: 10px;"
                                           class="material-icons">shopping_cart</i>
                                    </a>
                                    <button v-if="shoppingCount != 0"
                                            style="height: 20px;min-width: 20px;width: 20px;margin-top: -35px;margin-left: -20px;"
                                            class="btn btn-danger btn-round btn-fab btn-fab-mini">
                                        <p style="font-size: 12px;margin-top: 3px;">@{{ shoppingCount }}</p>
                                        <div class="ripple-container"></div>
                                    </button>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <br>
                <div class="row">
                    @if(session()->has('message'))
                        <div style="margin-top: 0px;" class="alert alert-danger">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <br>
                    <div v-for="(product,index) in products" v-if="products" class="col-md-4">
                        <div class="card card-product">
                            <div class="card-image" data-header-animation="false">
                                <img class="img" :src="'/images/'+product.image">
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href="#pablo">@{{ product.name }} @{{ product.value }} $</a>
                                </h4>
                                <div class="card-description">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="price">
                                    <button @click="addToCart(product.id)" type="button"
                                            class="btn btn-success" rel="tooltip"
                                            data-placement="bottom" title="Edit">
                                        Add To Cart
                                    </button>
                                    <button @click="deleteFromCart(product.id)" class="btn btn-danger" v-if="product.show">Delete</button>
                                </div>
                                <div class="stats pull-right">
                                </div>
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


