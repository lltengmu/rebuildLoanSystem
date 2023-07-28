<?php

namespace App\Observers;

use App\Models\Cases;
use Illuminate\Support\Facades\Crypt;

class CasesObserver
{
    /**
     * Handle the Cases "created" event.
     *
     * @param  \App\Models\Cases  $cases
     * @return void
     */
    public function created(Cases $cases)
    {
        $data = $cases->toArray();
        $cases->sys_id = Crypt::encrypt($data["id"]);
        $cases->save();
    }

    /**
     * Handle the Cases "updated" event.
     *
     * @param  \App\Models\Cases  $cases
     * @return void
     */
    public function updated(Cases $cases)
    {
        //
    }

    /**
     * Handle the Cases "deleted" event.
     *
     * @param  \App\Models\Cases  $cases
     * @return void
     */
    public function deleted(Cases $cases)
    {
        //
    }

    /**
     * Handle the Cases "restored" event.
     *
     * @param  \App\Models\Cases  $cases
     * @return void
     */
    public function restored(Cases $cases)
    {
        //
    }

    /**
     * Handle the Cases "force deleted" event.
     *
     * @param  \App\Models\Cases  $cases
     * @return void
     */
    public function forceDeleted(Cases $cases)
    {
        //
    }
}
