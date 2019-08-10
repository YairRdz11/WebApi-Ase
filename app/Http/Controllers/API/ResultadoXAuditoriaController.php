<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\VResultadoXAuditoria;

class ResultadoXAuditoriaController extends Controller
{
    public function ResultadoXAuditoria($idAuditoria, $refProcedimiento){
        $resultadosXAuditoriaList = VResultadoXAuditoria::select('VRESULTADOXAUDITORIA.*', 
                                    DB::raw('(CASE WHEN RESULTADOADICIONAL.IDRESULTADOADICIONAL IS NOT NULL AND RESULTADOADICIONAL.IDRESULTADOADICIONAL <> 0 THEN \'Si\' ELSE \'No\' END) AS ARCHIVO'))
            ->leftJoin('RESULTADOADICIONAL', 'RESULTADOADICIONAL.REFRESULTADOXAUDITORIA', '=', 'VRESULTADOXAUDITORIA.IDRESULTADOAUDITORIA')
            ->where('REFAUDITORIA', $idAuditoria)
            ->where('REFPROCEDIMIENTO', $refProcedimiento)
            ->where('IDRESULTADOAUDITORIA', '>' ,0)
            ->get();

        return response()->json($resultadosXAuditoriaList); 
    }

    public function InsertaResultadoXAuditoria($idAuditoria, $refProcedimiento, Request $request){
        $resNoResult = DB::select('EXECUTE PROCEDURE RESULTADOOSIGUIENTE(?,?,?)',[$idAuditoria, $refProcedimiento, 'G']);
        $resNoResultProc = DB::select('EXECUTE PROCEDURE RESULTADOOSIGUIENTE(?,?,?)',[$idAuditoria, $refProcedimiento, 'P']);
        DB::select('EXECUTE PROCEDURE RESULTADOXAUDITORIA_I(?,?,?,?,?,?,?,?)',
            [$idAuditoria, $refProcedimiento, $resNoResult[0]->SIGUIENTE, $resNoResultProc[0]->SIGUIENTE,$request->observacion, 
            $request->descripcion, $request->fundamentos,  '']);

        response()->json(['success' => 'success'], 200);
    }

    public function ActualizadoResultadoXAuditoria($idResultado, Request $request){
        $resultado = VResultadoXAuditoria::where('IDRESULTADOAUDITORIA',$idResultado)->get();

        DB::select('EXECUTE PROCEDURE RESULTADOXAUDITORIA_A(?,?,?,?,?,?,?, ?,?)',
            [$idResultado, $resultado[0]->REFAUDITORIA, $resultado[0]->REFPROCEDIMIENTO, $resultado[0]->NUMRESULTADO,
            $request->observacion, $request->descripcion, 1, $request->fundamentos, '']);

        response()->json(['success' => 'success'], 200);
    }

    public function InsertaResultadoAdicional($idResultado, Request $request){
        $blob = $request->ARCHIVO;
       
        $file = base64_encode(file_get_contents($blob->getRealPath()));
        // $fd = fopen($blob, 'r');
        // $file = stream_get_contents($fd, -1, 10);
        // fclose($fd);
        $nameFile = $blob->getClientOriginalName();
        DB::select('EXECUTE PROCEDURE RESULTADOADICIONAL_I(?,?,?)',
            [$idResultado, $nameFile, $file]);

        response()->json(['success' => 'success'], 200);
    }


    public function GetResultadoXId($idResultado){
        $resultadoXAuditoria = VResultadoXAuditoria::where('IDRESULTADOAUDITORIA', $idResultado)->get();

        return response()->json($resultadoXAuditoria); 
    }
}
