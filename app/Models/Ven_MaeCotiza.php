<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ven_MaeCotiza extends Model
{
    use HasFactory;
    protected $table = 'Ven_MaeCotiza';
    public $timestamps = false;
    private $idreg, $codalm, $numcot, $codter, $feccot, $vigencia, $codusu, $codlist;

    public function getLastPlusOneCode()
    {
            
       $lastOne = Ven_MaeCotiza::select("numcot")
                                ->orderBy('IDReg', 'desc')->first();
        return $lastOne['numcot'] +1;

    }

}
