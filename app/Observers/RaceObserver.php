<?php

namespace App\Observers;

use Illuminate\Support\Facades\Log;
use App\Models\Race;

class RaceObserver
{
    /**
     * Handle the Race "created" event.
     */
    public function created(Race $race): void
    {
        Log::info('Race created: ', ['id' => $race->id, 'location' => $race->location]);
    }

    /**
     * Handle the Race "updated" event.
     */
    public function updated(Race $race): void
    {
        Log::info('Race updated: ', ['id' => $race->id, 'location' => $race->location]);
    }

    /**
     * Handle the Race "deleted" event.
     */
    public function deleted(Race $race): void
    {
        Log::info('Race deleted: ', ['id' => $race->id, 'location' => $race->location]);
    }

    /**
     * Handle the Race "restored" event.
     */
    public function restored(Race $race): void
    {
        Log::info('Race restored: ', ['id' => $race->id, 'location' => $race->location]);
    }

    /**
     * Handle the Race "force deleted" event.
     */
    public function forceDeleted(Race $race): void
    {
        Log::info('Race force deleted: ', ['id' => $race->id, 'location' => $race->location]);
    }
}
