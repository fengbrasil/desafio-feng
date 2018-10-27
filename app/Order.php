<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['dt_order','client_id'];
    protected $dates = ['dt_order'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot('amount');
    }

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }
}
