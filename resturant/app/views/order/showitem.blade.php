@extends('master')

@section('content')
<h1>Order number {{ $order->id }}</h1>

<div class="wrapper" style="margin-left:380px">
    <div class="row">
        <div class="row">
            <div class="cell">Customer Name:</div>
            <div class="cell">
                {{ $order->customer[0]->name }}
            </div>
        </div>
        
        <div class="row">
            <div class="cell">Customer Phone number:</div>
            <div class="cell">
                {{ $order->customer[0]->phone_number }}    
            </div>
        </div>
        
        <div class="row">
            <div class="cell">Customer Credit card:</div>
            <div class="cell">
                {{ $order->customer[0]->cc_number }}    
            </div>
        </div>
        
        <div class="row">
            <div class="cell">Customer Credit card: </div>
            <div class="cell">
                {{ $order->customer[0]->address }}
            </div>
        </div>
        
        <div class="row">
            <div class="cell">Order Type: </div>
            <div class="cell">
                {{ $order->type }}
            </div>
        </div>
        
        <div class="row">
            <div class="cell">Processed: </div>
            <div class="cell">
                @if ($order->processed === 'true')
                  Yes
                @else
                  No
                @endif
            </div>
        </div>
        <div class="row">
            @if ($order->processed === 'false')
             <span class="cell">
              {{ Form::open(['method' => 'GET', 'action' => ['OrderrController@process', $order->id]]) }}
                <button type="submit" class="btn btn-primary">Process</button>
              {{ Form::close() }}
            </span>
            @endif
        </div>
        
        <hr>
        
    <div class="table">
        
        <div class="row header green">
          <div class="cell">
            Code
          </div>
          <div class="cell">
            Name
          </div>
          <div class="cell">
            Description
          </div>
          <div class="cell">
            Quantity
          </div>
          <div class="cell">
            Price
          </div>
        </div>
        
        @foreach($order_items as $item)
        <div class="row">
          <div class="cell">
            {{ $item->menus[0]->code }}
          </div>
          <div class="cell">
            {{ $item->menus[0]->name }}
          </div>
          <div class="cell">
            {{ $item->menus[0]->description }} 
          </div>
          <div class="cell">
            {{ $item->quantity }}
          </div>
          <div class="cell">
            $ {{ $item->menus[0]->price }}
          </div>
        </div>
        @endforeach
        
    </div>
    <hr>
    <div class="row total_price_box">
        <div class="cell">
            <span style="margin-left: 400px !important; float: right; text-decoration: overline;">Total: $ {{ $order->total_price }}</span>
        </div>
    </div>
    </div>
  
</div>
@stop