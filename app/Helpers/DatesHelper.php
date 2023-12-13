<?php

namespace App\Helpers;

use Carbon\Carbon;
use DateTime;

class DatesHelper
{
    /**
     *Devuelve en forma de array, la fecha en español (dia de la semana y mes)
     */
    public static function toSpanishDate($date=null){

        if($date){
            $diaSemana=Carbon::parse($date)->formatLocalized('%A');
            $mes=Carbon::parse($date)->formatLocalized('%B');
            $diaNum=Carbon::parse($date)->formatLocalized('%d');
            $anio = Carbon::parse($date)->formatLocalized('%Y');
        }else{
            $diaSemana=Carbon::now()->formatLocalized('%A');
            $mes=Carbon::now()->formatLocalized('%B');
            $diaNum=getdate()['mday'];
            $anio = Carbon::now()->formatLocalized('%Y');
        }
        return [$diaSemana,$mes,$diaNum,$anio];
    }

    /**
     * Parsea una fecha dada o la actual al formato europeo, dd-mm-YYYY H:i:s
     */
    public static function toEuFormat($date=null){
        if($date){
            return Carbon::parse($date)->format('d-m-Y H:i:s');
        }else{
            return Carbon::now()->format('d-m-Y H:i:s');
        }
    }
}
