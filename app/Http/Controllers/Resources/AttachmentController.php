<?php

namespace App\Http\Controllers\Resources;

use App\Events\AttachmentEvent;
use App\Events\AttachmentViewEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\UploadAttachmentRequest;
use App\Models\Attachment;
use App\Models\Cases;
use App\Models\Client;
use App\Service\UtilsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Agent\Agent;

class AttachmentController extends Controller
{
    /**
     * upload attachment api
     * @return json
     */
    public function store(UploadAttachmentRequest $request, $id)
    {
        //获取当前上传用户
        $user = Client::find(session("_user_info.user_id"));
        //文件处理
        $attachInfo = app("upload")->attachment($request->file("file"));
        //添加数据
        Attachment::create(
            [
                "cases_id" => $this->decryptID($id),
                "client_id" => $user->id,
                "title" => $attachInfo["title"],
                "upload_file" => $attachInfo["path"],
                "file_type" => $attachInfo["ext"],
                "update_by" => session("_user_info.identify")."_".session("_user_info.user_id"),
            ]
        );
        //获取当前贷款实例的所有附件
        $data = Cases::find($this->decryptID($id))->attachment->toArray();
        //返回模版到前端渲染
        return $this->success(message: "上传成功", data: (string) view("pages.client.attachmentList", ["data" => $data]));
    }
    /**
     * get single case all attachment
     * @return json
     */
    public function show(Request $request,UtilsService $utilsService,$id)
    {
        $attachments = Cases::find($this->decryptID($id))->attachment->toArray();

        $agent = new Agent();
        //需要log的信息
        $logInfo = [
            "case_id" => $this->decryptID($id),
            "user_id" => session("_user_info.user_id"),
            "user_role" => session("_user_info.identify")."_".session("_user_info.user_id"),
            "action" => "view",
            "when" => date("Y-m-d H:m:s"),
            "ip" => $request->ip(),
            "browser" => $agent->browser()
        ];
        //触发事件记录谁查看了附件
        event(new AttachmentEvent($logInfo));

        if (empty($attachments)) {
            return $this->success(message: "获取成功", data: "<div class=\"text-center w-100\">还未有上传文件哦～</div>");
        }

        return $this->success(message: "获取成功", data: (string) view("pages.client.attachmentList", ["data" => $attachments]));
    }
    /**
     * download attachment
     * @return download
     */
    public function download($id)
    {
        $agent = new Agent();

        $attachment = Attachment::find($id);
        //需要log的信息
        $logInfo = [
            "case_id" => $attachment->cases_id,
            "user_id" => session("_user_info.user_id"),
            "user_role" => session("_user_info.identify")."_".session("_user_info.user_id"),
            "action" => "download",
            "when" => date("Y-m-d H:m:s"),
            "ip" => request()->ip(),
            "browser" => $agent->browser()
        ];
        //触发事件记录谁下载了附件
        event(new AttachmentEvent($logInfo));

        return Storage::download($attachment->upload_file, $attachment->title);
    }
    /**
     * delete attachment
     * @return json
     */
    public function delete($case_id, $attachment_id)
    {
        //删除附件
        Attachment::destroy($attachment_id);
        
        //重新获取附件列表
        $data = Cases::find($this->decryptID($case_id))->attachment->toArray();
        if (empty($data)) {
            return $this->success(message: "获取成功", data: "<div class=\"text-center w-100\">还未有上传文件哦～</div>");
        }
        return $this->success(message: "删除成功", data: (string) view("pages.client.attachmentList", ["data" => $data]));
    }
}
