<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Plate;


class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gatewey){

        $data = [
            "success" => true,
            'token' => $gatewey->clientToken()->generate(),
        ];
        
        return response()->json($data, 200);
    }

    public function makePayment(OrderRequest $request, Gateway $gatewey){

        $plate = Plate::find($request->plate);
        $result = $gatewey->transaction()->sale([
            'amount' => $plate->price,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if($result->success){
            $data = [
                'message' => 'Transazione eseguita con successo!'
            ];
            return response()->json($data, 200);
        }else {
            $data = [
                'message' => 'Transazione fallita'
            ];
            return response()->json($data, 401);
        }

        return 'make payment';
    }
}
