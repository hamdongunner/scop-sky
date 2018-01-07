@extends('layout.master')


@section('content')


    <div id="root" class="main-panel">
        <br><br>
            <div class="container-fluid">
                <br>
                <div class="row">

                    <div class="col-md-11">
                        <div class="timeline-heading">
                            <button onclick="window.history.back();" style="font-size: large;text-transform: none;" class="label label-info">Back</button>
                        </div>
                        <div class="card card-testimonial">
                            <div class="card-content">
                                <h5 class="card-description">
                                    Text </h5>
                            </div>


                            <div class="footer">
                                <table class="table">
                                    <tbody>
                                    @foreach($items as $item)
                                    <tr>
                                        <td>
                                            <div class="flag">
                                                <img src="/images/{{$item['image']}}">
                                            </div>
                                        </td>
                                        <td>{{$item['name']}}</td>
                                        <td class="text-right">
                                           $ {{$item['value']}}
                                        </td>
                                        <td class="text-right">
                                            X {{ $item['quantity'] }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <br><br>
                                <tr>
                                    <td></td>
                                    <td class="text-right">
                                      <h4 class="text-danger"> Total : $ {{$amount}}</h4>
                                    </td>
                                </tr>
                                <br>
                                <div style="background: #ea4c89" class="card-avatar">
                                    <form method="post" action="checkout">
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
        <br><br>
        <br>
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



