<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Police extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'designation',
        'phone',
        'thana_id',
    ];

    public function thana()
    {
    	return $this->belongsTo('App\Models\Thana', 'thana_id');
    }
}
