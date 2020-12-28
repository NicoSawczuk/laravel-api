<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return response()->json($contacts, 200);
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
        $data = request()->validate([
            'firstname'        => 'required',
            'lastname'         => 'required',
            'phonenumber'      => 'required'
        ]);

        $contact = new Contact();
        $contact->firstname = $request->firstname;
        $contact->lastname = $request->lastname;
        $contact->phonenumber = $request->phonenumber;

        $contact->save();

        return response()->json($contact, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
      $data = request()->validate([
          'firstname'        => 'required',
          'lastname'         => 'required',
          'phonenumber'      => 'required'
      ]);

      $contact->firstname = $request->firstname;
      $contact->lastname = $request->lastname;
      $contact->phonenumber = $request->phonenumber;

      $contact->update();

      return response()->json($contact, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Contact $contact)
    {
        $aux = $contact;
        $contact->delete();

        return response()->json($aux, 200);
    }
}
