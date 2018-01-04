@extends('layout.dashmaster')


@section('cards')
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
                        <form enctype="multipart/form-data" method="POST" action="/dashboard/card/add" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="card-header card-header-text" data-background-color="purple">
                                <h4 class="card-title">Adding Cards</h4>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Name</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input name="name" type="text" class="form-control" value="{{ old('name') }}" required />
                                            <span class="help-block">Enter the card name ...</span>
                                        </div>
                                    </div>
                                </div>

                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Value</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input name="value" value="{{ old('value') }}" type="number" class="form-control" required />
                                            <span class="help-block">Enter the Value of the card ...</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Description</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <textarea name="description" type="number" class="form-control" required >{{ old('description') }}</textarea>
                                            <span class="help-block">Enter the Description of the card ...</span>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Type</label>
                                <div class="col-sm-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <select required name="type" class="selectpicker" data-style="btn btn-primary btn-round" title="Single Select" data-size="7" tabindex="-98"><option class="bs-title-option" value="">Single Select</option>
                                            <option disabled="" selected="">Choose Type</option>
                                            <option value="Wireless">Wireless</option>
                                            <option value="FTTH">FTTH</option>
                                        </select></div>
                                    {{--<span class="help-block">Enter the type of the card ...</span>--}}
                                </div>
                            </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-2 col-sm-2">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                    <span  class="btn btn-primary btn-round btn-file">
                                                        <span  class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="avatar" id="avatar" required />
                                                    </span>
                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-md-3 col-md-offset-1 col-sm-2">
                                <button type="submit" class="btn btn-fill btn-rose">Submit<div class="ripple-container"></div></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection