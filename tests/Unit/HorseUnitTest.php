<?php

namespace Tests\Unit;

use App\Models\Horse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class HorseUnitTest extends TestCase
{
    use RefreshDatabase;

    /**@test */
    public function it_has_name_age_win_horses_and_share()
    {
        $this->withoutExceptionHandling();
        $horse = Horse::factory()->create([
            'name' => 'Test Name',
            'age' => 21,
            'win_horses' => 12,
            'share' => 2,
        ]);

        $this->assertEquals('Test Name', $horse->location);
        $this->assertEquals(21, $horse->age);
        $this->assertEquals(12, $horse->win_horses);
        $this->assertEquals(2, $horse->share);
    }
}
