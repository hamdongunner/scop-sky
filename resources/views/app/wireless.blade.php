@extends('layout.master')


@section('content')


    <div id="root" class="main-panel">
        <div class="content">
            @if(session()->has('message'))
                <div style="margin-top: -60px;" class="alert alert-danger">
                    {{ session()->get('message') }}
                </div>
                <br><br>
            @endif
            <div class="container-fluid">
                <div style="margin-top: -40px;margin-bottom: 40px;" class="row">
                    <div style="margin-bottom: -55px;" class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="blue">
                                <a href="/checkout"><i class="material-icons">shopping_cart</i></a>
                                <button v-if="shoppingCount != 0" style="height: 20px;min-width: 20px;width: 20px;margin-top: -25px;margin-left: -20px;" class="btn btn-danger btn-round btn-fab btn-fab-mini">
                                    <p style="font-size: 15px;">@{{ shoppingCount }}</p>
                                    <div class="ripple-container"></div></button>



                            </div>
                            <div class="card-content">
                                <p class="category">.</p>
                                <h3 style="text-align: left;" class="card-title">The Wireless cards</h3>
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <div class="col-lg-4 col-md-6 col-sm-3">
                                        <div class="dropdown">
                                            <button href="#pablo"
                                                    class="dropdown-toggle btn btn-primary btn-round btn-block"
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
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    {{--@foreach($cards as $card)--}}
                    <div v-for="(product,index) in products" v-if="products" class="col-md-4">
                        <div class="card card-product">
                            <div class="card-image" data-header-animation="true">
                                <a href="#pablo">
                                    <img class="img" src="/assets/img/card-2.jpeg">
                                </a>
                            </div>
                            <div class="card-content">
                                <div class="card-actions">
                                    <button @click="addToCart(product.id)" type="button"
                                            class="btn btn-success btn-simple" rel="tooltip"
                                            data-placement="bottom" title="Edit">
                                        <i class="material-icons">add</i>
                                    </button>
                                </div>
                                <h4 class="card-title">
                                    <a href="#pablo">@{{ product.name }}</a>
                                </h4>
                                <div class="card-description">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="price">
                                    <h4>@{{ product.value }} $</h4>
                                </div>
                                <div class="stats pull-right">
                                    {{--<p class="category"><i class="material-icons">place</i> Barcelona, Spain</p>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--@endforeach--}}
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
                    <a href="https://www.zaincash.iq/">Zaincash</a> iraqi wallet
                </p>
            </div>
        </footer>
    </div>

@endsection


@section('js')
    <script src="/vue/main.js"></script>
@endsection


