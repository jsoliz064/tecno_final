<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $table="p1_archivos";
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded=['id'];

    public function Personal(){
        return $this->belongsTo(Personal::class,'personal_id');
    }
}
