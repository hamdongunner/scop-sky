@extends('layout.dashmaster')


@section('wireless')
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
                <form method="post" action="/dashboard/value" class="form-horizontal">
                    {{ csrf_field() }}

                    <div class="card-header card-header-text" data-background-color="purple">
                        <h4 class="card-title">Wireless Value</h4>
                    </div>

                        {{ csrf_field() }}

                        <div class="card-content">
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input name="value" type="text" class="form-control" value="{{ old('value') }}"
                                               required/>
                                        <span class="help-block">Enter the card name ...</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-md-offset-1 col-sm-2">
                                <button type="submit" class="btn btn-fill btn-rose">Submit
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                            <br><br>
                        </div>
                        <br>
                    </form>
                    <div class="content">
                        <div class="col-md-8 col-md-offset-2">
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Value</th>

                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Value</th>

                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($wireless as $item)
                                    <tr>
                                        <td>{{$item->value}}</td>

                                        <td class="text-right">
                                            {{--<a href="/dashboard/order/view/{{$item->id}}" class="btn btn-simple btn-warning btn-icon "><i--}}
                                            {{--class="material-icons">dvr</i></a>--}}
                                            <a href="/dashboard/wireless/delete/{{$item->id}}"
                                               class="btn btn-simple btn-danger btn-icon "><i
                                                        class="material-icons">close</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <br><br>
                        </div>
                        </div>
                    </div>

                </form>
            </div>

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
