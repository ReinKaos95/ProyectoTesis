<?php

namespace App\Http\Controllers;
use App\Models\PrestamoEquipo;
use App\Models\User;
use App\Models\Equipo;
use Illuminate\Http\Request;

class PrestamosController extends Controller
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
          $users=User::all();
          $id=Equipo::all()->pluck('id');
        //$prestamos = PrestamoEquipo::paginate(10);
       $prestamos['prestamos']=PrestamoEquipo::JOIN("users","users.id","=","prestamo_equipos.usuarios_us_id")
                                    ->JOIN("equipos","equipos.id","=","prestamo_equipos.equipos_eq_id")
                                    -> orderBy('prestamo_equipos.id', 'asc')
                                    -> paginate(8); 
            return view('admin.prestamos.index', $prestamos, compact('users','id'));
        //return view('admin.prestamos.index', compact('prestamos')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    $id=Equipo::all()->pluck('id');
    return view('admin.prestamos.create', compact('users', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $prestamos = new PrestamoEquipo;
       $prestamos->pres_salida = $request->pres_salida;
       $prestamos->pres_fecha_salida = $request->pres_fecha_salida;
       $prestamos->pres_fecha_entrada = $request->pres_fecha_entrada;
       $prestamos->pres_estatus = $request->pres_estatus;
       $prestamos->usuarios_us_id = $request->usuarios_us_id;
       $prestamos->equipos_eq_id = $request->equipos_eq_id;
       $prestamos->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    $prestamos=PrestamoEquipo::findOrFail($id);
    $users=User::all()->pluck('usuario');
    $equipo=Equipos::all()->pluck('id');
    return view('admin.prestamos.edit', compact('prestamos', 'users', 'equipo'));
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
  $prestamos=PrestamoEquipo::find($id);
       $prestamos->pres_salida = $request->pres_salida;
       $prestamos->pres_fecha_salida = $request->pres_fecha_salida;
       $prestamos->pres_fecha_entrada = $request->pres_fecha_entrada;
       $prestamos->pres_estatus = $request->pres_estatus;
       $prestamos->usuarios_us_id = $request->usuarios_us_id;
       $prestamos->equipos_eq_id = $request->equipos_eq_id;
         $prestamos->save();
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $prestamos = PrestamoEquipo::find($id);
      $prestamos->delete();
      return $prestamos; 
    }
}
