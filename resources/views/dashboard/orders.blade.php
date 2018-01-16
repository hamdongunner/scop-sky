@extends('layout.dashmaster')


@section('orders')
    active
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <a href="/dashboard/orders/csv"><div class="card-header card-header-icon" data-background-color="purple">
                                <p class="material-icons large">EXPORT CSV</p>
                            </div></a>
                        <div class="card-content">
                            <h4 class="card-title">Orders</h4>
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
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->customer->user_name or 'Wireless Customer' }}</td>
                                            <td>{{$order->amount}}</td>
                                            <td>{{$order->company->name}}</td>
                                            <td>{{$order['cards']}}</td>
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
                <!-- end col-md-12 -->
            </div>
            <!-- end row -->
        </div>
    </div>

    <script src="/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
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