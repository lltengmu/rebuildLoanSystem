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
}
