<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ven_ListaPrecios extends Model
{
    protected $table = 'Ven_ListaPrecios';
    use HasFactory;

    public function getNames()
    {
        $listas = Ven_ListaPrecios::get()->where('activa',true);
        return $listas;
    }

    public function getnamelista($e)
    
{
    return Ven_ListaPrecios::get()->where('codlist', e);
}


}
