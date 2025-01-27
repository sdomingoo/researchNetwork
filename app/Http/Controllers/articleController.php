<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Researchers;
use Illuminate\Http\Request;

class articleController extends Controller
{
    public function index()
    {
        $articles = Articles::with('researcher')->paginate(5);
        return view('index', compact('articles'));
    }

    public function create()
    {
        $researchers = Researchers::all();
        return view('createartc', compact('researchers'));
    }
    public function store(Request $request)
{
    // Validate the request data
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'researcher_id' => 'required|exists:researchers,id',
        'reference' => 'nullable|string|max:255',
    ]);

    // Create a new article
    $article = Articles::create([
        'title' => $validated['title'],
        'content' => $validated['content'],
        'researcher_id' => $validated['researcher_id'],
    ]);

    // Save the reference if provided
    if (!empty($validated['reference'])) {
        $article->references()->create([
            'description' => $validated['reference'],
        ]);
    }

    // Redirect to the home page with a success message
    return redirect()->route('home.index')->with('success', 'Article publié avec succès avec sa référence !');
}

    public function edit($id)
    {
        $article = Articles::findOrFail($id);
        $researchers = Researchers::all();
        return view('edit', compact('article', 'researchers'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'researcher_id' => 'required|exists:researchers,id',
        ]);

        $article = Articles::findOrFail($id);
        $article->title = $validated['title'];
        $article->content = $validated['content'];
        $article->researcher_id = $validated['researcher_id'];
        $article->save();

        return redirect()->route('index')->with('success', 'Article updated successfully!');
    }

    public function destroy($id)
    {
        $article = Articles::findOrFail($id);
        $article->delete();

        return redirect()->route('index')->with('success', 'Article deleted successfully!');
    }

    public function myArticles()
{
    // Get the currently logged-in researcher's ID
    $researcherId = session('researcherId');

    // Fetch articles authored by the logged-in researcher
    $articles = Articles::where('researcher_id', $researcherId)->paginate(5);

    return view('myarticles', compact('articles'));
}

public function publish()
{
    $researchers = Researchers::all();
    return view('publisharticle', compact('researchers'));
}

public function updateArticle(Request $request, $id)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    $article = Articles::findOrFail($id);

    // Ensure only the owner can edit the article
    if ($article->researcher_id !== session('researcherId')) {
        return redirect()->route('home.index')->with('error', 'You are not authorized to edit this article.');
    }

    $article->title = $validated['title'];
    $article->content = $validated['content'];
    $article->save();

    // Redirect to the home page with a success message
    return redirect()->route('home.index')->with('success', 'Article updated successfully!');
}




}
