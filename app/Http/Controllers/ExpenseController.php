<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;
use Session;
use App\Models\Expense;
use App\Models\Recipe;
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

        $totalExpenses = Expense::where('user_id', $id)->sum('value');
        $totalRecipes = Recipe::where('user_id', $id)->sum('value');

        Session::put('user.saldo', $totalRecipes-$totalExpenses);
        Session::put('user.id', $id);        

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
        $despesa = Expense::where(['id' => $id, 'user_id' => $idU])->first();
        
        if ($despesa != null) 
        {
            $despesas = Expense::where('user_id', $idU)->get();

            $contas = Account::where('of_user', $idU)->get();

            $contatos = Contact::where('of_user', $idU)->get();


            return view('carteira.despesa', compact('despesas', 'contas', 'contatos', 'despesa'));
            
        }


        return  redirect()->route('index_despesa');


       
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
                    $idU = Auth::user()->id;
                    $despesa = Expense::where(['id' => $id, 'user_id' => $idU])->first();
                    
                     if ($despesa != null) 
                     {

                        $receita             = Expense::findOrFail($id);
                        $receita->name       = $request->name;
                        $receita->date       = $request->date;
                        $receita->value      = $request->value;
                        $receita->account_id = $request->account_id;
                        $receita->contact_id = $request->contact_id;
                        
                        $receita->save();
                        
                     }

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
        $idU = Auth::user()->id;
        $despesa = Expense::where(['id' => $id, 'user_id' => $idU])->first();
        
        if (!\Request::ajax() || $despesa == null) 
        {
            abort(403);
        }

        $despesa = Expense::destroy($id);

        return  redirect()->route('index_despesa');
    }
}
