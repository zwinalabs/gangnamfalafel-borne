<?php

namespace Modules\Isbornepayment\Http\Controllers;

use Illuminate\Support\Facades\Validator;

class App 
{
    private $order;
    private $vendor;

    public function __construct($order, $vendor) {
        
        $this->order=$order;
        $this->vendor=$vendor;

    }

    public function execute(){
        //Set payment link in order bornelinks.onsitecheckout
        /*$url = "https://gobiz.tn/borne/response.json";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $headers = array(
           "Accept: application/json",
           "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);*/
        $total_price = $total_price * 100;
        $data = <<<DATA
        {
          "amount": $total_price,
          "transactionId": __('Order')." #".$order->id
        }
        DATA;
        
        /*curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $ordermd = md5($this->order->id);*/
        /*if ($err) {
            $params = $this->order->id;
        } else {
            $params = $this->order->id;
        }*/
        var_dump($data);
        $this->order->payment_link=route('isbornepayment.onsitecheckout',['order'=>$this->order->id]);
        $this->order->update();

        //All ok
        return Validator::make([], []);
    }

}