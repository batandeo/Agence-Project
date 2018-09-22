<?php

namespace App\Http\Controllers;
use JasperPHP\JasperPHP as jasperPHP;
use App\dirigeant;
use Illuminate\Http\Request;
use App\Client;
use App\Http\Resources\ClientResource;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return json_encode($clients);
        //return ClientResource::collection(Client::with('nom')->paginate(25));
    }

    public function generateReport()
    {
        //jasper ready to call
        $jasper =new  jasperPHP();
//       $jasper->compile(base_path('storage/reporting/example.jrxml'))->execute();
        
    }

    public function store(Request $request)
    {
        $rules = [
            'nom' => 'required|regex:/^[a-zA-Z]+$/u|bail',
            'prenom' => 'required|regex:/^[a-zA-Z]+$/u',
            'sexe' => 'required|string',
            'contact' => 'required|unique:clients|integer|min:8',
            'mail' => 'email|unique:clients',
            'dirigeant_id' => 'required',
            'datecreation'=> 'required|date'
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

        $client = Client::create([
            //'client_id' => $request->id,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'contact' => $request->contact,
            'mail' => $request->mail,
            'dirigeant_id'=>$request->dirigeant_id,
            'datecreation' => $request->datecreation
        ]);

        $client->dirigeant;

        //return json_encode($client);
        return $client;
    }

    public function show()
    {
     /*   $dirigeants = DB::table('clients')
            ->join('dirigeants', 'clients.dirigeant_id', '=', 'dirigeants.id')
            ->select('dirigeants.libelle','clients.id','clients.nom','clients.prenom','clients.sexe','clients.contact','clients.mail','clients.dirigeant_id')
            ->get();*/

        $clients = client::with('dirigeant')->get();
        return $clients;
    }

    public function update(Request $request){

        //dd($request->all());
        $client = client::find($request->id);
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->mail = $request->mail;
        $client->sexe = $request->sexe;
        $client->contact = $request->contact;
        $client->dirigeant_id = $request->dirigeant_id;
        $client->datecreation = $request->datecreation;
        $client->save();
        $client->dirigeant;
        return json_encode($client);
    }

    public function show_sexe()
    {
        $sexe = DB::table('Clients')
            ->groupBy('sexe')
            ->pluck('sexe');
        return json_encode($sexe);
    }

    public function show_dirigeant()
    {
        $dirigeants = dirigeant::all();
        return json_encode($dirigeants);
    }

    public function destroy($id)
    {
        //DB::table('clients')->where('id','=',$id)->delete();
        $client = client::find($id);
        $client->delete();
        return $client;

    }

}
