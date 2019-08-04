<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class send extends Model
{
    protected $table='sends';

    protected $fillable = ['id','file','year','month','day','price','desc'];
}
