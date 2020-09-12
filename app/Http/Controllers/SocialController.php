<?php

namespace App\Http\Controllers;

use App\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:socials.create')->only(['create','store']);
        $this->middleware('can:socials.index')->only(['index']);
        $this->middleware('can:socials.edit')->only(['edit','update']);
        $this->middleware('can:socials.show')->only(['show']);
        $this->middleware('can:socials.destroy')->only(['destroy']);
    }
    public function index()
    {
        $socials = Social::orderBy('id','DESC')->paginate(10);
        return view('admin.social.index', compact('socials')); 
    }
    public function create()
    {
        return view('admin.social.create');
    }
    public function store(Request $request)
    {
        $social = Social::create($request->all());
        return redirect()->route('socials.edit',$social->id)->with('datos','Red social creada con exito.');
    }
    public function show($id)
    {
        $social= Social::find($id);
        return view('admin.social.show', compact('social'));
    }
    public function edit($id)
    {
        $social= Social::find($id);
        return view('admin.social.edit', compact('social'));
    }
    public function update(Request $request, $id)
    {
        $social = Social::find($id);
        $social->fill($request->all())->save();
        return redirect()->route('socials.edit',$social->id)->with('datos','Red social actualizada con exito.');
    }
    public function destroy($id)
    {
        $social = Social::find($id)->delete();
        return back()->with('datos', 'Red social eliminada correctamente');

    }
}
