<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carro extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function cor(){
        return $this->belongsTo('App\Models\Cor');
    }
    public function modelo(){
        return $this->belongsTo('App\Models\Modelo');
    }
    public function estado(){
        return $this->belongsTo('App\Models\Estado');
    }
}
