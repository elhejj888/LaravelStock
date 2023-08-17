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
            'Email' => $faker->unique()->safeEmail,
            'Email_verified_at' => $faker->randomElement([null, now()]),
            'Password' => $faker->password, // Assuming you want to hash the password
            'Matricule' => $faker->bothify('MTR#####'),
            'Nom' => $faker->lastName,
            'Prenom' => $faker->firstName,
            'extension' => $faker->phoneNumber,
            'Role' => $faker->randomElement(['Autorisé', 'Restreint', 'Exclu']),
            'Service' => $faker->randomElement(['Informatique', 'Ressources Humaines', 'Comptabilité et Finance','Service Marketing','Management','Clientele','Maintenance','Administration']),
            'Ville' => $faker->randomElement(['Casablanca', 'Oujda', 'Paris']),
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
