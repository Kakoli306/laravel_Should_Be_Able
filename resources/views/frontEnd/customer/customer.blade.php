@extends('frontEnd.layouts.master')
@section('title')
    Customer-Home
@endsection

@section('content')
    <hr/>
   <div>
       <div class="col-md-offset-6 col-md-offset-3">
          <div class="well" >
              Dear {{ Session::get('customer_name') }} ,
              Your order successfully post. we will contact with you soon......

          </div>
       </div>
   </div>
            <hr/>
@endsection