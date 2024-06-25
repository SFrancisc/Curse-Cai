<?php

namespace App\Observers;

use App\Models\Race;

class RaceObserver
{
    /**
     * Handle the Race "created" event.
     */
    public function created(Race $race): void
    {
        //
    }

    /**
     * Handle the Race "updated" event.
     */
    public function updated(Race $race): void
    {
        //
    }

    /**
     * Handle the Race "deleted" event.
     */
    public function deleted(Race $race): void
    {
        //
    }

    /**
     * Handle the Race "restored" event.
     */
    public function restored(Race $race): void
    {
        //
    }

    /**
     * Handle the Race "force deleted" event.
     */
    public function forceDeleted(Race $race): void
    {
        //
    }
}
