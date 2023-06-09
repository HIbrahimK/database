<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    protected $guarded=[];
    use SoftDeletes;
    public function Student(){
        return $this->hasOne(Student::class, 'id','okullar_id');
    }
}
