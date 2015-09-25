@extends('master')

@section('title')
Resturant - Customer - Edit
@stop

@section('content')
<h1>Customer</h1>
<div class="wrapper" style="margin-left:380px">
  {{ Form::model($customer, array('method' => 'PUT', 'route' => array('customer.update', $customer->id))); }}
  <h2 style="text-align:center" class="row"> Edit Customer</h2>
    <div class="row">
      <div class="row">
        <div class="cell">Name: </div>
        <div class="cell">
          <input type="text" name="name" value="{{ $customer->name }}" pattern="[a-zA-Z ]*$" title="Alphabets only" required/>
        </div>
      </div>
      
      <div class="row">
        <div class="cell">Phone Number: </div>
        <div class="cell">
          <input type="text" name="phone_number" value="{{ $customer->phone_number }}" pattern="[0-9]*" title="Numbers only" required/>
        </div>
      </div>
      
      <div class="row">
        <div class="cell">Address: </div>
        <div class="cell">
          <input type="text" name="address" value="{{ $customer->address }}" required/>
        </div>
      </div>
      
      <div class="row">
        <div class="cell">Credit Card Number: </div>
        <div class="cell">
          <input type="text" name="cc_number" value="{{ $customer->cc_number }}"  pattern="[0-9]{16}" title="16 digits"  required/>
        </div>
      </div>
      
        {{ Form::submit('Update', array('class' => 'btn btn-success', 'style' => 'margin:10px 0px 0px 440px')) }}
    </div>
  {{ Form::close() }}
</div
@stop