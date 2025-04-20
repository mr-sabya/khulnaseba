<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newspaper extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'link',
        'image',
        'open_website',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\NewspaperCategory', 'category_id');
    }
}
