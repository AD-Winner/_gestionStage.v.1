<?php

namespace Database\Factories;

use App\Models\Enseignant;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnseignantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Enseignant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'matricule' => $this->faker->random_int(1000,100000),
            'prenom' => $this->faker->lastName,
            'nom' => $this->faker->name,
            'sexe' => $this->faker->word(1),
            'code_postal' => $this->faker->postcode,
            'email' => $this->faker->email,
            'portable' => 00033345645,
            'adresse' => $this->faker->city
        ];
    }
}
