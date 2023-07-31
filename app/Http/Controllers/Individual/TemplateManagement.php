<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLoanTemplateRequest;
use App\Models\LoanTemplate;
use Illuminate\Http\Request;

class TemplateManagement extends Controller
{
    public function index()
    {
        $loanTemplateList = LoanTemplate::all()->toArray();
        return view(
            "pages.individual.templateManagment",
            [
                "loanTemplateList" => $loanTemplateList
            ]
        );
    }
    public function detail($id)
    {
        $data = LoanTemplate::find($id)->toArray();
        return view("public.pages.loan-template-detail", ["data" => $data]);
    }
    public function edit(UpdateLoanTemplateRequest $request, $id)
    {
        $template = LoanTemplate::find($id);

        if (!is_null($request->file("file"))) {

            $imageInfo = app("upload")->image($request->file("file"));
            
            $template->update(
                [
                    "template_image" => $imageInfo["path"],
                    "update_by" => session("email")
                ] + $request->input()
            );
            return $this->success(message: "更新成功", data: null);
        } else {
            $template->update(
                [
                    "update_by" => session("email")
                ] + $request->input()
            );
            return $this->success(message: "更新成功", data: null);
        }
    }
}
