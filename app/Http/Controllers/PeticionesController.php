<?php

namespace App\Http\Controllers;

use App\Models\peticiones;
use App\Models\servicios;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;


class PeticionesController extends Controller
{

    function _contruct(){
        $this->middleware('permission:ver-peticion|crear-peticion|editar-peticion|borrar-peticion', ['only'=>['index']]);
        $this->middleware('permission: crear-peticion', ['only'=>['create', 'store']]);
        $this->middleware('permission: editar-peticion', ['only'=>['edit', 'update']]);
        $this->middleware('permission: borrar-peticion', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $peticiones = peticiones::paginate(5);
        return view('Peticiones.index', compact('peticiones'));
    }

    public function pdf(){
        $peticiones = peticiones::paginate(5);

        view()->share('Peticiones.pdf', $peticiones);

        $pdf = PDF::loadView('Peticiones.pdf', ['peticiones'=>$peticiones]);

        return $pdf->download('Peticiones'); 

       /* return PDF::loadView('Peticiones.pdf', compact('peticiones'))
        ->stream('archivo.pdf');*/
        //return $pdf->download('invoice.pdf')
        //return view('Peticiones.pdf', compact('peticiones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $usuarios = User::pluck('name', 'name')->all();
        $servicios = servicios::pluck('Nombre', 'Nombre');
        return view('Peticiones.crear', compact('usuarios', 'servicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'Solicitante'=>'required',
            'Direccion'=>'required',
            'Fecha'=>'required',
            'Estatus'=>'required',
            'usuario_id'=>'required',
            'servicio_id'=>'required'
        ]);

        peticiones::create($request->all());
        return redirect()->route('Peticiones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\peticiones  $peticiones
     * @return \Illuminate\Http\Response
     */
    public function show(peticiones $peticiones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\peticiones  $peticiones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $peticiones = peticiones::find($id);
        $usuarios = User::pluck('name', 'name')->all();
        $servicios = servicios::pluck('Nombre', 'Nombre');
        return view('Peticiones.editar', compact('peticiones', 'usuarios', 'servicios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\peticiones  $peticiones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'Solicitante'=>'required',
            'Direccion'=>'required',
            'Numero'=>'required',
            'Fecha'=>'required',
            'Estatus'=>'required',
            'usuario_id'=>'required',
            'servicio_id'=>'required'
        ]);

        $input = $request->all();
        $peticiones = peticiones::find($id);
        $peticiones->update($input);

        return redirect()->route('Peticiones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\peticiones  $peticiones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        peticiones::find($id)->delete();
        return redirect()->route('Peticiones.index');
    }
}
