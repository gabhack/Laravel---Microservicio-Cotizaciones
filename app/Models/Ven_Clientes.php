<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ven_Clientes extends Model
{
    protected $table = 'Ven_Clientes';
    use HasFactory;
    public function findbyname($q)
    {
        //return $this->where('cedula','like','%$q%')->get();
        $posts = Ven_Clientes::where('title', 'LIKE', '%'.$q.'%')->get();
        return response()->json($posts);
    }

    
}
