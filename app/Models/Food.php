<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'image',
    ];

    /**
     * The foods that belong to the restaurant.
     */
    public function restaurants()
    {
        return $this->belongsToMany('App\Models\Restaurant');
    }
}
