@extends('master')

@section('content')
<h1>Take Order</h1>

<div class="wrapper" style="margin-left:380px">
  {{ Form::open(array( 'action' =>'OrderrController@store', 'onsubmit' => 'return checkItems();', 'id' =>'order_form')); }}
  <h2 style="text-align:center" class="row">Customer Details</h2>
  <input type="text" name="customer_id" hidden value="{{  $customer->id}}"/>
    <div class="row">
      <div class="row">
        <div class="cell">Customer Name: </div>
        <div class="cell">
          {{ $customer->name }}
        </div>
      </div>
      
      <div class="row">
        <div class="cell">Phone Number: </div>
        <div class="cell">
          {{ $customer->phone_number }}
        </div>
      </div>
      
      <div class="row">
        <div class="cell">Address: </div>
        <div class="cell">
          {{ $customer->address }}
        </div>
      </div>
      
      <div class="row">
        <div class="cell">Credit card number: </div>
        <div class="cell">
          {{ $customer->cc_number }}
        </div>
      </div>
      <hr>
      <div class="row">
      <div class="row">
        <div class="cell">Order Type: </div>
        <div class="cell">
          {{ Form::select('order_type', $orderType, null) }}
        </div>
      </div>
      </div>
      <hr>
    </div>
    <h2 style="text-align:center" class="row">Add Items</h2>
    <div class="row">
      <div class="row">
        <div class="cell">Menu Item: </div>
        <div class="cell">
          {{ Form::select('items', [null => 'Please select item'] + $itemsList, null, ['class' => 'item_id', 'id' =>'item_id']) }}
        </div>
        <div class="cell">Quantity: </div>
        <div class="cell">
          <input type="text" id="item_qty" name="qty"  value="1" pattern="^[1-9]+$" title="Number only" style="width:30px" required/>
        </div>
        <div class="cell">Price: </div>
        <div class="cell">
          <input type="text" id="item_price" style="width:50px" disabled='true'/>
        </div>
        <div class="cell">
          <input type="button" id="add_item" class="btn" value= "Add Item"/>
        </div>
      </div>
      <hr>
      <div class="added_items">
        <span class="order_headings">NAME</span>
        <span class="order_headings">QUANTITY</span>
        <span class="order_headings">PRICE</span>
      </div>
      <div class="total_price_box">
        Total Price: $<span id="total_price"></span>
      </div>
      <hr>
      </div>
      <div class="row">
        {{ Form::submit('Place order', array('class' => 'btn btn-success', 'style' => 'margin:10px 0px 20px 510px')) }}
      </div>
    
  {{ Form::close() }}
</div>

<script>

var ajax_success = function(response) {
  $('#item_price').val(response[0].price);
}

$(function(){
    $('.item_id').change(function(e) {
        var response = [];
        response = fetchPrice(this.value, ajax_success);
    });
    
    $('#add_item').click(function() {
      if($('#item_id').val() === "") {
        alert("Please select an item");
      } else if (/^[0-9]+$/.test($("#item_qty").val()) === false ) {
        alert("Please enter a numerical quantity value");
      } else {
        var item_name = $("#item_id option:selected").text();
        var item_quantity = $("#item_qty").val();
        var item_price = $("#item_price").val();
        var item_name_div = '<div class="cell"><input type="text" name="item_name[]" class="no_input_border" value="'+item_name+'"/></div>';
        var item_quantity_div ='<div class="cell"><input type="text" name="item_quantity[]" class="no_input_border" value="'+item_quantity+'"/></div>';
        var item_price_div='<div class="cell"><input type="text" name="item_price[]" class="no_input_border" value="'+item_price+'"/></div>';
        $(".added_items").append('<div class="row">'+item_name_div+item_quantity_div+item_price_div+'</div>');
        update_total(item_quantity, item_price);
      }
    });
})

function update_total(qty, price) {
  var total = parseInt($('#total_price').text())
  if(isNaN(total)){
    total = 0;
  }
  total = total + (parseInt(qty) * parseInt(price));
  $('#total_price').text(total);
}

function checkItems() {
  if($('.added_items div').length === 0) {
    alert("No item selected, Please add an item");
    return false;
  }
  return true;
}

function fetchPrice(itemId, callback) {
     $.ajax({
        url: "/se-resturant/resturant/public/menu/fetchprice?id="+itemId,
        dataType: 'json',
        success: callback,
        error: function(e) {
            console.log(e);
        }
    });
}
</script>

@stop