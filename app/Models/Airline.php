<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
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
        'details',
        'image'
    ];

    public function countries()
    {
        return $this->belongsToMany('App\Models\Country');
    }

    public function get_country($id){
        $country = $this->countries()->where('id', $id)->count();

        if($country > 0){
            return true;
        }else{
            return false;
        }
    }
}
