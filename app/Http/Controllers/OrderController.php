<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request){

        $data = $request->all();
        /* dd($data); */

        $request->validate([
            'name'=> 'required|min:2|max:80',
            'lastname' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required'
        ]);

        $newOrder = new Order();

        $newOrder->fill($data);
       
        $newOrder->save();

        /* return redirect()
            ->route('payment'); */
    }
}
