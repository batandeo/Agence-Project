<?php

namespace App\Http\Controllers;

use App\Societe;
use Illuminate\Http\Request;

class SocieteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $societes = Societe::all();
      return json_encode($societes);
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
        'nom' => 'required',

      ];

      if ($request->hasFile('logo')){

        //recuperer l'extension du fichier
        $filenameWithExt = $request->file('logo')->getClientOriginalName();

        //recupérer le fichier

        $fileName = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        // recupérer l'extension
        $extension = $request->file('logo')->getClientOriginalExtension();

        $fileNameTostore = $fileName.'_'.time().'.'.$extension;

        //upload image
        $path = $request->file('logo')->storeAs('public/logo',$fileNameTostore);
      }
      else{
        $fileNameTostore = "noimage.jpg";
      }

      $customMessages = [
        'required' => 'Veuillez remplir ce champ',
        'unique' => 'Cette donnée existe déjà',
        'email' => 'Cet email est mal renseigné',
      ];

      $this->validate($request, $rules, $customMessages);
      $societe = Societe::create([
        'nom' => $request->nom,
        'email' => $request->email,
        'siteweb' => $request->siteweb,
        'logo' => $fileNameTostore
      ]);

      return json_encode($societe);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $societe= Societe::all();
      return json_encode($societe);
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
      $societe = Societe::find($request->id);
      $societe->nom = $request->nom;
      $societe->email = $request->email;
      $societe->logo = $request->logo;
      $societe->siteweb = $request->siteweb;
      $societe->save();
      return json_encode($societe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $societe = Societe::find($id);
      $societe->delete();
      return $societe;
    }
}
