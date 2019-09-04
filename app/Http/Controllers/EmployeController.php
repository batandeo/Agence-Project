<?php

namespace App\Http\Controllers;

use App\Employe;
use App\Societe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $employes = Employe::all();
      return json_encode($employes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules = [
        'prenom' => 'required|regex:/^[a-zA-Z]+$/u|bail',
        'nom' => 'required|regex:/^[a-zA-Z]+$/u',
        'tel' => 'unique:employes|integer|min:8',
        'email' => 'email|unique:employes',
        'societe_id' => '',
      ];

      $customMessages = [
        'required' => 'Veuillez remplir ce champ',
        'regex' => 'Le format de texte est invalide',
        'integer' => 'Veuillez saisir les nombres',
        'unique' => 'Cette donnée existe déjà',
        'email' => 'Cet email est mal renseigné',
        'min' => 'Le numéro ne doit pas être inférieur à 7'
      ];

      $this->validate($request, $rules, $customMessages);

      $employe = Employe::create([
        'prenom' => $request->prenom,
        'nom' => $request->nom,
        'tel' => $request->tel,
        'email' => $request->email,
        'societe_id'=>$request->societe_id
      ]);

      $employe->Societe;

      return $employe;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $employes = Employe::with('Societe')->get();
      return $employes;
    }

  public function show_societe()
  {
    $societes = Societe::all();
    return json_encode($societes);
  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $employe = Employe::find($request->id);
      $employe->prenom = $request->prenom;
      $employe->nom = $request->nom;
      $employe->email = $request->email;
      $employe->tel = $request->tel;
      $employe->societe_id = $request->societe_id;
      $employe->save();
      $employe->societe;
      return json_encode($employe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $employe = Employe::find($id);
      $employe->delete();
      return $employe;
    }
}
