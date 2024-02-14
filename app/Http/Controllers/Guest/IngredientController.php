<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;
use App\Models\Ingredient;
use Illuminate\Support\Str;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('admin.ingredients.index', compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ingredients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIngredientRequest $request)
    {
        $data = $request->validated();

        $ingredient = new Ingredient();
        $ingredient->name = $data['name'];
        $ingredient->slug = Str::slug($data['name']);

        $ingredient->save();

        return redirect()->route('ingredients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingredient $ingredient)
    {
        return view('admin.ingredients.show', compact('ingredient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingredient $ingredient)
    {
        return view('admin.ingredients.edit', compact('ingredient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIngredientRequest $request, Ingredient $ingredient)
    {
        $data = $request->validated();

        $ingredient->name = $data['name'];
        $ingredient->slug = Str::slug($data['name']);

        $ingredient->save();

        return redirect()->route('ingredients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return redirect()->route('ingredients.index');
    }
}
