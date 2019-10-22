<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class novelties extends Model
{
    protected $fillable = [
        'user_id', 
        'type_id', 
        'subarea_id',
        'category_id',
        'status', 
        'description'];
    public function type()
    {
        return $this->belongsTo('App\types');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function ambient()
    {
        return $this->belongsTo('App\subareas');
    }
    public function category()
    {
        return $this->belongsTo('App\novelties');
    }
}