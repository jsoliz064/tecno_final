<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use Carbon\Carbon;
use Illuminate\Http\Response;

class AsistenciaController extends Controller
{
    public function index(){
        date_default_timezone_set("America/La_Paz");
        $hoy=new Carbon();
        $hoy=$hoy->format('Y-m-d');
        $personal=Personal::where('horario_id','<>',null)->get();
        return view('asistencias.index',compact('personal','hoy'));
    }
    public function marcar($id){
        $personal=Personal::find($id);
        if ($personal){
            $asistencia=$personal->MarcarAsistencia();
            return response()->json($asistencia, Response::HTTP_OK); 
        }else{
            return response()->json(['asistencia'=>[]], Response::HTTP_NOT_FOUND); 
        }
    }
}
