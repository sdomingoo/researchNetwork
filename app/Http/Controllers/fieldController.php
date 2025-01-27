<?php

namespace App\Http\Controllers;


use App\Models\Fields;
use Illuminate\Http\Request;

class fieldController extends Controller
{
    public function showForm()
    {
        return view('form');
    }
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'fieldName' => 'required|string|max:255',
        ]);

        // Insertion dans la base de données
        $field = new Fields();
        $field->fieldName = $request->input('fieldName');
        $field->save();

        // Retour avec un message de succès
        return redirect()->route('field.form')->with('success', 'Field added successfully!');
    }
    public function index()
    {
        $fields=Fields::all();
        return view ('create',compact('fields'));
    }
}
