<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaneTicket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'route_id',
        'airplane_id',
        'business_price',
        'economic_price',
        'air_time'
    ];

    public function route()
    {
        return $this->belongsTo('App\Models\PlaneRoute', 'route_id');
    }

    public function airline()
    {
        return $this->belongsTo('App\Models\Airline', 'airplane_id');
    }

    public function counters()
    {
        return $this->belongsToMany('App\Models\PlaneCounter');
    }

    public function get_counter($id){
        $counter = $this->counters()->where('id', $id)->count();

        if($counter > 0){
            return true;
        }else{
            return false;
        }
    }
}
