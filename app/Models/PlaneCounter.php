<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaneCounter extends Model
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
    
    public function airlines()
    {
        return $this->belongsToMany('App\Models\Airline', 'airline_plane_counter', 'counter_id');
    }

    public function get_airline($id){
        $airline = $this->airlines()->where('id', $id)->count();

        if($airline > 0){
            return true;
        }else{
            return false;
        }
    }
}
