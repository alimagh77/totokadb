<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suggest extends Model
{
    protected $table='suggests';

    protected $fillable = ['id','file','year','month','day','single','set','box','desc'];
}
