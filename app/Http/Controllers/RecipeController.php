<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;
use Session;
use App\Models\Recipe;
use App\Models\Account;
use App\Models\Contact;
use App\Http\Requests;
use App\Http\Requests\RecipeRequest;
use App\Http\Controllers\Controller;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalExpenses = 0;
        $totalRecipes = 0;

        $totalExpenses = DB::table('expenses')->sum('value');
        $totalRecipes = DB::table('recipes')->sum('value');

        Session::put('user.saldo', $totalRecipes-$totalExpenses);


        $id = Auth::user()->id;
        
        $receitas = Recipe::where('user_id', $id)->get();

        $contas = Account::where('of_user', $id)->get();

        $contatos = Contact::where('of_user', $id)->get();

        return view('carteira.receita', compact('receitas', 'contas', 'contatos'));
    
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
    public function store(RecipeRequest $request)
    {
        Recipe::create([
                    'name'          => $request->name,
                    'date'          => $request->date,
                    'value'         => $request->value,
                    'account_id'    => $request->account_id,
                    'user_id'       => Auth::user()->id,
                    'contact_id'    => $request->contact_id,
            ]);

         return  redirect()->route('index_receita');
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
        
        $receitas = Recipe::where('user_id', $idU)->get();

        $contas = Account::where('of_user', $idU)->get();

        $contatos = Contact::where('of_user', $idU)->get();

        $receita = Recipe::findOrFail($id);

        return view('carteira.receita', compact('receitas', 'contas', 'contatos', 'receita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecipeRequest $request, $id)
    {
                    $receita = Recipe::findOrFail($id);
                    $receita->name          = $request->name;
                    $receita->date          = $request->date;
                    $receita->value         = $request->value;
                    $receita->account_id    = $request->account_id;
                    $receita->contact_id    = $request->contact_id;
                    
                    $receita->save();

         return  redirect()->route('index_receita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receita = Recipe::destroy($id);

        return  redirect()->route('index_receita');
    }
}
