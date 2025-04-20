<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristPlace extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'address',
        'phone',
        'type_id',
        'image',
        'district_id',
    ];

    public function placeType()
    {
    	return $this->belongsTo('App\Models\PlaceType', 'type_id');
    }

    public function district()
    {
    	return $this->belongsTo('App\Models\District', 'district_id');
    }
}
