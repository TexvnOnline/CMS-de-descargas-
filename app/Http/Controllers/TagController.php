<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:tags.create')->only(['create','store']);
        $this->middleware('can:tags.index')->only(['index']);
        $this->middleware('can:tags.edit')->only(['edit','update']);
        $this->middleware('can:tags.show')->only(['show']);
        $this->middleware('can:tags.destroy')->only(['destroy']);
    }
    public function index()
    {
        $tags = Tag::orderBy('id','DESC')->paginate(10);
        return view('admin.tag.index', compact('tags'));
    }
    public function create()
    {
        return view('admin.tag.create');
    }
    public function store(Request $request)
    {
        $tag = new Tag($request->all());
        if($request->cover){
            $tag->cover=1;
        }else{
            $tag->cover=0;
        }
        $tag->save();
        return redirect()->route('tags.edit',$tag->id)->with('info', 'Etiqueta creada con exito');
    }
    public function show($id)
    {
        // AGREGAR VISTA DE DETALLES
    }
    public function edit($id)
    {
        $tag = Tag::where('id',$id)->firstOrFail();
        return view('admin.tag.edit', compact('tag'));
    }
    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $tag->fill($request->all());
        if($request->cover){
            $tag->cover=1;
        }else{
            $tag->cover=0;
        }
        $tag->save();
        return redirect()->route('tags.edit',$tag->id)->with('info', 'Etiqueta actualizada  con exito');
    }
    public function destroy($id)
    {
        $tag = Tag::find($id)->delete();
        return back()->with('info', 'Etiqueta eliminada con exito');
    }
}
