@extends('layouts.app')

@section('content')

        
              @foreach ($orders as $order)
              <div class="container">
                        <p>{{ $order->name }}</p>
                        <p>{{ $order->lastname }}</p>
                        <p>{{ $order->phone }}</p>
                        <p>{{ $order->address }}</p>
                        <p>{{ $order->riepilogo }}</p> 
                </div>
              @endforeach
       
     
        @dump($orders)
@endsection