<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPermisoLicencia extends Model
{
    use HasFactory;

    protected $table="p1_tipo_permiso_licencia";
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded=['id'];
}
