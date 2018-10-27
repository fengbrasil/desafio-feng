<?php
/**
 * Created by PhpStorm.
 * User: pvstelles
 * Date: 27/10/2018
 * Time: 01:33
 */

namespace App\Filters;



use Carbon\Carbon;
use Faker\Provider\DateTime;

class OrderFilter extends Filters
{
    protected $filters = ['startAt', 'endAt','by','vlMin'];

    /**
     * @param $username
     * @return mixed
     */
    public function startAt($dt)
    {
        if(isset($dt)){
            $dt = Carbon::instance(new \DateTime($dt));
            return $this->builder->where('dt_order','>=', $dt);
        }
    }

    public function endAt($dt)
    {
        if(isset($dt)){
            $dt = Carbon::instance(new \DateTime($dt));
            return $this->builder->where('dt_order','<=', $dt);
        }
    }

    public function by($name)
    {
        return $this->builder->whereHas('client',function($query) use ($name){
            return $query->where('name','like','%' . $name . '%');
        });
    }

    public function vlMin($vl)
    {
        if(isset($vl)){
            $vl = floatval($vl);
            return $this->builder->where(function($q) use ($vl) {
                $q->whereHas('items', function ($query) use ($vl) {
                    return $query->groupBy('items.id')->havingRaw('SUM(vl_unitary*item_order.amount) >= ?', [$vl]);
                    });
                    if(!$vl > 0) {
                        $q->orWhereDoesntHave('items');
                        
                    }
                });
            }

    }
}