<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use Carbon\Carbon;

class AsistenciaController extends Controller
{
    public function index(){
        date_default_timezone_set("America/La_Paz");
        $hoy=new Carbon();
        $hoy=$hoy->format('Y-m-d');
        $personal=Personal::all();
        return view('asistencias.index',compact('personal','hoy'));
    }
}
