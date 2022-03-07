<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Alm_Insumos;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    

    public function show()
    {
    
        $todos=DB::table('Alm_Insumos')
        ->join('Ven_DetaPrecios', 'Ven_DetaPrecios.Codins', '=', 'Alm_insumos.Codins')
        ->where('Ven_DetaPrecios.Codalm','001')
        ->where('Ven_DetaPrecios.Codlist','001')
        ->first();

        return $todos->Nomins . " " . $todos->valvta;
    }


}
