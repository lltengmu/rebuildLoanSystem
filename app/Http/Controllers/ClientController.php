<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __invoke()
    {
        return Client::select([
            "id",
            "first_name",
            "last_name",
            "appellation",
            "HKID",
            "date_of_birth",
            "marital_status",
            "mobile",
            "email",
            "nationality",
            "area",
            "addres",
            "addressOne",
            "addressTwo",
            "building",
            "floor",
            "unit",
            "job_status",
            "salary",
            "company_name",
            "company_addres", 
            "create_datetime", 
            "update_datetime", 
            "status"
        ])->get();
    }
}
