<?php
namespace App\Service;

use Illuminate\Http\UploadedFile;

class UploadService 
{
    /**
     * 约束附件的存储位置
     * @return array
     */
    public function attachment(UploadedFile $file)
    {
        return [
            "path" => $file->store("attachment/".date("Ym")),
            "ext" => $file->extension(),
            "title" => $file->getClientOriginalName()
        ];
    }
    /**
     * 约束附件的存储位置
     * @return array
     */
    public function image(UploadedFile $file)
    {
        return [
            "path" => $file->store("images/".date("Ym")),
            "ext" => $file->extension(),
            "title" => $file->getClientOriginalName()
        ];
    }
}