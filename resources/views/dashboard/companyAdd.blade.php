@extends('layout.dashmaster')


@section('companies')
    active
@endsection


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
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
                        <form enctype="multipart/form-data" method="POST" action="/dashboard/company/add" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="card-header card-header-text" data-background-color="purple">
                                <h4 class="card-title">Adding Company</h4>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Name</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input name="name" type="text" class="form-control" value="{{ old('name') }}" required />
                                            <span class="help-block">Enter the Company name ...</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Address</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input name="address" type="text" class="form-control" value="{{ old('address') }}" required />
                                            <span class="help-block">Enter the Address of the Company ...</span>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-fill btn-rose">Submit<div class="ripple-container"></div></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection