<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tech extends Model
{
    protected $table='techs';

    protected $fillable = ['id','name'];
}
