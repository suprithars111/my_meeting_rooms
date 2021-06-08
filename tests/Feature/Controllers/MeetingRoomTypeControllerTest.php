<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\MeetingRoomType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MeetingRoomTypeControllerTest extends TestCase
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
    public function it_displays_index_view_with_meeting_room_types()
    {
        $meetingRoomTypes = MeetingRoomType::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('meeting-room-types.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.meeting_room_types.index')
            ->assertViewHas('meetingRoomTypes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_meeting_room_type()
    {
        $response = $this->get(route('meeting-room-types.create'));

        $response->assertOk()->assertViewIs('app.meeting_room_types.create');
    }

    /**
     * @test
     */
    public function it_stores_the_meeting_room_type()
    {
        $data = MeetingRoomType::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('meeting-room-types.store'), $data);

        $this->assertDatabaseHas('meeting_room_types', $data);

        $meetingRoomType = MeetingRoomType::latest('id')->first();

        $response->assertRedirect(
            route('meeting-room-types.edit', $meetingRoomType)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_meeting_room_type()
    {
        $meetingRoomType = MeetingRoomType::factory()->create();

        $response = $this->get(
            route('meeting-room-types.show', $meetingRoomType)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.meeting_room_types.show')
            ->assertViewHas('meetingRoomType');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_meeting_room_type()
    {
        $meetingRoomType = MeetingRoomType::factory()->create();

        $response = $this->get(
            route('meeting-room-types.edit', $meetingRoomType)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.meeting_room_types.edit')
            ->assertViewHas('meetingRoomType');
    }

    /**
     * @test
     */
    public function it_updates_the_meeting_room_type()
    {
        $meetingRoomType = MeetingRoomType::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'icon' => $this->faker->imageUrl($width = 640, $height = 480),
        ];

        $response = $this->put(
            route('meeting-room-types.update', $meetingRoomType),
            $data
        );

        $data['id'] = $meetingRoomType->id;

        $this->assertDatabaseHas('meeting_room_types', $data);

        $response->assertRedirect(
            route('meeting-room-types.edit', $meetingRoomType)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_meeting_room_type()
    {
        $meetingRoomType = MeetingRoomType::factory()->create();

        $response = $this->delete(
            route('meeting-room-types.destroy', $meetingRoomType)
        );

        $response->assertRedirect(route('meeting-room-types.index'));

        $this->assertSoftDeleted($meetingRoomType);
    }
}
