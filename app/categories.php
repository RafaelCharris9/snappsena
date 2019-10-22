<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $fillable = ['name', 'icon', 'description'];
    public function novelties()
    {
        return $this->hasMany('App\novelties');
    }

}