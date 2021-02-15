<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name', 'description', 'value',
    ];

    public function getTotal($quantity)
    {
        return $this->value * $quantity;
    }
}
