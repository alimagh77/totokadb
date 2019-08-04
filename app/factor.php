<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class factor extends Model
{
    protected $table='factors';

    protected $fillable = ['id','file','year','month','day','side','without','amount','desc'];
}
