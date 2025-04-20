<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thana extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'category_id',
        'phone',
        'address',
        'district_id',
    ];

    public function district()
    {
    	return $this->belongsTo('App\Models\District', 'district_id');
    }

    public function category()
    {
    	return $this->belongsTo('App\Models\ThanaCategory', 'category_id');
    }
}
