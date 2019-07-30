<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $table='articles';

    protected $fillable = ['id','title','keys','explain','file','description'];
}
