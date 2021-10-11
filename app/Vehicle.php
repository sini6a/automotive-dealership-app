<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'make', 'model', 'licence_plate', 'link_url', 'picture_url', 'sold', 
    ];
}