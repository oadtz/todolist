<?php

namespace App;

class RoomType extends Model {
    protected $collection = 'room_type';
    protected $fillable = ['name', 'rate', 'inventory'];
    protected $casts = [
        'rate'          =>  'float',
        'inventory'     =>  'int'
    ];
}