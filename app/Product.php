<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // 

    // public $tableName = "products";
    // public $primaryKey = "id";
    // public $timestamps = "false";

    // Cuando se trabaja con padrón Laravel. Se tienen que hacer esas 3 configuraciones

    public function users(){
        return $this->belongsTo('App\User');
    }

    
    
}
