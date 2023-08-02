<?php

namespace App\Observers;

use App\Events\AttachmentEvent;
use App\Models\Attachment;
use Jenssegers\Agent\Agent;

class AttachmentObserver
{
    /**
     * Handle the Attachment "deleted" event.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return void
     */
    public function deleted(Attachment $attachment)
    {
        $agent = new Agent();
        //需要log的信息
        $logInfo = [
            "case_id" => $attachment->cases_id,
            "user_id" => session("_user_info.user_id"),
            "user_role" => session("_user_info.identify")."_".session("_user_info.user_id"),
            "action" => "delete",
            "when" => date("Y-m-d H:m:s"),
            "ip" => request()->ip(),
            "browser" => $agent->browser()
        ];
        //触发事件记录谁下载了附件
        event(new AttachmentEvent($logInfo));
    }
}
