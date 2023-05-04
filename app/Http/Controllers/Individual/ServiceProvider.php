<?php

namespace App\Http\Controllers\individual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceProvider extends Controller
{
    public function index()
    {
        return view("pages.individual.serviceProviderManagment");
    }
}
