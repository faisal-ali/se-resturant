@extends('master')

@section('content')
<h1>Daily Intake page</h1>
<div class="wrapper">
  
  <div class="table">
    
    <div class="row header blue">
      <div class="cell">
        Date
      </div>
      <div class="cell">
        Total Intake
      </div>
    </div>
    
    
    @foreach($orders as $order)
    <div class="row">
      <div class="cell">
        {{ $order[0] }}
      </div>
      <div class="cell">
        {{ $order[1] }}
      </div>
    </div>
    @endforeach
    
  </div>
  
</div>
@stop