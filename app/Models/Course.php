<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
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
        'category_id',
        'type',
        'image',
        'details',
        'short_desc',
        'price'
    ];

    public function category()
    {
    	return $this->belongsTo('App\Models\CourseCategory', 'category_id');
    }
}
