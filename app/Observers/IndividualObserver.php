<?php

namespace App\Observers;

use App\Models\Individuals;
use Illuminate\Support\Facades\Crypt;

class IndividualObserver
{
    /**
     * Handle the Individuals "created" event.
     *
     * @param  \App\Models\Individuals  $individuals
     * @return void
     */
    public function created(Individuals $individuals)
    {
        $data = $individuals->toArray();
        $individuals->sys_id = Crypt::encrypt($data["id"]);
        $individuals->save();
    }

    /**
     * Handle the Individuals "updated" event.
     *
     * @param  \App\Models\Individuals  $individuals
     * @return void
     */
    public function updated(Individuals $individuals)
    {
        //
    }

    /**
     * Handle the Individuals "deleted" event.
     *
     * @param  \App\Models\Individuals  $individuals
     * @return void
     */
    public function deleted(Individuals $individuals)
    {
        //
    }

    /**
     * Handle the Individuals "restored" event.
     *
     * @param  \App\Models\Individuals  $individuals
     * @return void
     */
    public function restored(Individuals $individuals)
    {
        //
    }

    /**
     * Handle the Individuals "force deleted" event.
     *
     * @param  \App\Models\Individuals  $individuals
     * @return void
     */
    public function forceDeleted(Individuals $individuals)
    {
        //
    }
}
