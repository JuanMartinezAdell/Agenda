<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Organization;
use App\Models\Position;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'organization_id' => Organization::all()->random()->id,
            'position_id' => Position::all()->random()->id,
            'service_id' => Service::all()->random()->id,
            'location_id' => Location::all()->random()->id,
            'phone' => $this->faker->phoneNumber,
            'short_phone' => $this->faker->phoneNumber,
            'phone_code' => $this->faker->postcode,
            'email' => $this->faker->email,
            'alias' => $this->faker->sentence(),

        ];
    }
}
