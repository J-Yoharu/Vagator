<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['error' => 'Usuário não cadastrado no banco de dados'],404);
        }
        else if (Hash::check($request->password,$user->password)) {
            
            $token = $user->tokens()->first();
            
            if (!empty($token)) {
                $user->tokens()->delete();
            } 
            
            $token = $user->createToken('Auth')->plainTextToken;

            return response()->json([
                'token' => $token,
                'user' => $user->only(['id','name'])
            ]);
        }
        
        return response()->json(['error' => 'Usuário ou senha inválidos'],400);

    }
    
    public function logout(Request $request){
         $user = User::find($request->id);

         $user->tokens()->delete();

         return response()->json(["success" => "deslogado"]);

    }
}
