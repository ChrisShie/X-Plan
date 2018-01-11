<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
        'description',
        'thumbnail',
        'image1',
        'image2',
        'image3'
    ];
    public function destination()
    {
        return $this->hasMany(Destination::class);
    }
}
