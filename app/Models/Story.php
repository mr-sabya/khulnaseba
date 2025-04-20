<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
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
        'details',
        'category_id',
        'writer',
        'image',
        'reference',
    ];

    public function storyCategory()
    {
    	return $this->belongsTo('App\Models\StoryCategory', 'category_id');
    }
}
