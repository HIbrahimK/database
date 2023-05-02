<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Okullar extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Okullar(){
        return $this->hasOne(Okullar::class, 'id','okullar_id');
    }
}
