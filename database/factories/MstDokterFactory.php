<?php

namespace Database\Factories;

use App\Models\MstDokter;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MstDokterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MstDokter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),

        ];
    }
}
