<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journalist extends Model
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
        'media',
        'category_id',
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

    public function category()
    {
    	return $this->belongsTo('App\Models\JournalistCategory', 'category_id');
    }
}
