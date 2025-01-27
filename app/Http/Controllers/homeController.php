<?php

namespace App\Http\Controllers;
use App\Models\Articles;
use App\Models\Researchers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class homeController extends Controller

{
    public function index()
    {
        if(!Session::has('researcherId')) {
            return redirect('/login');
        }

        $articles = Articles::with(['researcher', 'references'])
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);

        $loggedInResearcher = Researchers::find(Session::get('researcherId'));
                    
        return view('home', compact('articles', 'loggedInResearcher'));
    }

    public function myArticles()
    {
        if(!Session::has('researcherId')) {
            return redirect('/login');
        }

        $researcherId = Session::get('researcherId');
        $articles = Articles::where('researcher_id', $researcherId)
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);
                    
        return view('home.myarticles', compact('articles'));
    }

    public function showCreateForm()
    {
        if(!Session::has('researcherId')) {
            return redirect('/login');
        }
        
        return view('home.create');
    }

    public function storeArticle(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $article = new Articles();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->researcher_id = Session::get('researcherId');
        $article->save();

        return redirect()->route('home.myarticles')->with('success', 'Article created successfully');
    }
}

