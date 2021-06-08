<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Organisation;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrganisationControllerTest extends TestCase
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
    public function it_displays_index_view_with_organisations()
    {
        $organisations = Organisation::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('organisations.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.organisations.index')
            ->assertViewHas('organisations');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_organisation()
    {
        $response = $this->get(route('organisations.create'));

        $response->assertOk()->assertViewIs('app.organisations.create');
    }

    /**
     * @test
     */
    public function it_stores_the_organisation()
    {
        $data = Organisation::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('organisations.store'), $data);

        $this->assertDatabaseHas('organisations', $data);

        $organisation = Organisation::latest('id')->first();

        $response->assertRedirect(route('organisations.edit', $organisation));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_organisation()
    {
        $organisation = Organisation::factory()->create();

        $response = $this->get(route('organisations.show', $organisation));

        $response
            ->assertOk()
            ->assertViewIs('app.organisations.show')
            ->assertViewHas('organisation');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_organisation()
    {
        $organisation = Organisation::factory()->create();

        $response = $this->get(route('organisations.edit', $organisation));

        $response
            ->assertOk()
            ->assertViewIs('app.organisations.edit')
            ->assertViewHas('organisation');
    }

    /**
     * @test
     */
    public function it_updates_the_organisation()
    {
        $organisation = Organisation::factory()->create();

        $user = User::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'user_id' => $user->id,
        ];

        $response = $this->put(
            route('organisations.update', $organisation),
            $data
        );

        $data['id'] = $organisation->id;

        $this->assertDatabaseHas('organisations', $data);

        $response->assertRedirect(route('organisations.edit', $organisation));
    }

    /**
     * @test
     */
    public function it_deletes_the_organisation()
    {
        $organisation = Organisation::factory()->create();

        $response = $this->delete(
            route('organisations.destroy', $organisation)
        );

        $response->assertRedirect(route('organisations.index'));

        $this->assertSoftDeleted($organisation);
    }
}
