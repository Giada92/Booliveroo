<?php

namespace App;
use App\Plate;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function Plates(){
        return $this->belongsToMany('App\Plate');
    }
}
