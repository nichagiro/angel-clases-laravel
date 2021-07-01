<?php

namespace App\Observers;

use App\Models\people;
use Illuminate\Support\Facades\Storage;

class PeopleObserver
{
    /**
     * Handle the people "created" event.
     *
     * @param  \App\Models\people  $people
     * @return void
     */
    public function created(people $people)
    {
        //
    }

    /**
     * Handle the people "updated" event.
     *
     * @param  \App\Models\people  $people
     * @return void
     */
    public function updating(people $people)
    {
        //
    }

    /**
     * Handle the people "deleted" event.
     *
     * @param  \App\Models\people  $people
     * @return void
     */
    public function deleting(people $people)
    {
        try {
            $url = str_replace('storage','public', $people->img);
            Storage::delete($url);

        } catch (\Throwable $th) {

        }
    }

    /**
     * Handle the people "restored" event.
     *
     * @param  \App\Models\people  $people
     * @return void
     */
    public function restored(people $people)
    {
        //
    }

    /**
     * Handle the people "force deleted" event.
     *
     * @param  \App\Models\people  $people
     * @return void
     */
    public function forceDeleted(people $people)
    {
        //
    }
}
