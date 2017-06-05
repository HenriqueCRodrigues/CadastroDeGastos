<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\Expense;
use App\Models\Account;
use App\Models\Contact;
use App\Http\Requests;
use App\Http\Requests\ExpenseRequest;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        
        $despesas = Expense::where('user_id', $id)->get();

        $contas = Account::where('of_user', $id)->get();

        $contatos = Contact::where('of_user', $id)->get();

        return view('carteira.despesa', compact('despesas', 'contas', 'contatos'));
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
        Expense::create([
                    'name'          => $request->name,
                    'date'          => $request->date,
                    'value'         => $request->value,
                    'account_id'    => $request->account_id,
                    'user_id'       => Auth::user()->id,
                    'contact_id'    => $request->contact_id,
            ]);

         return  redirect()->route('index_despesa');
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
        
        $despesas = Expense::where('user_id', $idU)->get();

        $contas = Account::where('of_user', $idU)->get();

        $contatos = Contact::where('of_user', $idU)->get();

        $despesa = Expense::findOrFail($id);

        return view('carteira.despesa', compact('despesas', 'contas', 'contatos', 'despesa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseRequest $request, $id)
    {
                    $receita             = Expense::findOrFail($id);
                    $receita->name       = $request->name;
                    $receita->date       = $request->date;
                    $receita->value      = $request->value;
                    $receita->account_id = $request->account_id;
                    $receita->contact_id = $request->contact_id;
                    
                    $receita->save();

         return  redirect()->route('index_despesa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $despesa = Expense::destroy($id);

        return  redirect()->route('index_despesa');
    }
}
