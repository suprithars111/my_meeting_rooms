<?php

namespace Database\Factories;

use App\Models\MeetingRoom;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeetingRoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MeetingRoom::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'profile_image' => $this->faker->text(190),
            'link' => $this->faker->text(190),
            'organisation_id' => \App\Models\Organisation::factory(),
            'meeting_room_type_id' => \App\Models\MeetingRoomType::factory(),
        ];
    }
}
