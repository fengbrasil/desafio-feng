<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'date', 'items',
    ];

    protected $casts = [
        'items' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTotal()
    {
        return collect($this->items)->reduce(function ($carry, $item) {
            $itemTotal = Item::find($item['item'])->value * $item['quantity'];

            return $carry + $itemTotal;
        });
    }
}
