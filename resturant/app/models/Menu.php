<?php

class Menu extends Eloquent {
    
    function orderitems()
    {
        return $this->belongsToMany('OrderItem','menu_id');
    }
}