<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $table="p2_personal";
    protected $guarded=['id'];

    public function TipoPersonal()
    {
        return $this->belongsTo(TipoPersonal::class, 'tipo_personal_id');
    }
}
