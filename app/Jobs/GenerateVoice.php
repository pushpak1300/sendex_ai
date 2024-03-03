<?php

namespace App\Jobs;

use App\Models\Contact;
use ArdaGnsrn\ElevenLabs\ElevenLabs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateVoice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
        $summary = $this->contact->data['summary'];
        $id = $this->contact->id;
        $elevenLabs = new ElevenLabs();

        $response = $elevenLabs->textToSpeech(
            'iP95p4xoKVk53GoZ742B',
            $summary
        );
        $response->saveFile($id.'.mp3');
    }
}
