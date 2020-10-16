<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {   
        $user = User::find(1);
        Auth::attempt($request->all());
        $user->tokens()->delete();
        // $token = $user->createToken('token-name');
        return response()->json(Auth::check());
    }
}
