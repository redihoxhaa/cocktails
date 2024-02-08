<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Cocktail;
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
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Prendo i dati post
        $data = $request->all();

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
        return view('admin.edit', compact('cocktail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cocktail $cocktail)
    {
        $data = $request->all();

        $cocktail->update($data);

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

        $cocktail->save();

        return redirect()->route('cocktails.show', $cocktail);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cocktail $cocktail)
    {
        $cocktail->delete();

        return redirect()->route('cocktails.index');
    }
}
