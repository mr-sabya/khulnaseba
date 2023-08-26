<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'degree',
        'designation',
        'hospital',
        'bmdc_no',
        'details',
        'image',
        'type_id',
        'district_id',
        'city_id'
    ];

    public function type()
    {
        return $this->belongsTo('App\Models\DoctorType', 'type_id');
    }

    public function district()
    {
        return $this->belongsTo('App\Models\District', 'district_id');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }

    public function chambers()
    {
        return $this->hasMany('App\Models\Chamber', 'doctor_id');
    }
}
