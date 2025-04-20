<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusRoute extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];
    

    public function buses()
    {
        return $this->belongsToMany('App\Models\Bus');
    }


    public function get_bus($id){
        $bus = $this->buses()->where('id', $id)->count();

        if($bus > 0){
            return true;
        }else{
            return false;
        }
    }
}
