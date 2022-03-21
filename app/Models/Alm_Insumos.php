<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alm_Insumos extends Model
{
    protected $table = 'Alm_Insumos';
    use HasFactory;

    public function findbyname($q, $l, $a)
    {
        //return $this->where('cedula','like','%$q%')->get();
          $productos = Alm_Insumos::join('Ven_DetaPrecios', 'Alm_Insumos.codins', '=', 'Ven_DetaPrecios.codins')
                                    ->where('Ven_DetaPrecios.codlist','=',$l)
                                    ->join('Alm_Invent', 'Alm_Insumos.codins','=','Alm_Invent.codins')
                                   ->where('Alm_Invent.codalm','=',$a)
                                    ->where('Nomins', 'LIKE', '%'.$q.'%')
                                    ->get(['Alm_Insumos.*',  'Ven_DetaPrecios.valvta', 'Alm_Invent.Caninv']);
       
        return response()->json($productos);
    }

}
