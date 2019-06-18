<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use JWTFactory;
use App\User;
use JWTAuthException;

use DB;
use App\PERSONAL;

class UserController extends Controller
{

    public function login(Request $request){
        $res = DB::select('EXECUTE PROCEDURE USUARIOVALIDO(?,?,?,?)',
            [$request->usuario, $request->contrasena, 30, 'WEB']);
        if($res > 0){ 
           
            $personal = PERSONAL::where('IDPERSONAL',$res[0]->PIDPERSONAL)->get();
            // add a custom claim with a key of `foo` and a value of ['bar' => 'baz']
            $payload = JWTFactory::sub($personal[0]->IDPERSONAL)->aud('personal')->personal(['IDPERSONAL' => $personal[0]->IDPERSONAL], 
                ['NOMBRECORTO' => $personal[0]->NOMBRECORTO], ['IDPUESTO' => $personal[0]->IDPUESTO], 
                ['IDAREA' => $personal[0]->IDAREA])->make();

            $token = JWTAuth::encode($payload);
            // all good so return the token
            return ['HTTP_Authorization' => "Bearer {$token}"];
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }

    public function getAuthUser(Request $request){
        //$user = JWTAuth::toUser($request->token);
        return response()->json();
    }

    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    // public function login(){ 
    //     $res = DB::select('EXECUTE PROCEDURE USUARIOVALIDO(?,?,?,?)',['HSCHULZ', '2343', 30, 'WEB']);
    //     if($res > 0){ 
    //         // $user = Auth::user(); 
    //         // $success['token'] =  $user->createToken('MyApp')-> accessToken; 
    //         return response()->json(PERSONAL::where('IDPERSONAL',$res[0]->PIDPERSONAL)->get()); 
    //     } 
    //     else{ 
    //         return response()->json(['error'=>'Unauthorised'], 401); 
    //     } 
    // }
}