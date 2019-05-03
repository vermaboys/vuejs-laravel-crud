<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableInfo extends Model
{
    protected $table='tableinfo';
    protected $fillable=['first_name','last_name','age','city','country'];
}
