<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Session;
use App\Tag;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:articles.create')->only(['create','store']);
        $this->middleware('can:articles.index')->only(['index']);
        $this->middleware('can:articles.edit')->only(['edit','update']);
        $this->middleware('can:articles.show')->only(['show']);
        $this->middleware('can:articles.destroy')->only(['destroy']);

        $this->middleware('can:articles.pending')->only(['pending']);
        $this->middleware('can:articles.all')->only(['all']);
    }
    public function all(){
        $articles = Article::orderBy('name', 'ASC')->paginate(10);
        $permissions=1;
        return view('admin.article.index', compact('permissions','articles'));
    }
    public function pending(){
        $articles = Article::orderBy('name', 'ASC')->where('activate', 0)->paginate(10);
        $permissions=1;
        return view('admin.article.index', compact('permissions','articles'));
    }
    public function index()
    {
        if(!empty(Session::get('subcategory_id'))){
            $articles = Article::whereSubcategory_id(Session::get('subcategory_id'))->where('user_id', auth()->user()->id)->orderBy('name', 'ASC')->paginate(10);
            return view('admin.article.index', compact('articles'));
        } 
    }
    public function create()
    {
        $tags = Tag::orderBy('name', 'ASC')->get();
        return view('admin.article.create', compact('tags'));
    }
    public function store(Request $request)
    {
        $article = new Article($request->all());
        if($request->hasfile('image')){
            $image = $request->file('image');
            $name = time().$image->getClientOriginalName();
            $ruta = public_path().'/images';
            $image->move($ruta, $name);
            $urlimage ='/images/'.$name;
            $article->image =$urlimage;
        }
        $article->subcategory_id = Session::get('subcategory_id');
        
        if($request->cover){
            $article->cover=1;
        }else{
            $article->cover=0;
        }

        if($request->activate){
            $article->activate=1;
        }else{
            $article->activate=0;
        }

        $article->save();
        $article->tags()->attach($request->get('tags'));
        return redirect()->route('articles.index')->with('info', 'Articulo creado con exito');
    }
    public function show($id)
    { 
        $article = Article::where('id',$id)->firstOrFail();
        $this->authorize('pass',  $article);
        // CREAR ENLACES
        Session::put('article_id', $id);
        return redirect()->route('links.index');
    }
    public function edit($id)
    {
        $article = Article::where('id',$id)->firstOrFail();
        // PARA VER SI TIENE PERMISOS
        $this->authorize('pass',  $article);

        $tags = Tag::orderBy('name', 'ASC')->get();
        return view('admin.article.edit', compact('article','tags'));
    }
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $this->authorize('pass',  $article);

        $article->fill($request->all());
        if($request->hasfile('image')){
            $image = $request->file('image');
            $name = time().$image->getClientOriginalName();
            $ruta = public_path().'/images';
            $image->move($ruta, $name);
            $urlimage ='/images/'.$name;
            $article->image =$urlimage;
        }
        $article->subcategory_id = Session::get('subcategory_id');
        if($request->cover){
            $article->cover=1;
        }else{
            $article->cover=0;
        }

        if($request->activate){
            $article->activate=1;
        }else{
            $article->activate=0;
        }
        $article->save();
        $article->tags()->sync($request->get('tags'));
        return redirect()->route('articles.edit',$article->id)->with('info', 'Articulo creado con exito');
    }
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $this->authorize('pass',  $article);

        if(file_exists(public_path('/images/'. $article->image))){
            unlink(public_path('/images/'. $article->image));
        }
        $article->delete();
        return back()->with('info', 'Articulo eliminado con exito');
    }
}
