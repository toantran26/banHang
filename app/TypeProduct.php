<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    protected $table='type_products';
    protected $primaryKey='id';
    public $timestamps = false;
}
