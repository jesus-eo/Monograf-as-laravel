<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMonografiaRequest;
use App\Http\Requests\UpdateMonografiaRequest;
use App\Models\Monografia;
use Illuminate\Support\Facades\DB;

class MonografiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('monografias.monografias',[
            'monografias' => Monografia::all(),
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $monografia = new Monografia();
        return view('monografias.formcreate',
        ['monografia' => $monografia]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMonografiaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMonografiaRequest $request)
    {
        $validados = $request->validated();
        $nuevomono = new Monografia($validados);
        $nuevomono->save();
        return redirect('/monografias')->with('succes','Monografia creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monografia  $monografia
     * @return \Illuminate\Http\Response
     */
    public function show(Monografia $monografia)
    {

        $articulosMonografia = Monografia::find($monografia->id)->articulos;
        $numpaginas = Monografia::with('articulos')->where('id',$monografia->id)->withSum('articulos','num_paginas')->first()->articulos_sum_num_paginas;
        ;

        return view('monografias.showmonografias',[
            'monografia' => $monografia,
            'articulos'=>$articulosMonografia,
            'paginas' => $numpaginas,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monografia  $monografia
     * @return \Illuminate\Http\Response
     */
    public function edit(Monografia $monografia)
    {

        return view('monografias.formedit',[
            'monografia' => $monografia,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMonografiaRequest  $request
     * @param  \App\Models\Monografia  $monografia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMonografiaRequest $request, Monografia $monografia)
    {
        Monografia::findOrfail($monografia->id);
        $validados = $request->validated();
         $monografia->titulo = $validados['titulo'];
         $monografia->anyo = $validados['anyo'];
         $monografia->save();
         return redirect('/monografias')->with('succes','monografia actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monografia  $monografia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monografia $monografia)
    {
        DB::table('articulo_monografia')->where('monografia_id',$monografia->id)->delete();

        $monografia->delete();
        return redirect('/monografias')->with('succes','Monografia borrada con exito');;
    }

    public function autores(Monografia $monografia){
        /* dd($monografia); */
        return view('monografias.autores',[
            'monografias'=> $monografia::with('articulos.autores')->where('id',$monografia->id)->first()
        ]);
    }
}
