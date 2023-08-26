<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessIdea extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'type_id',
        'details',
        'short_description',
        'image',
    ];

    public function businessType()
    {
    	return $this->belongsTo('App\Models\BusinessType', 'type_id');
    }

}
