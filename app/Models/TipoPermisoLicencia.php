<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPermisoLicencia extends Model
{
    use HasFactory;

    protected $table="p2_tipo_permisos_licencias";
    protected $guarded=['id'];

    protected $fillable = [
        'nombre',
        'tipo',
    ];
    public function PermisoLicencia()
    {
        return $this->hasMany(PermisoLicencia::class,'id_tipo');
    }
}
