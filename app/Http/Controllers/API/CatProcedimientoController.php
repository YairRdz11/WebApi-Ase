<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\VCatProcedimiento;

class CatProcedimientoController extends Controller
{
    public function CatProcedimiento($refRamoFondo, $ejercicio){
        $catProcedimientoList = VCatProcedimiento::where('NIVEL', 1)
            ->where('REFRAMOFONDO', $refRamoFondo)
            ->where('ACTIVO', 'S')
            ->where('EJERCICIO', $ejercicio)
            ->get();

        return response()->json($catProcedimientoList); 
    }

    public function CatProcedimientoNivel2($refRamoFondo, $ejercicio, $refProcedimiento){
        $catProcedimientoList = VCatProcedimiento::where('NIVEL', 2)
            ->where('REFRAMOFONDO', $refRamoFondo)
            ->where('ACTIVO', 'S')
            ->where('REFCATPROCEDIMIENTO', $refProcedimiento)
            ->where('EJERCICIO', $ejercicio)
            ->get();

        return response()->json($catProcedimientoList); 
    }

    public function CatProcedimientoNivel3($refRamoFondo, $ejercicio, $refProcedimiento){
        $catProcedimientoList = VCatProcedimiento::where('NIVEL', 3)
            ->where('REFRAMOFONDO', $refRamoFondo)
            ->where('ACTIVO', 'S')
            ->where('REFCATPROCEDIMIENTO', $refProcedimiento)
            ->where('EJERCICIO', $ejercicio)
            ->get();

        return response()->json($catProcedimientoList); 
    }
}
