<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->password == $request->password) {
                $token = $user->createToken('Auth');

                return response()->json([
                    'token' => $token->plainTextToken,
                    'user' => $user
                ]);
            }
        }

        return response()->json(['error' => 'Usuário inexistente']);

    }
}
