<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Asistencia;

class Personal extends Model
{
    use HasFactory;

    protected $table="p2_personal";
    protected $guarded=['id'];

    public function TipoPersonal()
    {
        return $this->belongsTo(TipoPersonal::class, 'tipo_personal_id');
    }
    public function Horario()
    {
        return  $this->belongsTo(Horario::class,'horario_id' );
    }
    public function User()
    {
        return  $this->belongsTo(User::class,'user_id' );
    }
    public function Asistencia(){
        date_default_timezone_set("America/La_Paz");
        $hoy=new Carbon();
        $hoy=$hoy->format('Y-m-d');
        $asistencia=Asistencia::where('personal_id',$this->id)->where('fecha',$hoy)->get()->first();
        return $asistencia;
    }
    public function MarcarAsistencia() {
        date_default_timezone_set("America/La_Paz");
        $hoy=new Carbon();
        $asistencia=$this->Asistencia();
        $horario=$this->Horario;
        if ($asistencia){
            $asistencia->update([
                'hora_salida'=>$hoy->format('Y-m-d H:i:s'),
            ]);
        }else{
            $hora_ingreso=Carbon::createFromFormat('H:i:s', $horario->hora_ingreso);
            $hora_marcada=Carbon::createFromFormat('H:i:s', $hoy->format('H:i:s'));

            $asistencia=Asistencia::create([
                'fecha'=>$hoy->format('Y-m-d'),
                'hora_ingreso'=>$hoy->format('Y-m-d H:i:s'),
                'personal_id'=>$this->id,
                'retraso'=>($hora_marcada>$hora_ingreso)?$hora_marcada->diffInMinutes($hora_ingreso):0,
            ]);
        }
        return $asistencia;
    }
}
