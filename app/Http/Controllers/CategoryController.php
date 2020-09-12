<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:categories.create')->only(['create','store']);
        $this->middleware('can:categories.index')->only(['index']);
        $this->middleware('can:categories.edit')->only(['edit','update']);
        $this->middleware('can:categories.show')->only(['show']);
        $this->middleware('can:categories.destroy')->only(['destroy']);
    }
    public function index()
    {
        $categories = Category::orderBy('id','DESC')->paginate(10);
        return view('admin.category.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $category = new Category($request->all());
        if($request->cover){
            $category->cover=1;
        }else{
            $category->cover=0;
        }
        $category->save();
        return redirect()->route('categories.edit',$category->id)->with('info', 'Categoria creada con exito');
    }
    public function show($id)
    {
        Session::put('category_id', $id);
        return redirect()->route('subcategories.index');
    }
    public function edit($id)
    {
        $category = Category::where('id',$id)->firstOrFail();
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->fill($request->all());
        if($request->cover){
            $category->cover=1;
        }else{
            $category->cover=0;
        }
        $category->save();
        return redirect()->route('categories.edit',$category->id)->with('info', 'Categoria actualizada  con exito');
    }
    public function destroy($id)
    {
        $category = Category::find($id)->delete();
        return back()->with('info', 'Categoria eliminada con exito');
    }
}
