<?php

namespace App\Http\Controllers;

use App\client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\rdv;
use Illuminate\Support\Facades\DB;
class RdvController extends Controller
{
    public function show()
    {
        $rdv = rdv::with('dirigeant','client')->get();
        return $rdv;
    }

    public function store(Request $request){

        $rules = [
            'horaire' => 'required|string|bail',
            /*'suivirdv' => 'required',*/
            'daterdv' => 'required|date',
            'client_id' => 'required',
            'dirigeant_id' => 'required',
        ];

        $customMessages = [
            'required' => 'Veuillez remplir ce champ'
        ];

        $this->validate($request, $rules, $customMessages);

        $rdv = rdv::create([
            'horaire' => $request->horaire,
            /*'suivirdv' => $request->suivirdv,*/
            'daterdv' => $request->daterdv,
            'dirigeant_id' => $request->dirigeant_id,
            'client_id' => $request->client_id,
            /*$to = \Carbon\Carbon::now(),
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2018-05-14 14:21:53');
        $diff_in_days = $to->diffInDays($from);*/

           $is_date = new Carbon($request->daterdv),
            var_dump($is_date),
            'todaydate' => $is_date->isToday(),
            'pastdate' => $is_date->isPast(),
            'futuredate' => $is_date->isFuture()
        ]);
           /* $is_date = new Carbon($request->daterdv),
            var_dump($is_date),
            'todaydate' => $is_date->isToday(),
            'pastdate' => $is_date->isPast(),
            'futuredate' => $is_date->isFuture()*/

        $rdv->client;
        $rdv->dirigeant;

        return $rdv;
    }

    public function update(Request $request){

        $rules = [
            'horaire' => 'required|string|bail',
            /* 'suivirdv' => 'required',*/
            'daterdv' => 'required|date',
            'client_id' => 'required',
            'dirigeant_id' => 'required',
        ];

        $customMessages = [
            'required' => 'Veuillez remplir ce champ'
        ];

        $this->validate($request, $rules, $customMessages);

        //dd($request->all());
        $rdv= rdv::find($request->id);
        $rdv->horaire = $request->horaire;
        /* $rdv->suivirdv = $request->suivirdv;*/
        $rdv->daterdv = $request->daterdv;
        $rdv->client_id = $request->client_id;
        $rdv->dirigeant_id = $request->dirigeant_id;
           $is_date = new Carbon($request->daterdv);
            $rdv->todaydate = $is_date->isToday();
            $rdv->pastdate = $is_date->isPast();
            $rdv->futuredate = $is_date->isFuture();
        $rdv->save();
        $rdv->dirigeant;
        $rdv->client;
        return json_encode($rdv);
    }
    public function show_dirigeant()
    {
        $dirigeants = dirigeant::all();
        return json_encode($dirigeants);
    }
    public function show_horaire()
    {
        $horaire = DB::table('rdvs')
            ->groupBy('horaire')
            ->pluck('horaire');
        return json_encode($horaire);
    }

    public function show_client()
    {
        $clients = client::all();
        return json_encode($clients);
    }

    public function destroy($id)
    { $rdv = rdv::find($id);
        $rdv->delete();
        return $rdv;
    }
}
