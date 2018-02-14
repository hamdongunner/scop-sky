@extends('layout.dashmaster')


@section('orders')
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

                        <div class="form-horizontal">
                            <div class="card-header card-header-text" data-background-color="purple">
                                <h4 class="card-title">Order Info</h4>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Customer Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input disabled type="text" class="form-control"
                                               value="{{ $order->customer->username or 'Wireless Customer' }}"
                                               required/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Company Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input disabled type="text" class="form-control"
                                               value="{{ $order->company }}" required/>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-sm-2 label-on-left">Value</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input disabled value="{{ $order->status }}" type="text" class="form-control"
                                               required/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Amount</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input disabled value="{{ $order->amount }}" type="text" class="form-control"
                                               required/>
                                        <span class="help-block">Enter the Value of the card ...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Status</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input disabled value="{{ $order->status }}" type="text" class="form-control"
                                               required/>
                                        <span class="help-block">Enter the Value of the card ...</span>
                                    </div>
                                </div>
                            </div>
                            @if($cards->count() > 0)
                            <div class="card-content">
                                <div class="card-content">
                                    <div class="card-content">
                                        <div class="material-datatables">
                                            <table id="datatables"
                                                   class="table table-striped table-no-bordered table-hover"
                                                   cellspacing="0" width="100%" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>Card Name</th>
                                                    <th>Value</th>
                                                    <th>Quantity</th>
                                                    <th>Created at</th>
                                                    <th>Updated at</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                </tfoot>
                                                <tbody>
                                                @foreach($cards as $indexKey => $card)
                                                    <tr>
                                                        <td>{{$card->name}}</td>
                                                        <td>{{$card->value}}</td>

                                                        <td>{{$quantity[$indexKey]}}</td>
                                                        <td>{{$card->created_at}}</td>
                                                        <td>{{$card->updated_at}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <br>
                            @if($order->status != 'Done')
                                <div class="col-md-3 col-md-offset-1 col-sm-2">
                                    <a href="/dashboard/order/status/processing/{{$order->id}}"
                                       class="btn btn-fill btn-primary">Processing
                                        <div class="ripple-container"></div>
                                    </a>
                                </div>

                                <div class="col-md-3 col-md-offset-1 col-sm-2">
                                    <a href="/dashboard/order/status/processed/{{$order->id}}"
                                       class="btn btn-fill btn-danger">Done
                                        <div class="ripple-container"></div>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection