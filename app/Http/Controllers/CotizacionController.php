<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cnt_Tercero;
use App\Models\Ven_ListaPrecios;
use App\Models\Ven_Vendedor;
use App\Models\Alm_Insumos;
use App\Models\Gen_Almacen;
use App\Models\Ven_MaeCotiza;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class CotizacionController extends Controller
{

private $cliente=null;
private $listas=null;
private $vendedores=null;
private $productos=null;
private $almacenes=null;
private $lastMaeCotiza=null;


public function __CONSTRUCT()
{
    $this->cliente=new Cnt_Tercero();
    $this->listas=new Ven_ListaPrecios();
    $this->vendedores=new Ven_Vendedor();
    $this->productos=new Alm_Insumos();
    $this->almacenes=new Gen_Almacen();
    $this->maeCotizacion=new Ven_MaeCotiza();
    $this->lastMaeCotiza=new Ven_MaeCotiza();
    

}

public function index(){

    $nombresdelista=$this->listas->getNames();
    $vendedores=$this->vendedores->getVendedores();
    $almacenes=$this->almacenes->getAlmacenes();
    return view('cotizar', compact('nombresdelista', 'vendedores', 'almacenes'));

}

public function findcliente(Request $q)
{
    return $this->cliente->findbyname($q->input('q'));
}

public function findproducto(Request $req)
{

    return $this->productos->findbyname($req->q, $req->l,$req->a);
}

private $maeCotizacion=null;

public function saveMaeCotizacion(Request $req)
{

    $this->maeCotizacion->codalm = $req->input('selectalmacenes');
    $this->maeCotizacion->numcot = $this->lastMaeCotiza->getLastPlusOneCode();
    $this->maeCotizacion->codter = $req->input('razon');
    $this->maeCotizacion->feccot = Carbon::now();
    $this->maeCotizacion->vigencia=30;
    $this->maeCotizacion->codusu="ARONCO";
    $this->maeCotizacion->codlist= $req->input('selectlistaprecios');
    $this->maeCotizacion->save();


    return $this->maeCotizacion;
}

}
