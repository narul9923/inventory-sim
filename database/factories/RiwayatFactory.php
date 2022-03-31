<?php

namespace Database\Factories;

use App\Models\Riwayat;
use Illuminate\Database\Eloquent\Factories\Factory;

class RiwayatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Riwayat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'barang_id' => $this->faker->word,
        'user_id' => $this->faker->word,
        'jumlah' => $this->faker->word,
        'tipe' => $this->faker->word,
        'created_by' => $this->faker->word,
        'updated_by' => $this->faker->word,
        'deleted_by' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
