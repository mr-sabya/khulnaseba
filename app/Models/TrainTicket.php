<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainTicket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'route_id',
        'train_id',
        'class_id',
        'amount'
    ];

    public function trainRoute() {
        return $this->belongsTo('App\Models\TrainRoute', 'route_id');
    }
    public function trainClass() {
        return $this->belongsTo('App\Models\TrainClass', 'class_id');
    }
    public function train() {
        return $this->belongsTo('App\Models\Train', 'train_id');
    }
}
