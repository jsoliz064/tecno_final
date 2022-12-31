<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoLicencia extends Model
{
    use HasFactory;

    protected $table="p1_permisos_licencias";
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded=['id'];
}
