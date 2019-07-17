<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuditoriaController extends Controller
{
    public function Auditoria($refEnte, $ejercicio, $refRamoFondo, $refTipoAuditoria){
        $auditoria = VAuditoria::where('REFENTE ', $refEnte)
            ->where('PERIODOAUDITADO ', $ejercicio)
            ->where('REFRAMOFONDO ', $refRamoFondo)
            ->where('REFTIPOAUDITORIA ', $refTipoAuditoria)
            ->where('ACTIVO  ', 1)
            ->get();

        return response()->json($auditoria); 
    }
}
