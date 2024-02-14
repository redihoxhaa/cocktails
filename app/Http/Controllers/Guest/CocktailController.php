<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCocktailRequest;
use App\Http\Requests\UpdateCocktailRequest;
use App\Models\Cocktail;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class CocktailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cocktails = Cocktail::orderBy('name')->get();

        return view('home', compact('cocktails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ingredients = Ingredient::all();

        return view('admin.create', compact('ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCocktailRequest $request)
    {
        // Prendo i dati post
        $data = $request->validated();

        // Creo nuova istanza fumetto
        $cocktail = new Cocktail();

        // Mappo i dati del form
        $cocktail->name = $data['name'];
        $cocktail->alcohol_grade = $data['alcohol_grade'];

        if ($cocktail->alcohol_grade === "0") {
            $cocktail->category = 'analcolico';
            $cocktail->is_alcoholic = 0;
        } else {
            $cocktail->category = $data['category'];
            $cocktail->is_alcoholic = 1;
        }
        $cocktail->thumb = $data['thumb'];

        // Salvo l'istanza
        $cocktail->save();

        if (isset($data['ingredients'])) {
            $cocktail->ingredients()->sync($data['ingredients']);
        }

        // Redirect alla pagina del nuovo fumetto (possiamo passare l'istanza in quanto la ricerca per id è automatica)
        return redirect()->route('cocktails.show', $cocktail);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cocktail $cocktail)
    {
        return view('admin.show', compact('cocktail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cocktail $cocktail)
    {
        $ingredients = Ingredient::all();
        return view('admin.edit', compact('cocktail', 'ingredients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCocktailRequest $request, Cocktail $cocktail)
    {


        $data = $request->validated();

        $cocktail->name = $data['name'];
        $cocktail->alcohol_grade = $data['alcohol_grade'];

        if ($cocktail->alcohol_grade === "0") {
            $cocktail->category = 'analcolico';
            $cocktail->is_alcoholic = 0;
        } else {
            $cocktail->category = $data['category'];
            $cocktail->is_alcoholic = 1;
        }

        if ($request->has('ingredients')) {
            $cocktail->ingredients()->sync($data['ingredients']);
        } else {
            $cocktail->ingredients()->sync([]);
        }

        $cocktail->thumb = $data['thumb'];

        $cocktail->save();

        return redirect()->route('cocktails.show', $cocktail);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cocktail $cocktail)
    {
        $cocktail->ingredients()->sync([]);
        $cocktail->delete();

        return redirect()->route('cocktails.index');
    }
}
