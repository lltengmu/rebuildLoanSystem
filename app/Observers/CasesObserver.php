<?php

namespace App\Observers;

use App\Models\CaseLog;
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
        //自动填充加密id
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
        $logInfo = [
            "cases_id" => $cases->id,
            "action" => app("utils")->caseStatus((int) $cases->case_status),
            "when" => date("Y-m-d H:m:s"),
            "update_by" => session("_user_info.identify") . "_" . session("_user_info.user_id")
        ];
        CaseLog::create($logInfo);
    }
}
