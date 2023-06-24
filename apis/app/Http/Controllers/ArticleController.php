<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Psy\Util\Json;
 
class ArticleController extends Controller
{
    public function index()
    {
        return Article::all();
    }
 
    public function show($id)
    {
        return Article::find($id);
    }

    public function store(Request $request)
    {
        
        $article = Article::create($request->all());
        return response()->json($article, 201);
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return response()->json($article, 204);
    }
}
