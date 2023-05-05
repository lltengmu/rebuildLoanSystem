<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\Individuals;
use Illuminate\Http\Request;

class IndividualManagement extends Controller
{
    public function index()
    {
        return view("pages.individual.individualManagment");
    }
    public function details($id)
    {
        return Individuals::where("id",$this->decryptID($id))->select(["contact","first_name", "last_name", "email","mobile"])->get()->toArray()[0];
    }
}
