<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellVehicle extends Model
{
    protected $fillable = [
        'name', 'telephone_number', 'e_mail', 'licence_plate', 'mileage', 'equipment_and_accessories', 'condition', 'exterior_1_url', 'exterior_2_url', 'interior_1_url', 'interior_2_url', 'service_book_url', 'summer_wheels_url', 'winter_wheels_url', 'opened',
    ];
}