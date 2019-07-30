<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class meeting extends Model
{
    protected $table='meetings';

    protected $fillable = ['id','topic','keyPoints','date','members','image','file','description'];
}
