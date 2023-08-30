<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    public function definition()
    {
        $faker = \Faker\Factory::create();

        return [
            'email' =>Str::lower( $faker->unique()->safeEmail),
            'password' => $faker->password, // Assuming you want to hash the password
            'Nom' => $faker->lastName,
            'Prenom' => $faker->firstName,
            'extension' => $faker->phoneNumber,
            'Role' => $faker->randomElement(['Autorisé', 'Restreint', 'Départ']),
            'Service' => $faker->randomElement(['Informatique', 'Ressources Humaines', 'Comptabilité et Finance','Service Marketing','Management','Clientele','Maintenance','Administration']),
            'Site' => $faker->randomElement(['Casablanca', 'Oujda', 'Paris']),
            'Date_Embauche' => $faker->dateTimeThisDecade,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
