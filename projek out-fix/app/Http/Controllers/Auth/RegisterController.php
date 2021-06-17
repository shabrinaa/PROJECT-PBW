<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
            'profile_pics' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);


        $newImageName = time() . '-' . Str::slug($request->name) . '.' . $request->profile_pics->extension();

        $request->profile_pics->move(public_path('image'), $newImageName);

        // store user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'hak_akses' => 'user',
            'profile_pics' => $newImageName
        ]);

        // sign the user in
        Auth::attempt($request->only('email', 'password'));

        // // regirect
        return redirect()->route('dashboard');
    }
}
