@extends('layout.master')


@section('content')

    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">

                <div style="margin-top: -40px;margin-bottom: 40px;" class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="blue">
                                <i class="material-icons">settings_input_hdmi</i>

                            </div>
                            <div class="card-content">
                                <p class="category">.</p>
                                <h3 class="card-title">The Wireless cards</h3>
                            </div>
                            {{--<div class="card-footer">--}}
                            {{--<div class="stats">--}}
                            {{--<i class="material-icons">update</i> Just Updated--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
                {{--<h3>Manage Listings</h3>--}}
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-product">
                            <div class="card-image" data-header-animation="true">
                                <a href="#pablo">
                                    <img class="img" src="../assets/img/card-2.jpeg">
                                </a>
                            </div>
                            <div class="card-content">
                                <div class="card-actions">
                                    <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                        <i class="material-icons">build</i> Fix Header!
                                    </button>
                                    <button type="button" class="btn btn-default btn-simple" rel="tooltip"
                                            data-placement="bottom" title="View">
                                        <i class="material-icons">art_track</i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-simple" rel="tooltip"
                                            data-placement="bottom" title="Edit">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-simple" rel="tooltip"
                                            data-placement="bottom" title="Remove">
                                        <i class="material-icons">close</i>
                                    </button>
                                </div>
                                <h4 class="card-title">
                                    <a href="#pablo">Cozy 5 Stars Apartment</a>
                                </h4>
                                <div class="card-description">
                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to
                                    "Naviglio" where you can enjoy the main night life in Barcelona.
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="price">
                                    <h4>$899/night</h4>
                                </div>
                                <div class="stats pull-right">
                                    <p class="category"><i class="material-icons">place</i> Barcelona, Spain</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-product">
                            <div class="card-image" data-header-animation="true">
                                <a href="#pablo">
                                    <img class="img" src="../assets/img/card-3.jpeg">
                                </a>
                            </div>
                            <div class="card-content">
                                <div class="card-actions">
                                    <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                        <i class="material-icons">build</i> Fix Header!
                                    </button>
                                    <button type="button" class="btn btn-default btn-simple" rel="tooltip"
                                            data-placement="bottom" title="View">
                                        <i class="material-icons">art_track</i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-simple" rel="tooltip"
                                            data-placement="bottom" title="Edit">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-simple" rel="tooltip"
                                            data-placement="bottom" title="Remove">
                                        <i class="material-icons">close</i>
                                    </button>
                                </div>
                                <h4 class="card-title">
                                    <a href="#pablo">Office Studio</a>
                                </h4>
                                <div class="card-description">
                                    The place is close to Metro Station and bus stop just 2 min by walk and near to
                                    "Naviglio" where you can enjoy the night life in London, UK.
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="price">
                                    <h4>$1.119/night</h4>
                                </div>
                                <div class="stats pull-right">
                                    <p class="category"><i class="material-icons">place</i> London, UK</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-product">
                            <div class="card-image" data-header-animation="true">
                                <a href="#pablo">
                                    <img class="img" src="../assets/img/card-1.jpeg">
                                </a>
                            </div>
                            <div class="card-content">
                                <div class="card-actions">
                                    <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                        <i class="material-icons">build</i> Fix Header!
                                    </button>
                                    <button type="button" class="btn btn-default btn-simple" rel="tooltip"
                                            data-placement="bottom" title="View">
                                        <i class="material-icons">art_track</i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-simple" rel="tooltip"
                                            data-placement="bottom" title="Edit">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-simple" rel="tooltip"
                                            data-placement="bottom" title="Remove">
                                        <i class="material-icons">close</i>
                                    </button>
                                </div>
                                <h4 class="card-title">
                                    <a href="#pablo">Beautiful Castle</a>
                                </h4>
                                <div class="card-description">
                                    The place is close to Metro Station and bus stop just 2 min by walk and near to
                                    "Naviglio" where you can enjoy the main night life in Milan.
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="price">
                                    <h4>$459/night</h4>
                                </div>
                                <div class="stats pull-right">
                                    <p class="category"><i class="material-icons">place</i> Milan, Italy</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="post" action="test">
            <input value="" type="text">
        </form>
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

@endsection