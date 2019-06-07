<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Recetas;
use App\Category;

class RecetasController extends Controller
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

        $datos = Recetas::orderBy('id', 'desc')->simplePaginate(6);
        $categorys = Category::all();
        
        return view('Panel_Admin.add_recetas', compact('datos','categorys'));
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
         $recetas = Recetas::create($request->all());
        if ($request->hasFile('imagen')) {
            $imagen = Storage::disk('public')->put('fotos_recetas',$request->file('imagen'));
             $recetas->fill(['imagen' => asset($imagen)])->save();
 
             $status = 'Receta Insertada Con Exito!';

             return back()->with('status');

        }else{
            return back()->with('status','Se Necesita una Imagen!');
        }
        $recetas->tags()->sync($request->get('tags'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ver = Recetas::find($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editar = Recetas::findOrFail($id);
        return view('Panel_Admin.edit_recetas', compact('editar'));
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

        $recetas = Recetas::findOrFail($id);

        if($request->hasFile('imagen')){
            $imagen = Storage::disk('public')->put('fotos_recetas',$request->file('imagen'));
            $recetas->fill(['imagen' => asset($imagen)])->save();
        }
        
        
        $recetas->update($request->only('title','subtitle','description','category'));

        $recetas->save();

        return redirect("/recetas")->with('status','Actualizado Correctamente');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recetas::findOrFail($id)->delete();
        //return back()->with('status','Eliminado con Exito!');
        return redirect("/recetas")->with('status','Eliminado con Exito!');
    }
}
