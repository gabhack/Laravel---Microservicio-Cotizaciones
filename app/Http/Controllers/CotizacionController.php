<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cnt_Tercero;
use App\Models\Ven_ListaPrecios;
use App\Models\Ven_Vendedor;
use App\Models\Alm_Insumos;
use App\Models\Gen_Almacen;

class CotizacionController extends Controller
{

private $cliente=null;
private $listas=null;
private $vendedores=null;
private $productos=null;
private $almacenes=null;

public function __CONSTRUCT()
{
    $this->cliente=new Cnt_Tercero();
    $this->listas=new Ven_ListaPrecios();
    $this->vendedores=new Ven_Vendedor();
    $this->productos=new Alm_Insumos();
    $this->almacenes=new Gen_Almacen();

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

}
