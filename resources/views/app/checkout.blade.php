@extends('layout.master')


@section('content')


    <div id="root" class="main-panel">
        <div class="content">
            <div class="container-fluid">

                <div style="margin-top: -40px;margin-bottom: 40px;" class="row">
                    <div style="margin-bottom: -55px;" class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="blue">
                                <a href="/checkout"><i class="material-icons">shopping_cart</i></a> @{{ shoppingCount }}

                            </div>
                            <div class="card-content">
                                <p class="category">.</p>
                                <h3 class="card-title">The Wireless cards</h3>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<h3>Manage Listings</h3>--}}
                {{--@if(session()->has('cart'))--}}
                {{--<div class="alert alert-solid alert-danger" role="alert">--}}
                {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                {{--<span aria-hidden="true">&times;</span>--}}
                {{--</button>--}}
                {{--<h5 style="color: white" class="text-center">{{ session()->get('cart') }}</h5>--}}
                {{--</div>--}}
                {{--@endif--}}

                <br>
                <div class="row">

                    @foreach($items as $item)
                        {{ $item['name'] }}
                    @endforeach

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


{{--@section('js')--}}
{{--<script src="vue/main.js"></script>--}}
{{--@endsection--}}


