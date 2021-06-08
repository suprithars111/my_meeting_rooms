<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\MeetingRoom;

use App\Models\Organisation;
use App\Models\MeetingRoomType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MeetingRoomControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_meeting_rooms()
    {
        $meetingRooms = MeetingRoom::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('meeting-rooms.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.meeting_rooms.index')
            ->assertViewHas('meetingRooms');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_meeting_room()
    {
        $response = $this->get(route('meeting-rooms.create'));

        $response->assertOk()->assertViewIs('app.meeting_rooms.create');
    }

    /**
     * @test
     */
    public function it_stores_the_meeting_room()
    {
        $data = MeetingRoom::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('meeting-rooms.store'), $data);

        unset($data['organisation_id']);

        $this->assertDatabaseHas('meeting_rooms', $data);

        $meetingRoom = MeetingRoom::latest('id')->first();

        $response->assertRedirect(route('meeting-rooms.edit', $meetingRoom));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_meeting_room()
    {
        $meetingRoom = MeetingRoom::factory()->create();

        $response = $this->get(route('meeting-rooms.show', $meetingRoom));

        $response
            ->assertOk()
            ->assertViewIs('app.meeting_rooms.show')
            ->assertViewHas('meetingRoom');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_meeting_room()
    {
        $meetingRoom = MeetingRoom::factory()->create();

        $response = $this->get(route('meeting-rooms.edit', $meetingRoom));

        $response
            ->assertOk()
            ->assertViewIs('app.meeting_rooms.edit')
            ->assertViewHas('meetingRoom');
    }

    /**
     * @test
     */
    public function it_updates_the_meeting_room()
    {
        $meetingRoom = MeetingRoom::factory()->create();

        $organisation = Organisation::factory()->create();
        $meetingRoomType = MeetingRoomType::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'profile_image' => $this->faker->text(190),
            'link' => $this->faker->text(190),
            'organisation_id' => $organisation->id,
            'meeting_room_type_id' => $meetingRoomType->id,
        ];

        $response = $this->put(
            route('meeting-rooms.update', $meetingRoom),
            $data
        );

        unset($data['organisation_id']);

        $data['id'] = $meetingRoom->id;

        $this->assertDatabaseHas('meeting_rooms', $data);

        $response->assertRedirect(route('meeting-rooms.edit', $meetingRoom));
    }

    /**
     * @test
     */
    public function it_deletes_the_meeting_room()
    {
        $meetingRoom = MeetingRoom::factory()->create();

        $response = $this->delete(route('meeting-rooms.destroy', $meetingRoom));

        $response->assertRedirect(route('meeting-rooms.index'));

        $this->assertSoftDeleted($meetingRoom);
    }
}
