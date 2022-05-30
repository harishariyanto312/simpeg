<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $first_name = $this->faker->firstName();
        $last_name = $this->faker->lastName();

        return [
            'employee_id' => $this->faker->randomNumber(8, true),
            'first_name' => $first_name,
            'last_name' => $last_name,
            'full_name' => $first_name . ' ' . $last_name,
            'sex' => $this->faker->randomElement(['F', 'M']),
            'birth_place' => $this->faker->city(),
            'date_of_birth' => $this->faker->dateTimeBetween('-30 years', '-17 years'),
            'marital_status' => $this->faker->randomElement(['SINGLE', 'MARRIED', 'WIDOWER', 'WIDOW']),
            'religion' => $this->faker->randomElement(['BUDDHIST', 'CATHOLIC', 'CHRISTIAN', 'HINDU', 'ISLAM', 'CONFUCIANISM', 'NONE']),
            'employee_type' => $this->faker->randomElement(['LOCAL', 'EXPATRIATE']),
            'blood_type' => $this->faker->randomElement(['O+', 'O-', 'A+', 'A-', 'AB+', 'AB-', 'B+', 'B-']),
            'id_number' => '3514230000000001',
            'id_address' => $this->faker->address(),
            'id_village' => $this->faker->streetName(),
            'id_subdistrict' => $this->faker->state(),
            'id_city' => $this->faker->city(),
            'current_address' => $this->faker->address(),
            'current_village' => $this->faker->streetName(),
            'current_subdistrict' => $this->faker->state(),
            'current_city' => $this->faker->city(),
            'home_phone' => '08' . $this->faker->randomNumber(8, true),
            'mobile_phone' => '08' . $this->faker->randomNumber(8, true),
            'email_address' => $this->faker->email(),
            'npwp_id' => $this->faker->randomNumber(8, true),
            'npwp_city' => $this->faker->city(),
            'npwp_date' => $this->faker->dateTimeBetween('-3 years', 'now'),
            'always_present' => 'N',
            'tax_code' => $this->faker->word(),
            'start_date' => $this->faker->dateTimeBetween('-10 years', 'now'),
            'final_date' => $this->faker->dateTimeBetween('now', '+2 years'),
            'basic_salary' => $this->faker->numberBetween(10, 100) . '00000',
            'unit' => $this->faker->randomElement(['MONTH', 'WEEK', 'DAY', 'HOUR', 'MINUTE']),
            'bank_account_number' => $this->faker->randomNumber(8, true),
            'bank_account_name' => $first_name . ' ' . $last_name,
            'nssf_occupation' => 'Y',
            'nssf_occupation_number' => $this->faker->randomNumber(8, true),
            'nssf_occupation_join_date' => $this->faker->dateTimeBetween('-3 years', 'now'),
            'nssf_health' => 'Y',
            'nssf_health_number' => $this->faker->randomNumber(8, true),
            'nssf_health_join_date' => $this->faker->dateTimeBetween('-3 years', 'now'),
        ];
    }
}
