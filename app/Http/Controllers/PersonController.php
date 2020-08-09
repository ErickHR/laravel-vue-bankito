<?php

namespace App\Http\Controllers;

use App\Person;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $person = Person::with( ['request_card' => function( $query ){
            $query->where('type', '=', 'Debit');
        }] )->whereHas( 'request_card', function( $query ){
            $query->where('type', '=', 'Debit');
        } )->get(); 
        return response( [ "data" => $person ] );
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
        try {
            $request["request"] = $request->type == "credit"? "Ver":"Aprobado";
            $request["account_number"] = '10'.$request->document_number.( $request->type == "credit"? "TC":"TD" );
            $request["amount"] = 0;
            $request["account_type_id"] = -1;
            $person = Person::create( $request->all() );
            $account = $person->account()->create( $request->all() );
            if( $request->type == "debit" ){
                $request['expired_date'] = Carbon::now()->addYears(4)->format('Y-m-d');
                $request["card_number"] = '1080'.$request->document_number.'1793';
                $request["CVC"] = '1111';
                $account->card()->create( $request->all() );
            }
            return response( [ "response" => true ] );
        } catch (\Throwable $th) {
            return response( [ "response" => false, "e"=>$th ] );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        try {
            $person->update( $request->all() );
            return response( [ "response" => true ] );
        } catch (\Throwable $th) {
            return response( [ "response" => false, "e"=>$th ] );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
    }
}
