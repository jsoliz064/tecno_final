<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    protected $table="p1_permisos";
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded=['id'];
}
