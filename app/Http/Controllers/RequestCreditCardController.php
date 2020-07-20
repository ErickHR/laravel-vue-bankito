<?php

namespace App\Http\Controllers;

use App\RequestCreditCard;
use Illuminate\Http\Request;

class RequestCreditCardController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "erick";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RequestCreditCard  $requestCreditCard
     * @return \Illuminate\Http\Response
     */
    public function show(RequestCreditCard $requestCreditCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RequestCreditCard  $requestCreditCard
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestCreditCard $requestCreditCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RequestCreditCard  $requestCreditCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestCreditCard $requestCreditCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RequestCreditCard  $requestCreditCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestCreditCard $requestCreditCard)
    {
        //
    }
}
