<?php

namespace Modules\Isbornepayment\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class Main extends Controller
{
    /**
     * @var Order order - The order
     */
    public $order;

    public function onSiteBorneCheckout($orderid){
        $order=Order::findOrFail($orderid);
        $this->order=$order;

        $total_price = (int) (($order->order_price_with_discount + $order->delivery_price) * 100);
        //$chargeOptions = [];

       /* if(config('settings.stripe_useVendor')){
            config(['settings.stripe_secret' => $this->order->restorant->getConfig('stripe_secret','')]);
            config(['settings.stripe_key' => $this->order->restorant->getConfig('stripe_key','')]);
        } else if (config('settings.enable_stripe_connect') && $this->order->restorant->user->stripe_account) {
            $chargeOptions=$this->stripeConnect();
        }*/

        \App\Services\ConfChanger::switchCurrency($this->order->restorant);

        $url = "https://gobiz.tn/borne/response.json";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $headers = array(
           "Accept: application/json",
           "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $total_price = $total_price * 100;
        $data = <<<DATA
        {
          "amount": $total_price,
          "transactionId": __('Order')." #".$order->id
        }
        DATA;
        
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $ordermd = md5($order->id);
        if ($err) {
            $params = $this->cancel($ordermd);
        } else {
            $params = $this->success($ordermd);
        }
        Log::debug('response:'.$response);
        return response()->json($params);
        //Stripe::setApiKey(config('settings.stripe_secret'));

        /*$session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
              'price_data' => [
                'currency' => config('settings.cashier_currency'),
                'product_data' => [
                  'name' => __('Order')." #".$order->id,
                ],
                'unit_amount' => $total_price,
              ],
              'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripelinks.success',['ordermd'=>md5($order->id)]),
            'cancel_url' => route('stripelinks.cancel',['ordermd'=>md5($order->id)]),
          ]);*/

         // return redirect($session->url);
    }

    public function success($ordermd){

        //Find the order
        $order=Order::where('md',$ordermd)->first();
        if($order){
            $order->payment_status = 'paid';
            $order->update();
            $html = view('order.success', compact('order'))->render();
            $params = [
                    'status' => true,
                    'html' => $html,
                    'errMsg' => '',
            ]; 
            return $params;
        }else{
           abort(404);
        }
         
    }

    public function cancel($ordermd){

        //Find the order
        $order=Order::where('md',$ordermd)->first();
        if($order){
            $html = view('order.cancel', compact('order'))->render();
            $params = [
                    'status' => true,
                    'html' => $html,
                    'errMsg' => '',
            ]; 
            return $params;
        }else{
            abort(404);
        }
         
    }

}
