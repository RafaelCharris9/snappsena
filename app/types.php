<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class types extends Model
{
    protected $fillable = ['name', 'description'];
    public function novelties ()
    {
        return  $this->hasMany('App\novelties');
    }

}