<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\VResultadoXAuditoria;

class ResultadoXAuditoriaController extends Controller
{
    public function ResultadoXAuditoria($idAuditoria, $refProcedimiento){
        $resultadosXAuditoriaList = VResultadoXAuditoria::where('REFAUDITORIA', $idAuditoria)
            ->where('REFPROCEDIMIENTO', $refProcedimiento)
            ->where('IDRESULTADOAUDITORIA', '>' ,0)
            ->get();

        return response()->json($resultadosXAuditoriaList); 
    }
}
