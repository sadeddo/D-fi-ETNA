<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Historique;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EtudiantController extends Controller
{
    //permettre a l'utilsateur de s'inscrire 
    function Register(Request $request) {
        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'status' ,
            'id' => 'required',
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
            $Etudiant-> id = $request->id;
            $Etudiant-> justification = $request->justification;
            $Etudiant->save();
            return response("Vous etes bien inscrit",201);
        } else {
            return response("Ce login existe deja.",400);
        }
    }


    public function edit_function($id){
        $etudiant = DB::select('select * from etudiants where id = ?',[$id]);
        return view('admin',['etudiants'=>$etudiant]);
    }

    public function index3(Request $request){
        $historiques=Historique::all()->where("login","$request->login");
        return view('etudiant',['historiques'=>$historiques]);
    }


    public function justification( Request $request, $id) {
        $historiques = Historique::findOrFail($id);
        $historiques->justification = $request->input('justification');
        $historiques->save();
        //dd('justification');
        return back();
        
    }

    public function changeStatus(Request $request, $id)
    {
         //récupérer l'id du restaurant
        $etudiant= Etudiant::find($id);
        $validator = Validator::make($request->all(), [
            'status' => 'nullable',
        ]);
        //si les informations demander ne sont pas correctement entré afficher un message d'erreur
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }
            
        //sinon modifier les informations souhaité
        else {
            if ($request->status)

                $etudiant-> status = $request->status;
            $etudiant->save();
            return response($etudiant,200);;
        }
    }

    function show() {
        $Etudiants = Etudiant::all();
        return view('admin', ['etudiants'=>$Etudiants]);
    }

    function getEtudiants() {
        $Etudiants = Etudiant::all();
        return response()->json($Etudiants, 200);
    }
    function getAbsent() {
        $Etudiants = Etudiant::all()->where("status","absent");
        return response()->json($Etudiants, 200);
    }
    function getPresent() {
        $Etudiants = Etudiant::all()->where("status","present");
        return response()->json($Etudiants, 200);
    }
    function getRetard() {
        $Etudiants = Etudiant::all()->where("status","retard");
        return response()->json($Etudiants, 200);
    }
    function search(){
    $q = request()->input('q');
    $Etudiants = Etudiant::where('login','like',"%$q%")
            ->orWhere('time','like',"%$q%")
            ->paginate(6);
    
            return view('admin', ['etudiants'=>$Etudiants]);
}
}

 








    //permettre a l'utilsateur de s'inscrire 
/*function Register(Request $request) {
        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'justification',
        ]);
        //si les informations demandées ne sont pas correctement entrées afficher un message d'erreur
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }
            $dateP = ("09:10:00");
            $dateR = ("10:00:00");
            $dateA = ("14:30:00");
            $datePa = ("17:15:00");
            $dateP2a = ("16:45:00");

            $Etudiant = new Etudiant();
            $Etudiant-> login = $request->login;
            $Etudiant-> time = date("H:i:s");
            if ($Etudiant->time < $dateP) {
                $Etudiant-> status = "present-matin";
            }elseif ($Etudiant->time > $dateP && $Etudiant->time < $dateR){
                $Etudiant-> status = "retard";
            }
            elseif ($Etudiant -> time < $datePa && $Etudiant-> time > $dateP2a){
                $Etudiant-> status = "present-après-midi";
            }elseif($Etudiant->time >$dateR && $Etudiant->time < $dateA ){
                $Etudiant-> status = "absent";
            }
        
            $Etudiant-> justification = $request->justification;
            $Etudiant->save();
            return response("Vous etes bien inscrit",201);
    }
    function getEtudiants() {
        $Etudiants = Etudiant::all();
        return response()->json($Etudiants, 200);
    }
} */