<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagina;
use App\Models\Personal;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $paginass=Pagina::all();
        $total=$paginass->sum('visitas');

        $personal=Personal::selectRaw('p2_personal.nombre , SUM(p2_asistencias.retraso) as retraso')
        ->join('p2_asistencias','p2_personal.id','p2_asistencias.personal_id')
        ->groupBy('p2_personal.nombre')
        ->get();
        return view('home',compact('paginass','total','personal'));
    }
}
