<?php

namespace App\Http\Controllers;

use App\RequestDebitCard;
use Illuminate\Http\Request;

class RequestDebitCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RequestDebitCard::all();
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
        return RequestDebitCard::create( $request->all() );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RequestDebitCard  $requestDebitCard
     * @return \Illuminate\Http\Response
     */
    public function show(RequestDebitCard $requestDebitCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RequestDebitCard  $requestDebitCard
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestDebitCard $requestDebitCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RequestDebitCard  $requestDebitCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestDebitCard $requestDebitCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RequestDebitCard  $requestDebitCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestDebitCard $requestDebitCard)
    {
        //
    }
}
