<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\History;

class HistoryController extends Controller
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
        $datos = History::all();
        
        return view('Panel_Admin.add_history', compact('datos'));
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
        
        $history = History::create($request->all());
         if ($request->hasFile('imagen')) {

            $imagen = Storage::disk('public')->put('fotos_history',$request->file('imagen'));
             $history->fill(['imagen' => asset($imagen)])->save();
 
             $status = 'History Insertada Con Exito!';

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
        $editar = History::findOrFail($id);
        return view('Panel_Admin.edit_history', compact('editar'));
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
        $history = History::findOrFail($id);

        if($request->hasFile('imagen')){
            $imagen = Storage::disk('public')->put('fotos_history',$request->file('imagen'));
            $history->fill(['imagen' => asset($imagen)])->save();
        }

        $history->update($request->only('title','description'));

        $history->save();

        return redirect("/history")->with('status','Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        History::findOrFail($id)->delete();
        //return back()->with('status','Eliminado con Exito!');
        return redirect("/history")->with('status','Eliminado con Exito!');
    }
}
