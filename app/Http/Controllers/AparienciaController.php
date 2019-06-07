<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Apariencia;
use App\User;

class AparienciaController extends Controller
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

        $apariencia = Apariencia::all();
        
        return view('Panel_Admin.personalizar', compact('apariencia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //auth()->id();

        $apariencia = Apariencia::create($request->all());

         if ($request->hasFile('bg_pantalla')) {

            $imagen = Storage::disk('public')->put('fotos_apariencia',$request->file('bg_pantalla'));
             $apariencia->fill(['bg_pantalla' => asset($imagen)])->save();
 
             $status = 'Apariencia Insertada Con Exito!';

             return back()->with('status');
         }else{
            return back()->with('status','Se Necesita una Imagen!');
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
        $ver = Apariencia::find($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editar = Apariencia::findOrFail($id);
        //return view('Panel_Admin.edit_apariencia', compact('editar'));
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
        
        $apariencia = Apariencia::select('id')->where('id_users',$id)->first();

        if($request->hasFile('bg_pantalla')){
            $imagen = Storage::disk('public')->put('fotos_apariencia',$request->file('bg_pantalla'));
            $apariencia->fill(['bg_pantalla' => asset($imagen)])->save();
            return back()->with('status');
        }

           $apariencia->update($request->all());
           $apariencia->save(); 
           return back()->with('status','Actualizado Correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Personalizar::findOrFail($id)->delete();
        //return back()->with('status','Eliminado con Exito!');
        return redirect("/personalizar")->with('status','Eliminado con Exito!');
    }
}
