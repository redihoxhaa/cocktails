<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = ['Rum', 'Vodka', 'Whisky', 'Fuoco dell\'Etna', 'Latte di Suocera'];


        foreach ($ingredients as $ing) {

            $new_ingredient = new Ingredient();

            $new_ingredient->name = $ing;

            $new_ingredient->slug = Str::slug($ing);

            $new_ingredient->save();
        }
    }
}
