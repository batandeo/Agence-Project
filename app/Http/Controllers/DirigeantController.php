<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DirigeantController extends Controller
{
    public function destroy_diri($id)
    {
        DB::table('dirigeants')->where('id','=',$id)->delete();

    }
}
