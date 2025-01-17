<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:6|nullable',
            'phone_number' => 'required|string|max:30',
        ]);

        try {
            $user = User::create([
                'name' => $validatedData['name'],
                'last_name'  => $validatedData['last_name'],
                'email'      => $validatedData['email'],
                'password'   => Hash::make($validatedData['password']),
                'phone_number'  => $validatedData['phone_number'] ?? null,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Usuario registrado con éxito.',
                'user' => $user,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al registrar el usuario.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
