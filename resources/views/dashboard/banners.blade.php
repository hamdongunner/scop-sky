@extends('layout.dashmaster')


@section('banner')
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
                <form method="post" action="/dashboard/banners/add" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="card-header card-header-text" data-background-color="purple">
                        <h4 class="card-title">Banner</h4>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <label class="col-sm-2 label-on-left">The Banner</label>
                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input name="text" class="form-control"
                                            value="{{ $banner->text ?? ""}}" />
                                    <span class="help-block">Enter Banner ...</span>
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


@endsection
