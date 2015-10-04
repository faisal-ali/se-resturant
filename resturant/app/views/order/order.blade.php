@extends('master')

@section('content')
<h1>Order page</h1>

<div class="wrapper" style="margin-left:380px">
  {{ Form::open(array( 'action' =>'OrderrController@search')); }}
  <h2 style="text-align:center" class="row"> Search for customer</h2>
    <div class="row">
      <div class="row">
        <div class="cell">Customer: </div>
        <div class="cell">
          <input type="text" placeholder="Phone number" name="phone_number" pattern="[0-9]*" title="Numbers only" required/>
        </div>
      </div>
        {{ Form::submit('Search', array('class' => 'btn btn-success', 'style' => 'margin:10px 0px 0px 440px')) }}
    </div>
  {{ Form::close() }}
</div>
@stop