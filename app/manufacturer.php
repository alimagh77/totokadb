<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manufacturer extends Model
{
    protected $table='manufacturers';

    protected $fillable = ['id','brand','name','realm','products','mobile','phone','size','description'];
}
