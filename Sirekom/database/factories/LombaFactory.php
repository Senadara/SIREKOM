<?php

namespace Database\Factories;

use App\Models\Lomba;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lomba>
 */
class LombaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Lomba::class;

    public function definition(): array
    {
        return [
            'idAdmin' => 1,
            'namaLomba' => $this->faker->words(3, true), // Generates a random name with 3 words
            'deskripsiLomba' => $this->faker->sentence(), // Generates a random sentence
            'tanggalBukaPendaftaran' => $this->faker->date(), // Generates a random date
            'tanggalTutupPendaftaran' => $this->faker->date(), // Generates a random date
            'posterLomba' => $this->faker->imageUrl(), // Generates a random image URL
            'lampiran' => $this->faker->fileExtension() // Generates a random file extension
        ];
    }
}
