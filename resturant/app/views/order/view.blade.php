@extends('master')

@section('content')
<h1>All Orders</h1>

<div class="wrapper">
  
  <div class="table">
    
    <div class="row header green">
      <div class="cell">
        Order Id
      </div>
      <div class="cell">
        Customer
      </div>
      <div class="cell">
        Phone No.
      </div>
      <div class="cell">
        Type
      </div>
      <div class="cell">
        Order Date
      </div>
      <div class="cell">
        Total
      </div>
      <div class="cell">
        Action
      </div>
    </div>
    
    
    @foreach($orders as $order)
    <div class="row">
      <div class="cell">
        {{ $order->id }}
      </div>
      <div class="cell">
        {{ $order->customer[0]->name }}
      </div>
      <div class="cell">
        {{ $order->customer[0]->phone_number }} 
      </div>
      <div class="cell">
        {{ $order->type }}
      </div>
      <div class="cell">
        {{ $order->created_at }}
      </div>
      <div class="cell">
        ${{ $order->total_price }}
      </div>
      <div class="cell">
        <span class="cell">
          <button class="btn" onclick="location.href = '/se-resturant/resturant/public/order/{{ $order->id }}'">View</button>  
        </span>
      </div>
    </div>
    @endforeach
    
  </div>
  
</div>

@stop