<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class req extends Model
{
    protected $table='requests';

    protected $fillable = ['id','file','year','month','day','price','desc'];
}
