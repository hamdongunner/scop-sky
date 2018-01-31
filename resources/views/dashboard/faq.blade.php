@extends('layout.dashmaster')


@section('faq')
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
                <form method="post" action="/dashboard/faq/edit" class="form-horizontal">
                    {{ csrf_field() }}

                    <div class="card-header card-header-text" data-background-color="purple">
                        <h4 class="card-title">Wireless Value</h4>
                    </div>

                    {{ csrf_field() }}

                    <div class="card-content">
                        <div class="row">
                            <label class="col-sm-2 label-on-left">The Arabic</label>
                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <textarea rows="24" cols="50" name="arabic" class="form-control"
                                              required>{{$arabic->text}}</textarea>
                                    <span class="help-block">Enter Arabic ...</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">The English</label>
                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <textarea rows="24" cols="50" name="english" class="form-control"
                                              required>{{$english->text}}</textarea>
                                    <span class="help-block">Enter English ...</span>
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
