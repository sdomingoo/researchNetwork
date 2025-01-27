<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Fields;
use App\Models\Articles;


class AuthController extends Controller
{
    public function showSignupForm()
    {
        $fields = Fields::all(); // Assuming you have a `Field` model
        return view('signup', compact('fields'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'fields' => 'required',
            'password' => 'required|min:6',
        ]);

        User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'field_id' => $request->fields,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully. Please log in.');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('welcome');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function welcome()
    {
        $articles = Articles::all(); // Assuming you have an `Article` model
        return view('welcome', compact('articles'));
    }
}

