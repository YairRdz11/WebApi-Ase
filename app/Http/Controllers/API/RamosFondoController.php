<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\VRamosFondo;

class RamosFondoController extends Controller
{
    public function RamosFondo($refCtaPublica, $refTipoAuditoria){
        $ramosFondoList = VRamosFondo::where('ACTIVO', 1)
            ->where('REFCTAPUBLICA', $refCtaPublica)
            ->where('VISIBLEOBRAS', 1)
            ->where('REFTIPOAUDITORIA', $refTipoAuditoria)
            ->get();
        return response()->json($ramosFondoList); 
    }
}
