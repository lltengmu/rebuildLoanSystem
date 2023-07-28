<?php

namespace App\Http\Controllers;

use App\Service\AnimatedImagesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnimatedImageContrroler extends Controller
{
    public function __invoke(Request $request, AnimatedImagesService $animatedImages)
    {
        $fileInfo = app("upload")->image($request->file("file"));

        $img = Storage::get($fileInfo["path"]);

        $respone = $animatedImages->run(base64_encode($img));

        // $path = Storage::putFile("ani".$fileInfo["title"],base64_decode(mb_convert_encoding($respone->image, 'UTF-8')));

        return $this->success(
            message: "操作成功",
            data: [
                "imageUrl" => "<img src=\"data:image/jpg;base64,{$respone->image}\" alt=\"animated-image\">"
            ]
        );
    }
}
