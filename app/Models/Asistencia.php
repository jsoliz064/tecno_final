<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    protected $table="p1_asistencias";
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded=['id'];
}
