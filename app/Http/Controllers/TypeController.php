<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::select('id','type')->orderBy('type')->get();

        return response()->json($types);
    }
}
