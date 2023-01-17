<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    use HasFactory;
    protected $table="p2_paginas";
    protected $guarded=['id'];
    public $timestamps = false;

    public function contador($path){
        $pagina=Pagina::where('path',$path)->first();
        if ($pagina==null){
            $pagina=Pagina::create([
                'path' => $path,
                'visitas'=>1,
            ]);
        }else{
            $pagina->update([
                'visitas' =>$pagina->visitas+1
            ]);
        }
        return $pagina;
    }
}
