<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Mahasiswa::class;
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
