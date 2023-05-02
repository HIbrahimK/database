<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    use HasFactory;
    public function Town(){
        return $this->hasOne(Town::class, 'id','state_id');
    }


}
