<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function index()
    {
        $articles = Article::paginate(4);
        //dd($articles);
        return view('articles', [
            'articles' => $articles,
            'categories' => Category::all()
        ]);
    }

    public function show(Article $article)
    {
        //$article = Article::where('slug', $slug)->firstOrFail();
        //dd($article);
        return view('article', [
            'article' => $article
        ]);
    }
}
