<?php

namespace App\Http\Controllers;

use App\Models\Researchers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $researcher = Researchers::where('email', $request->email)->first();

        if($researcher && Hash::check($request->password, $researcher->password)) {
            Session::put('researcherId', $researcher->id);
            Session::put('researcherName', $researcher->firstName . ' ' . $researcher->lastName);
            //return redirect()->route('home.index');
            return redirect()->route('about');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }

    public function checkAuth()
    {
        if(!Session::has('researcherId')) {
            return redirect('/login');
        }
    }
}

