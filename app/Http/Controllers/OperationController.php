<?php

namespace App\Http\Controllers;

use App\Account;
use App\Operation;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $person = Person::where( 'email', Auth::user()->email )->first();
        return Account::where( 'person_id', $person->id )->first();
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
        $emitter = Person::where( 'email', Auth::user()->email )->first();
        $emitteracount = Account::where( 'person_id', $emitter->id )->first();
        $receptor = Account::where( 'account_number', $request->account_id )->first();
        $request['emitter'] = $emitter->id;
        $request['receptor'] = $receptor->person_id;
        Operation::create( $request->all() );
        $request['type'] = "Recibido";
        $request['account_id'] = $emitteracount->account_number;
        Operation::create( $request->all() );
        $amount = $request->amount;
        $request['amount'] = $emitteracount->amount - $amount;
        $emitteracount->update( $request->all() );

        $request['amount'] = $receptor->amount + $amount;
        $receptor->update( $request->all() );
        
        return 5;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function show(Operation $operation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function edit(Operation $operation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operation $operation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operation $operation)
    {
        //
    }

    public function showOperation(){
        $person = Person::where( 'email', Auth::user()->email )->first();
        $account = Account::where( 'person_id', $person->id )->first();
        
        $operation =  Operation::where('type', '!=', 'Recibido') ->where('emitter', $account->person_id)->get(); 
        $jsonOperation = json_encode($operation);
        $operation1 = (Operation::where('type', '!=', 'Envio') ->where('receptor', $account->person_id)->get());
        $jsonOperation1 = json_encode($operation1);
        $info = array_merge( json_decode($jsonOperation), json_decode($jsonOperation1) );
        return response( [ "data" => $info ] );


    }

}
