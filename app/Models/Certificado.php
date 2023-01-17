<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    use HasFactory;

    protected $table="p2_certificados";
    protected $guarded=['id'];

    public function Personal(){
        return $this->belongsTo(Personal::class,'personal_id');
    }
}
