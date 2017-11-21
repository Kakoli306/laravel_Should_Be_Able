@extends('layouts.app')


@section('content')
    <br/>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DataTables Advanced Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <h3>{{ Session::get('message') }}</h3>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Order Id</th>
                            <th>Customer Name</th>
                            <th>Order Total</th>
                            <th>Order Status</th>
                            <th>Payment Type</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        @foreach($orders as $order)
                            <tr class="odd gradeX">
                                <td>{{ $i }}</td>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->first_name.' '.$order->last_name }}</td>
                                <td>{{ $order->order_total }}</td>
                                <td>{{ $order->order_status }}</td>
                                <td>{{ $order->payment_type }}</td>
                                <td>{{ $order->payment_status }}</td>


                                <td class="center">
                                 <a href="" class="btn btn-info btn-sm" title="View Order">
                                     <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>

                                    <a href="" class="btn btn-primary btn-sm" title="View Order Invoice">
                                        <span class="glyphicon glyphicon-zoom-out"></span>
                                    </a>

                                    <a href="" class="btn btn-success btn-sm" title="Download Order Invoice">
                                        <span class="glyphicon glyphicon-download"></span>
                                    </a>

                                    <a href="" class="btn btn-warning btn-sm" title="Edit Order">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>

                                    <a href="" class="btn btn-danger btn-sm" title="Delete Order">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
            </div>
        </div>
    </div>

    <!-- /.row -->

@endsection