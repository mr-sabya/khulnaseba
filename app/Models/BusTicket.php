<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusTicket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'route_id',
        'bus_id',
        'type_id',
        'counter_id',
        'price'
    ];

    public function route(){
        return $this->belongsTo('App\Models\BusRoute', 'route_id');
    }

    public function bus(){
        return $this->belongsTo('App\Models\Bus', 'bus_id');
    }

    public function type(){
        return $this->belongsTo('App\Models\BusType', 'type_id');
    }

    public function counter(){
        return $this->belongsTo('App\Models\BusCounter', 'counter_id');
    }
}
