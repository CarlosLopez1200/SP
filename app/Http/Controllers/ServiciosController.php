<?php

namespace App\Http\Controllers;

use App\Models\peticiones;
use App\Models\servicios;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{

    function _contruct(){
        $this->middleware('permission:ver-servicio|crear-servicio|editar-servicio|borrar-servicio', ['only'=>['index']]);
        $this->middleware('permission: crear-servicio', ['only'=>['create', 'store']]);
        $this->middleware('permission: editar-servicio', ['only'=>['edit', 'update']]);
        $this->middleware('permission: borrar-servicio', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $servicios = servicios::paginate(5);
        return view('Servicios.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Servicios.crear');
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
            'Nombre'=>'required',
            'Descripcion'=>'required'
        ]);
        servicios::create($request->all());
        return redirect()->route('Servicios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function show(servicios $servicios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $servicios = servicios::find($id);
        return view('Servicios.editar', compact('servicios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'Nombre'=>'required',
            'Descripcion'=>'required'
        ]);
        $input = $request->all();
        $servicios = servicios::find($id);
        $servicios->update($input);
        return redirect()->route('Servicios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        servicios::find($id)->delete();
        return redirect()->route('Servicios.index');
    }
}
