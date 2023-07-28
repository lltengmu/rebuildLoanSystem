<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadAttachmentRequest;
use App\Models\Attachment;
use App\Models\Cases;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                "file_type" => $attachInfo["ext"]
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
    public function show($id)
    {
        $attachments = Cases::find($this->decryptID($id))->attachment->toArray();
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
        $attachment = Attachment::find($id);
        return Storage::download($attachment->upload_file,$attachment->title);
    }
}
