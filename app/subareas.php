<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subareas extends Model
{
    protected $fillable = ['name', 'code', 'description', 'area_id'];
    public function area ()
    {
        return  $this->belongsTo('App\Area');
    }
    public function novelties ()
    {
        return $this->hasMany('App\novelties');
    }

}