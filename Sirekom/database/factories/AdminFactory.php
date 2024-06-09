<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Admin::class;
    public function definition(): array
    {
        return [
            'username' => $this->faker->userName,
            'password' => Hash::make('password'),
            'namaMahasiswa' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'nim' => $this->faker->unique()->numerify('##########'),
            'jurusan' => $this->faker->word,
            'angkatan' => $this->faker->year,
            'noHP' => $this->faker->numerify('##########'),
            'fotoProfile' => $this->faker->imageUrl(640, 480, 'people', true, 'Faker'),
        ];
    }
}
