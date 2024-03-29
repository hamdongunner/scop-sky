@extends('layout.dashmaster')


@section('ftth')
    active
@endsection


@section('content')
    <div id="root" class="content">
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
                        <form method="POST" action="/dashboard/ftth/add"
                              class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="card-header card-header-text" data-background-color="purple">
                                <h4 class="card-title">Adding Reseller</h4>
                            </div>
                            <div class="card-content">

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">First Name</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input name="first_name" type="text" class="form-control"
                                                   value="{{ old('first_name') }}" required/>
                                            <span class="help-block">Enter the First Name ...</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Last Name</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input name="last_name" type="text" class="form-control"
                                                   value="{{ old('last_name') }}" required/>
                                            <span class="help-block">Enter the Last Name ...</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">User Name</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input name="user_name" type="text" class="form-control"
                                                   required value="{{ old('user_name') }}"/>
                                            <span class="help-block">Enter the User Name ...</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Password</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input id="password" name="password" type="password" class="form-control"
                                                   required value="{{ old('password') }}"/>
                                            <span class="help-block">Enter The Password ...</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">RePassword</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input id="re_password" name="re_password" type="password"
                                                   class="form-control"
                                                   required/>
                                            <span class="help-block">Enter The Password ...</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Phone Number</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input name="phone" value="{{ old('phone') }}" type="number"
                                                   class="form-control" required/>
                                            <span class="help-block">Enter the Value of Phone Number ...</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Address</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input name="address" type="text" class="form-control"
                                                   required value="{{ old('address') }}"/>
                                            <span class="help-block">Enter the Address ...</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Cabinet Number</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input name="cabinet_number" type="number" class="form-control"
                                                   required value="{{ old('cabinet_number') }}"/>
                                            <span class="help-block">Enter the Cabinet Number ...</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Company Name</label>
                                    <div class="col-sm-10">
                                        <label class="control-label"></label>
                                        <select required name="company" class="selectpicker"
                                                data-style="btn btn-linkedin btn-round" title="Choose Company"
                                                data-size="7" tabindex="-98">
                                            <option disabled=""
                                                    selected="">Choose Company</option>
                                            @foreach($companies as $company)
                                                <option value="{{$company->id}}">{{$company->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block">Choose the Company Name ...</span>
                                    </div>
                                </div>

                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <select v-on:change="typeCheck" required name="type" class="selectpicker"
                                        data-style="btn btn-linkedin btn-round" title="Choose Type"
                                        data-size="7" tabindex="-98">
                                    <option disabled="" selected="">Choose type</option>
                                    <option value="ftth">ftth</option>
                                    <option value="wireless">wireless</option>
                                </select></div>
                            <br>
                            <button type="submit" class="btn btn-fill btn-rose">Submit
                                <div class="ripple-container"></div>
                            </button>
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

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
@endsection




@section('js')
    <script src="/vue/dash.js"></script>
@endsection
