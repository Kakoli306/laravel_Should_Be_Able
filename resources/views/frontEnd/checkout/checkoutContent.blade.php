@extends('frontEnd.layouts.master')
@section('title')
    CheckOut
@endsection

@section('content')
    <hr/>
    <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well text-success text-center">
                    U have to login to complete your valuable order.If u r not registered then register first.
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="well">
                    <br/>
                    <h3 class="text-center text-success">You may login from here</h3>
                   <form class="form-horizontal" action="{{ url('/user-login') }}" method="POST">
                    {{ csrf_field() }}
                       <div class="form-group">
                           <label class="control-label col-md-3">Email Address</label>
                           <div class="col-md-9">
                               <input type="email" name="email_address" class="form-control"/>
                           </div>
                       </div>

                       <div class="form-group">
                           <label class="control-label col-md-3">Password</label>
                           <div class="col-md-9">
                               <input type="password" name="password" class="form-control"/>
                           </div>
                       </div>

                       <div class="form-group">
                           <label class="control-label col-md-offset-3">
                           <div class="col-md-9">
                               <input type="submit" name="btn" class="btn btn-success" value="Login"/>
                           </div>
                           </label>
                       </div>
                   </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="well">
                    <br/>
                    <h3 class="text-center text-success">You may register from here</h3>
                    <form class="form-horizontal" action="{{url('/new-customer')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-md-3">First Name</label>
                            <div class="col-md-9">
                                <input type="text" name="first_name" class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Last Name</label>
                            <div class="col-md-9">
                                <input type="text" name="last_name" class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Email Address</label>
                            <div class="col-md-9">
                                <input type="email" name="email_address" class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Phone Number</label>
                            <div class="col-md-9">
                                <input type="number" name="phone_number" class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-9">
                               <textarea class="form-control" name="address" rows="8" style="resize:none"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-offset-3">
                                <div class="col-md-9">
                                    <input type="submit" name="btn" class="btn btn-success btn-block" value="Register"/>
                                </div>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr/>
@endsection