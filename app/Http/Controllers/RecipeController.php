<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
