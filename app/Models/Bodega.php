<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tblbodegas';
    protected $primaryKey = 'idBodega';
}
