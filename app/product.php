<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table='products';

    protected $fillable = ['id','category','categoryDetails','manufacturers','details','color','description','image','quality','value','use','pack','valueEco','ability','capacity','supplies'];

}
