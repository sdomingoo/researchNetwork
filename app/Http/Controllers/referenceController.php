<?php

namespace App\Http\Controllers;
use App\Models\References;
use App\Models\Articles;
use Illuminate\Http\Request;

class referenceController extends Controller
{
    public function index($articleId)
    {
        $article = Articles::findOrFail($articleId);
        $references = $article->references()->paginate(10);
        return view('indexref', compact('article', 'references'));
    }

    public function create($articleId)
    {
        $article = Articles::findOrFail($articleId);
        return view('createrefe', compact('article'));
    }

    public function store(Request $request, $articleId)
    {
        $validated = $request->validate([
            'description' => 'required|string',
        ]);

        $reference = new References($validated);
        $reference->article_id = $articleId;
        $reference->save();

        return redirect()->route('admin.references.index', $articleId)->with('success', 'Reference added successfully.');
    }

    public function edit($id)
    {
        $reference = References::findOrFail($id);
        return view('editrefe', compact('reference'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'description' => 'required|string',
        ]);

        $reference = References::findOrFail($id);
        $reference->update($validated);

        return redirect()->route('admin.references.index', $reference->article_id)->with('success', 'Reference updated successfully.');
    }

    public function destroy($id)
    {
        $reference = References::findOrFail($id);
        $reference->delete();

        return redirect()->route('admin.references.index', $reference->article_id)->with('success', 'Reference deleted successfully.');
    }

    

    public function myReferences()
    {
        $researcherId = session('researcherId'); // Get the logged-in researcher ID.
    
        // Fetch articles authored by the researcher, along with their references.
        $articles = Articles::with('references')
            ->where('researcher_id', $researcherId)
            ->paginate(5);
    
        return view('myreferences', compact('articles'));
    }
    
 
public function updateReference(Request $request, $id)
{
    $validated = $request->validate([
        'description' => 'required|string',
    ]);

    $reference = References::findOrFail($id);
    $reference->update($validated);

    // Redirect to the home page with a success message
    return redirect()->route('home.index')->with('success', 'Référence mise à jour avec succès !');
}

}
