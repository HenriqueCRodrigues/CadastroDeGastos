<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;
use App\Models\Account;
use App\Http\Requests;
use App\Http\Requests\AccountRequest;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $id = Auth::user()->id;
        
        $contas = Account::where('of_user', $id)->get();

        return view('carteira.conta', compact('contas'));
    
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
    public function store(AccountRequest $request)
    {   
        Account::create([
                    'of_user'         => Auth::user()->id,
                    'name_bank'       => $request->name_bank,
                    'agency'       => $request->agency,
                    'number'          => $request->number,
                    'type_account_id' => $request->type_account_id,
            ]);


        return  redirect()->route('index_conta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idU = Auth::user()->id;
        
        $contas = Account::where('of_user', $idU)->get();

        $conta = Account::findOrFail($id);
        $tc = $conta->type_account_id;
        return view('carteira.conta', compact('contas','conta', 'tc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccountRequest $request, $id)
    {

            $account                  = Account::findOrFail($id);
            $account->name_bank       = $request->name_bank;
            $account->agency          = $request->agency;
            $account->number          = $request->number;
            $account->type_account_id = $request->type_account_id;
            
            $account->save();
    


        return  redirect()->route('index_conta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conta = Account::destroy($id);

        return  redirect()->route('index_conta');
    }
}
