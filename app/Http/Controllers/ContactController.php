<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use GuzzleHttp\Middleware;
use Inertia\Inertia;

use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $filters = $request->all('search');

        //return $filters;

        $contacts = Contact::with(['organization', 'position', 'service', 'location'])
            ->filter($filters)
            ->latest('id')
            ->paginate();

        //return $contacts;

        return Inertia::render('Contacts/IndexContacts', compact('contacts', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacts = Contact::all();

        $organizations = \App\Models\Organization::all();
        $positions = \App\Models\Position::all();
        $services = \App\Models\Service::all();
        $locations = \App\Models\Location::all();

        return Inertia::render('Contacts/CreateContacts', compact('organizations', 'positions', 'services', 'locations'));

        //return Inertia::render('Contacts/CreateContacts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'organization_id' => 'required',
            'position_id' => 'required',
            'service_id' => 'required',
            'location_id' => 'required',
            'phone' => 'required',
            'short_phone' => 'required',
            'phone_code' => 'required',
            'email' => 'required',
            'alias' => 'required',
        ]);

        return $request->all();
        $contact = Contact::create($data);

        return redirect()->route('contacts.edit', $contact);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return Inertia::render('Contacts/EditContacts', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
