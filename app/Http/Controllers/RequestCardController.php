<?php

namespace App\Http\Controllers;

use App\RequestCard;
use Illuminate\Http\Request;

class RequestCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RequestCard::where("type", "=", "Credit")->get();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RequestCard  $requestCard
     * @return \Illuminate\Http\Response
     */
    public function show(RequestCard $requestCard)
    {
        return response( RequestCard::with('person')->findOrFail( $requestCard->id ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RequestCard  $requestCard
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestCard $requestCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RequestCard  $requestCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestCard $requestCard)
    {
        try {
            $requestCard->update( $request->all() );
            return response( [ "response" => true ] );
        } catch (\Throwable $th) {
            return response( [ "response" => false, '"e'=> $th ] );
        }
        // $requestCard->request="credit"; 
        // $requestCard->save();  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RequestCard  $requestCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestCard $requestCard)
    {
        //
    }

    public function request_debit_card_show(){
        $request_debit_card = RequestCard::with( 'person' )->where( 'type', 'debit' )->get();
        return response( [ "data" => $request_debit_card ] );
    }

    public function request_credit_card_show(){
        $request_debit_card = RequestCard::with( 'person' )->where( 'type', 'credit' )->get();
        return response( [ "data" => $request_debit_card ] );
    }

}
