<?php

namespace Database\Seeders;

use App\Models\Cocktail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CocktailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 15; $i++) {
            $cocktail = new Cocktail();
            $cocktail->name = $faker->company($maxNbChars = 20);
            $cocktail->is_alcoholic = $faker->boolean();
            if ($cocktail->is_alcoholic === true) {
                $cocktail->alcohol_grade = $faker->randomFloat(1, 0.1, 99);
                $cocktail->category = $faker->randomElement(['dolce', 'secco', 'amaro', 'aspro', 'super alcolico']);
            } else {
                $cocktail->category = 'analcolico';
            }

            $cocktail->save();
        }
    }
}
