<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoanApplicationDetail extends Controller
{
    public function index()
    {
        return view("pages.client.loanDetails");
    }
}
