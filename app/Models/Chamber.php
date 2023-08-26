<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamber extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'doctor_id',
        'hospital_id',
        'time',
        'phone_1',
        'phone_2'
    ];


    public function hospital()
    {
    	return $this->belongsTo('App\Models\Hospital', 'hospital_id');
    }
}
