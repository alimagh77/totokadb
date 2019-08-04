<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class price extends Model
{
    protected $table='prices';

    protected $fillable = ['id','file','year','month','day','price','desc'];
}
