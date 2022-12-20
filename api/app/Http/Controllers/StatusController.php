<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    function Register(Request $request) {
        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'status' ,
            'justification',
        ]);
        //si les informations demandées ne sont pas correctement entrées afficher un message d'erreur
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }
        //verifie si l'email n'est pas unique
        $Unique = Etudiant::all()->where('login', $request->login)->first(); 
        //s'il n'est pas "pas unique" enregistrer les information dans la base de donnée sinon afficher un message d'erreur
        if (!$Unique){
            $Etudiant = new Etudiant();
            $Etudiant-> login = $request->login;
            $Etudiant-> time = date('y-m-d h:i:s');
            $Etudiant-> status = $request->status;
            $Etudiant-> justification = $request->justification;
            $Etudiant->save();
            return response("Vous etes bien inscrit",201);
        } else {
            return response("Ce nom d'utilisateur ou cette adresse mail existe deja.",400);
        }
    }
}
