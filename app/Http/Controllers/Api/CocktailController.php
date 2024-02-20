<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cocktail;
use Illuminate\Http\Request;

class CocktailController extends Controller
{
    public function index()
    {
        $cocktails = Cocktail::with('ingredients')->paginate(6);

        // Controllo se esiste cocktail
        if (!$cocktails) {
            return response()->json([
                'status' => false,
                'message' => 'Cocktail not found'
            ]);
        }

        return response()->json([
            'status' => true,
            'result' => $cocktails
        ]);
    }
    
    public function show(string $id){
        $cocktail = Cocktail::with('ingredients')->where('id', $id)->first();

        if (!$cocktail) {
            return response()->json([
                'status' => false,
                'message' => 'Cocktail not found'
            ]);
        }

        return response()->json([
            'status' => true,
            'result' => $cocktail
        ]);
    }
}