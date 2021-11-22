<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
	public function locale($locale)
	{
		session()->put('locale', $locale);
		return redirect()->back();
	}

    public function homepageView()
    {
        $articles = Article::where('is_accepted', true)
                             ->latest()
                             ->take(5)
                             ->get();
        $titlePage = "Presto - Annunci da Tutta Italia";
        return view('welcome', compact('titlePage', 'articles'));
    }

    public function articleDetails($title,$id)
    {
        $articleDetail = Article::find($id);
        return view('articleDetails', compact('title', 'articleDetail'));
    }

	public function articlesByCategory($categoryName = null, $category_id = null) {
		$titlePage = "Tutti i nostri annunci!";
		// se non viene indicato un id vengono mostrati tutti gli annunci
		// altrimenti vengono mostrati gli annunci corrispondenti all'id della categoria
		if ($category_id == null) {
		 	$categories = Category::all();
         	$articles = Article::where('is_accepted', true)
			 					 ->latest()
								 ->paginate(6);
        	return view('annunci', compact('titlePage', 'articles', 'categories'));
		} else {
			$categories = Category::all();
			$articles = Article::where("category_id", $category_id)
								->where('is_accepted', true)
								->latest()
								->paginate(6);
			return view('annunci', compact('titlePage', 'articles', 'categories'));
		}
	}

	public function searchArticles(Request $request) {
		$titlePage = "Tutti i nostri annunci!";
		$categories = Category::all();
		// se q è una stringa vuota non viene mostrato nulla
		$q = $request->input('q');
		$articles = Article::search($q)->where('is_accepted', true)->query(function ($builder) {
			// eager loading delle ralazioni del modello
			// https://laravel.com/docs/8.x/eloquent-relationships#eager-loading
			// (in questo caso non ci interessano?)
			$builder->with([]);
		})->paginate(6);
		
		return view('annunci', compact('titlePage', 'categories', 'articles'));
	}
}
