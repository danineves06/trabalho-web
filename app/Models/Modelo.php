<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modelo extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function carro(){
        return $this->hasMany('App\Models\Carro');
    }
    public function marca(){
        return $this->beLongsTo('App\Models\Marca');
    }
}
