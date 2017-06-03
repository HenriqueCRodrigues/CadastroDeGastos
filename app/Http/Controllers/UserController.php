<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
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
        return view('PASTALYOUT.ARQUIVOLAYOUT');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {


            $user = User::findOrFail($id);

            if(Auth::user()->id == $id) 
            {
                $user->name     = $request->name;
                $user->email    = $request->email;
                $user->login    = $request->login;
                $user->password = $request->password;

                $user->save();
            }

            return redirect('PREFIX DA ROTA');
            
        }




    public function recipes()
    {
        return view('carteira.receita');
    }


    public function expenses()
    {
        return view('carteira.despesa');
    }

    public function contacts()
    {
        return view('carteira.contato');
    }

    public function accounts()
    {
        return view('carteira.conta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        if (Auth::user()->id == $id) 
        {
            $user->delete();
        }

        return redirect('PAGINA INICIAL');
    }
}
