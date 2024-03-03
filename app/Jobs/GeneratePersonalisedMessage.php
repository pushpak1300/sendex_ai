<?php

namespace App\Jobs;

use App\Models\Contact;
use Arr;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class GeneratePersonalisedMessage implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    /**
     * Create a new job instance.
     */
    public function __construct(public Contact $contact)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $summary = Arr::get($this->contact?->data, 'summary', '');
        $team = $this->contact?->team;
        $info = $team->info;
        $teamName = $team->name;
        $result = Http::post(config('app.python_app_url'). '/groq/personalise',[
            "contact_data" => $info,
            "company_data" => $summary,
            "company_type" => $this->contact?->type,
            "personalisation_medium" => 'email',
            "name" => $teamName,
        ]);
        $this->contact->update([
            'data->script' => $result->json()
        ]);
    }
}
