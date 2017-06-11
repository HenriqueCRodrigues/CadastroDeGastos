<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;
use Session;
use App\Models\Contact;
use App\Http\Requests;
use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;

class ContactController extends Controller
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
        
        $contatos = Contact::where('of_user', $id)->get();

        return view('carteira.contato', compact('contatos'));
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
    public function store(ContactRequest $request)
    {
        Contact::create([
                    'of_user' => Auth::user()->id,
                    'name'  => $request->name,
                    'phone' => $request->phone,
                    'email' => $request->email,
            ]);


        return  redirect()->route('index_contato');
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
        
        $contatos = Contact::where('of_user', $idU)->get();

        $contato = Contact::findOrFail($id);

        return view('carteira.contato', compact('contatos','contato'));
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
            $contact        = Contact::findOrFail($id);
            $contact->name  = $request->name;
            $contact->phone = $request->phone;
            $contact->email = $request->email;
            
            $contact->save();
    


        return  redirect()->route('index_contato');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contato = Contact::destroy($id);

        return  redirect()->route('index_contato');
    }
}
