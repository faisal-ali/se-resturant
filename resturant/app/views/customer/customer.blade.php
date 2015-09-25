@extends('master')

@section('title')
Resturant - Customers
@stop

@section('content')
<h1>Customer</h1>
<div class="wrapper">
  
  <div class="table">
    
    <div class="row header blue">
      <div class="cell">
        Name
      </div>
      <div class="cell">
        Phone Number
      </div>
      <div class="cell">
        Address
      </div>
      <div class="cell">
        CC Number
      </div>
      <div class="cell">
        Action
      </div>
    </div>
    
    
    @foreach($customers as $customer)
    <div class="row">
      <div class="cell">
        {{ $customer->name }}
      </div>
      <div class="cell">
        {{ $customer->phone_number }}
      </div>
      <div class="cell">
        {{ $customer->address }} 
      </div>
      <div class="cell">
        {{ $customer->cc_number }}
      </div>
      <div class="cell">
        <span class="cell">
          {{ Form::open(['method' => 'GET', 'action' => ['CustomerController@edit', $customer->id]]) }}
            <button type="submit" class="btn btn-primary">Edit</button>
          {{ Form::close() }}
        </span>
         <span class="cell">
          {{ Form::open(['method' => 'DELETE', 'action' => ['CustomerController@destroy', $customer->id]]) }}
            <button type="submit" class="btn" disabled=true>Remove</button>
          {{ Form::close() }}
        </span>
      </div>
    </div>
    @endforeach
    
  </div>
  
</div>

@stop