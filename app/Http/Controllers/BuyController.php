<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pay;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use Illuminate\Support\Str;

class BuyController extends Controller
{
    private $razorpayId ="rzp_test_NhQ3cBli2Ro6Rv";
    private $razorpayKey ="jdTGMlpglevgXnFjZ87njZL6";

    public function buynow(){
        return view('buynow');
    }
      public function buynowinitiate(Request $request){
        $recipetId=Str::random(20);
        $api = new Api($this->razorpayId, $this->razorpayKey);
        $user =new Product();
        $order = $api->order->create(array
        (  'receipt' => $recipetId,
          'amount' => $request->amount * 100,
          'currency' => 'INR'  ));
          $response = [
              'orderId'=> $order['id'],
              'razorpayId'=> $this->razorpayId,
              'amount'=> $request->amount * 100,
              'rate'=> $request->amount,
              'name'=> $request->name,
              'currency'=>'INR',
              'email'=>Auth::user()->email,
              'contactNumber'=>$request->contactNumber,
              'description'=>'payment',
              'address'=>$request->address,
          ];
          return view('buynowpayment',compact('response'));
      }
      public function buynowsuccess(Request $request){
         $signatureStatus= $this->Signatureverify(
            $request->rzp_signature,
            $request->rzp_paymentId,
            $request->rzp_orderId
          );
          if($signatureStatus == true){
            $pay= new Pay();
            $pay->rzp_paymentId=$request->rzp_paymentId;
            $pay->rzp_orderId=$request->rzp_orderId;
            $pay->rzp_signature=$request->rzp_signature;
            $pay->amount=$request->amount;
            $pay->save();
            return'success';
          }
        else{
            return 'Fail';
        }
      }
      public function Signatureverify($_signature,$_paymentId,$_orderId){
          try{
            $api = new Api($this->razorpayId, $this->razorpayKey);
            $attributes  = array('razorpay_signature'  => $_signature,  'razorpay_payment_id'  => $_paymentId ,  'razorpay_order_id' => $_orderId);
            $order  = $api->utility->verifyPaymentSignature($attributes);
            return true;
          }
          catch(\Exception $e){
          }
      }

}
