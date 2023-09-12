<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
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
        'email',
        'father_name',
        'mother_name',
        'n_id',
        'address',
        'short_bio',
        'blood_id',
        'image',
        'is_active',
        'district_id',
        'city_id'
    ];


    public function bloodGroup()
    {
    	return $this->belongsTo('App\Models\Blood', 'blood_id');
    }

    public function district()
    {
    	return $this->belongsTo('App\Models\District', 'district_id');
    }

    public function city()
    {
    	return $this->belongsTo('App\Models\City', 'city_id');
    }
}
