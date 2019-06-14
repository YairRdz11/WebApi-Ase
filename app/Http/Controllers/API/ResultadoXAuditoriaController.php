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
            [$idAuditoria, $refProcedimiento, $resNoResult[0]->SIGUIENTE, $resNoResultProc[0]->SIGUIENTE,$request->observacion, 
            $request->descripcion, $request->fundamentos]);

        response()->json(['success' => 'success'], 200);
    }

    public function ActualizadoResultadoXAuditoria($idResultado, Request $request){
        $resultado = VResultadoXAuditoria::where('IDRESULTADOAUDITORIA',$idResultado)->get();

        DB::select('EXECUTE PROCEDURE RESULTADOXAUDITORIA_A(?,?,?,?,?,?,?, ?)',
            [$idResultado, $resultado[0]->REFAUDITORIA, $resultado[0]->REFPROCEDIMIENTO, $resultado[0]->NUMRESULTADO,
            $request->observacion, $request->descripcion, 1, $request->fundamentos]);

        response()->json(['success' => 'success'], 200);
    }

    public function InsertaResultadoAdicional($idResultado, Request $request){
        $blob = $request->ARCHIVO;
        $file = base64_encode(file_get_contents($blob->getRealPath()));
        $nameFile = $blob->getClientOriginalName();
        DB::select('EXECUTE PROCEDURE RESULTADOADICIONAL_I(?,?,?)',
            [$idResultado, $nameFile, $file]);

        response()->json(['success' => 'success'], 200);
    }
}
