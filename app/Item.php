<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {
    protected $table = "item";
    
    public function pedidos(){
        return $this->hasOne("App\Pedidos", "item_id", "id");
    }
}
