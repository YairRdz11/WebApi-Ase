<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use DB;
use App\PERSONAL;

class UserController extends Controller
{
    public $successStatus = 200;

    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 
        $res = DB::select('EXECUTE PROCEDURE USUARIOVALIDO(?,?,?,?)',['HSCHULZ', '2343', 30, 'WEB']);
        if($res > 0){ 
            // $user = Auth::user(); 
            // $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(PERSONAL::where('IDPERSONAL',$res[0]->PIDPERSONAL)->get()); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
}