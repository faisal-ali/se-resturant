@extends('master')

@section('title')
Resturant - Menu
@stop

@section('content')

<h1>MENU</h1>
<div class="wrapper" style="margin-left:380px">
  {{ Form::open(array( 'action' =>'MenuController@store')); }}
  <h2 style="text-align:center" class="row"> Add Item</h2>
    <div class="row">
      <div class="row">
        <div class="cell">Code: </div>
        <div class="cell">
          <input type="text" name="code" required/>
        </div>
      </div>
      
      <div class="row">
        <div class="cell">Name: </div>
        <div class="cell">
          <input type="text" name="name" required/>
        </div>
      </div>
      
      <div class="row">
        <div class="cell">Description: </div>
        <div class="cell">
          <input type="text" name="description" required/>
        </div>
      </div>
      
      <div class="row">
        <div class="cell">Price: </div>
        <div class="cell">
          <input type="text" name="price" pattern="[0-9]*.?[0-9]*" title="Number with decimal" required/>
        </div>
      </div>
      
        {{ Form::submit('Add', array('class' => 'btn btn-success', 'style' => 'margin:10px 0px 0px 440px')) }}
    </div>
  {{ Form::close() }}
</div>


<div class="wrapper">
  
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
        Price
      </div>
      <div class="cell">
        Action
      </div>
    </div>
    
    
    @foreach($items as $item)
    <div class="row">
      <div class="cell">
        {{ $item->code }}
      </div>
      <div class="cell">
        {{ $item->name }}
      </div>
      <div class="cell">
        {{ $item->description }} 
      </div>
      <div class="cell">
        $ {{ $item->price }}
      </div>
      <div class="cell">
        <span class="cell">
          {{ Form::open(['method' => 'GET', 'action' => ['MenuController@edit', $item->id]]) }}
            <button type="submit" class="btn btn-primary">Edit</button>
          {{ Form::close() }}
        </span>
         <span class="cell">
          {{ Form::open(['method' => 'DELETE', 'action' => ['MenuController@destroy', $item->id]]) }}
            <button type="submit" class="btn">Remove</button>
          {{ Form::close() }}
        </span>
      </div>
    </div>
    @endforeach
    
  </div>
  
</div>

@stop