<?php

namespace App\Http\Controllers;

use App\Account;
use App\Person;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        return response( Account::with(['person', 'card'])->findOrFail( $account->id ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
       try {
           $person = Person::where('id', '=', $account->person_id )->first();
           $account->update( $request->all() );
           $request['expired_date'] = Carbon::now()->addYears(4)->format('Y-m-d');
           $request["card_number"] = '1080'.$person->document_number.'1793';
           $request["CVC"] = '1111';
           $account->card()->create( $request->all() );
           return response( [ "response" => true ] );
       } catch (\Throwable $th) {
           return response( [ "response" => false, "e"=>$th ] );
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }

    public function request_debit(){
        $request_debit = Account::with( ['person', 'card'] )->where( 'type', 'debit' )->get();
        return response( [ "data" => $request_debit ] );
    }

    public function request_credit(){
        $request_credit = Account::with( ['person', 'card'] )->where( 'type', 'credit' )->get();
        return response( [ "data" => $request_credit ] );
    }

}
