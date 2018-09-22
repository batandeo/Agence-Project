<?php

namespace App\Http\Controllers;

use App\audiance;
use App\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Claims\Audience;

class AudianceController extends Controller
{
    public function show(){
        $audiance = audiance::with('categorie','client')->get();
        return $audiance;
    }

    public function store(Request $request){
        $rules = [
//            'libelle' => 'required|string|bail',
            'dateaudiance' => 'required|date',
            'daterenvoie' => 'required|date',
            'resumeaudiance' => 'required',
            'categorie_id' => 'required',
            'client_id' => 'required'
        ];

        $customMessages = [
            'required' => 'Veuillez remplir ce champ',
            'date' => 'Veuillez renseigner la date'
        ];

        $this->validate($request, $rules, $customMessages);

        $audiance = audiance::create([
//            'libelle' => $request->libelle,
            'dateaudiance' => $request->dateaudiance,
            'daterenvoie' => $request->daterenvoie,
            'resumeaudiance' => $request->resumeaudiance,
            'categorie_id' => $request->categorie_id,
            'client_id' => $request->client_id
        ]);
        $audiance->client;
        $audiance->categorie;

        return $audiance;
    }

    public function update(Request $request){

        $rules = [
            'dateaudiance' => 'required|date',
            'daterenvoie' => 'required|date',
            'resumeaudiance' => 'required',
            'categorie_id' => 'required',
            'client_id' => 'required'
        ];

        $customMessages = [
            'required' => 'Veuillez remplir ce champ',
            'date' => 'Veuillez renseigner la date'
        ];

        $this->validate($request, $rules, $customMessages);
        $audiance= audiance::find($request->id);
        $audiance->dateaudiance = $request->dateaudiance;
        $audiance->daterenvoie = $request->daterenvoie;
        $audiance->resumeaudiance = $request->resumeaudiance;
        $audiance->categorie_id = $request->categorie_id;
        $audiance->client_id = $request->client_id;
        $audiance->save();
        $audiance->categorie;
        $audiance->client;
        return json_encode($audiance);
    }

    public function show_client()
    {
        $clients = client::all();
        return json_encode($clients);
    }

    public function show_categorie()
    {
        $categorie = categorie::all();
        return json_encode($categorie);
    }

    public function destroy($id)
    { $audiance = audiance::find($id);
        $audiance->delete();
        return $audiance;
    }
}
