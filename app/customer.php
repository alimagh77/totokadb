<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table='customers';

    protected $fillable = ['id','name','address','job','phone','description','pos','use'];
}
