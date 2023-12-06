<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    //login
    public function login(Request $request)
    {
        $credential = $request->only('email', 'password');

        if (Auth::attempt($credential)) {
            return redirect('home');
        } else {
            return redirect('/')->withErrors(['error' => 'Invalid credentials'])->withInput();
        }
    }


    //register
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect('register')->withErrors($validator)->withInput();
        }


        $newuser = new User();
        $newuser->name = $request->name;
        $newuser->email = $request->email;
        $newuser->password = Hash::make($request->password);
        $newuser->save();


        // return response()->json([
        //     'status' => true,
        //     'message' => 'succefully registered',
        // ]);

        return redirect('/');
    }

    //logout
    public function logout(Request $request)
    {

        if (Auth::check()) {
           
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        } else {
            // return response()->json([
            //     'status' => false,
            //     'message' => 'Already Logged Out'
            // ], 400);

            return redirect('/');
        }
    }
}
