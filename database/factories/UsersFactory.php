<?php

namespace Database\Factories;

use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Users::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'userName' => $this->faker->word,
        'name' => $this->faker->word,
        'phone' => $this->faker->word,
        'email' => $this->faker->word,
        'image' => $this->faker->word,
        'role_id' => $this->faker->randomDigitNotNull,
        'email_verified_at' => $this->faker->date('Y-m-d H:i:s'),
        'password' => $this->faker->word,
        'remember_token' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
