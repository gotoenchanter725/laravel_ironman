<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactForm;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact.index', [
            'contacts' => Contact::latest()->paginate(10),
            'count' => Contact::count(),
            'time' => Carbon::now(),
            'deleted_contacts' => Contact::onlyTrashed()->get(),
            'deleted_count' => Contact::onlyTrashed()->count(),
        ]);
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
    public function store(ContactForm $request)
    {
        Contact::insert([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email_address' => $request->input('email_address'),
            'mobile_number' => $request->input('mobile_number'),
            'city' => $request->input('city'),
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('contact.index')->with([
            'form-status' => 'Contact added Successfully!!',
            'type' => 'success',
        ]);
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
        return view('contact.edit', [
            'contact' => Contact::findOrFail($contact->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(ContactForm $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $validatedData = $request->validated();
        $contact->fill($validatedData);
        $contact->save();
        //dd($validatedData, $contact);
        return redirect()->route('contact.index')->with([
            'list-status' => 'Contact updated Successfully!!',
            'type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $single_contact = Contact::findOrFail($contact->id);
        $single_contact->delete();
        return redirect()->route('contact.index')->with([
            'list-status' => 'Contact deleted successfully!!',
            'type' => 'danger',
        ]);
    }

    public function restore($id)
    {
        Contact::onlyTrashed()->where('id', $id)->restore();
        $contact = Contact::findOrFail($id);
        return redirect()->route('contact.index')->with([
            'delete-list-status' => 'Contact restore successfully!!',
            'type' => 'primary',
        ]);
    }

    public function force_delete($id)
    {
        Contact::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('contact.index')->with([
            'delete-list-status' => 'Contact deleted permanently!!',
            'type' => 'danger',
        ]);
    }
}
