<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller{
    public function index(Request $request) {
       $search = $request->input('search');
    //  dd($search);
 
       //$articles = "";
       //$articles->load('category');
        //$query = Article::query();
        //if(!empty($search)){
          //  $query->where('title','like','%'.$search.'%');
        //}
        return view('article.index', ['articles' => Article::scopeOrder($request->sort)]);

      } 


    public function create(){
        return view('article.create');
    }

    public function store(Request $request){
        $article = new Article;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->user_id = auth()->user()->id;
        $article->save();

        return redirect('/');
    }

    public function edit(Request $request, $id) {
        $article = Article::find($id);
        return view('article.edit', ['article' => $article]);
    }

    public function update(Request $request) {
        $article = Article::find($request->id);
        $article->title = $request->title;
        $article->body = $request->body;
        $article->save();

        return view('article.update');
    }

    public function show(Request $request, $id) {
        $article = Article::find($id);
        return view('article.show', ['article' => $article]);
    }

    public function delete(Request $request) {
        Article::destroy($request->id);
        return view('article.delete');
    }

    public function search(Request $request){
        $search = $request->input('search');
        $query = Article::query();
        if(!empty($search)){
            $query->where('title','like','%'.$search.'%');
            $query->where('body','like','%'.$search.'%');
        }
        
        //DB::table('articles')->where('title', 'like', '%' .$search. '%')->count();

        $article = DB::table('articles')->where('title', 'like', '%' .$search. '%')->orWhere('body', 'like', '%' .$search. '%')->paginate(10);
        return view('article.index',['articles' => $article])
        ->with('search',$search);
     
    
    }



    public function __construct()
    {
        $this->middleware('auth')->only('create','store','edit','update','delete');
    }



//消してもいいかも
    public function order($sort){
        
    if($sort == 'arc'){
        return $this->orderBy('created_at', 'asc')->get();
    }elseif($sort == 'desc'){
        return $this->orderBy('created_at','desc')->get();
    }else{
        return $this->all();
    }
    }
}