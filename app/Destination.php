<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
        'name',
        'description',
        'city_id',
        'category',
        'all_day',
        'open_hour',
        'close_hour',
        'estimate_cost',
        'rate_value',
        'rate_by',
        'scheduled_value',
        'thumbnail',
        'image1',
        'image2',
        'image3'
    ];
}
