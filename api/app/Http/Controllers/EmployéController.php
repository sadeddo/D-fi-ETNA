<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employé;

class EmployeéController extends Controller
{
    function Authentification(Request $request) {
        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'password' => 'required'
        ]);
        //si les infos ne correspondent pas afficher le message d'erreur
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }
        $Employé = Employé::all()->where('login', $request->login)->first();
        if ($Employé) {
            if (Hash::check($request->password, $Employé->password)) {
                return response("vous etes connectee",200);
            } else {
                return response("login ou le mot de passe est incorrect, veuillez reessayer.",400);
            }
        }
        else {
            return response("login ou le mot de passe est incorrect, veuillez reessayer.",400);
        }
    }
};

