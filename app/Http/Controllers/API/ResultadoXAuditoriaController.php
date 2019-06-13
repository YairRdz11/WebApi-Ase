<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
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

    public function InsertaResultadoXAuditoria($idAuditoria, $refProcedimiento, Request $request){
        $resNoResult = DB::select('EXECUTE PROCEDURE RESULTADOOSIGUIENTE(?,?,?)',[$idAuditoria, $refProcedimiento, 'G']);
        $resNoResultProc = DB::select('EXECUTE PROCEDURE RESULTADOOSIGUIENTE(?,?,?)',[$idAuditoria, $refProcedimiento, 'P']);
        DB::select('EXECUTE PROCEDURE RESULTADOXAUDITORIA_I(?,?,?,?,?,?,?)',
            [$idAuditoria, $refProcedimiento, $resNoResult[0]->SIGUIENTE, $resNoResultProc[0]->SIGUIENTE,$request->observacion, $request->descripcion, $request->fundamentos]);

        return response()->Ok(); 
    }
}
