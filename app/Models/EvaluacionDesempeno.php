<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionDesempeno extends Model
{
    use HasFactory;

    protected $table="p1_evalucacion_desempeño";
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded=['id'];
}
