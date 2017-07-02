<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;
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
        $contato = Contact::where(['id' => $id, 'of_user' => $idU])->first();

        if($contato != null) 
        {
            $contatos = Contact::where('of_user', $idU)->get();
            return view('carteira.contato', compact('contatos','contato'));    
        }


        return redirect()->route('index_contato');
        

        

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
            $idU = Auth::user()->id;

            $contact = Contact::where(['id' => $id, 'of_user' => $idU])->first();

            if($contact != null) 
            {
                $contact->name  = $request->name;
                $contact->phone = $request->phone;
                $contact->email = $request->email;
                
                $contact->save();

            }
            
    


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
        $idU = Auth::user()->id;
        $contato = Contact::where(['id' => $id, 'of_user' => $idU])->first();
        
        if (!\Request::ajax() || $contato == null) 
        {
            abort(403);
        }

        $contato = Contact::destroy($id);

        return  redirect()->route('index_contato');
    }
}
