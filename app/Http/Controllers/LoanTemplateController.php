<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanTemplateRequest;
use App\Http\Requests\UpdateLoanTemplateRequest;
use App\Models\LoanTemplate;

class LoanTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLoanTemplateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoanTemplateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoanTemplate  $loanTemplate
     * @return \Illuminate\Http\Response
     */
    public function show(LoanTemplate $loanTemplate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoanTemplate  $loanTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(LoanTemplate $loanTemplate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLoanTemplateRequest  $request
     * @param  \App\Models\LoanTemplate  $loanTemplate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLoanTemplateRequest $request, LoanTemplate $loanTemplate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoanTemplate  $loanTemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoanTemplate $loanTemplate)
    {
        //
    }
}
