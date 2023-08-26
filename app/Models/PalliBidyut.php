<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PalliBidyut extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'address',
        'district_id',
        'city_id',
    ];

    public function district()
    {
    	return $this->belongsTo('App\Models\District', 'district_id');
    }

    public function city()
    {
    	return $this->belongsTo('App\Models\City', 'city_id');
    }
}
