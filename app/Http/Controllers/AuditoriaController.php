<?php

namespace App\Http\Controllers;
use App\Models\Auditoria;
use Illuminate\Http\Request;
use Carbon\Carbon;
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

    //Funcion para detectar el navegador en el que se esta registrando
    public function getBrowser($user_agent){
       
        if(strpos($user_agent,'MSIE') !== FALSE)
            return'Internet explorer';
        elseif(strpos($user_agent,'Edge') !== FALSE) //Microsoft Edge
            return'Microsoft Edge';
        elseif(strpos($user_agent,'Trident') !== FALSE) //IE 11
            return'Internet explorer';
        elseif(strpos($user_agent,'Opera Mini') !== FALSE)
            return "Opera Mini";
        elseif(strpos($user_agent,'Opera') || strpos($user_agent,'OPR') !== FALSE)
            return "Opera";
        elseif(strpos($user_agent,'Firefox') !== FALSE)
            return'Mozilla Firefox';
        elseif(strpos($user_agent,'Chrome') !== FALSE)
            return'Google Chrome';
        elseif(strpos($user_agent,'Safari') !== FALSE)
            return "Safari";
        else
            return'No hemos podido detectar su navegador';
    }


    public function store(Request $request)
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $navegador = $this->getBrowser($user_agent);
        $fecha_a = new Carbon;

        $auditorias = new Auditoria;
        $auditorias->au_maquina = gethostname();
        $auditorias->au_so = PHP_OS.'-'.php_uname();
        $auditorias->au_ip = $_SERVER['REMOTE_ADDR'];
        $auditorias->au_navegador = $navegador;
        $auditorias->au_fecha = $fecha_a->toDateTimeString();
        $auditorias->au_us_id = auth()->user()->id;
        $auditorias->save();
        return redirect('admin/auditoria');
       return 'auditoria listada';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
         $auditorias = Auditoria::paginate(10);
        return response()->json($auditorias);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  /*  public function edit($id)
    {
        $auditorias = Auditoria::find($id);
        return response()->json($auditorias);
    }
*/
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function update(Request $request, $id)
    {
        $auditorias = Auditoria::find(request()->id);
    
            $auditorias->au_maquina = $request->au_maquina;
            $auditorias->au_so = $request->au_so;
            $auditorias->au_ip = $request->au_ip;
            $auditorias->au_navegador = $request->au_navegador;
            $auditorias->au_fecha = $request->au_fecha;
            $auditorias->update();
            return 'ok';
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
    Auditoria::find(id)->delete();
      return 'done';
    }*/


}