<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index(Request $request) {
        return view('article.index', ['articles' => Article::scopeOrder($request->sort)]);
    }
    
    public function create(){
        return view('article.create');
    }

    public function store(Request $request){
        $article = new Article;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->save();

        return view('article.store');
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
     $search = $request->get('search');
     $article = DB::table('articles')->where('title', 'like', '%' .$search. '%')-> paginate(10);
     return view('article.index',['articles' => $article]);
    }
}



