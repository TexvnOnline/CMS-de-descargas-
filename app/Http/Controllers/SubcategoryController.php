<?php

namespace App\Http\Controllers;

use App\Subcategory;
use Illuminate\Http\Request;
use Session;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:subcategories.create')->only(['create','store']);
        $this->middleware('can:subcategories.index')->only(['index']);
        $this->middleware('can:subcategories.edit')->only(['edit','update']);
        $this->middleware('can:subcategories.show')->only(['show']);
        $this->middleware('can:subcategories.destroy')->only(['destroy']);
    }
    public function index()
    {
        if(!empty(Session::get('category_id'))){
            $subcategories = Subcategory::whereCategory_id(Session::get('category_id'))->paginate(10);
            return view('admin.subcategory.index', compact('subcategories'));
        }  
    }
    public function create()
    {
        return view('admin.subcategory.create');
    }
    public function store(Request $request)
    {
        $subcategory = new Subcategory($request->all());
        if($request->cover){
            $subcategory->cover=1;
        }else{
            $subcategory->cover=0;
        }

        $subcategory->category_id = Session::get('category_id');
        $subcategory->save();
        return redirect()->route('subcategories.edit',$subcategory->id)->with('info', 'Subcategoría creada con exito');
    }
    public function show($id)
    {
        Session::put('subcategory_id', $id);
        return redirect()->route('articles.index');
    }
    public function edit($id)
    {
        $subcategory = Subcategory::where('id',$id)->firstOrFail();
        return view('admin.subcategory.edit', compact('subcategory'));
    }
    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->fill($request->all());
        if($request->cover){
            $subcategory->cover=1;
        }else{
            $subcategory->cover=0;
        }
        $subcategory->save();
        return redirect()->route('subcategories.edit',$subcategory->id)->with('info', 'Subcategoría creada con exito');
    }
    public function destroy($id)
    {
        $subcategory = Subcategory::find($id)->delete();
        return back()->with('info', 'Subcategoría eliminada con exito');
    }
}
