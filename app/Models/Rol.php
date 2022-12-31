<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table="p1_roles";
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded=['id'];
}
