<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth.revisor');
    }

    public function revisorHome()
    {   
        $articles = Article::where('is_accepted', null)
                             ->orderBy('created_at')
                             ->first();
        $artCount = Article::where('is_accepted', 1)
                           ->orWhere('is_accepted', 0)
                           ->count();
        return view('revisorHome', compact('articles'))->with(['artCount' => $artCount]);
    }

    public function revisorAccept($article_id)
    {

        $article = Article::find($article_id);
        $article->is_accepted = true;
        $article->save();
        return redirect()->route('revisorHome');
    }

    public function revisorReject($article_id)
    {
        $article = Article::find($article_id);
        $article->is_accepted = false;
        $article->save();
        return redirect()->route('revisorHome');
    }

    public function revisorUndo()
    {
        $article = Article::where('is_accepted', 1)
                             ->orWhere('is_accepted', 0)
                             ->latest('created_at')
                             ->first();
        $article->is_accepted = null;
        $article->save();
        return redirect(route('revisorHome'));
    }
    
}
