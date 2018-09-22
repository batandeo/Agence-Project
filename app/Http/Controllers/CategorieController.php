<?php

namespace App\Http\Controllers;
use App\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategorieController extends Controller
{

    public function store(Request $request)
    {
        $categorie = categorie::create([
            'libelle' => $request->libelle
        ]);

        return json_encode($categorie);
    }

    public function show()
    {
        $categorie= categorie::all();
        return json_encode($categorie);
    }

    public function destroy($id)
    {
        DB::table('categories')->where('id','=',$id)->delete();

    }
}
