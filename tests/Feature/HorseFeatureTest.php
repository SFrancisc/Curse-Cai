<?php

namespace Tests\Feature;

use App\Models\Horse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HorseFeatureTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_list_horses()
    {
        Horse::factory()->count(3)->create();

        $response = $this->get(route('horses.index'));

        $response->assertStatus(200);
        $response->assertViewHas('horses');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_create_a_horse()
    {
        $horseData = [
            'name' => 'Test Name',
            'age' => 21,
            'win_races' => 12,
            'share' => 2,
        ];

        $response = $this->post(route('horses.store'), $horseData);

        $response->assertRedirect(route('horses.index'));
        $this->assertDatabaseHas('horses', $horseData);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_show_a_horse()
    {
        $horse = Horse::factory()->create();

        $response = $this->get(route('horses.show', $horse));

        $response->assertStatus(200);
        $response->assertViewHas('horse');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_update_a_horse()
    {
        $horse = Horse::factory()->create();
        $updatedData = [
            'name' => 'Test Name',
            'age' => 21,
            'win_races' => 12,
            'share' => 2,
        ];

        $response = $this->put(route('horses.update', $horse), $updatedData);

        $response->assertRedirect(route('horses.index'));
        $this->assertDatabaseHas('horses', $updatedData);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_delete_a_horse()
    {
        $this->withoutExceptionHandling();
        $horse = Horse::factory()->create();

        $this->assertEquals(1, Horse::count());
        $response = $this->delete(route('horses.destroy', ['_token' => csrf_token(), 'horse' => $horse]));

        $response->assertRedirect(route('horses.index'));
        $this->assertEquals(0, Horse::count());
    }
}
