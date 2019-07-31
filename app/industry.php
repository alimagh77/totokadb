<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class industry extends Model
{
    protected $table='industries';

    protected $fillable = ['id','name'];
}
