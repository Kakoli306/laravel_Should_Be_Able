<?php

namespace App\Http\Controllers;

use App\order_details;
use Illuminate\Http\Request;
use App\Customer;
use Session;
use App\Shipping;
use App\Order;
use App\Payment;
use App\orderDetails;
use Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('frontEnd.checkout.checkoutContent');
    }
    public function newCustomer (Request $request) {
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->password = bcrypt ($request->password);
        $customer->email_address = ($request->email_address);
        $customer->phone_number = $request->phone_number;
        $customer->address = $request->address;
        $customer->save();
       Session::put('customer_id',$customer->id);
       Session::put('customer_name',$customer->first_name.' '.$customer->last_name);
       return redirect('/shipping-info');
    }

    public function shippingInfo () {
        $customer_id = Session::get('customer_id');
        $customerById = Customer::find($customer_id);
        return view('frontEnd.checkout.shippingInfo',['customerById'=> $customerById]);
    }
    public function userLogout(){
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');

    }
    public function newShipping(Request $request){
        $shipping = new Shipping();
        $shipping->full_name =  $request->full_name;
        $shipping->email_address=  $request->email_address;
        $shipping->phone_number =  $request->phone_number;
        $shipping->address =  $request->address;
        $shipping->save();
        Session::put('shipping_id', $shipping->id);

        return redirect('/payment-info');
    }
    public function paymentInfo(){
       return view('frontEnd.checkout.paymentInfo');
    }

 public function saveOrderInfo(Request $request){
     $paymentType = $request->payment_type;
     if($paymentType == 'cash'){

         $order = new Order();
         $order->customer_id = Session::get('customer_id');
         $order->shipping_id = Session::get('shipping_id');
         $order->order_total = Session::get('orderTotal');
         $order->save();

         Session::put('order_id', $order->id);

         $payment = new Payment();
         $payment->order_id = Session::get('order_id');
         $payment->payment_type = $paymentType;
         $payment->save();

         $cartProducts = Cart::content();
         foreach($cartProducts as $cartProduct){
             $orderDetails = new order_details();
             $orderDetails->order_id = Session::get('order_id');
             $orderDetails->product_id = $cartProduct->id;
             $orderDetails->product_name = $cartProduct->name;
             $orderDetails->product_price = $cartProduct->price;
             $orderDetails->product_quantity = $cartProduct->qty;
             $orderDetails->save();
         }
         return redirect('/customer-home');

     }else if ($paymentType == 'paypal'){

     }else if ($paymentType == 'bkash') {

     }
 }


    public function userLogin (Request $request){
        $email_address = $request->email_address;//form er modhhe j email address dichhe ota rakhlm
        $customerByEmail = Customer::where('email_address', $email_address)->first();//customer id theke j email address ashche oi email ta
        // jokhon mile jabe tar first row i mean ta row er sob column
        $existingPassword = $customerByEmail->password;
       // return $existingPassword;

        if (password_verify ($request-> password, $existingPassword)) {
            Session::put('customer_id',$customerByEmail->id);
            Session::put('customer_name',$customerByEmail->first_name.' '.$customerByEmail->last_name);
            return redirect('shipping-info');

        } else {
            return redirect('/checkout')->with('message', 'Email or password is not valid');
        }
    }

   public function customerHome(){
        return view('frontEnd.customer.customer');
    }
}
