<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VPersonalXAuditoria;
use App\VPersonalXEjercicio;
use App\VCatCtaPublica;

class PublicAccountController extends Controller
{
    public function PublicAccount($idPersonal, $periodo){
        $res = VPersonalXAuditoria::select( 'VPERSONALXAUDITORIA.REFPERSONAL', 'VPERSONALXAUDITORIA.NOMBRECOMPLETO', 
                                            'ENTESAUDITABLES.REFCTAPUBLICA', 'AUDITORIAS.TIPO', 'AUDITORIAS.REFTIPOAUDITORIA')
        ->join('AUDITORIAS', 'AUDITORIAS.IDAUDITORIA', '=', 'VPERSONALXAUDITORIA.REFAUDITORIA')
        ->join('ENTESAUDITABLES', 'ENTESAUDITABLES.IDENTE', '=', 'AUDITORIAS.REFENTE')
        ->where('REFPERSONAL', $idPersonal)
        ->where('PERIODOAUDITADO', $periodo)
        ->get();
        $array = [];
        if($res->IsEmpty()){
            $res = VPersonalXEjercicio::where('EJERCICIO', $periodo)
                ->where('REFPERSONAL', $idPersonal);
            foreach ($res as &$item) {
                array_push($array, VCatCtaPublica::where('IDCTAPUBLICA',$item['TIPOCTAPUBLICA'])->get());
            }
        }
        else{
            $res = $res->unique();
            foreach ($res as &$item) {
                array_push($array, VCatCtaPublica::where('IDCTAPUBLICA',$item['REFCTAPUBLICA'])->get());
            }
        }
        //TODO: Revisar cuando el usuario es administrador con conchita!!!
        return response()->json($array); 
    } 
}
