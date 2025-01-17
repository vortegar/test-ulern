<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\User;

class AuthController
{
    public function login(Request $request)
    {

        Log::info('Hola un usuario esta intentando ingresar.');

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json([
                'success' => true,
                'message' => 'Inicio de sesión exitoso',
                'user' => $user,
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Credenciales inválidas',
        ], 401);
    }

   public function userProfile()
   {
       $userId = Auth::id();
       $user = User::find($userId);

       if ($user) {
           return response()->json($user);
       } else {
           return response()->json(['message' => 'Usuario no encontrado'], 404);
       }
   }

}

