<?php

namespace App\Http\Controllers\individual;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\ServiceProvider as ModelServiceProvider;
use Illuminate\Http\Request;

class ServiceProvider extends Controller
{
    public function index()
    {
        $company = Company::all();
        return view("pages.individual.serviceProviderManagment",[
            "company" => $company
        ]);
    }
    public function details($id)
    {
        $data = ModelServiceProvider::where("id",$this->decryptID($id))->select(["contact", "company_id","first_name", "last_name", "email","mobile"])->get()->toArray()[0];
        return $data;
    }
}
