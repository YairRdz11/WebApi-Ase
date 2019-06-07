<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\CatTipoAuditoria;

class TipoAuditoriaController extends Controller
{
    public function TipoAuditoria(){
        
        $tipoAuditoriaList = CatTipoAuditoria::where('ACTIVO', 1)->get();
        return response()->json($tipoAuditoriaList); 
    } 
}
