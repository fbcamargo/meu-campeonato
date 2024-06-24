<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    function login(Request $request) {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);        

        if(Auth::attempt([
            "email" => $request->email,
            "password" => $request->password
        ])) {
            $user = Auth::user();
            $token = $user->createToken("meuCampeonato")->accessToken; 
            return response()->json([
                "success" => true,
                "message" => "Login feito com sucesso!",
                "access_token" => $token
            ]);
        } else {
            return response()->json([
                "success" => false,
                "message" => "Usuário ou senha incorretos!"
            ]);
        }
    }

    function logout() {
        auth()->user()->token()->revoke();

        return response()->json([
            "status" => 1,
            "message" => "Logout feito com sucesso!"
        ]);
    }

    function store(Request $request) {
        $request->validate([
        "name" => "required",
        "email" => "required|email|unique:users",
        "password" => "required|confirmed"
        ]);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        return response()->json([
            "status" => 1,
            "message" => "Usuário criado com sucesso!"
        ]);
    }
}
