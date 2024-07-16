<?php

namespace Tests\Feature;

use App\Models\Race;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RaceFeatureTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_list_races()
    {
        Race::factory()->count(3)->create();

        $response = $this->get(route('races.index'));

        $response->assertStatus(200);
        $response->assertViewHas('races');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_create_a_race()
    {
        $raceData = [
            'location' => 'Test Location',
            'date' => '2024-06-23',
            'distance' => 1500,
        ];

        $response = $this->post(route('races.store'), $raceData);

        $response->assertRedirect(route('races.index'));
        $this->assertDatabaseHas('races', $raceData);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_show_a_race()
    {
        $race = Race::factory()->create();

        $response = $this->get(route('races.show', $race));

        $response->assertStatus(200);
        $response->assertViewHas('race');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_update_a_race()
    {
        $race = Race::factory()->create();
        $updatedData = [
            'location' => 'Updated Location',
            'date' => '2024-07-01',
            'distance' => 2000,
        ];

        $response = $this->put(route('races.update', $race), $updatedData);

        $response->assertRedirect(route('races.index'));
        $this->assertDatabaseHas('races', $updatedData);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_delete_a_race()
    {
        $this->withoutExceptionHandling();
        $race = Race::factory()->create();

        $this->assertEquals(1, Race::count());
        $response = $this->delete(route('races.destroy', ['_token' => csrf_token(), 'race' => $race]));

        $response->assertRedirect(route('races.index'));
        $this->assertEquals(0, Race::count());
    }
}
