<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Headers;

class HeadersController extends Controller
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
        $datos = Headers::orderBy('id', 'desc')->simplePaginate(6);
        return view('Panel_Admin.add_headers',compact('datos'));
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
        
        $headers = Headers::create($request->all());
        if ($request->hasFile('imagen')) {

            $imagen = Storage::disk('public')->put('fotos_headers',$request->file('imagen'));
             $headers->fill(['imagen' => asset($imagen)])->save();
 
             $status = 'Headers Insertada Con Exito!';

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
        $editar = Headers::findOrFail($id);
        return view('Panel_Admin.edit_headers', compact('editar'));
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
        $headers = Headers::findOrFail($id);

        if($request->hasFile('imagen')){
            $imagen = Storage::disk('public')->put('fotos_headers',$request->file('imagen'));
            $headers->fill(['imagen' => asset($imagen)])->save();
        }

        $headers->update($request->only('title','description'));

        $headers->save();

        return redirect("/headers")->with('status','Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $headers = Headers::findOrFail($id)->delete();

        return back()->with('status','Eliminado Con Exito!');
    }
}
