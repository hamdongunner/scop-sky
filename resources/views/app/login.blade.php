@extends('layout.master')


@section('content')
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="../../assets/img/login.jpeg">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form method="POST" action="ftth">
                                <div class="card card-login card-hidden">
                                    <div class="card-header text-center" data-background-color="rose">
                                        <h4 class="card-title">Login</h4>
                                        {{--<div class="social-line">--}}
                                            {{--<a href="#btn" class="btn btn-just-icon btn-simple">--}}
                                                {{--<i class="fa fa-facebook-square"></i>--}}
                                            {{--</a>--}}
                                            {{--<a href="#pablo" class="btn btn-just-icon btn-simple">--}}
                                                {{--<i class="fa fa-twitter"></i>--}}
                                            {{--</a>--}}
                                            {{--<a href="#eugen" class="btn btn-just-icon btn-simple">--}}
                                                {{--<i class="fa fa-google-plus"></i>--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                    </div>
                                    <p class="category text-center">
                                    </p>
                                    <div class="card-content">
                                        <br><br>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Email address</label>
                                                <input type="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <button type="submit" class="btn btn-rose btn-simple btn-wd btn-lg">Let's go</button>
                                    </div>
                                </div>
                            </form>
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
    <!--   Core JS Files   -->

@endsection