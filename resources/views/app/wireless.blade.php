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
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                {{--<div class="row">--}}

                @if(session()->has('message'))
                    <div style="margin-top: 50px;margin-bottom: -20px" class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-testimonial">
                            <div class="col-md-6 col-md-offset-3 text-center">
                                <img align="middle" style="width: 300px;margin-bottom: 0px;margin-top: 30px;"
                                     src="/assets/img/scope.png" alt=""/>
                            </div>
                            <div class="footer">
                                <form method="post" action="/wireless/checkout">
                                    {{csrf_field()}}
                                    <div class="col-xs-12 col-md-12">
                                        <h4 style="margin-bottom: -10px;">The Amount</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-10 col-xs-push-1">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <select required name="value" class="selectpicker"
                                                        data-style="btn btn-linkedin btn-round"
                                                        data-size="7" tabindex="-98">
                                                    @foreach($wireless as $item)
                                                        <option value="{{$item->value}}">{{$item->value}}</option>
                                                    @endforeach
                                                </select></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-12">
                                        <h4 style="margin-bottom: -10px;">The Company</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-10 col-xs-push-1">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <select required name="company" class="selectpicker"
                                                        data-style="btn btn-linkedin btn-round" title="Choose Company"
                                                        data-size="7" tabindex="-98">
                                                    <option disabled="" selected="">Choose Company</option>
                                                    @foreach($companies as $company)
                                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                                    @endforeach
                                                </select></div>
                                            {{--<span class="help-block">Enter the type of the card ...</span>--}}
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-md-12">
                                        <div style="background: #ea4c89 !important;" class="card-avatar">
                                            <button type="submit">
                                                <img style="background: #ea4c89 !important;width: 100%" class="img"
                                                     src="/assets/img/faces/card-profile1-square.png"/>
                                            </button>
                                        </div>
                                    </div>
                                </form>
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

