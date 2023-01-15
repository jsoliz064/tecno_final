<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionDesempeno extends Model
{
    use HasFactory;

    protected $table="p2_evalucacion_desempeno";
    protected $guarded=['id'];
}
