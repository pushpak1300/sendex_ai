<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Jobs\GeneratePersonalisedMessage;
use App\Jobs\ScrapeUrl;
use App\Jobs\SummariseContact;
use App\Models\Contact;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;
use Inertia\Inertia;
use Inertia\Response;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        return Inertia::render('ContactIndex', [
            'contacts' => $user->currentTeam->contacts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('ContactCreate');
    }

    /**
     * Store a newly created resource in storage.
     * @throws \Throwable
     */
    public function store(StoreContactRequest $request)
    {
        $team_id = $request->user()->currentTeam->id;
        $contact = Contact::create($request->merge([
            'data->urls' => $request->get('urls'),
            'team_id' => $team_id
        ])->except('urls'));
        $batch = Bus::batch([
            new ScrapeUrl($contact),
            new SummariseContact($contact),
            new GeneratePersonalisedMessage($contact)
        ])->then(function (Batch $batch) use ($contact) {
            $contact->update([
                'status' => true
            ]);
        })->dispatch();
        session()->flash('message', 'Contact info added.');
        return redirect()->route('contact.show', $contact);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return Inertia::render('ContactShow', [
            'contact' => $contact,
            'url' => asset('storage/' . $contact->id . '.mp3')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
