<?php

namespace App\Observers;

use Illuminate\Support\Facades\Log;
use App\Models\Horse;

class HorseObserver
{
    /**
     * Handle the Horse "created" event.
     */
    public function created(Horse $horse): void
    {
        Log::info('Horse created: ', ['id' => $horse->id, 'name' => $horse->name]);
    }

    /**
     * Handle the Horse "updated" event.
     */
    public function updated(Horse $horse): void
    {
        Log::info('Horse updated: ', ['id' => $horse->id, 'name' => $horse->name]);
    }

    /**
     * Handle the Horse "deleted" event.
     */
    public function deleted(Horse $horse): void
    {
        Log::info('Horse deleted: ', ['id' => $horse->id, 'name' => $horse->name]);
    }

    /**
     * Handle the Horse "restored" event.
     */
    public function restored(Horse $horse): void
    {
        Log::info('Horse restored: ', ['id' => $horse->id, 'name' => $horse->name]);
    }

    /**
     * Handle the Horse "force deleted" event.
     */
    public function forceDeleted(Horse $horse): void
    {
        Log::info('Horse forceDeleted: ', ['id' => $horse->id, 'name' => $horse->name]);
    }
}
