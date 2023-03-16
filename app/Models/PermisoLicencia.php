<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoLicencia extends Model
{
    use HasFactory;

    protected $table="p2_permisos_licencias";
    protected $guarded=['id'];
    protected $fillable = [
        'fecha',
        'documento',
        'dias_habiles',
        'fecha_inicio',
        'fecha_fin',
        'id_personal',
        'id_tipo',
    ];
    public function Personal(){
        return $this->belongsTo(Personal::class,'id_personal');
    }
    public function TipoPermisoLicencia(){
        return $this->belongsTo(TipoPermisoLicencia::class,'id_tipo');
    }
}
