<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\VAuditoria;
use App\FondoXPlaneacion;

class AuditoriaController extends Controller
{
    public function Auditoria($refEnte, $ejercicio, $refRamoFondo, $refTipoAuditoria){
        $auditoria = VAuditoria::select('VAUDITORIAS.IDAUDITORIA')
            ->join('FONDOSXPLANEACION', 'FONDOSXPLANEACION.REFAUDITORIA', '=', 'VAUDITORIAS.IDAUDITORIA')
            ->join('RAMOSFONDOSAUDITABLES', 'RAMOSFONDOSAUDITABLES.IDRAMOFONDO', '=', 'FONDOSXPLANEACION.REFRAMOFONDO')
            ->where('VAUDITORIAS.REFENTE', $refEnte)
            ->where('VAUDITORIAS.PERIODOAUDITADO', $ejercicio)
            ->where('FONDOSXPLANEACION.REFRAMOFONDO', $refRamoFondo)
            ->where('VAUDITORIAS.REFTIPOAUDITORIA', $refTipoAuditoria)
            ->where('FONDOSXPLANEACION.ACTIVO', 1)
            ->get();

        return response()->json($auditoria); 
    }

    public function GetClaveAuditoria($auditoriaId){
        $auditoriaClave = FondoXPlaneacion::where('REFAUDITORIA ', $auditoriaId)
            ->get();
        return response()->json($auditoriaClave); 
    }
}
