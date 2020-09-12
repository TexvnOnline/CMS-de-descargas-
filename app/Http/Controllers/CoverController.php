<?php

namespace App\Http\Controllers;

use App\Cover;
use Illuminate\Http\Request;

class CoverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:covers.create')->only(['create','store']);
        $this->middleware('can:covers.index')->only(['index']);
        $this->middleware('can:covers.edit')->only(['edit','update']);
        $this->middleware('can:covers.show')->only(['show']);
        $this->middleware('can:covers.destroy')->only(['destroy']);
    }
    public function index()
    {
        $covers  = Cover::orderBy('id','DESC')->paginate(10);
        return view('admin.cover.index', compact('covers')); 
    }
    public function create()
    {
        return view('admin.cover.create');
    }
    public function store(Request $request)
    {
        $cover = new Cover($request->all());
        if($request->hasfile('image')){
            $image = $request->file('image');
            $name = time().$image->getClientOriginalName();
            $ruta = public_path().'/images';
            $image->move($ruta, $name);
            $urlimage2 ='/images/'.$name;
            $cover->imagepublicidad =$urlimage2;
        }
        $cover->save();
        return redirect()->route('covers.edit',$cover->id)->with('info','Portada creada con exito.');
    }
    public function show($id)
    {
        $cover = Cover::find($id);
        return view('admin.cover.show', compact('cover'));
    }
    public function edit($id)
    {
        $cover = Cover::find($id);
        return view('admin.cover.edit', compact('cover'));
    }
    public function update(Request $request, $id)
    {
        $cover = Cover::findOrFail($id);
        $cover->fill($request->all());
        if($request->hasfile('image')){
            $image = $request->file('image');
            $name = time().$image->getClientOriginalName();
            $ruta = public_path().'/images';
            $image->move($ruta, $name);
            $urlimage2 ='/images/'.$name;
            $cover->imagepublicidad =$urlimage2;
        }
        $cover->save();
        return redirect()->route('covers.edit',$cover->id)->with('info','Portada actualizada con exito.');
    }
    public function destroy($id)
    {
        $cover = Cover::findOrFail($id);
        if(file_exists(public_path('/images/'. $cover->imagepublicidad))){
            unlink(public_path('/images/'. $cover->imagecimagepublicidadover));
        }
        $cover->delete();
        return back()->with('info', 'Portada Eliminada correctamente');
    }
}
