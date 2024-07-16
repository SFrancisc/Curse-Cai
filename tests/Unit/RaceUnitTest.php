<?php

namespace Tests\Unit;

use App\Models\Race;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class RaceUnitTest extends TestCase
{
    use RefreshDatabase;

    /**@test */
    public function it_has_location_date_and_distance()
    {
        $this->withoutExceptionHandling();
        $race = Race::factory()->create([
            'location' => 'Test Location',
            'date' => '2024-06-23',
            'distance' => 1500,
        ]);

        $this->assertEquals('Test Location', $race->location);
        $this->assertEquals('2024-06-23', $race->date);
        $this->assertEquals(1500, $race->distance);
    }
}
