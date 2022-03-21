<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ven_Vendedor extends Model
{
    protected $table = 'Ven_Vendedor';
    use HasFactory;

    public function getVendedores()
    {
        $vendedores = Ven_Vendedor::join('Cnt_Terceros', 'Ven_Vendedor.cedula', '=', 'Cnt_Terceros.Codter')
        ->get(['Ven_Vendedor.*', 'Cnt_Terceros.nombre_1']);
            return $vendedores;

    }
}
