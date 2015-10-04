<?php

class Order extends Eloquent {
    
     function customer() {
        return $this->hasMany('Customer', 'id', 'customer_id');
    }
}