<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Payment;
use DB;

class orderController extends Controller
{
    public function index(){
        $orders = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->join('payments', 'orders.id', '=', 'payments.order_id')
            ->select('orders.*', 'customers.first_name', 'customers.last_name', 'payments.*')
            ->get();
        return $orders;
      return view('admin.order.manageOrder', ['orders'=>$orders]);
    }
}
