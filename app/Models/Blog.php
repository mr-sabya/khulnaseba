<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
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
        'image',
        'blog',
        'user_id',
        'tags',
        'meta_description',
        'view',
    ];

    public function blogCategory()
    {
    	return $this->belongsTo('App\Models\BlogCategory', 'category_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'user_id');
    }
}
