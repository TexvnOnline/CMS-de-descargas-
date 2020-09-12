<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Subcategory;
use App\Cover; 
use App\Tag;
use App\Social;

use App\Donation;

use Cache;

class WebController extends Controller
{
    public function single($item){
        $donation = Donation::whereId(1)->first();
        $cover = Cover::whereId(1)->first();
        $cover2 = Cover::whereId(2)->first();
        $socials = Social::orderBy('id','DESC')->get();
        $categories = Category::where('cover', 1)->with('subcategories')->get();

        $article = Article::where('slug',$item)->with('tags','links')->first();
            if(Cache::has($item)==false){
                Cache::add($item,'contador',0.30);
                $article->visits++;
                $article->save();
            }
        // AQUE SUBCATEGORIA PERTENECE
        $cat =$article->subcategory->category->id;
        $categoria = Category::whereId($cat)->first();
        $subcategories = Subcategory::whereCategory_id($cat)->where('cover', 1)->get();
        //ARTICULOS RELACIONADOS
        $subcategoria =$article->subcategory_id;  
        $articulos=Article::whereSubcategory_id($subcategoria)->get()->take(8);
      
        return view('web.single', compact('donation','categoria','subcategories','socials','cover2','cover','categories','article','articulos'));
    }
    public function all(){
        $donation = Donation::whereId(1)->first();
        $cover = Cover::whereId(1)->first();
        $cover2 = Cover::whereId(2)->first();

        $tags = Tag::where('cover', 1)->get();
        $categories = Category::where('cover', 1)->with('subcategories')->get();
        $articles= Article::orderBy('id','DESC')->paginate(20);
        return view('web.grid', compact('donation','cover2','cover','tags','categories','articles'));
    }

    public function popular(){
        $donation = Donation::whereId(1)->first();
        $cover = Cover::whereId(1)->first();
        $cover2 = Cover::whereId(2)->first();

        $tags = Tag::where('cover', 1)->get();
        $categories = Category::where('cover', 1)->with('subcategories')->get();
        $articles= Article::orderBy('visits','DESC')->paginate(20);
        $popular = "populares";
        return view('web.grid', compact('donation','cover2','cover','tags','categories','articles','popular'));
    }
    
    public function search(Request $request){
        $donation = Donation::whereId(1)->first();
        $cover = Cover::whereId(1)->first();
        $cover2 = Cover::whereId(2)->first();

        $tags = Tag::where('cover', 1)->get();
        $categories = Category::where('cover', 1)->with('subcategories')->get();
        $input = $request->all();
        if($request->get('search')){
            $articles = Article::where("name", "LIKE", "%{$request->get('search')}%")
                ->paginate(20);
        }else{
            $articles = Article::paginate(20);
        }
        $word = $request->get('search');
        return view('web.grid', compact('donation','cover2','cover','tags','articles','categories','word'));
    }
    public function tag($tag){
        $donation = Donation::whereId(1)->first();
        $cover = Cover::whereId(1)->first();
        $cover2 = Cover::whereId(2)->first();

        $categories = Category::where('cover', 1)->with('subcategories')->get();
        $etiqueta = Tag::whereSlug($tag)->first();
        $tags = Tag::where('cover', 1)->get();
        $articles= Article::whereHas('tags', function($query)use($tag){
            $query->where('slug', $tag);
        })
            ->orderBy('id','DESC')->paginate(20);
        return view('web.grid', compact('donation','cover2','cover','articles','categories','tags','etiqueta'));
    }
    public function subcategories($category,$subcategory){
        $donation = Donation::whereId(1)->first();
        $cover = Cover::whereId(1)->first();
        $cover2 = Cover::whereId(2)->first();

        $categories = Category::where('cover', 1)->with('subcategories')->get();
        $subcategory = Subcategory::whereSlug($subcategory)->where('cover', 1)->first();
        $category = Category::whereSlug($category)->first();
        $articles = Article::whereHas('subcategory', function($query) use ($subcategory){
            $query->where('id',$subcategory->id);
        })->orderBy('id','DESC')->paginate(20);
        $tags = Tag::where('cover', 1)->get();
        return view('web.grid', compact('donation','cover2','cover','categories','articles','category','tags','subcategory'));
    }
    public function categories($category){
        $donation = Donation::whereId(1)->first();
        $cover = Cover::whereId(1)->first();
        $cover2 = Cover::whereId(2)->first();

        $categories = Category::where('cover', 1)->with('subcategories')->get();
        $categoria =Category::whereSlug($category)->first();
        $tags = Tag::where('cover', 1)->get();
        $category = Category::whereSlug($category)->first();
        $articles = Article::whereHas('subcategory.category', function($query) use ($category){
            $query->where('id',$category->id);
        })->orderBy('id','DESC')->paginate(20);
        return view('web.grid', compact('donation','cover2','cover','categories','articles','categoria','tags','category'));
    }
    public function index(){
        $donation = Donation::whereId(1)->first();
       
        $cover = Cover::whereId(1)->first();
        $cover2 = Cover::whereId(2)->first();

        $socials = Social::orderBy('id','DESC')->get();
        
        $categories = Category::where('cover', 1)->with('subcategories')->get();
        $tags = Tag::where('cover', 1)->get();

        $articles = Article::orderBy('id','DESC')->take(8)->get();
        $articlesRecently = Article::orderBy('id','DESC')->take(8)->get();
        $articlesDownloaded = Article::orderBy('id','DESC')->take(8)->get();

        $articulosdescargados = Article::orderBy('visits','DESC')->take(8)->get();

        return view('web.index', compact('donation','cover2','cover','socials','categories','articles','articlesRecently','articlesDownloaded','tags','articulosdescargados'));
    }
}
