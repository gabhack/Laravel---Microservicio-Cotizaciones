<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cnt_Tercero extends Model
{
    protected $table = 'Cnt_Terceros';
    use HasFactory;

    public function findbyname($q)
    {
       // return $this->where('Codter','like','%$q%')->get();
        $posts = $this->where('nombre_1', 'LIKE', '%'.$q.'%')
        ->orwhere('Codter', 'LIKE', '%'.$q.'%')
        ->get();
        return \response()->json($posts);
    }

    public function findbycode($cod)
    {
       // return $this->where('Codter','like','%$q%')->get();
        $ter = $this->where('codter', '=', '%'.$cod.'%')
        ->first();
        return $ter;
    }
}
