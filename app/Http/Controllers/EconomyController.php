<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;
use Session;
use App\Models\Economy;
use App\Http\Requests;
use App\Http\Requests\EconomyRequest;
use App\Http\Controllers\Controller;

class EconomyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(!Session::get('user.saldo') || Session::get('user.saldo') == '')
        {
        $totalExpenses = DB::table('expenses')->sum('value');
        $totalRecipes  = DB::table('recipes')->sum('value');

        Session::put('user.saldo', $totalRecipes-$totalExpenses);
        }
        
        $id = Auth::user()->id;
        
        $economias = Economy::where('of_user', $id)->get();

        return view('carteira.economias', compact('economias'));
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
    public function store(EconomyRequest $request)
    {
        Economy::create([
                    'of_user' => Auth::user()->id,
                    'desc'  => $request->desc,
                    'value' => $request->value,
            ]);


        return  redirect()->route('index_economia');
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
        
        $economias = Economy::where('of_user', $idU)->get();

        $economia = Economy::findOrFail($id);

        return view('carteira.economias', compact('economia','economias'));
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
            $economia       = Economy::findOrFail($id);
            $economia->desc  = $request->desc;
            $economia->value = $request->value;
            
            $economia->save();
    


        return  redirect()->route('index_economia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $economia = Economy::destroy($id);

        return  redirect()->route('index_economia');
    }
}