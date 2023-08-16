<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\materiel>
 */
class materialFactory extends Factory
{
    /**
     * Define the model's default state.
    *  
     * @return array<string, mixed>
     * 
     */

    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        return [
                'TypeProduit' => $faker->randomElement(['Ordinateur','Ecran','Telephone','Casque','Materiel reseau']),
                'Marque' => $faker->word,
                'Tag' => $faker->numberBetween(1000, 9999) . '-' . $faker->randomLetter . $faker->randomLetter . $faker->randomLetter . $faker->randomLetter,
                'AdresseMac' => $faker->macAddress,
                'N_Facture' => $faker->unique()->numerify('FA####'),
                'DateAchat' => $faker->dateTimeThisDecade,
                'Fournisseur' => $faker->name,
                'Emplacement' => $faker->randomElement(['Stock A', 'Stock B', 'Stock C', 'Stock D']),
                'Site' => $faker->randomElement(['Casablanca', 'Oujda', 'Paris']),
                'etat' => $faker->randomElement(['Disponible', 'Assigne', 'maintenance','rupture']),
                'created_at' => now(),
                'updated_at' => now(),
        ];
    }
}
