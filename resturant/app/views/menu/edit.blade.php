@extends('master')

@section('title')
Resturant - Menu - Edit
@stop

@section('content')
<h1>MENU</h1>
<div class="wrapper" style="margin-left:380px">
  {{ Form::model($item, array('method' => 'PUT', 'route' => array('menu.update', $item->id))); }}
  <h2 style="text-align:center" class="row"> Edit Item</h2>
    <div class="row">
      <div class="row">
        <div class="cell">Code: </div>
        <div class="cell">
          <input type="text" name="code" value="{{ $item->code }}" required/>
        </div>
      </div>
      
      <div class="row">
        <div class="cell">Name: </div>
        <div class="cell">
          <input type="text" name="name" value="{{ $item->name }}" required/>
        </div>
      </div>
      
      <div class="row">
        <div class="cell">Description: </div>
        <div class="cell">
          <input type="text" name="description" value="{{ $item->description }}" required/>
        </div>
      </div>
      
      <div class="row">
        <div class="cell">Price: </div>
        <div class="cell">
          <input type="text" name="price" value="{{ $item->price }}"  pattern="[0-9]*.?[0-9]*" title="Number with decimal"  required/>
        </div>
      </div>
      
        {{ Form::submit('Update', array('class' => 'btn btn-success', 'style' => 'margin:10px 0px 0px 440px')) }}
    </div>
  {{ Form::close() }}
</div
@stop