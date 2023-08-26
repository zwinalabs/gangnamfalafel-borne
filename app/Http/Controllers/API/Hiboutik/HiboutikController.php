<?php

namespace App\Http\Controllers\API\Hiboutik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Orders\OrderRepoGenerator;
use Illuminate\Support\Facades\Validator;
use App\Order;
use Carbon\Carbon;
use App\Status;
use App\Paths;
use Illuminate\Support\Facades\Http;



class HiboutikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * newSale Hiboutik: create new sale at hiboutik
     *
     * @param  mixed $printing_gateway
     * @param  mixed $store_id
     * @return sale_id
     */
    public function newSale(Request $request){
        $printing_gateway = $this->getPrintingGateway();
        $response = Http::get($printing_gateway.'/new-sale.php', [
            'store_id' => ($request->store_id ?? env('HIBOUTIK_STORE_ID', 1)),
            'currency_code' => ($request->currency_code ?? env('CASHIER_CURRENCY','EUR')),
            'vendor_id' => ($request->vendor_id ?? env('HIBOUTIK_API_VENDOR_ID', 1))
        ]);
        if($response->successful()){
            return $response->json();
        }else{
            return "error create new hiboutik sale";
        }
    }

        /**
     * closeSale_hiboutik
     *
     * @param  mixed $printing_gateway
     * @param  mixed $sale_id
     * @return string
    */
    public function closeSale(Request $request){
        $printing_gateway = $this->getPrintingGateway();
        $response = Http::get($printing_gateway.'/close-sale.php', [
            'sale_id' => $request->sale_id,
        ]);
        if($response->successful()){
            return $response->json();
        }else{
            return "error close hiboutik sale";
        }

    }

        /**
     * addProductToSale_hiboutik
     *
     * @param  mixed $printing_gateway
     * @param  mixed $sale_id
     * @param  mixed $product_id
     * @param  mixed $quantity
     * @param  mixed $product_id_hiboutik
     * @return id_sale_product_detail
     */
    public function addProductToSale(Request $request){
        $printing_gateway = $this->getPrintingGateway();
        if(!empty($request->product_id_hiboutik)){
            $response = Http::get($printing_gateway.'/add-product.php', [
                'sale_id' => $request->sale_id,
                'product_id' => $request->product_id_hiboutik,
                'quantity' => $request->quantity,
                'stock_withdrawal' => 1
            ]);
            if($response->successful()){
                return $response->json();
            }else{
                return "error create new sale_product_sale hiboutik";
            }
        }else{
            return "product doesn't exist at hiboutik menu";
        }
    }

    /**
     * printReceipt
     *
     * @param  mixed $printing_gateway
     * @param  mixed $sale_id
     * @return string
     */
    public function printReceipt(Request $request){
        $printing_gateway = $this->getPrintingGateway();
        $promise = Http::get($printing_gateway.'/print-receipt.php', [
            'order' => $request->order
        ])->then(function ($response) {
            if($response->successful()){
                return $response->json()['print_receipt'];
            }else{
                return "error printReceipt";
            }
        });
    }

    
    /**
     * printReceiptKitchen
     *
     * @param  mixed $printing_gateway
     * @param  mixed $sale_id
     * @return void
     */
    public function printReceiptKitchen(Request $request){
        $printing_gateway = $this->getPrintingGateway();
        $promise = Http::get($printing_gateway.'/print-kitchen.php', [
            'order' => $request->order
        ])->then(function ($response) {
            if($response->successful()){
                return $response->json()['print_receipt'];
            }else{
                return "error printReceiptKitchen";
            }
        });
    }

    
    /**
     * savePrintOrder_hiboutik
     *
     * @param  mixed $order
     * @return string
     */
    private function printOrderHiboutik(Request $request){
        $printing_gateway = $this->getPrintingGateway();
        $store_id == env('HIBOUTIK_STORE_ID', 1); //add this to .env file or DataBase
        $order = $request->order;
        if ($order && !empty($order["sale_id"]))
        {
            //we start printing receipt
            $promise = Http::async()->get("/api/print-receipt-hiboutik", [
                'order' => $order
            ])->then(function ($response) {
                if($response->successful()){
                    return $response->json()['print_receipt'];
                }else{
                    return "error printReceiptKitchen";
                }
            });
             //we start printing receipt kitchen
             $promise = Http::async()->get("/api/print-receipt-kitchen-hiboutik", [
                'order' => $order
            ])->then(function ($response) {
                if($response->successful()){
                    return $response->json()['print_receipt'];
                }else{
                    return "error printReceiptKitchen";
                }
            });
            //we close the sale using sale_id
            $response = Http::get('/api/close-sale-hiboutik', [
                'sale_id' => $order["sale_id"],
            ]);
            if($response->successful()){
                return $response->json();
            }else{
                return "error close hiboutik sale";
            }
        }else{
            echo "'sale_id' Key does not exist!";
        }
    }

    /**
     * define the printing Gateway link
     */
    private function getPrintingGateway(){
        return env('PRINTING_GATEWAY','http://hiboutik.test');
    }
}
