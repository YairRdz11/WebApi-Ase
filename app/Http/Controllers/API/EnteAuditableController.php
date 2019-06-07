<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\VEnteAuditable;

class EnteAuditableController extends Controller
{
    public function EnteAuditable($refCtaPublica){
        $enteAuditableList = VEnteAuditable::where('ACTIVO', 1)
            ->where('REFCTAPUBLICA', $refCtaPublica)
            ->get();
        return response()->json($enteAuditableList); 
    }
}
