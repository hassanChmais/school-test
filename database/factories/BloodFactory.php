<?php

namespace Database\Factories;

use App\Models\Type_blood;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Type_blood::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $bgs = ['O-','O+','A-','A+','AB+','AB-'];
        foreach ($bgs as $b) {
                    return [
            //
            'name_blood' => $b,
            'created_at' => now(),
            'updated_at'=>now(),

        ];
        }
    }
}
