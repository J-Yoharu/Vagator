<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locale;

class LocaleController extends Controller
{
    public function index()
    {
        $locales = Locale::select('city','country', 'id', 'state')->orderBy('city')->get();

        return response()->json($locales);
    }
}
