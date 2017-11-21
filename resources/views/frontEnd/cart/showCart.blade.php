@extends('frontEnd.layouts.master')

@section('title')
    Show Chart
@endsection


@section('content')
    <hr/>
    <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
    <hr/>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    <?php $sum = 0; ?>

                    @foreach($cartProducts as $cartProduct)
                        <tr>
                            <td>{{ $cartProduct->id }}</td>
                            <td>{{ $cartProduct->name }}</td>
                            <td>{{ $cartProduct->price }}</td>
                            <td>
                                <form class="" method="POST" action="{{ url('/update-cart') }}">

                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <input class="form-control" min="1" type="number" value="{{ $cartProduct->qty }}" name="product_quantity">
                                        <input type="hidden" value="{{ $cartProduct->rowId }}" name="rowId">
                                        <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-upload"></span>
                                    </button>
                                </span>
                                    </div>
                                </form>
                            </td>
                            <td>{{ $cartProduct->subtotal }}</td>
                            <td>
                                <a href="{{ url('/remove-cart-product/'.$cartProduct->rowId) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure to Delete This ?');">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                        <?php $sum = $sum+ $cartProduct->subtotal; ?>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <hr/>

    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-8">
                <div class="well">
                    <table class="table table-bordered ">
                        <tr>
                            <th>Total Price</th>
                            <td>BDT. {{ $sum }}</td>
                            {{ Session::put('orderTotal', $sum) }}
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <hr/>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php
                $customer_id = Session::get('customer_id');
                $shipping_id = Session::get('shipping_id');
                if ($customer_id != null && $shipping_id != null) {
                ?>
                <a href="{{ url('/payment-info') }}" class="btn btn-success pull-right">Checkout</a>
                <?php } else if ($customer_id != null && $shipping_id == null) { ?>
                <a href="{{ url('/shipping-info') }}" class="btn btn-success pull-right">Checkout</a>
                <?php } else { ?>
                <a href="{{ url('/checkout') }}" class="btn btn-success pull-right">Checkout</a>
                <?php } ?>
                <a href="{{ url('/') }}" class="btn btn-success">Continue Shopping</a>
            </div>
        </div>
    </div>
    </div>
    <hr/>
@endsection
