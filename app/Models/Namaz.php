<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Namaz extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hijri_date',
        'date',
        'division_id',
        'tahajjud',
        'fojr',
        'sun_rise',
        'ishraq',
        'noon',
        'johor',
        'asor',
        'sun_set',
        'magrib',
        'isha'
    ];

    public function division()
    {
        return $this->belongsTo('App\Models\Division', 'division_id');    
    }
}