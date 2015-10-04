@extends('master')

@section('title')
Resturant - Customer - Create
@stop

@section('content')
<h1>Customer</h1>
<div class="wrapper" style="margin-left:380px">
    @if(isset($error))
        <div class="error">{{ $error }}</div>
    @endif
  {{ Form::open(array( 'action' =>'CustomerController@store')); }}
  <h2 style="text-align:center" class="row"> Create Customer</h2>
    <div class="row">
      <div class="row">
        <div class="cell">Name: </div>
        <div class="cell">
          <input type="text" name="name" pattern="[a-zA-Z ]*$" title="Alphabets only" required/>
        </div>
      </div>
      
      <div class="row">
        <div class="cell">Phone Number: </div>
        <div class="cell">
          <input type="text" name="phone_number" pattern="[0-9]*" title="Numbers only" required/>
        </div>
      </div>
      
      <div class="row">
        <div class="cell">Address: </div>
        <div class="cell">
          <input type="text" name="address" required/>
        </div>
      </div>
      
      <div class="row">
        <div class="cell">Credit Card Number: </div>
        <div class="cell">
          <input type="text" name="cc_number"pattern="[0-9]{16}" title="16 digits"  required/>
        </div>
      </div>
      
        {{ Form::submit('Create', array('class' => 'btn btn-success', 'style' => 'margin:10px 0px 0px 440px')) }}
    </div>
  {{ Form::close() }}
</div
@stop