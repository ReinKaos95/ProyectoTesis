<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Modelo;
class DependentDropdownController extends Controller
{
    public function index()
    {
        $marcas=Marca::all();
        $modelos = Modelo::all();
        return view('admin.equipos.index', compact('marcas','modelos'));
    }
   public function getModelo($id)
   {
    $modelos = Modelo::where('marca_mar_id',$id)->get();
    return response()->json($modelos);
   }
}
