<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kullanici extends Model
{
    use SoftDeletes;
    protected $table="kullanici";
    protected $fillable=['isim','yas'];
}
