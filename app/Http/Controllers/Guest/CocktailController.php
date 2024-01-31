<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Cocktail;
use Illuminate\Http\Request;

class CocktailController extends Controller
{
    public function index()
    {

        $cocktails = Cocktail::orderBy('name')->get();



        return view('home', compact('cocktails'));
    }
}
