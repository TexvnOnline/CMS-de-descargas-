<?php

namespace App\Http\Controllers;

use App\Link;
use Session;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:links.create')->only(['create','store']);
        $this->middleware('can:links.index')->only(['index']);
        $this->middleware('can:links.edit')->only(['edit','update']);
        $this->middleware('can:links.show')->only(['show']);
        $this->middleware('can:links.destroy')->only(['destroy']);
    }
    public function index()
    {
        if(!empty(Session::get('article_id'))){
            $links = Link::whereArticle_id(Session::get('article_id'))->paginate(10);
            return view('admin.link.index', compact('links'));
        }
        
    }
    public function create()
    {
        return view('admin.link.create');
    }
    public function store(Request $request)
    {
        $link = new Link($request->all());
        $link->article_id = Session::get('article_id');
        $link->save();
        return redirect()->route('links.edit',$link->id)->with('info', 'Enlace creada con exito');
    }
    public function show($id)
    { 
    }
    public function edit($id)
    {
        $link = Link::where('id',$id)->firstOrFail();
        return view('admin.link.edit', compact('link'));
    }
    public function update(Request $request, $id)
    {
        $link = Link::find($id);
        $link->fill($request->all())->save();
        return redirect()->route('links.edit',$link->id)->with('info', 'Enlace creada con exito');
    }
    public function destroy($id)
    {
        $link = Link::find($id)->delete();
        return back()->with('info', 'Enlace eliminada con exito');
    }
}
