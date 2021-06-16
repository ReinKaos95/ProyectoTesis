<?php

namespace App\Http\Controllers;
use App\Models\Equipo;
use App\Models\TipoEquipo;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
            //Aca nos encargamos de extraer datos de las tablas relacionales entre  las tablas Equipo, Tipo de equipos y departamentos

        $departamentos=Departamento::all()->pluck('dep_nombre', 'dep_id');
        $tipoEquipo=TipoEquipo::all()->pluck('teq_nombre', 'id');
        $equipment['equixte']=Equipo::JOIN("tipo_equipos","tipo_equipos.teq_id","=","equipos.eq_tequid")
        -> JOIN("departamentos","departamentos.dep_id","=","equipos.departamentos_dep_id")
         ->SELECT("id", "eq_modelo", "eq_marca" ,"eq_serial" , "eq_tequid","eq_nbiennacional", "eq_estatus", "equipos.created_at", "equipos.updated_at", "teq_nombre", "dep_nombre")
        -> orderBy('equipos.id', 'asc')
        -> paginate(10);         
            return view('admin.equipment.index',  $equipment, compact( 'tipoEquipo' , 'departamentos'));

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    }
    public function create()
    {
     /* $tipoEquipo=TipoEquipo::all()->pluck('teq_nombre', 'teq_id');
      $departamentos=Departamentos::all()->pluck('dep_nombre', 'dep_id');
       return view('admin.equipment.create', compact('tipoEquipo', 'departamentos'));
        $equipment=Equipo::all();
        return view('admin.equipment.create', compact('equipment'));*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'eq_modelo' => 'required|max:24',
            'eq_marca' => 'required|max:24',
            'eq_serial' => 'required|integer|digits:6',
            'eq_nbiennacional' => 'required|integer|min:1|digits:5',
            'eq_estatus' => 'required|accepted'
        ]);

    $equipment = new Equipo;
       $equipment->eq_modelo = $request->eq_modelo;
       $equipment->eq_marca = $request->eq_marca;
       $equipment->eq_serial = $request->eq_serial;
       $equipment->eq_tequid = $request->eq_tequid;
       $equipment->eq_nbiennacional = $request->eq_nbiennacional;
       $equipment->departamentos_dep_id = $request->departamentos_dep_id;
        $equipment->eq_estatus = $request->eq_estatus;
         $equipment->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //    $equipment=Equipo::findOrFail($id);
         /* $tipoEquipo=TipoEquipo::all()->pluck('teq_nombre', 'teq_id');
          $departamentos=Departamentos::all()->pluck('dep_nombre', 'dep_id');*/
         // return view('admin.equipment.edit', compact('equipment'/*, 'tipoEquipo', 'departamentos'*/));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $equipment=Equipo::findOrFail($id);
       $equipment->eq_modelo = $request->eq_modelo;
       $equipment->eq_marca = $request->eq_marca;
       $equipment->eq_serial = $request->eq_serial;
       $equipment->eq_tequid = $request->eq_tequid;
       $equipment->eq_nbiennacional = $request->eq_nbiennacional;
       $equipment->departamentos_dep_id = $request->departamentos_dep_id;
        $equipment->eq_estatus = $request->eq_estatus;
        $equipment->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipment = Equipo::find($id);
        $equipment->delete();
        return $equipment; 
    }
    public function exportInvoice()
    {
     $equipos=App\Models\Equipo::get();
     $pdf = PDF::loadView('admin.pdf.invoice', compact('equipos') );
     return $pdf->download('invoice.pdf');
     //return view('admin.pdf.invoice', compact('equipos'));
    }
}
