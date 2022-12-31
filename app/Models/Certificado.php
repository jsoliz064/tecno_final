<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    use HasFactory;

    protected $table="p1_certificados";
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded=['id'];
}
