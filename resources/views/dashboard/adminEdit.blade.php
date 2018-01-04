@extends('layout.dashmaster')


@section('dashboard')
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
                        <form method="POST" action="/dashboard/admin/edit/{{$admin->id}}" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="card-header card-header-text" data-background-color="purple">
                                <h4 class="card-title">Adding Admin</h4>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Name</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input name="name" type="text" class="form-control" value="{{ $admin->name }}" required />
                                            <span class="help-block">Enter The Admin Name ...</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Email</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input name="email" value="{{ $admin->email }}" type="email" class="form-control" required />
                                        <span class="help-block">Enter the Value The Admin Email ...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Password</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input id="password" name="password" type="password" class="form-control"
                                               required value="" />
                                        <span class="help-block">Enter The Password ...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">RePassword</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input id="re_password" name="re_password" type="password" class="form-control"
                                               required />
                                        <span class="help-block">Enter The Password ...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Admin</label>
                                <div class="col-sm-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <select required name="is_admin" class="selectpicker" data-style="btn btn-primary btn-round" title="Single Select" data-size="7" tabindex="-98"><option class="bs-title-option" value="">Single Select</option>
                                            <option disabled="" selected="">{{$admin->is_admin}}</option>
                                            <option value="1">Super Admin</option>
                                            <option value="0">Viewer Admin</option>
                                        </select></div>
                                    {{--<span class="help-block">Enter the type of the card ...</span>--}}
                                </div>
                            </div>
                            <br>
                            <div class="col-md-3 col-md-offset-1 col-sm-2">
                                <button type="submit" class="btn btn-fill btn-rose">Submit<div class="ripple-container"></div></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var password = document.getElementById("password")
            , confirm_password = document.getElementById("re_password");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
@endsection