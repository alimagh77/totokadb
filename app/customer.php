<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table='customers';

    protected $fillable = ['id','name','birthDate','address','job','mobile','phone','description'];
}
