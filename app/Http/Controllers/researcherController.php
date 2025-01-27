<?php

namespace App\Http\Controllers;
use App\Models\Researchers;
use App\Models\Fields; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class researcherController extends Controller
{
    public function index(){
        //$listOfResearchers = Researchers::all();
       $listOfResearchers = Researchers::paginate(5);
       $fields = Fields::all();
        return view('researchers', compact('listOfResearchers','fields'));

}
 public function search(Request $request)
{
    // Récupérer l'ID de la filiere sélectionnée
    $fieldId = $request->input('field_id');

    // Si une filiere a été sélectionnée, filtrer les chercheurs par cette filière
    if ($fieldId) {
        $listOfResearchers = Researchers::where('field_id', $fieldId)->paginate(5);
    } else {
        // Si aucune filiere n'est sélectionnée, afficher tous les chercheurs
        $listOfResearchers = Researchers::paginate(5);
    }
    $fields = Fields::all();
   

    // Retourner la vue avec les chercheurs filtrés et toutes les filiers disponibles
    return view('researchers', compact('listOfResearchers', 'fields'));
}
public function show(Request $request){
    $idResearcher=$request->id;
    $selectedResearcher=Researchers::find($idResearcher);
    return view('showResearchers', compact('selectedResearcher'));


}
public function create()
    {
        // Récupérer toutes les filieres
        $fields = Fields::all(); 

        // Passer les filieres à la vue create
        return view('create', compact('fields'));
    }
    public function store(Request $request)
    {
        $researcher = new Researchers;
        $researcher->firstName = $request->input('firstName');
        $researcher->lastName = $request->input('lastName');
        $researcher->email = $request->input('email');
        $researcher->password =Hash::make($request->input('password')) ;//$request->input('password');
        $researcher->field_id = $request->input('fields');
        
        $researcher->save();
        return redirect('/researchers')->with('successMsg', 'Researcher updated successfully');
}

   /* public function store(Request $request)
    {
        // Valider les données
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients,email',
            'password' => 'required|string|min:8',
            'cities' => 'required|exists:cities,id',
        ]);
    
        // Création d'un client
        $client = new Client;
        $client->firstName = $validated['firstName'];
        $client->lastName = $validated['lastName'];
        $client->email = $validated['email'];
        $client->password = bcrypt($validated['password']); // Assure-toi de hacher le mot de passe
        $client->city_id = $validated['cities'];
    
        $client->save();
    
        return redirect('/clients')->with('successMsg', 'Client created successfully!');
    }

    public function edit($id)
{
    $selectedClient = Client::find($id);
    
    if (!$selectedClient) {
        return redirect()->route('clients.index')->with('error', 'Client not found');
    }

    return view('showClient', compact('selectedClient'));
}*/


public function update(Request $request, $id)
    {
        $researcher = Researchers::find($id);
        $researcher->firstName = $request->input('firstName');
        $researcher->lastName = $request->input('lastName');
        $researcher->email = $request->input('email');
        
        $researcher->save();
        return redirect('/researchers')->with('successMsg', ' Researcher updated successfully');
    }
    public function destroy(Request $request, $id)
    {
        $researcher = Researchers::find($id);
        $researcher->delete();
        return redirect('/researchers')->with('successMsg', 'Researcher deleted successfully');
    }
    /*public function store(Request $request)
    {
        $client = new Client;
        $client->firstName = $request->input('firstName');
        $client->lastName = $request->input('lastName');
        $client->email = $request->input('email');
        $client->password = $request->input('password');
        $client->city_id = $request->input('cities');
        
        $client->save();
        return redirect('/clients')->with('successMsg', 'Client updated successfully');
}
    */

}
