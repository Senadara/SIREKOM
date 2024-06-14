<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'idLomba' => 1, // Ini akan ditimpa saat create
            'namaTask' => $this->faker->words(3, true),
            'tipe' => $this->faker->randomElement(['1', '2']),
            'deskripsiTask' => $this->faker->sentence(),
            'deadlineTask' => $this->faker->date(),
            'lampiran' => $this->faker->fileExtension(), // Mungkin sebaiknya file path atau URL
        ];
    }
}
