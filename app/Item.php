<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name','description','vl_unitary'];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
