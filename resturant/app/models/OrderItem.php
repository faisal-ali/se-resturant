<?php

class OrderItem extends Eloquent {
    
    function menus() {
        return $this->hasMany('Menu', 'id', 'menu_id');
    }
}