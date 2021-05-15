<?php

namespace Database\Factories;

use App\Models\Resident;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ResidentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resident::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->name,
            'surname'  => $this->faker->name,
            'second_surname'  => Str::random(10),
            'nationality'  => Str::random(10),
            'identification'  => Str::random(10),
            'genre'  => Str::random(10),
            'record'  => Str::random(10),
            'age'  => Str::random(10),
            'religion'  => Str::random(10),
            'date_birth'  => Str::random(10),
            'origin'  => Str::random(10),
            'status'  => Str::random(10),
            'admission_date'  => Str::random(10),
            'egress_date'  => Str::random(10),
            'entry_hour'  => now(),
            'egress_hour'  => Str::random(10),
            'egress_reason'  => Str::random(10),
            'first_treatment'  => Str::random(10),
            'another_center_entered'  => Str::random(10),
            'times_he_entered'  => Str::random(10),
            'marital_status'  => Str::random(10),
            'have_children'  => Str::random(10),
            'children_number'  => Str::random(10),
            'job'  => Str::random(10),
            'occupation'  => Str::random(10),
            'study'  => Str::random(10),
            'educational_level'  => Str::random(10),
            'kind_resident'  => Str::random(10),
            'cellphone'  => Str::random(10),
            'on_street'  => Str::random(10),
            'referral_from_cai'  => Str::random(10),
            'destiny'  => Str::random(10),
            'destiny_reason'  => Str::random(10),
            'province'  => Str::random(10),
            'canton'  => Str::random(10),
            'address'  => Str::random(10),
            'psychiatric_diagnosis'  => Str::random(10),
            'drug_dependence_diagnosis'  => Str::random(10),
            'consumption_data_table'  => json_encode(Str::random(10)),
            'pending_cases'  => Str::random(10),
            'egress'  => Str::random(10),
            'egress_reason_law'  => Str::random(10),
            'drugs'  => Str::random(10),
            'sexual_nature'  => Str::random(10),
            'against_property'  => Str::random(10),
            'against_life'  => Str::random(10),
            'others_law'  => Str::random(10),
            'bath'  => Str::random(10),
            'clothe'  => Str::random(10),
            'listens'  => Str::random(10),
            'bedroom'  => Str::random(10),
            'breakfast'  => Str::random(10),
            'morning_snack'  => Str::random(10),
            'lunch'  => Str::random(10),
            'afternoon_snack'  => Str::random(10),
            'dinner'  => Str::random(10),
            'psychology'  => Str::random(10),
            'social_work'  => Str::random(10),
            'medicine'  => Str::random(10),
            'counseling'  => Str::random(10),
            'occupational_therapy'  => Str::random(10),
            'group_sessions'  => Str::random(10),
            'others'  => Str::random(10),
            'commentaries'  => Str::random(10),
        ];
    }
}
