@extends('layout.dashmaster')


@section('orders')
    active
@endsection

@section('content')


    <div class="content">
        <div class="container-fluid">

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if($errors->count() >0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif

            <div class="card">
                <form method="post" action="/dashboard/export" class="form-horizontal">
                    {{ csrf_field() }}

                    <div class="card-header card-header-text" data-background-color="purple">
                        <h4 class="card-title">CSV</h4>
                    </div>
                    <div class="card-content">

                        <div class="row">
                            <div class="col-md-5 col-md-offset-1">
                                <div class="card">
                                    <div class="card-header card-header-icon" data-background-color="rose">
                                        <i class="material-icons">library_books</i>
                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title">From</h4>
                                        <div class="form-group">
                                            <label class="label-control">Pick</label>
                                            <input name="from" type="text" class="form-control datepicker" value=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-header card-header-icon" data-background-color="rose">
                                        <i class="material-icons">library_books</i>
                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title">To</h4>
                                        <div class="form-group">
                                            <label class="label-control">Pick</label>
                                            <input name="to" type="text" class="form-control datepicker" value=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                @foreach($orders as $order)
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


                    <div class="col-md-3 col-md-offset-1 col-sm-2">
                        <input name="submit" value="Export all" type="submit" class="btn btn-fill btn-primary" />
                            <div class="ripple-container"></div>
                    </div>
                     <div class="col-md-3 col-md-offset-1 col-sm-2">
                        <input name="submit" value="Export According Time" type="submit" class="btn btn-fill btn-rose" />
                            <div class="ripple-container"></div>
                    </div>

                </form>
            </div>


            <div hidden id="sliderRegular"></div>
            <div hidden id="sliderDouble"></div>

            <!-- end card -->
        </div>
    </div>


    <script src="/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [5, 25, 50, -1],
                    [5, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }

            });


            var table = $('#datatables').DataTable();

            // Edit record
            table.on('click', '.edit', function () {
                $tr = $(this).closest('tr');

                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function (e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function () {
                alert('You clicked on Like button');
            });

            $('.card .material-datatables label').addClass('form-group');
        });
    </script>

@endsection
