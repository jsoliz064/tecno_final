<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoLicencia extends Model
{
    use HasFactory;

    protected $table="p2_permisos_licencias";
    protected $guarded=['id'];
}
