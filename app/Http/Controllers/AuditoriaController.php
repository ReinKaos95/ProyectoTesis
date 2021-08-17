<?php

namespace App\Http\Controllers;
use App\Models\Auditoria;
use Illuminate\Http\Request;

class AuditoriaController extends Controller
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
        $auditorias=Auditoria::all();
        $auditorias = Auditoria::paginate(10);
        return view('admin.auditoria.index', compact('auditorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $auditorias=Auditoria::all();
        return view('admin.auditoria.create', compact('auditorias'));
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
          'au_ip' => 'required|ip',
        'au_maquina' => 'required|max:24',
            'au_so' => 'required|max:24',
            'au_navegador' => 'required|max:24',
            'au_fecha' => 'required|date',
        ]);

        $auditorias = new Auditoria;
        $auditorias->au_maquina = $request->au_maquina;
        $auditorias->au_so = $request->au_so;
        $auditorias->au_ip = $request->au_ip;
        $auditorias->au_navegador = $request->au_navegador;
        $auditorias->au_fecha = $request->au_fecha;
           if ($auditorias->save()) {
           
       return redirect('/admin/auditoria');
        } 
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
       $auditorias=Auditoria::findOrFail($id);
        return view('admin.equipment.edit', compact('equipment'));
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
      $auditorias = Auditoria::findOrFail($id);
        $auditorias->au_maquina = $request->au_maquina;
        $auditorias->au_so = $request->au_so;
        $auditorias->au_ip = $request->au_ip;
        $auditorias->au_navegador = $request->au_navegador;
        $auditorias->au_fecha = $request->au_fecha;
           if ($auditorias->save()) {
           
       return redirect('/admin/auditoria');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    Auditoria::destroy($id);
      return back();
    }


}