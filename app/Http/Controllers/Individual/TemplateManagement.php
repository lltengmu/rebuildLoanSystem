<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
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
}
