@extends('frontEnd.layouts.master')

@section('title')
    Shipping Info
@endsection


@section('content')

    <hr/>
    <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
    <hr/>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well text-success text-center">
                    Dear {{ Session::get('customer_name') }} You have to give us product shipping information to complete your valuable order.
                    If Your billing & shipping information are save then just press on save shipping info button.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="well">
                    <br/>
                    <h3 class="text-center text-success">Shipping Information.</h3>
                    <hr/>
                    <form class="form-horizontal" action="{{ url('/new-shipping') }}" method="POST">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="control-label col-md-3">Full Name</label>
                            <div class="col-md-9">
                                <input type="text" name="full_name" class="form-control" value="{{ $customerById->first_name.' '.$customerById->last_name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email Address</label>
                            <div class="col-md-9">
                                <input type="email" name="email_address" class="form-control" value="{{ $customerById->email_address }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Phone Number</label>
                            <div class="col-md-9">
                                <input type="number" name="phone_number" class="form-control" value="{{ $customerById->phone_number }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="address" rows="5" style="resize: none;">{{ $customerById->address }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <input type="submit" name="btn" class="btn btn-success" value="Save Shipping Info">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
