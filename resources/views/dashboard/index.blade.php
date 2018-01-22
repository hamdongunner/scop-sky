@extends('layout.dashmaster')


@section('dashboard')
    active
@endsection

@section('content')

    <div class="container-fluid">

        <br>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <a href="/dashboard/orders"><i class="material-icons">shopping_cart</i></a>
                    </div>
                    <div class="card-content">
                        <p class="category">Orders</p>
                        <h3 class="card-title">{{$all}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            {{--<i class="material-icons">link</i>--}}
                           The Count Of All Orders
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose">
                        <i class="material-icons">assistant</i>
                    </div>
                    <div class="card-content">
                        <p class="category">New</p>
                        <h3 class="card-title">{{count($new)}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            {{--<i class="material-icons">link</i>--}}
                            The Count Of New Orders Only
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">assignment_late</i>
                    </div>
                    <div class="card-content">
                        <p class="category">In Process</p>
                        <h3 class="card-title">{{$processing}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            {{--<i class="material-icons">date_range</i> Last 24 Hours--}}
                            The Count Of In Process Orders Only
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">assignment_turned_in</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Done</p>
                        <h3 class="card-title">{{$processed}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            {{--<i class="material-icons">update</i> Just Updated--}}
                            The Count Of Processed Orders
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <a href="/dashboard/orders/csv"><div class="card-header card-header-icon" data-background-color="purple">
                            <h4 style="font-style: inherit">New Orders</h4>
                        </div></a>
                    <div class="card-content">
                        <h4 class="card-title">The new one only</h4>
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>UserName</th>
                                    <th>Wallet</th>
                                    <th>Amount</th>
                                    <th>Company Name</th>
                                    <th>Cards</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>UserName</th>
                                    <th>Wallet</th>
                                    <th>Amount</th>
                                    <th>Company Name</th>
                                    <th>Cards</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($new as $order)
                                    <tr>
                                        <td>{{$order->customer->user_name or 'Wireless Customer' }}</td>
                                        <td>{{$order->msisdn}}</td>
                                        <td>{{$order->amount}}</td>
                                        <td>{{$order->company}}</td>
                                        <td>{{$order['cards'] or $order->amount}}</td>
                                        <td>{{$order->type}}</td>
                                        <td>{{$order->status}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{$order->updated_at}}</td>
                                        <td class="text-right">
                                            <a href="/dashboard/order/view/{{$order->id}}" class="btn btn-simple btn-warning btn-icon "><i
                                                        class="material-icons">dvr</i></a>
                                            {{--<a href="/dashboard/ftth/delete/{{$order->id}}" class="btn btn-simple btn-danger btn-icon "><i--}}
                                            {{--class="material-icons">close</i></a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <a href="/dashboard/orders/csv"><div class="card-header card-header-icon" data-background-color="purple">
                            <h4 style="font-style: inherit">In Process</h4>
                        </div></a>
                    <div class="card-content">
                        <h4 class="card-title">In Process one only</h4>
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>UserName</th>
                                    <th>Amount</th>
                                    <th>Company Name</th>
                                    <th>Cards</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>UserName</th>
                                    <th>Amount</th>
                                    <th>Company Name</th>
                                    <th>Cards</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($processingOrder as $order)
                                    <tr>
                                        <td>{{$order->customer->user_name or 'Wireless Customer' }}</td>
                                        <td>{{$order->amount}}</td>
                                        <td>{{$order->company}}</td>
                                        <td>{{$order['cards']}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{$order->updated_at}}</td>
                                        <td class="text-right">
                                            <a href="/dashboard/order/view/{{$order->id}}" class="btn btn-simple btn-warning btn-icon "><i
                                                        class="material-icons">dvr</i></a>
                                            {{--<a href="/dashboard/ftth/delete/{{$order->id}}" class="btn btn-simple btn-danger btn-icon "><i--}}
                                            {{--class="material-icons">close</i></a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
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
@endsection
